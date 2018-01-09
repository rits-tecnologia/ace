<div class="wrapper border-bottom white-bg page-heading">
    <div class="page-heading-main">
        <h2>{{ $title }}</h2>
        {{ $slot }}
    </div>
    @if (isset($aside))
        <div class="page-heading-aside">
            {{ $aside }}
        </div>
    @endif
</div>
