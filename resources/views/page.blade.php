@extends('ace::base')

@section('body')
    <div id="wrapper">
        @include('ace::partials.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('ace::partials.navbar')
            <div class="wrapper wrapper-content animated fadeInRight">
                @yield('content')
            </div>
            @include('ace::partials.footer')
        </div>
    </div>
@stop
