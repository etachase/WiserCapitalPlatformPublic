@extends('layouts.master')

@section('content')
<div class="row tiles-view space-block">
    <div class="col-md-12">
        <div class="row add-margin30">
            <div class='col-sm-8'>
                <h4>Project Users</h4>
            </div>
            <div class="pull-right col-sm-4">
                <a data-toggle="modal" data-target="#project_users" 
                   class='btn btn-primary btn-sm marR9 pull-right'>Add Users</a>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-body">
                <div class="table-responsive" style="overflow-x: visible ">
                    <table  id="host-facilities-table" class="table table-hover uni-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                </div> <!-- table-responsive -->

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

</div>


<div class="modal" id="project_users">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    Assign Project to Users
                    <button type="button" class="close" data-dismiss="modal" 
                            aria-hidden="true">×</button>
                </h3>
            </div>
            <div class="modal-body row">
                <div class="row col-xs-12">
                    <form action="{{ route('project.user.store', $id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="row col-xs-12 margin-bottom">
                            <label class="col-sm-2 padL30 marT5 f15-5">Users : </label>
                            <div class="col-sm-9 col-xs-12" id='select_project_users'>
                                <select class="user_autocomplete form-control margin-bottom" 
                                        multiple="multiple">
                                        <option value="">Select Users to assign the project</option>
                                </select>
                                <input type="hidden" name="users" />
                            </div>
                        </div>
                        <div class="row col-xs-12 text-center">
                            <input type="submit" class="btn btn-sm btn-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script language="JavaScript">


    $(function () {

        $('#host-facilities-table').DataTable({
            processing  : true,
            serverSide  : true,
            pageLength  : 25,
            scrollX     : false,
            filter      : false,
            ajax        : '{!! route('hf.project-user.datatable', ['id' => $id]) !!}',
            columns     : [
                {data : 'id'},
                {data : 'name'},
                {data : 'action'}
            ]
        });
    });
    function formatRepo (repo) {
      if (repo.loading) return repo.text;
      
      var markup = "<div class='select2-result-repository__title'>" + repo.first_name + ' ' + repo.last_name + "</div>";

      if (repo.email) {
        markup += "<div class='select2-result-repository__description'>" + repo.email + "</div>";
      }

      return markup;
    }

    function formatRepoSelection (repo) {
      return repo.first_name || repo.text;
    }
    $(".user_autocomplete").select2({
        ajax: {
          url: "{{url('/api/users?id=') . $id}}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              search: params.term, // search term
              page: params.current_page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.current_page = params.current_page || 1;

            return {
              results: data.data,
              pagination: {
                more: (params.current_page * 10) < data.total_count
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });
    
    $('.user_autocomplete').on('change', function() {
        $('input[name=users]').val($(this).val());
    });

</script>
@endsection
