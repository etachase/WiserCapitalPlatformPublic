@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="box box-default">

                <div class="box-body">
                    <div class="panel-body">
                        @if(isset($is_update))
                            {!! Form::model( $input, ['route' => ['inputs.update', $input->id], 'method' => 'PATCH','files' => true ] ) !!}
                        @else
                            {!! Form::open(array('route' => array('inputs.store'), 'method' => 'post', 'files' => true)) !!}
                        @endif
                        <fieldset>
                            <legend>Global Input</legend>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: *') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('description', 'Description: ') !!}
                                {!! Form::textarea('description', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('low', 'Low: ') !!}
                                {!! Form::text('low', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('high', 'High: ') !!}
                                {!! Form::text('high', NULL, array('class' => 'form-control')) !!}
                            </div>
                        </fieldset>
                            {!! Form::submit((isset($is_update))? 'Update': 'Create', array("class" => "btn btn-primary")) !!}
                        <a href="{!! route('inputs.list') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
                        {!! Form::close() !!}



                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')

@endsection
