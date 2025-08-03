<h3>A new asset request of {{$asset}}.</h3>
<br/>
<b>User First Name </b> &nbsp;&nbsp;&nbsp;: {{$user->first_name}}
<br/>
<b>User Last Name </b> &nbsp;&nbsp;&nbsp;&nbsp;: {{$user->last_name}}
<br/>
<b>User Email </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$user->email}}
<br/>
<b>Project Name </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; {{$project_title}}
<br/>
<b>ID Number </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
<a href="{{route('hf.edit', ['id' => $project_id])}}">{{$project_id}}</a>
<br/>
<b>Time of Submission </b> : {{date('Y-m-d H:i:s')}}
<br/>
<b>Manufacturer Name </b> &nbsp;: {{$manufacturer_name}}
<br/>
<b>Manufacturer Model </b> : {{$model_name}}
