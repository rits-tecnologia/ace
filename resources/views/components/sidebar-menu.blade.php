<ul class="nav metismenu" id="side-menu">
    @auth
        <li class="nav-header">
            <div class="profile-element">
                @if (config('ace.app.logo'))
                    <img src="{{ asset(config('ace.app.logo')) }}"
                         alt="{{ config('app.name') }}"
                         class="image-logo">
                @else
                    <div class="text-logo">
                        <span>{{ config('ace.app.short_name') }}</span>
                    </div>
                @endif
            </div>
            @if (config('ace.app.short_name'))
                <div class="logo-element">
                    {{ config('ace.app.short_name') }}
                </div>
            @endif
        </li>
    @endauth
    {{ $slot }}
</ul>
