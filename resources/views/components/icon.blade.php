@php $_BLICONS_LIST_[$type ?? 'default'] = true; @endphp
<svg class="{{ $class ?? ''}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" role="img" data-icon>
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon:{{ $type ?? 'default'}}" />
</svg>
