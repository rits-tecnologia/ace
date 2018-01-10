@section('title', title(crudAction($type, 'label')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))
        @slot('aside')
            <a href="{{ $instance->route('new') }}" class="btn btn-default">
                {{ crudAction($type, 'new') }}
            </a>
        @endslot

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @component('ace::components.box')
                @slot('title', crudAction($type, 'index'))

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                @foreach ($instance->adminColumns() as $column)
                                    <th>
                                        {{ crudColumn($type, $column) }}
                                    </th>
                                @endforeach
                                <th style="width:1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resources as $resource)
                                <tr>
                                    @foreach ($resource->adminColumns() as $column)
                                        <td>{{ $resource->getColumn($column) }}</td>
                                    @endforeach
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <button class="btn btn-xs btn-link" data-toggle="dropdown">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="dropdown-header dropdown-header-empty">
                                                    {{ trans('ace::terms.actions.no_actions') }}
                                                </li>
                                                @can('view', $resource)
                                                    <li><a href="{{ $resource->route('show') }}"><i class="fa fa-eye"></i> Visualizar</a></li>
                                                @endcan
                                                @can('update', $resource)
                                                    <li><a href="{{ $resource->route('edit') }}"><i class="fa fa-pencil"></i> Editar</a></li>
                                                @endcan
                                                @can('delete', $resource)
                                                    <li><a href="{{ $resource->route('destroy') }}" data-method="DELETE"><i class="fa fa-times"></i> Excluir</a></li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $resources->links() !!}
            @endcomponent
        </div>
        <div class="col-lg-4">
            @yield('filters')
        </div>
    </div>
@stop
