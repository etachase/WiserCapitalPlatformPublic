
                            <fieldset>
                                <legend>Warranty</legend>
                                <div class="form-group">
                                    {!! Form::label('warranty_years', 'Years: *') !!}
                                    {!! Form::text('warranty_years', $asset->getMeta('warranty_years'), array('class' => 'form-control')) !!}
                                </div>
                            </fieldset>


@section('body_bottom')
                               
@endsection