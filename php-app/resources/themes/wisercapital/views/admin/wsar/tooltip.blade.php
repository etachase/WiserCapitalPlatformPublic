@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class="col-lg-3">
            <div style="padding: 10px; width:100%; border: 1px solid #ccc; text-align: center; font-weight: 700; background: #f2f2f2;">
                <a href="{!! route('admin.tooltip.index') !!}" style="color: #404040; ">WSAR Score Tooltips</a>
            </div>
        </div>
        <div class='col-lg-9'>
            <div class="box box-default">
                <div class='box-header text-center'>
                    <h2>WSAR Score Tooltips</h2>
                </div>
                <div class=' box-body' style="overflow-x:auto;">
                    <div style='width: 98%'>
                        <table class="table table-responsive table-hover table-striped"
                               id='tooltip-table' style='background: white;'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>WSAR Score Title</th>
                                    <th>Tooltip</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tooltip_data as $key => $tooltip)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$tooltip['name']}}</td>
                                    <td>
                                        <a href="#" id="tooltip_{{$key}}" data-type="text" 
                                           data-name="{{$tooltip['name']}}"
                                           data-url="{{route('admin.tooltip.update')}}" 
                                           data-title="Enter {{$tooltip['name']}} Tooltip">
                                            {{$tooltip['tooltip']}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- /.box-body -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection

@section('body_bottom')

<script>
    $('#tooltip-table').DataTable({
        processing: true,
        "pageLength": 10,
        "scrollX": false,
        "pagingType": "full_numbers"
    });
    $.fn.editable.defaults.ajaxOptions = {type: "POST", dataType: 'json'};
    $.fn.editable.defaults.send = "always";
    $('[id^=tooltip_]').editable({
        'url' : "{{route('admin.tooltip.update')}}",
        success: function(response, newValue) {
            if (response && response.success) {
                $(this).text(response.new_value);
            }
        }
    });
</script>
@endsection
