@if (count($errors) > 0)
    <div class="panel panel-default panel-top-message" id='panel_message'>
        <div class='panel-body notification_header'>
            <button type="button" class="close button_panel_message marT-5 f22"
                    data-target='panel_message' aria-hidden="true">×</button>
            <span class='panel-heading-danger'>
                <i class="icon fa fa-ban"></i> Errors </span>
        </div>
        <div class='panel-body f15-5'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif

@if (isset($status))
    <div class="panel panel-default panel-top-message" id='panel_message'>
        <div class='panel-body notification_header'>
            <button type="button" class="close button_panel_message marT-5 f22"
                    data-target='panel_message' aria-hidden="true">×</button>
            <span class='panel-heading-success'>
                <i class="icon fa fa-ban"></i> Info </span>
        </div>
        <div class='panel-body f15-5'>
            {{ $status }}
        </div>
    </div>
@endif
