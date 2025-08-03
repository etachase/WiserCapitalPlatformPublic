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
                @if (old('successMessage') || old('errorMessage'))
                <div class="panel panel-default panel-top-message" id='panel_message'>
                    <div class='panel-body notification_header'>
                        <button type="button" class="close button_panel_message marT-5 f22"
                                data-target='panel_message' aria-hidden="true">×</button>
                        <span class='panel-heading-danger'>
                            System Message!
                        </span>
                    </div>
                    <div class='panel-body f15-5'>
                        <div class='text-success'><?php echo old('successMessage'); ?></div>
                        <div class='text-danger'><?php echo old('errorMessage'); ?></div>
                    </div>
                </div>
                @endif
                
                {!! Form::open( ['route' => 'admin.agreement-file.store', 'files' => true, 'id' => 'agreement-form'] ) !!}
                <input type='hidden' name='agreement_id' value='{{$id}}' />
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="true">{!! trans('admin/agreement-file/general.tabs.add') !!}</a></li>
                    </ul>
                    <div class="tab-content">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary add_button" title="Add files"><i class="fa fa-plus-square-o"></i> {!! trans('admin/agreement-file/general.tabs.add') !!}</a>
                        <div class="tab-pane active" id="tab_details">
                            <div class="row">
                                <div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class="form-group">
                                        <div class='row col-xs-12 col-sm-2 margin'>
                                        {!! Form::label('Name', trans('admin/agreement-file/general.columns.name')) !!}
                                        </div>
                                        <div class='row col-xs-12 col-sm-10 margin-5'>
                                            {!! Form::text('name[0]', null, ['class' => 'form-control', 'required', 'maxlength' => 100]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class='col-xs-12 col-sm-6 col-md-4'>
                                    <div class="form-group">
                                        <div class='row col-xs-12 col-sm-2 margin'>
                                        {!! Form::label('Upload') !!}
                                        </div>
                                        <div class='row col-xs-12 col-sm-10 margin'>
                                            <i class='fa fa-2x fa-image uploader' data-index="0"></i>
                                            <input type='file' class='form-control no-visibility' id='agreements_upload_file_0'
                                                   name='uploaded_file[0]' onclick='this.value=null' />
                                        </div>
                                    </div>
                                </div>
                                <div class='col-xs-12 margin'>
                                    <div class="form-group">
                                        <div class='row col-xs-12 margin'>
                                            <div class="col-xs-12 checkbox">
                                                <label>
                                                    <!-- Trick to force cleared checkbox to being posted in form! It will be posted as zero unless checked then posted again as 1 and since only last one count! -->
                                                    {!! '<input type="hidden" name="is_enabled" value="0">' !!}

                                                    {!! Form::checkbox('is_enabled', '1', 1) !!} {!! trans('general.status.enabled') !!}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::button( trans('general.button.create'), ['class' => 'btn btn-primary', 'id' => 'btn-submit'] ) !!}
                    <a href="{!! route('admin.agreements.index') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
                </div>

                {!! Form::close() !!}

            </div><!-- /.box-body -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title" id='modal-header'></h4>
                </div>
                <div class="modal-body" id='modal-body'>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('body_bottom')
    @include('partials._body_bottom_select_file_to_upload_js')
    
    <script>
    $(document).ready(function(){
        var x = 1; //Initial field counter is 1
        $('.add_button').click(function(){
            var fieldHtml = getFieldHtml();
            $('#tab_details').append(fieldHtml);
            x++;
        });
        $('#tab_details').on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
        });
        $('#tab_details').on('click', '.uploader', function(e){
            $('#agreements_upload_file_'+ $(this).data('index')).click();
        });
        
        var getFieldHtml = function () {
            return "<div class='row'><a class='col-xs-12'><a class='btn btn-xs btn-danger remove_button'>"+
                    "<i class='fa fa-times-circle-o'></i> Remove</a></a><div class='col-xs-12 col-sm-6 col-md-4'>" +
                    "<div class='form-group'><div class='row col-xs-12 col-sm-2 margin'>" +
                    '{!! Form::label("Name", trans("admin/agreement-file/general.columns.name")) !!}' +
                    "</div><div class='row col-xs-12 col-sm-10 margin-5'>" +
                    "<input type='text' required maxlength='100' class='form-control' name='name[" + x +
                    "]' /></div></div></div><div class='col-xs-12 col-sm-4'>" +
                    "<div class='form-group'><div class='row col-xs-12 col-sm-2 margin'>" +
                    '{!! Form::label("Upload") !!}' + "</div><div class='row col-xs-12 col-sm-10 margin'>" +
                    "<i class='fa fa-2x fa-image uploader' data-index='" + x + "'></i>" +
                    "<input type='file' class='form-control no-visibility' id='agreements_upload_file_" + x + "'" +
                    "name='uploaded_file[" + x + "]' onclick='this.value=null' />" +
                    "</div></div></div><div class='col-xs-12 margin'><div class='form-group'>" +
                    "<div class='row col-xs-12 margin'><div class='col-xs-12 checkbox'>" +
                    '<label><input type="hidden" name="is_enabled[' + x + ']" value="0">' +
                    '<input type="checkbox" checked="checked" name="is_enabled[' + x + ']" value="1">' +
                    "{!! trans('general.status.enabled') !!}</label></div></div> </div></div></div>";
        };
        
        var names = [];
        
        <?php foreach ($agreementFiles as $file) : ?>
        names.push("{{$file}}");
        <?php endforeach; ?>
        
        $('#btn-submit').click(function() {
            var error = '';
            var uploadError = false;
            var fileError = false;
            $('input[name^="name["]').each(function () {
                if (!$(this).val()) {
                    fileError = true;
                } else {
                    if ($.inArray($(this).val(), names) >= 0) {
                        error += (error ? ', ' : '') + $(this).val();
                    } else {
                        names.push($(this).val());
                    }
                }
            });
            $('input[name^="uploaded_file["]').each(function () {
                if (!$(this).val()) {
                    uploadError = true;
                }
            });
            if (error || uploadError || fileError) {
                $('.alert-danger').html((fileError ? 'All name fields are required<br/>' : '') +
                        (error ? 'Either file name already exist or'+
                        ' you have repeated the name in current fields: ' + error + 
                        '. <br/>' : '') + 
                        (uploadError ? 'All upload fields are required' : ''));
                $('.alert-danger').show();
            } else {
                $('#agreement-form').submit();
            }
        });
    });
    </script>
@endsection
