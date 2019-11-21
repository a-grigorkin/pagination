@for ($i = $pagination['a']; $i <= $pagination['b']; $i++)
    @if ($i == $pagination['y'])
        <span style='color: red; font-weight: bold;'>{{ $i }}</span>
    @else
        <a href="{{ route('pagination', ['p' => $i]) }}">{{ $i }}</a>

        @if ($i == $pagination['a'] && isset($pagination['x']))
            @php
            $i = $pagination['x'] - 1;
            @endphp

            ...
        @elseif (isset($pagination['z']) && $i == $pagination['z'])
            @php
            $i = $pagination['b'] - 1;
            @endphp

            ...
        @endif
    @endif
@endfor
