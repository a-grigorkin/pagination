@for ($i = $p['a']; $i <= $p['b']; $i++)
    @if ($i == $p['y'])
        <span class="{{ $active }}">{{ $i }}</span>
    @else
        <span class="{{ $inactive }}"><a href="{{ route($route, ['p' => $i]) }}">{{ $i }}</a></span>

        @if ($i == $p['a'] && isset($p['x']))
            @php
            $i = $p['x'] - 1;
            @endphp

            ...
        @elseif (isset($p['z']) && $i == $p['z'])
            @php
            $i = $p['b'] - 1;
            @endphp

            ...
        @endif
    @endif
@endfor
