@foreach($menuItems as $item)

    @if (isset($item['route']))

        <li class="slidebar-item">
            <a href="{{route($item['route'])}}"><i class="{{ $item['icon'] }}"></i>
                <span>{{ $item['title'] }}</span></a></li>
        <li>

    @else
        <ul>
            @include('elements.sidebar.menuItems',['item' => $item])
        </ul>
    @endif

@endforeach