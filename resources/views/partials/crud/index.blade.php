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

                <pre>{!! json_encode($resources->toArray(), JSON_PRETTY_PRINT) !!}</pre>
            @endcomponent
        </div>
        <div class="col-lg-4">
            filters
        </div>
    </div>
@stop
