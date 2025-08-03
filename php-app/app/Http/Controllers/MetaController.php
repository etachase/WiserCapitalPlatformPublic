<?php namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use App\Support\WSARStructure;

class MetaController extends Controller 
{
    /**
     * Function to get the meta tooltip
     * 
     * @return view
     */
    public function Tooltip()
    {
        $page_title = 'TOOLTIPS';
        $page_description = 'List of tooltips';
        
        $tooltip_data = [];
        
        foreach (WSARStructure::$wsar_score_structure as $section) {
            array_push($tooltip_data, [
                'name'    => $section['name'],
                'tooltip' => Meta::where('key', '=', $section['name'])->
                                where('type', '=', Meta::WSARSCORE)->pluck('value')
            ]);
            foreach ($section['items'] as $item) {
                array_push($tooltip_data, [
                    'name'    => $item['name'],
                    'tooltip' => Meta::where('key', '=', $item['name'])->
                                where('type', '=', Meta::WSARSCORE)->pluck('value')
                ]);
            }
        }
        return view('admin.wsar.tooltip', compact('tooltip_data', 'page_title', 'page_description'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTooltip(Request $request)
    {
        if (!\Auth::user()->hasRole('admins')) {
            die('You are not authorize user to update the value');
        }
        if (!$request->get('name')) {
            die('No tooltip found!');
        }
        $meta = $request->all();
        if (!empty($meta['value'])) {
            $meta_row = Meta::where('key', '=', $meta['name'])->
                            where('type', '=', Meta::WSARSCORE)->first();
            $meta_row = !$meta_row ? new Meta() : $meta_row;

            $meta_row->type  = Meta::WSARSCORE;
            $meta_row->key   = $meta['name'];
            $meta_row->value = $meta['value'];
            $meta_row->save();
        } else {
            Meta::where('key', '=', $meta['name'])->
                where('type', '=', Meta::WSARSCORE)->delete();
        }
        return response()->json(['success' => true, 'new_value' => $meta['value']]);
    }
}