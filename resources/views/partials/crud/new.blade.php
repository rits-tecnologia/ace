@section('title', title(crudAction($type, 'new')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    {!! Form::model($instance, ['url' => $instance->route('create'), 'method' => 'post', 'data-validation' => $instance->hasRoute('validation') ? $instance->route('validation') : '']) !!}
        @yield('form')
    {!! Form::close() !!}
@stop
