@section('title', title(crudAction($type, 'edit')))

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
    {!! Form::model($instance, ['url' => $instance->route('update'), 'method' => 'put', 'data-validation' => $instance->hasRoute('validation') ? $instance->route('validation') : '']) !!}
        @yield('form')
    {!! Form::close() !!}
@stop
