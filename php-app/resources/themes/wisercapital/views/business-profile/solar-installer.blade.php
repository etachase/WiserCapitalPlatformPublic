
        <div class="panel-body">


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[name]', 'Company Name') !!}
                        {!! Form::text('solar_installer[name]', (!empty($solar_installer['name']) ? $solar_installer['name'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[entity_type]', 'Entity Type') !!}
                        {!! Form::text('solar_installer[entity_type]', (!empty($solar_installer['entity_type']) ? $solar_installer['entity_type'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[phone]', 'Phone') !!}
                        {!! Form::text('solar_installer[phone]', (!empty($solar_installer['phone']) ? $solar_installer['phone'] : ''), array('class' => 'form-control phoneNumberFormatter')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[website]', 'Website') !!}
                        {!! Form::text('solar_installer[website]', (!empty($solar_installer['website']) ? $solar_installer['website'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[address]', 'Business Address:') !!}
                        {!! Form::text('solar_installer[address]', (!empty($solar_installer['address']) ? $solar_installer['address'] : ''), array('class' => 'form-control', "rows" => 5)) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        
                        {!! Form::label('solar_installer[address2]', '&nbsp;') !!}
                        {!! Form::text('solar_installer[address2]', (!empty($solar_installer['address2']) ? $solar_installer['address2'] : ''), array('class' => 'form-control', "rows" => 5)) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[city]', 'City') !!}
                        {!! Form::text('solar_installer[city]', (!empty($solar_installer['city']) ? $solar_installer['city'] : ''), array('class' => 'form-control', "rows" => 5)) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[state]', 'State') !!}
                        {!! Form::select('solar_installer[state]', $states, (!empty($solar_installer['state']) ? $solar_installer['state'] : ''), array('class' => 'form-control', "rows" => 5, 'placeholder'=>'-Select State-')) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[zip_code]', 'Zip Code') !!}
                        {!! Form::number('solar_installer[zip_code]', (!empty($solar_installer['zip_code']) ? $solar_installer['zip_code'] : ''), array('class' => 'form-control', 'max' => '99999')) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[type_of_license]', 'Type of License') !!}
                        {!! Form::text('solar_installer[type_of_license]', (!empty($solar_installer['type_of_license']) ? $solar_installer['type_of_license'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('solar_installer[license_number]', 'License Number') !!}
                        {!! Form::text('solar_installer[license_number]', (!empty($solar_installer['license_number']) ? $solar_installer['license_number'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-lg-12">
                    <p class="text-muted">Financials {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>
                    <div class="form-group">
                        {!! Form::label('solar_installer_meta[file_past_two_years_financials][]', 'Audited Financials OR: Company Prepared Financials Plus 2 Years of Tax Returns or Form 990') !!}

                        <p>{!! Form::label('file_past_two_years_financials[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>

                        {!! Form::file('file_past_two_years_financials[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (!empty($solar_installer_meta['meta_file_past_two_years_financials']) && isset($solar_installer_meta['meta_file_past_two_years_financials']))
                            @foreach ($solar_installer_meta['meta_file_past_two_years_financials'] as $key => $past_two_year_financial)
                            <span class="file_ops">
                                {{ $key }}
                                <a data-href="{{$past_two_year_financial}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                                <a href="#" class='delete_uploaded_file' data-file="delete_file_past_two_years_financials[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                            </span><br/>
                            @endforeach
                        @else
                            <p class="text-muted">No File Uploaded Yet</p>
                        @endif
                        <div class="col-lg-3">
                            {!! Form::hidden('solar_installer_meta[past_two_years_financials_audited]', null) !!}
                            {!! Form::checkbox('solar_installer_meta[past_two_years_financials_audited]', 1, (isset($solar_installer_meta['past_two_years_financials_audited']) && $solar_installer_meta['past_two_years_financials_audited'] == 1)) !!}&nbsp; Audited
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="row">
             
                <div class="col-lg-4">
                    <div class="form-group">

                        <label for="solar_installer_meta[commercial_mw_installed]">Total Commercial MW Installed {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</label>
                        {!! Form::number('solar_installer_meta[commercial_mw_installed]', (!empty($solar_installer_meta['commercial_mw_installed']) ? $solar_installer_meta['commercial_mw_installed'] : ''), array('class' => 'form-control')) !!}
                    </div>
                </div>
            </div>

            <hr />


            <div class="row">
                <div class="col-lg-12">
                    <p class="text-muted">Certificates {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>
                    <div class="form-group">

                        {!! Form::label('solar_installer_meta[file_certificate_of_good_standing]', 'Certificate of Good Standing') !!}
                        <p>{!! Form::label('file_certificate_of_good_standing', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        {!! Form::file('file_certificate_of_good_standing', ['class' => 'no-visibility upload_button_track']) !!}
                        @if( isset($solar_installer_meta['meta_file_certificate_of_good_standing']) && !empty($solar_installer_meta['meta_file_certificate_of_good_standing']) )
                            <span class="file_ops">
				  				{{ $solar_installer_meta['meta_file_certificate_of_good_standing']['filename'] }}
                                <a href="{!! $uploaded_files['file_certificate_of_good_standing'] !!}" target="_blank" class='view_uploaded_file' title="View"><i class="fa fa-toggle-up"></i></a>
				  				<a href="#" class='delete_uploaded_file' data-file="delete_file_certificate_of_good_standing" data-value="{{$solar_installer_meta['meta_file_certificate_of_good_standing']['filename']}}" title="Delete"><i class="fa fa-trash-o"></i></a>
				  				</span>
                        @endif
                    </div>

                </div>
            </div>







            <hr />



            <div class="row">
                <div class="col-lg-8">
                    <p class="text-muted">Minimum Workers Comp {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>



                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('solar_installer_meta[minimum_workers_comp_maximum_policy_limit]', 'Maximum Policy Limit &#36;') !!}
                                {!! Form::text('solar_installer_meta[minimum_workers_comp_maximum_policy_limit]', (!empty($solar_installer_meta['minimum_workers_comp_maximum_policy_limit']) ? $solar_installer_meta['minimum_workers_comp_maximum_policy_limit'] : ''), array('class' => 'priceFormatter2 form-control')) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('solar_installer_meta[workers_comp_carrier]', 'Carrier') !!}
                                {!! Form::text('solar_installer_meta[workers_comp_carrier]', (!empty($solar_installer_meta['workers_comp_carrier']) ? $solar_installer_meta['workers_comp_carrier'] : ''), array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <p class="text-muted">General Liability  {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('solar_installer_meta[general_liability_maximum_policy_limit]', 'Maximum Policy Limit &#36;') !!}
                                {!! Form::text('solar_installer_meta[general_liability_maximum_policy_limit]', (!empty($solar_installer_meta['general_liability_maximum_policy_limit']) ? $solar_installer_meta['general_liability_maximum_policy_limit'] : ''), array('class' => 'priceFormatter2 form-control')) !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                {!! Form::label('solar_installer_meta[general_liability_carrier]', 'Carrier') !!}
                                {!! Form::text('solar_installer_meta[general_liability_carrier]', (!empty($solar_installer_meta['general_liability_carrier']) ? $solar_installer_meta['general_liability_carrier'] : ''), array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">

                                <label for="solar_installer_meta[bonding_capability]">Bonding Capability {!! Html::image('assets/themes/wisercapital/img/wsar-icon.png', 'WSAR Score') !!}</label>
                                @foreach($yes_no as $key => $value)
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::radio('solar_installer_meta[bonding_capability]', $key, (isset($solar_installer_meta['bonding_capability']) && $key == $solar_installer_meta['bonding_capability'] )) !!} {{ $value }}
                                        </label>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {!! Form::hidden('type',$user_role_name, array("class" => "btn btn-default")) !!}
            {{--{!! Form::submit('Save & Proceed', array("class" => "btn btn-default")) !!}
            {!! Form::close() !!}--}}
        </div>
