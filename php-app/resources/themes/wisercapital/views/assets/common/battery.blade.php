
                    <div class="form-group">
                        {!! Form::label('type', 'Type: *') !!}
                        {!! Form::select('type', ['Flooded'=>'Flooded'], array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('voltage', 'Voltage: *') !!}
                        {!! Form::input('number', 'voltage', $asset->voltage, array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ah_capacity_20h', 'Ah Capacity (20-hr rate): *') !!}
                        {!! Form::input('number', 'ah_capacity_20h', $asset->getMeta('ah_capacity_20h'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('ah_capacity_100h', 'Ah Capacity (100-hr rate): *') !!}
                        {!! Form::input('number', 'ah_capacity_100h', $asset->getMeta('ah_capacity_100h'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('length', 'Length: *') !!}
                        {!! Form::input('number', 'length', $asset->getMeta('length'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('width', 'Width: *') !!}
                        {!! Form::input('number', 'width', $asset->getMeta('width'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('height', 'Height: *') !!}
                        {!! Form::input('number', 'height', $asset->getMeta('height'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('weight', 'Weight: *') !!}
                        {!! Form::input('number', 'weight', $asset->getMeta('weight'), array('class' => 'form-control', "step" => "0.01")) !!}
                    </div>

@section('body_bottom')
                               
@endsection