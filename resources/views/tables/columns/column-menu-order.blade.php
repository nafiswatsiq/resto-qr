<div>
    {{-- {{ $getState() }} --}}
    @foreach ($getState() as $menu)
        <ul class="list-disc">
            <li class="my-2">{{ $menu->name }}</li>
        </ul>
    @endforeach
</div>
