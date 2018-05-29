@extends('layouts.page')
@section('title', title(crudAction($type, 'label')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))
        @slot('aside')
            @can('create', $type)
                <a href="{{ $instance->route('new') }}" class="btn btn-default">
                    {{ crudAction($type, 'new') }}
                </a>
            @endcan
        @endslot

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @component('ace::components.box')
                @slot('title', crudAction($type, 'reorder'))

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-orderable" data-reorder="{{ $instance->route('reorder') }}">
                        <thead>
                            <tr>
                                @foreach ($instance->adminReorderColumns() as $column)
                                    <th class="{{ $instance->getReorderColumnExpand($loop->index, $column) ? 'expand' : 'shrink' }}">
                                        {{ crudColumn($type, $column) }}
                                    </th>
                                @endforeach
                                <th style="width:1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resources as $resource)
                                <tr data-id="{{ $resource->id }}">
                                    @foreach ($resource->adminReorderColumns() as $column)
                                        <td class="{{ $resource->getReorderColumnExpand($loop->index, $column) ? 'expand' : 'shrink' }}">
                                            {!! $resource->getAdminColumn($column) !!}
                                        </td>
                                    @endforeach
                                    <td class="text-right">
                                        <i class="fa fa-bars fa-fw"></i>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ count($instance->adminReorderColumns()) + 1 }}">
                                        {{ trans('ace::terms.actions.no_records') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endcomponent
        </div>
    </div>
@stop
