
                            <div class="form-group">
                                {!! Form::label('tracking_type_id', 'Type:') !!}
                                {!! Form::select('tracking_type_id', App\Support\Dropdown::$tracking, $asset->getMeta('tracking_type_id'), array('placeholder' => '[Select]','class' => 'form-control')) !!}

                            </div>
                            
                            <fieldset>
                                <legend>Warranty</legend>
                                <div class="form-group">
                                    {!! Form::label('warranty_years', 'Years:') !!}
                                    {!! Form::input('number', 'warranty_years', $asset->getMeta('warranty_years'), array('class' => 'form-control')) !!}
                                </div>
                            </fieldset>
                            <div class="form-group">
                                {!! Form::label('sufficient_warranty', 'WSAR Score: Sufficient Warranty (max 10)') !!}
                                {!! Form::input('number', 'sufficient_warranty', $asset->getMeta('sufficient_warranty'), array('min' => 0, 'max' => 10, 'class' => 'form-control')) !!}
                            </div>
                            

@section('body_bottom')
                               
@endsection