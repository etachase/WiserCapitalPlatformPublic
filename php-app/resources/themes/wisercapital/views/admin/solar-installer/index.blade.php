@extends('layouts.master')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('admin/solar-installers/general.page.index.table-title') }}</h3>
                    &nbsp;
                    <a class="btn btn-default btn-sm" href="{!! route('admin.solar-installers.create') !!}" title="{{ trans('general.button.create') }}">
                        <i class="fa fa-plus-square"></i>
                    </a>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('admin/solar-installers/general.columns.id') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.name') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.no_of_projects') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.phone') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.website') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.business_location') }}</th>
                                    <th>{{ trans('admin/solar-installers/general.columns.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($solar_installers as $solar_installer)
                                <tr>
                                    <td>{{ $solar_installer->id }}</td>
                                    <td>
                                        <a href="{{ route('profile.show', ['id' => $solar_installer->id])}}">
                                           {{ $solar_installer->name }}
                                        </a></td>
                                    <td>
                                        <a href="{{ route('admin.solar-installers.show', ['id' => $solar_installer->id])}}">
                                           {{ $solar_installer->project }}
                                        </a></td>
                                    <td>{{ $solar_installer->phone }}</td>
                                    <td>{{ $solar_installer->website }}</td>
                                    <td>{{ $solar_installer->business_location }}</td>
                                    <td>
                                        <a href="{!! route('admin.solar-installers.edit', $solar_installer->id) !!}"
                                           title="{{ trans('general.button.edit') }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>

                                        <a href="{!! route('admin.solar-installers.confirm-delete', $solar_installer->id) !!}"
                                           data-toggle="modal" data-target="#modal_dialog" 
                                           title="{{ trans('general.button.delete') }}">
                                            <i class="fa fa-trash-o deletable"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $solar_installers->render() !!}
                    </div> <!-- table-responsive -->

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection
