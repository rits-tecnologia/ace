@section('title', title(crudAction($type, 'new')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop

@section('content')
    {!! Form::model($instance, ['url' => $instance->route('create'), 'method' => 'post', 'data-validation' => $instance->hasRoute('validation') ? $instance->route('validation') : '']) !!}
        <div class="row">
            <div class="col-lg-8">
                @component('ace::components.box')
                    @slot('title', crudAction($type, 'new'))
                    @if (! isset($hideFooter) || ! $hideFooter)
                        @slot('footer')
                            <div class="text-right">
                                {!! Form::submit(crudAction($type, 'save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        @endslot
                    @endif

                    @yield('form')
                @endcomponent

                @yield('after-form')
            </div>
            <div class="col-lg-4">
                @yield('aside')
            </div>
        </div>
    {!! Form::close() !!}
@stop
