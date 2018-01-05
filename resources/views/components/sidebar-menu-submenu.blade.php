<li>
    <a href="#">
        <i class="fa {{ $icon }}"></i> <span class="nav-label">{{ $label }}</span> <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        {{ $slot }}
    </ul>
</li>
