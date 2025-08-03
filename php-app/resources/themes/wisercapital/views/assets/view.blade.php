@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-3">
            @foreach($type_mappings_view as $type_mapping_key => $type_mapping)
                <div style="padding: 10px; width:100%; border: 1px solid #ccc; text-align: center; font-weight: 700; background: #f2f2f2;">
                    <a href="{{ route('assets.add',$type_mapping) }}" style="color: #404040; ">Add {{ $type_mappings[$type_mapping_key] }}</a>
                </div>
            @endforeach
        </div>
        <div class="col-lg-9">
            <div class="box box-default">

                <div class="box-body"> 
                    <div class="panel-body">
                        @if(isset($is_update))
                            {!! Form::model( $asset, ['route' => ['assets.update', $asset->id], 'method' => 'PATCH','files' => true ] ) !!}
                        @else
                            {!! Form::open(array('route' => array('assets.store'), 'method' => 'post', 'files' => true)) !!}
                        @endif
                        <fieldset>
                            <legend>{{ $type_name }}</legend>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: *') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Manufacturer: *') !!}
                                {!! Form::select('manufacturer_id', $manufacturers, NULL, 
                                            ['placeholder' => '[Select]', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Model: *') !!}
                                {!! Form::text('model', NULL, array('class' => 'form-control')) !!}
                            </div>

                            @include('assets.common.'.$mappings_view)

                            <div class="form-group">
                                {!! Form::label('name', 'Datasheet (Max upload size 2MB)') !!}
                                {!! Form::file('datasheet', '', array('class' => 'form-control')) !!}
                                @if(isset($file_url) )
                                    <a href="{{ $file_url }}">{{ $asset->datasheet }}</a>
                                @endif
                            </div>
                        </fieldset>
                        {!! Form::hidden('asset_type_id', $type_id[0]) !!}
                            {!! Form::submit((isset($is_update))? 'Update': 'Create', array("class" => "btn btn-primary")) !!}
                        <a href="{!! route('assets.list') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
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
