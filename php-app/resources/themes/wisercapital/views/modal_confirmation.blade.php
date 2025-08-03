<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ $modal_title }}</h4>
</div>
<div class="modal-body">
    @if($error)
        <div>{{{ $error }}}</div>
    @else
        {{ $modal_body }}
    @endif
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('general.button.cancel') }}</button>
    @if (isset($modal_confirm))
        @if ($modal_route)
        <a href="{{ $modal_route }}" type="button" class="btn btn-success">{{ trans('general.button.ok') }}</a>
        @else 
        <button type="button" class="btn btn-success" data-dismiss="modal">{{ trans('general.button.ok') }}</button>
        @endif
    @elseif (isset($modal_submit))
        <form method="POST" action="{{ $modal_route }}" style="display: inline;">
            {{csrf_field()}}
            <button class="btn btn-primary">{{ $modal_submit }}</button>
        </form>
    @elseif(!$error)
        <a href="{{ $modal_route }}" type="button" class="btn btn-danger">{{ trans('general.button.delete') }}</a>
    @endif
</div>
