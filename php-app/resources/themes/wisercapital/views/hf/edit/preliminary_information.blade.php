<div class="tab-heading"  id="preliminary-project-information-heading">
    <h2 class="panel-title">
        Preliminary Project Information
    </h2>
</div>
<div id="preliminary-project-information">
    {!! Form::open(array('route' => array('hf.update', $site->id), 'method' => 'put', 'files' => true, 'id' => 'preliminary_assessment_form')) !!}
    @include('hf.edit._preliminary_information')
    {!! Form::hidden('is_quick', (isset($is_quick) ? $is_quick : false), ['id' => 'is_quick']) !!}
    <hr>
    
    @if (Auth::user()->hasRole(['admins', 'solar-installer']) )
    {!! Form::submit('Save & Proceed', array("class" => "btn btn-primary")) !!}
    @endif
    {!! Form::close() !!}
</div>
