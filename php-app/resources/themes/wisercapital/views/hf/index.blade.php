@extends('layouts.master')

@section('content')


@if (!$id && Auth::user()->hasRole(['admins', 'solar-installer']) )
<div class="row space-block ">
    <div class="col-md-12">
        <div class="block-header clearfix">
            <a data-toggle="modal" data-target="#modal_dialog" class="btn btn-primary"
               href="{{ URL::route( "hf.confirm-create") }}">Add Project</a>
            <div class="select-view pull-right">
                {!! Form::open(array('route' => array('user.project.list.view'),
                'method' => 'post', 'id' => 'update_list')) !!}
                <input type='hidden' name='view' />
                {{csrf_field()}}
                <a href='#' class="fa fa-th{{($view == 'grid' ? ' active' : '')}} view_update"
                   data-value='grid'></a>
                <a href='#' class="fa fa-bars{{($view == 'list' ? ' active' : '')}} view_update"
                   data-value='list'></a>
                {!! Form::close() !!}
            </div>
        </div>	
    </div>
</div>

@endif


@include('hf.index_'. $view)


<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span id='modal-header'></span>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            </div>
            <div class="modal-body" id='modal-body'>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
<script language="JavaScript">
    $('.view_update').on('click', function () {
        var view = $(this).data('value');
        $('input[name=view]').val(view);
        $('#update_list').submit();
    });
    var addFavorite = function () {
        $('input[name=_token]').val('{{csrf_token()}}');
        $('#favorite-site-' + $(this).data('id')).submit();
    }
</script>
@endsection
