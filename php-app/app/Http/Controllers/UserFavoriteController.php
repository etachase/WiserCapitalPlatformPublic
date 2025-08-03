<?php namespace App\Http\Controllers;

use App\Models\UserFavoriteSite;
use App\Models\Site;
use Illuminate\Http\Request;
use Auth;
use Flash;
use URL;
class UserFavoriteController extends Controller {

    /**
     * @var UserFavoriteSite
     */
    protected $user_favorite_site;
    /**
     * @var Site
     */
    protected $site;

    /**
     * @param User $user_favorite_site
     * @param Role $site
     */
    public function __construct(UserFavoriteSite $user_favorite_site, Site $site)
    {
        $this->user_favorite_site   = $user_favorite_site;
        $this->site                 = $site;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getUserFavoriteProject()
    {
        $favorite_sites = $this->site->leftJoin('user_favorite_sites AS ufs', 'ufs.site_id',
                            '=', 'sites.id')->where('ufs.user_id', Auth::id())->paginate(10);
        dd($favorite_sites);
    }

    /**
     * Store favorite project of user
     * 
     * @param type $id
     * @param \App\Http\Controllers\Request $request
     * @return type
     */
    public function storeUserFavoriteProject($id, Request $request)
    {
        $user_favorite_site = $this->user_favorite_site->where('site_id', '=', $id)
                                ->where('user_id', Auth::id())->first();
        
        Flash::error(trans('admin/user_favorite_sites/general.status.already-exist'));
        
        if (!$user_favorite_site) {
            $this->user_favorite_site->create([
                'site_id' => $id,
                'user_id' => Auth::id()
            ]);

            Flash::success(trans('admin/user_favorite_sites/general.status.created'));
        }
        return redirect(URL::previous());
        
        
    }

    /**
     * Unfavorite Confirm
     *
     * @param   int   $id
     * @return  View
     */
    public function getUnfavoriteProjectModal($id)
    {
        $error = null;

        $user_favorite_site = $this->user_favorite_site->find($id);

        if (!$user_favorite_site)
        {
            abort(403);
        }

        $modal_title = trans('admin/user_favorite_sites/dialog.delete-confirm.title');

        if (Auth::user()->id == $user_favorite_site->user_id) {;
            $modal_route = route('user.favorite.projects.delete', array('id' => $user_favorite_site->id));

            $modal_body = trans('admin/user_favorite_sites/dialog.delete-confirm.body', ['name' => $user_favorite_site->site()->first()->name]);
        }
        else
        {
            $error = trans('admin/user_favorite_site/dialog.error.cant-delete');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }

    /**
     * Delete favorite project of user
     * 
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyUserFavoriteProject($id)
    {
        $user_favorite_site = $this->user_favorite_site->find($id);

        if (!$user_favorite_site)
        {
            abort(403);
        }
        UserFavoriteSite::destroy($id);

        Flash::success(trans('admin/user_favorite_sites/general.status.deleted'));

        return redirect(URL::previous());
    }

}