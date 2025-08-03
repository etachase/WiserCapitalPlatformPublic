@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="box box-default">

                <div class="box-body">
                    <div class="panel-body">
                        @if(isset($is_update))
                            {!! Form::model( $company, ['route' => ['companies.update', $company->id], 'method' => 'PATCH','files' => true ] ) !!}
                        @else
                            {!! Form::open(array('route' => array('companies.store'), 'method' => 'post', 'files' => true)) !!}
                        @endif
                        <fieldset>
                            <legend>Company</legend>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: *') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                             <div class="form-group">
                                {!! Form::label('entity_type', 'Entity Type: *') !!}
                                {!! Form::text('entity_type', $company->getMeta('entity_type'), array('class' => 'form-control')) !!}
                            </div>
                           
                            <div class="form-group">
                                {!! Form::label('name', 'User Type: *') !!}<br/>
                                {!! Form::select('type', $type_mappings, $roleName, array('class' => 'form-control')) !!}
                            </div>
                             <div class="form-group">
                                {!! Form::label('name', 'Share facility information with all users in this company?:') !!}
                                {!! Form::checkbox('is_shared', 1, $company->is_shared) !!}
                            </div>
                            <div class="file-upload form-group">
                                {!! Form::label('executed_agreement', 'Executed Agreement') !!}<br/>
                                <p>{!! Form::label('file_fit_agreement[]', 'Upload', ['class' => 'btn btn-sm btn-primary btn-file']) !!}
                                @if (isset($metas) && !empty($metas['executed_agreement']))
                                @foreach ($metas['executed_agreement'] as $key => $executed_agreement)
                                
                                <div class="file_ops">
                                    {{ $key }}
                                    <a data-key="{{$key}}" class="dr-file-download" title="Download"><i class="fa fa-download "></i></a>
                                    <a href="#" class='delete_uploaded_file' data-file="delete_executed_agreement[]" data-value="{{$key}}" title="Delete"><i class="fa fa-trash-o "></i></a>
                                    
                                </div>
                                @endforeach
                                @else
                                        <p class="text-muted">No File Uploaded Yet</p>
                                @endif
                                </p>
                                {!! Form::file('executed_agreement[]', ['class' => 'no-visibility upload_button_track', 'multiple' => 'multiple']) !!}
                            </div>

                        </fieldset>

                        {!! Form::submit((isset($is_update))? 'Update': 'Create', array("class" => "btn btn-primary")) !!}
                        <a href="{!! route('companies.list') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
                        {!! Form::close() !!}



                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->

    </div><!-- /.row -->
    
    
<div class="modal fade" tabindex="-1" role="dialog" id="errorModal">
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

<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-body">
        <div id="ajax_loader" class="text-center" style="margin-top: 19%">
            <img src="{{ url('/assets/themes/wisercapital/img/ajax-loader.gif')}}">
        </div>
    </div>
</div>
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script>
    $(document).ready(function () {
        $('label.btn-file').on('click', function () {
            $('.upload_button_track').trigger('click');
        });
        
        
        $('.dr-file-download').on('click', function () {
            $('#errorModal').modal('hide');
            $('#pleaseWaitDialog').modal('show');
            if ($(this).data('key')) {
                $.ajax({
                    url : '/admin/companies/{{isset($company) ? $company->id : ""}}/download-agreement',
                    data: {'fileName' : $(this).data('key')},
                    type:'GET',
                    success:function(response){
                        $('#pleaseWaitDialog').modal('hide');
                        if (response.error) {
                            $('#errorModal .modal-header').addClass('bg-error');
                            $('#errorModal #modal-header').html('Error Message');
                            $('#errorModal #modal-body').html(response.message);
                            $('#errorModal').modal('show');
                            return;
                        }
                        $("<a class='hide download-anchor'>").attr("href", response.path)[0].click();
                        $('.download-anchor').remove();

                    }
                });
            }
        });
    });

</script>
@endsection
