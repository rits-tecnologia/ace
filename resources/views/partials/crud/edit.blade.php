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
    <div class="row">
        <div class="col-lg-8">
            {!! Form::model($instance, ['url' => $instance->route('update'), 'method' => 'put']) !!}
                @component('ace::components.box')
                    @slot('title', crudAction($type, 'edit'))
                    @slot('footer')
                        <div class="text-right">
                            {!! Form::submit(crudAction($type, 'save'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    @endslot

                    @yield('form')
                @endcomponent
            {!! Form::close() !!}
        </div>
    </div>
@stop
