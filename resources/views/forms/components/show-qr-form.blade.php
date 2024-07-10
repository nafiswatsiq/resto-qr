<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->
        <div class="grid justify-center">
            <img src="{{ asset($getRecord()->qr_code) }}" alt="" class="w-40 mx-auto">
    
            <a href="{{ asset($getRecord()->qr_code) }}" download class="mt-2">Download Qr Code</a>
        </div>
    </div>
</x-dynamic-component>
