        <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('first_name', trans('admin/users/general.columns.first_name')) !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('last_name', trans('admin/users/general.columns.last_name')) !!}
                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                </div>



                <div class="form-group">
                    {!! Form::label('current_password', trans('admin/users/general.columns.current_password')) !!}
                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', trans('admin/users/general.columns.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', trans('admin/users/general.columns.password_confirmation')) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                @if(Auth::user()->hasRole('admins'))
                <div class="form-group">
                    {!! Form::label('is_debug', trans('admin/users/general.columns.is_debug')) !!}
                    {!! Form::checkbox('is_debug', '1', $user->is_debug) !!}
                </div>
                @endif

        </div>