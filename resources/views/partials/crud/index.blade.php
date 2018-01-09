@section('title', title(crudAction($type, 'label')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))
        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @component('ace::components.box')
                @slot('title', crudAction($type, 'index'))

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            @foreach (call_user_func([$type, 'adminColumns']) as $column)
                                <th>
                                    {{ __t('validation.attributes.' . $type . '.' . $column, 'validation.attributes.' . $column) }}
                                </th>
                            @endforeach
                            <th style="width:1px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resources as $resource)
                            <tr>
                                @foreach (call_user_func([$type, 'adminColumns']) as $column)
                                    <td>{{ $resource->getColumn($column) }}</td>
                                @endforeach
                                <td class="text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-xs btn-link" data-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            @can('edit', $resource)
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-trash"></i> Editar
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $resources->links() !!}
            @endcomponent
        </div>
        <div class="col-lg-4">
            @yield('filters')
        </div>
    </div>
@stop
