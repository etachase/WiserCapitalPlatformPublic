<div class="dropdown">
    <a class=" dropdown-toggle" id="dropdownMenu1'.$data->id.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <span class="glyphicon glyphicon-menu-down"></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1'.$data->id.'">
      <li><a href="#">Map</a></li>
<!--      <li><a href="{{ URL::route( "hf.preliminary-assessment", array( $id ))}}">Preliminary Assessment</a></li>-->
      <li><a href="{{ URL::route( "hf.edit", array( $id ))}}">Project Information</a></li>
      <li><a href="{{ URL::route( "hf.facility-profile", array( $id ))}}">Project Profile</a></li>
      <li><a href="{{ URL::route( "hf.results", array( $id ))}}">Results</a></li>
      <li><a href="{{ URL::route( "hf.wsar-score", array( $id )) }}">WSAR Score</a></li>
      @if (Auth::user()->hasRole('admins'))
        <li><a href="{{ URL::route( "hf.project-user", array( $id )) }}">Project Users</a></li>
      @endif
      <li><a href="{{ URL::route( "hf.dataroom", array( $id )) }}">Documents</a></li>
      <li role="separator" class="divider"></li>
      <li><a data-toggle="modal" data-target="#modal_dialog" href="{{ URL::route( "hf.confirm-delete", array( $id ))}}">Delete</a></li>
    </ul>
 </div>

