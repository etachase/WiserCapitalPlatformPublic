@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-default">

                <div class="box-body"> 
                    <div class="panel-body">
                        @if(isset($is_update))
                            {!! Form::model( $manufacturer, ['route' => ['manufacturers.update', $manufacturer->id], 
                                        'method' => 'PATCH', 'id' => 'manufacturer-form'] ) !!}
                        @else
                            {!! Form::open(array('route' => array('manufacturers.store'), 'method' => 'post', 'id' => 'manufacturer-form')) !!}
                        @endif
                        <fieldset>
                            <legend>{{ trans('manufacturers/general.page.index.title') }}</legend>
                            <div class="form-group">
                                {!! Form::label('name', 'Name: *') !!}
                                {!! Form::text('name', NULL, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('asset_type_id', 'Asset Type: *') !!}
                                {!! Form::select('asset_type_id', $type_mappings, $manufacturer->asset_type_id, 
                                            ['placeholder' => '[Select]', 'class' => 'form-control']) !!}
                            </div>
                            <div style='display: none' id='financial_questions'>
                                <div class="form-group">
                                    {!! Form::label('publicity_traded', 'Model: *') !!}
                                    {!! Form::select('publicity_traded', $yes_no, \App\Support\Dropdown::YES, ['placeholder' => '[Select]', 'class' => 'form-control']) !!}
                                </div>
                                <div class="non_publicity_traded" style="display:none">
                                    <div class="form-group non_ranking_fields">
                                        {!! Form::label('equity', 'Cell type: *') !!}
                                        {!! Form::select('equity', $yes_no, NULL, ['placeholder' => '[Select]', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('years', '') !!}</p>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::text('yr_1_sales_trend', (isset($metas['yr_1_sales_trend']) && is_numeric($metas['yr_1_sales_trend']) ? round($metas['yr_1_sales_trend'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                                                        <span class="help-block">Yr 1 Sales</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::text('yr_2_sales_trend', (isset($metas['yr_2_sales_trend']) && is_numeric($metas['yr_2_sales_trend']) ? round($metas['yr_2_sales_trend'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                                                        <span class="help-block">Yr 2 Sales</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::text('yr_3_sales_trend', (isset($metas['yr_3_sales_trend']) && is_numeric($metas['yr_3_sales_trend']) ? round($metas['yr_3_sales_trend'], 3) : ''), array('class' => 'input-sm form-control priceFormatter2'))  !!}
                                                        <span class="help-block">Yr 3 Sales</span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group non_ranking_fields">
                                    {!! Form::label('business_length', 'Has company been in business at least 5 years?') !!}
                                    {!! Form::select('business_length', $yes_no, \App\Support\Dropdown::YES, ['placeholder' => '[Select]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </fieldset>
                        {!! Form::submit((isset($is_update))? 'Update': 'Create', array("class" => "btn btn-primary")) !!}
                        <a href="{!! route('manufacturers.list') !!}" title="{{ trans('general.button.cancel') }}" class='btn btn-default'>{{ trans('general.button.cancel') }}</a>
                        {!! Form::close() !!}

                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection


<!-- Optional bottom section for modals etc... -->

@section('body_bottom')
<script type="application/javascript">

    $(document).ready(function() {
        
        function changeAsset(val) {
            if (!val) {
                $('#financial_questions').hide();
                return;
            }
            <?php foreach($type_mappings as $key => $asset_map) : ?>
                if ("{{$key}}" == val) {
                    $('label[for=publicity_traded]').html("{{ucfirst($asset_map)}} Manufacturer Publicly traded in USA with > $50 MM equity?");
                    $('label[for=equity]').html("{{ucfirst($asset_map)}} Manufacturer Equity > $50 MM USD?");
                    $('label[for=years]').html("{{ucfirst($asset_map)}} Manufacturer Sales Trend");
                }
            <?php endforeach; ?>

            if (val == "{{\App\Models\Asset::TYPE_RACKING}}") {
                $('.non_ranking_fields').hide();
            } else {
                $('.non_ranking_fields').show();
            }
            $('#financial_questions').show();
        }
        $('select[name=asset_type_id]').on('change', function () {
            changeAsset($(this).val());
        });   
        changeAsset($('select[name=asset_type_id]').val() ? $('select[name=asset_type_id]').val() 
                : "<?php echo old('asset_value_id') ? old('asset_value_id') : ($manufacturer 
                && $manufacturer->asset_type_id) ? $manufacturer->asset_type_id : ''; ?>");
                        
        
        $('.validate').validate();
		

        var validator = $("#manufacturer-form").validate({
            rules: {
            },
            submitHandler: function (form) {
                $('.priceFormatter2').each(function() {
                    if ($(this).val()) {
                        var unmasked = $(this).maskMoney('unmasked'); 
                        $(this).val(unmasked[0]); 
                    }
                });
                submitForm(form);
            }
        });
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        
        function updateEqualityAndYears(value) {
            if (value == "{{\App\Support\Dropdown::NO}}") {
                $('.non_publicity_traded').show();
            } else {
                $('.non_publicity_traded').hide();
            }
        }
        $('select[name=publicity_traded]').on('change', function () {
            updateEqualityAndYears($(this).val());
        });
        
        updateEqualityAndYears("<?php echo old('publicity_traded') ? old('publicity_traded') : ($manufacturer 
                && $manufacturer->publicity_traded) ? $manufacturer->publicity_traded : ''; ?>");
    });
</script>
@endsection
