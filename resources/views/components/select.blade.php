@props([
    'errors' => false
])

@php
    $classes = ($errors ?? false)
    ? 'select select-bordered select-secondary w-full max-w-xs'
    : 'select select-bordered w-full max-w-xs'
@endphp

<div>
    <select
    {{ $attributes->merge([
        'class' => $classes
    ]) }}
    >
        {{ $slot }}
</select>

    @if ($errors)
        <div class="m-1 font-thin text-red-600">
            {{ $errors }}
        </div>
    @endif

</div>
