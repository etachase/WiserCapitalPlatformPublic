<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_details" data-toggle="tab" aria-expanded="true">{!! trans('general.tabs.details') !!}</a></li>
    </ul>
    <div class="tab-content">

        <div class="row tab-pane active" id="tab_details">
            <div class='col-xs-12'>
                <div class="form-group">
                    <div class='row col-xs-12 col-sm-1 margin'>
                    {!! Form::label('Name', trans('admin/agreements/general.columns.name')) !!}
                    </div>
                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                        {!! Form::text('name', $agreement ? $agreement->name : null, ['class' => 'form-control', 'required', 'maxlength' => 200]) !!}
                    </div>
                </div>
            </div>  
            <div class='col-xs-12'>
                <div class="form-group">
                    <div class='row col-xs-12 col-sm-1 margin'>
                    {!! Form::label('Position After', trans('admin/agreements/general.columns.position')) !!}
                    </div>
                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                        <select name="position" class="form-control">
                            <option value="0" {{!$agreement || ($agreement && ($agreement->position == 0)) 
                                ? 'selected=selected' : ''}}>Top Position</option>
                            
                            @foreach($agreementList as $agreementRow) 
                            <option value="{{$agreementRow['position'] + 1}}"
                                {{$agreement && (($agreementRow['position'] + 1) == $agreement->position) 
                                ? 'selected=selected' : ''}}>{{$agreementRow['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-xs-12'>
                <div class="form-group">
                    <div class='row col-xs-12 col-sm-1 margin'>
                    {!! Form::label('Agreement Type', trans('admin/agreements/general.columns.agreement')) !!}
                    </div>
                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                        <div class="checkbox">
                            {!! Form::radio('agreement_type', 'all', (!$agreement || ($agreement && !count($agreement->projects))),['class' => 'agreement radio-custom','id' => 'agreement_type_all']) !!} 
                            <label for="agreement_type_all" class="radio-custom-label">All Projects</label>
                        </div>
                        <div class="checkbox">
                            {!! Form::radio('agreement_type', 'one', ($agreement && count($agreement->projects)),['class' => 'agreement radio-custom','id' => 'agreement_type_one']) !!} 
                            <label for="agreement_type_one" class="radio-custom-label">Specific Projects</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-xs-12 project' {{($agreement && count($agreement->projects)) ? '' : "style=display:none;"}}>
                <div class="form-group">
                    <div class='row col-xs-12 col-sm-1 margin'>
                    {!! Form::label('Select Project', trans('admin/agreements/general.columns.project')) !!}
                    </div>
                    <div class='row col-xs-12 col-sm-6 col-md-5 margin-5'>
                        <select name="site[]" id='site_id' class="form-control" multiple='multiple'>
                            @if ($agreement && count($agreement->projects))
                                @foreach ($agreement->projects as $index => $site)
                                <option value="{{$site->id}}" selected="selected">{{$site->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class='col-xs-12 margin'>
                <div class="form-group">
                    <div class='row col-xs-12 margin'>
                        <div class="col-xs-12 checkbox">
                            <label>
                                <!-- Trick to force cleared checkbox to being posted in form! It will be posted as zero unless checked then posted again as 1 and since only last one count! -->
                                {!! '<input type="hidden" name="active_si" value="0">' !!}
                                {!! Form::checkbox('active_si', '1', $agreement ? $agreement->active_si : null) !!} {!! trans('admin/agreements/general.columns.active_si') !!}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="tab_options">
        </div><!-- /.tab-pane -->

    </div><!-- /.tab-content -->
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
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


@section('body_bottom')
    @parent
    <script src="{{ asset ("/bower_components/admin-lte/select2/js/select2.min.js") }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('[id^=agreement_type_]').on('change', function () {
                if ($(this).val() == 'all') {
                    $('#site_id').val('').trigger('change');
                    $('.project').hide();
                } else {
                    $('.project').show();
                }
            });
            
    
            function formatRepo (repo) {
                if (repo.loading) return repo.text;

                return "<div class='select2-result-repository__title'>" + repo.name+ "</div>";
            }

            function formatRepoSelection (repo) {
                return repo.name || repo.text;
            }
            $('#site_id').select2({  
                ajax: {
                    url: "{{url('/api/hf')}}",
                    dataType: 'json',
                    delay: 250,
                    placeholder: "Select an project",
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page || 1,
                            page_limit:20,
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.data,
                            pagination: {
                                more: data.more
                            }
                        };
                    },
                    cache: false
                },
                multiple: true,
                minimumInputLength: 1,
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection, // omitted for brevity, see the source of this page
            });$('#site_id').trigger('change');
            <?php if ($agreement && count($agreement->projects)): ?>
                var values = [];
                <?php foreach ($agreement->projects as $index => $site) : ?>
                    values["{{$index}}"] = "{{$site->id}}";
                <?php endforeach; ?>
                $('#site_id').val(values).trigger('change');
            <?php endif; ?>
        });
    </script>
@endsection
