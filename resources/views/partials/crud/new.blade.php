@section('title', title(crudAction($type, 'new')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            {!! Form::model($instance, ['url' => $instance->route('create'), 'method' => 'post']) !!}
                @component('ace::components.box')
                    @slot('title', crudAction($type, 'new'))
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
