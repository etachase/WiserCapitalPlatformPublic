<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class AssetRequest extends Request
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

                return [
                    //
                    "asset_type_id"                     => "sometimes|required|",
                    "name"                              => "sometimes|required|",
                    "manufacturer_id"                   => "sometimes|required|exists:manufacturers,id",
                    "model"                             => "sometimes|required|",
                    "data.out_volt"                     => "sometimes|required|",
                    "data.warranty.years"               => "sometimes|required|",
                    "data.type"                         => "sometimes|required|",
                    "data.pwr_stc"                      => "sometimes|required|",
                    "data.tol"                          => "sometimes|required|",
                    "data.warr_type"                    => "sometimes|required|",
                    "data.warr_sp1_years"               => "sometimes|required|",
                    "data.warr_sp1_perc"                => "sometimes|required|",
                    "data.length"                       => "sometimes|required|",
                    "data.width"                        => "sometimes|required|",
                    "data.depth"                        => "sometimes|required|",
                    "data.weight"                       => "sometimes|required|",
                    "data.voltage"                      => "sometimes|required|",
                    "data.ah_capacity_20h"              => "sometimes|required|",
                    "data.ah_capacity_100h"             => "sometimes|required|",
                    "data.height"                       => "sometimes|required|",
                ];


    }
}
