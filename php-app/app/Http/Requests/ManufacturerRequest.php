<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Asset;
use App\Support\Dropdown;

class ManufacturerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $yes_no_validation  = "in:". Dropdown::NO. ','. Dropdown::YES;
        $numeric_validation = 'numeric';
        return [
            "name"             => "required|max:100",
            "asset_type_id"    => "required|in:". Asset::TYPE_INVERTER. ','. 
                                    Asset::TYPE_MODULE. ','.Asset::TYPE_RACKING,
            "publicity_traded" => $yes_no_validation,
            "equity"           => $yes_no_validation,
            'yr_1_sales_trend' => $numeric_validation,
            'yr_2_sales_trend' => $numeric_validation,
            'yr_3_sales_trend' => $numeric_validation,
            "business_length"  => $yes_no_validation,
        ];
    }
}
