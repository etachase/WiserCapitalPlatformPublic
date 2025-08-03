 
                            <div class="form-group">
                                {!! Form::label('name', 'Micro:') !!}
                                {!! Form::checkbox('micro', 1, $asset->getMeta('micro')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Voltage: *') !!}
                                {!! Form::input('number', 'voltage', $asset->getMeta('voltage'), array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Standard Warranty (years): *') !!}
                                {!! Form::input('number', 'warranty_years', $asset->getMeta('warranty_years'), array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group" id="extended_warranty">
                                {!! Form::label('name', 'Extended Warranty (years): *') !!}
                                {!! Form::input('number', 'extended_warranty_years', $asset->getMeta('extended_warranty_years'), array('class' => 'form-control')) !!}
                            </div>
                           
                            @section('body_bottom')
                               
                            @endsection
                            
                            
                            
                            
                          