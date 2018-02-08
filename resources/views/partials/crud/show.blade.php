@section('title', title(crudAction($type, 'show')))

@section('pre-content')
    @component('ace::components.page-header')
        @slot('title', crudAction($type, 'label'))

        {!! app('breadcrumbs')->render() !!}
    @endcomponent
@stop
