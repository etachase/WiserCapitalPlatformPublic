@extends('layouts.master')

@section('head_extra')
    <!-- Select2 css -->
    @include('partials._head_extra_select2_css')
@endsection 

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box-body">
                <div class="alert alert-danger" style="display: none;"></div>

                {!! Form::model( $agreementFile, ['route' => ['admin.agreement-file.update', $agreementFile->id],
                            'method' => 'PATCH', 'id' => 'agreement-form', 'files' => true] ) !!}
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="true">{!! trans('admin/agreement-file/general.tabs.edit') !!}</a></li>
                    </ul>
                    <div class="tab-content">

                        <div class="row tab-pane active" id="tab_details">
                            <div class='col-xs-12'>
                                <div class="form-group">
                                    <div class='row col-xs-12 col-sm-1 margin'>
                                    {!! Form::label('Name', trans('admin/agreement-file/general.columns.name')) !!}
                                    </div>
                                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                                        {!! Form::text('name', $agreementFile ? $agreementFile->name : null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12'>
                                <div class="form-group">
                                    <div class='row col-xs-12 col-sm-1 margin'>
                                    {!! Form::label('Upload') !!}
                                    </div>
                                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                                        <i class='fa fa-2x fa-image' onclick="$('input[name=uploaded_file]').click();"></i>
                                        <input type="hidden" name="doc_title" value="{{$agreementFile && $agreementFile->file_name ? $agreementFile->file_name : null}}" />
                                        <span class='agreement_uploaded_file_name'>{{$agreementFile && $agreementFile->file_name ? $agreementFile->file_name : ''}}</span>
                                        @if ($agreementFile && $agreementFile->file_name)
                                        <a class="pointer download-file" title="{{trans('admin/agreement-file/general.button.download')}}">
                                            <i class="fa fa-download"></i> {{trans('admin/agreement-file/general.button.download')}}</a>
                                        @endif
                                        <input type='file' class='form-control no-visibility' id='agreements_upload_file_0'
                                               name='uploaded_file' onclick='this.value=null' />
                                    </div>
                                    <div class='col-xs-12 margin'>
                                        <div class="form-group">
                                            <div class='row col-xs-12'>
                                                <div class="col-xs-12 checkbox">
                                                    <label>
                                                        <!-- Trick to force cleared checkbox to being posted in form! It will be posted as zero unless checked then posted again as 1 and since only last one count! -->
                                                        {!! '<input type="hidden" name="is_enabled" value="0">' !!}

                                                        {!! Form::checkbox('is_enabled', '1', 
                                                            $agreementFile && $agreementFile->is_enabled 
                                                                ? $agreementFile->is_enabled : null) !!} 
                                                        {!! trans('general.status.enabled') !!}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::button( trans('general.button.update'), ['class' => 'btn btn-primary', 'id' => 'btn-submit'] ) !!}
                    <a href="{!! route('admin.agreements.index') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
                </div>

                {!! Form::close() !!}

            </div><!-- /.box-body -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    
    <div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-body">
            <div id="ajax_loader" class="text-center" style="margin-top: 19%">
                <img src="{{ url('/assets/themes/wisercapital/img/ajax-loader.gif')}}">
            </div>
        </div>
    </div>
@endsection

@section('body_bottom')
    @include('partials._body_bottom_select_file_to_upload_js')
    <script>
    $(document).ready(function () {
        var names = [];
        
        <?php foreach ($agreementFiles as $file) : ?>
        names.push("{{$file}}");
        <?php endforeach; ?>
        
        $('#btn-submit').click(function() {
            var error     = false;
            var fileError = false;
            var input     = $('input[name="name"]').val();
            
            if (!input) {
                fileError = true;
            } else if ($.inArray(input, names) >= 0) {
                error = true;
            }
            
            if (error || fileError) {
                $('.alert-danger').html((fileError ? 'Name fields is required' : '') +
                        (error ? 'File name already exist' : ''));
                $('.alert-danger').show();
            } else {
                $('#agreement-form').submit();
            }
        });
        
        
        $('.download-file').on('click', function () {
            $('#pleaseWaitDialog').modal('show');
            $.ajax({
                url: "{{route('admin.agreement-file.download', ['id' => $agreementFile->id])}}",
                type:'GET',
                success:function(response){
                    $('#pleaseWaitDialog').modal('hide');
                    if (response.error) {
                        window.location.href = '/admin/agreements';
                        return;
                    }
                    $("<a class='hide download-anchor'>").attr("href", response.path)[0].click();
                    $('.download-anchor').remove();

                }
            });
        });
    });
    </script>
@endsection