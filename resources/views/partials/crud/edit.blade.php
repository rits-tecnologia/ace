@section('title', title(crudAction($type, 'edit')))

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
    {!! Form::model($instance, ['url' => $instance->route('update'), 'method' => 'put', 'files' => true, 'data-validation' => $instance->hasRoute('validation') ? $instance->route('validation') : '']) !!}
        @yield('form')
    {!! Form::close() !!}
@stop
