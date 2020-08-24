<svg hidden>
    <defs>
        @foreach($_BLICONS_LIST_ as $name => $x)
            <g id="icon:{{ $name }}">{!! $list[$name] ?? '' !!}</g>
        @endforeach
    </defs>
</svg>
