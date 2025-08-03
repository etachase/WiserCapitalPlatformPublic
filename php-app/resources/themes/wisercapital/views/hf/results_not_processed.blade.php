@extends('layouts.master')


@section('content')

<div class="row">
    <div class="sec">
        <div class="col-md-12">
            <div class="sec-header1 sec-header row">
                @include('hf.project_menu')
            </div>
            <div class="resultpanel clearfix ">
                <div class="row">
                    <div class="row col-xs-12">
                        <div class="row">
                            <h3 class="padL30 margin-bottom">{{$page_title}}</h3>
                        </div>
                        <div class="col-xs-12">
                            <p>
                                Contact us at projects@wisercapital.com or 805-899-3400. <br/>
                                To ensure proper modeling of this project, a Wiser representative will review your inputs and follow up with additional questions as needed.

                            </p>
                            <p>
                                <ul>
                                    {{trans('hf/general.messages.cannot-model-system-description')}}
                                    @if (isset($metas['interconnection_type']) && 
                                        ($metas['interconnection_type'] == \App\Support\Dropdown::INTERCONNECTION_FIT))
                                    <li>{{$error_messages['interconnection_type']}}</li>
                                    @endif
                                    @if ($ongoing_sys_error)
                                    <li>{{$error_messages['ongoing_system_cost']}}</li>
                                    @endif
                                   @if (isset($metas['signed_power_purchase_agreement']) && ($metas['signed_power_purchase_agreement'] == 1))
                                    <li>{{$error_messages['signed_power_purchase_agreement']}}</li>
                                    @endif
                                    @if (isset($metas['signed_site_lease']) && ($metas['signed_site_lease'] == 1))
                                    <li>{{$error_messages['signed_site_lease']}}</li>
                                    @endif 
                                </ul>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
