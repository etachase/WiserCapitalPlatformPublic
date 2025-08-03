<div class='row tree-row'>
    @if (!$is_dir)
        <div class='col-xs-9 dropdown padL5 marL-5 marT-5'>
            <a class='dropdown-toggle text-black pointer' id='folder-preview-{{$dir. $key}}' 
                    data-dir="{{$dir}}" data-key="{{$key}}" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                <span class="f15-5 text-grey">{{$data}}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="{{$dir. $key}}">
                @if (Auth::user()->hasRole('admins'))
                    <li>
                        <a class='dr-file-upload' data-id='{{$key}}'
                           data-dir='{{$dir}}'>Upload</a>
                    </li>
                @endif
            </ul>
        </div>
    @elseif ($key == 'user_uploads')
        <div class='col-xs-9 dropdown padL5 marT-2'>
            <a class='dropdown-toggle text-black pointer' id='folder-preview-{{$dir. $key}}' 
                    data-dir="{{$dir}}" data-key="{{$key}}" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                <h4 class="f15-5 marT5 text-grey">{{$data}}</h4>
            </a>
            @if (Auth::user()->hasRole('admins'))
            <ul class="dropdown-menu" aria-labelledby="{{$dir. $key}}">
                <li><a data-id='{{$key}}' data-dir='{{$dir}}' 
                       class='dr-file-upload'>Upload</a></li>
            </ul>
            @endif
        </div>
    @elseif ($key == 'system_integrator')
        <div class='col-xs-9 padL5 marL-5 marT-5'>
            <span class="f15-5 text-grey pointer" id="folder-preview-{{$key}}" 
                  data-key="{{$key}}">{{$data}}</span>
        </div>
    @else
        <div class='col-xs-9 padL5 marT-2'>
            <h4 class="f15-5 marT5 text-grey pointer margin-bottom-none"
                ><span id="folder-preview-{{$key}}" data-key="{{$key}}">{{$data}}</span></h4>
        </div>
    @endif
</div>