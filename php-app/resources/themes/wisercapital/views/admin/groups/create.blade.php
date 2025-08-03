@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="box box-default">

                <div class="box-body">
                    <div class="panel-body">
                        @if(isset($is_update))
                            {!! Form::model( $group, ['route' => ['groups.update', $group->id], 'method' => 'PATCH','files' => true ] ) !!}
                        @else
                            {!! Form::open(array('route' => array('groups.store'), 'method' => 'post', 'files' => true)) !!}
                        @endif
                        <fieldset>
                            <legend>Group</legend>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: *') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Is Shared:') !!}
                                {!! Form::checkbox('is_shared', 1, $group->is_shared) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Type: *') !!}<br/>

                                @foreach($type_mappings as $type_mapping_key => $type_mapping)
                                    @if(isset($groupType) && in_array($type_mapping_key,$groupType))
                                        {!! Form::checkbox('type[]', $type_mapping_key , 1) !!} {{ $type_mapping }}
                                    @else
                                        {!! Form::checkbox('type[]', $type_mapping_key , '') !!} {{ $type_mapping }}
                                    @endif
                                @endforeach
                            </div>

                        </fieldset>

                        {!! Form::submit((isset($is_update))? 'Update': 'Create', array("class" => "btn btn-primary")) !!}
                        <a href="{!! route('groups.list') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
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
