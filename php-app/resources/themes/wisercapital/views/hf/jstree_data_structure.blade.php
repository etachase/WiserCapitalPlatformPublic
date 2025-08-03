<div class='row tree-row'>
    <div class='col-xs-9 dropdown padL0 marL-5' style="margin-top: -5px;">
        <a class='dropdown-toggle text-black pointer' data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="true" data-timestamp="{{$timestamp ? date('M d Y h:i A', $timestamp) : date('M d Y H:i A', strtotime('2017-06-15 20:10:42'))}}"
            id="file-timestamp-preview-{{$key}}">
            <?php echo (!$userTimestamp || (isset($timestamp) && ($userTimestamp < $timestamp))) ? 
                '<button type="button" class="btn cu-btn-default">new</button> ' : ''; ?>{{$key}}
        </a>
        @if (Auth::user()->hasRole('admins') || Auth::user()->hasRole('Investors')
            || Auth::user()->hasRole('solar-installer'))
        <ul class="dropdown-menu" aria-labelledby="{{$key}}">
            <li><a id='file-preview-{{$key}}' data-dir='{{$dir}}' 
                   data-href='{{$data}}' data-key='{{$key}}'>Preview</a>
            <li><a data-href='{{$data}}' data-dir='{{$dir}}' 
                   data-key='{{$key}}' class='dr-file-download'>Download</a>
            </li>
            @if (Auth::user()->hasRole('admins'))
                <li><a data-dir='{{$dir}}' data-key='{{$key}}' class='dr-file-delete'>Delete</a>
                </li>
            @endif
        </ul>
        @endif
    </div>
</div>