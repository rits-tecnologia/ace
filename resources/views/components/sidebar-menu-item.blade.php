@if ((! isset($policy)) || $policy)
    <li>
        <a href="{{ $url }}">
            <i class="fa {{ $icon }}"></i> <span class="nav-label">{{ $label }}</span>
        </a>
    </li>
@endif
