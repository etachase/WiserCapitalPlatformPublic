<div class="process-sec process-sec-4" data-step="4">
    <div class="process-sec-entry process-project-info">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 utility_provider_div">
            <div class="row txtPostCode">
                <div class="wrap form-group required add-margin60">
                    {!! Form::label('zip_code', 'Zip Code') !!}
                    {!! Form::text('zip_code', NULL, ['id' => 'zipCode', 'maxlength' => '5', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row utility_provider_row">
                <div class="wrap form-group required add-margin60">
                    {!! Form::label('utility_provider', 'Utility Provider') !!}<span title="Loading.." class="utility_schedule_loader fa fa-lg fa-refresh fa-spin" style="display: none;"></span>
                    <select id ="utility_provider" name="utility_provider" class="utility_provider form-control">
                        <option value="">[Select Provider]</option>
                    </select>
                </div>
            </div>
            <div class="row utility_data">
                <div class="col-md-8 col-md-offset-2">
                    <div class="wrap form-group clearfix add-margin60 hide">

                        {!! Form::label('utility_schedule', 'Utility Schedule') !!}

                        {!! Form::select('utility_schedule', [], (empty($metas['utility_schedule']) ? '' : $metas['utility_schedule']), array('placeholder' => '[Select Tariff]', 'id' => 'utility_schedule', 'class' => 'form-control')) !!}

                    </div>
                </div>
            </div>
            <div class="row utility_data">
                <div class="file-upload col-md-12 text-center green_button" style="display: none;">
                    <p>
                        <label for="file_green_button" class="download-data">
                            <i class="fa fa-upload"></i>
                            <small>Green Button</small> <br>Upload <br> My Data®
                        </label>
                    </p>
                    {!! Form::file('file_green_button', ['class' => 'no-visibility upload_button_track', 'id' => 'file_green_button'] ) !!}
                </div>
                <div class="col-md-12 text-center utility_bill" style="display: none;">
                    <div class="file-upload form-group">
                        {!! Form::label('file_12_months_utility_bill[]', 'Utility Bills (12 months preferred) ') !!}
                        <p>{!! Form::label('file_12_months_utility_bill[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!} </p>
                        {!! Form::file('file_12_months_utility_bill[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                        @if (isset($metas['uploaded_files_utility_bill_27']))
                        @foreach ($metas['uploaded_files_utility_bill_27'] as $key => $root_user_upload)
                        <span class="file_ops">
                            {{ $key }}
                            <a data-href="{{$root_user_upload['filePath']}}" class="dr-file-download" title="View"><i class="fa fa-toggle-up "></i></a>
                            <a href="#" class='delete_uploaded_file' data-file="delete_file_12_months_utility_bill[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                        </span><br/>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <hr>
    <p class="info"><span class="txt-1">*</span> Required fields</p>
                    
    <div class="text-center btn-holder" >
        <a class="btn btn-primary previous" href="#">Previous Step</a>
        {!! Form::hidden('preliminary_assessment', 1) !!}
        {!! Form::submit('Finish', array("class" => "btn  btn-primary")) !!}
    
    </div>
</div>