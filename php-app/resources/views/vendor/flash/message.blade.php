@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <div class="panel panel-default panel-top-message" id='panel_message'>
            <div class='panel-body notification_header'>
                <button type="button" class="close button_panel_message marT-5 f22"
                        data-target='panel_message' aria-hidden="true">×</button>
                <span class='panel-heading-{{Session::get('flash_notification.level')}}'>
                    System Message
                </span>
            </div>
            <div class='panel-body f15-5'>
                {{ Session::get('flash_notification.message') }}
            </div>
        </div>
    @endif
    {{ Session::forget('flash_notification') }}
@endif
