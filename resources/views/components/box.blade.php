<div class="ibox">
    <div class="ibox-title">
        <h5>{{ $title }}</h5>
    </div>
    <div class="ibox-content">
        {{ $slot }}
    </div>
    @if (isset($footer))
        <div class="ibox-footer">
            {{ $footer }}
        </div>
    @endif
</div>
