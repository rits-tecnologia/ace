@extends('ace::base')
@section('body-class', 'login-page gray-bg')

@section('body')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        @if (config('ace.app.logo'))
            <h1 class="logo-image text-center">
                <img src="{{ asset(config('ace.app.logo')) }}"
                     alt="{{ config('app.name') }}"
                     class="img-responsive" style="margin: 0 auto;">
            </h1>
        @else
            <h1 class="logo-name">{{ config('app.short_name') }}</h1>
        @endif
        <h3>{{ trans('ace::pages.login.greetings') }}</h3>
        <p>{{ trans('ace::pages.login.description') }}</p>
        <form action="{{ url(config('ace.url.login')) }}" class="m-t" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       placeholder="{{ trans('ace::pages.login.form.email') }}"
                       required>
            </div>
            <div class="form-group">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="{{ trans('ace::pages.login.form.password') }}"
                       required>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">
                {{ trans('ace::pages.login.form.submit') }}
            </button>
            @if (config('ace.url.forgot_password'))
                <a href="{{ url(config('ace.url.forgot_password')) }}">
                    <small>{{ trans('ace::pages.login.forgot_password') }}</small>
                </a>
            @endif
            @if (config('ace.url.register'))
                <p class="text-muted text-center">
                    <small>{{ trans('ace::pages.login.do_not_have_an_account') }}</small>
                </p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url(config('ace.url.register')) }}">
                    {{ trans('ace::pages.login.create_an_account') }}
                </a>
            @endif
        </form>
    </div>
@endsection
