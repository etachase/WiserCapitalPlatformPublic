{!! Form::open(array('route' => 'hf.create', 'class' => 'form-horizontal', 'id' => "create-modal-form")) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ $modal_title }}</h4>
</div>

<div class="modal-body">
    <div class="form-group">

        {!! Form::label('name', 'Project Name', array('class' => "col-sm-3 pull-left control-label")) !!}
        <div class="col-sm-6">
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.button.cancel') }}</button>
        {!! Form::submit(trans('general.button.create'), array("class" => "btn btn-primary", 'id' => 'map-form-submit')) !!}
    </div>
    <script>
        $("#create-modal-form").validate({
            rules: {
                name: "required"
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    </script>
    {!! Form::close() !!}

