<div>
    @foreach ($getState() as $menu)
        <ul class="">
            <li class="my-2">x{{ $menu->pivot->qty }}</li>
        </ul>
    @endforeach
</div>
