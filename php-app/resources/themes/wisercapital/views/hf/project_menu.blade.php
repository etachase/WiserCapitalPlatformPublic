<h3 class="col-sm-3">{{ $site->name }}</h3>
<div class="col-sm-9 pull-right-md">
    <ul class="list-inline">
        <li><a href="{!! route('hf.facility-profile', $site->id) !!}"
              {{ (Request::capture()->getUri() == route('hf.facility-profile', $site->id) 
                ? 'class=active' : '')}}>PROJECT PROFILE</a></li>
        <li><a href="{!! route('hf.wsar-score', $site->id) !!}"
              {{ (Request::capture()->getUri() == route('hf.wsar-score', $site->id) 
                ? 'class=active' : '')}}>WSAR SCORE</a></li>
        <li><a href="{!! url('hf/'. $site->id . '/edit') !!}"
              {{ (Request::capture()->getUri() == url('hf/'. $site->id . '/edit') 
                ? 'class=active' : '')}}>PROJECT INFORMATION</a></li>
        <li><a href="{!! route('hf.results', $site->id) !!}"
              {{ (Request::capture()->getUri() == route('hf.results', $site->id) 
                ? 'class=active' : '')}}>Results</a></li>
        <li><a href="{!! route('hf.dataroom', $site->id) !!}"
              {{ (Request::capture()->getUri() == route('hf.dataroom', $site->id) 
                ? 'class=active' : '')}}>Documents</a></li>
    </ul>
</div>