@props([
    'errors' => false,
    'placeholder' => false,
    'type' => 'text'
])


@php
    $classes = ($errors ?? false)
        ? 'input input-secondary input-bordered'
        : 'input input-ghost'
@endphp

<div>
    <input
    {{ $attributes->merge([
        'class' => $classes
    ]) }}
    placeholder="{{ $placeholder }}"
    type="{{ $type }}">

    @if ($errors)
        <div class="m-1 font-thin text-red-600">
            {{ $errors }}
        </div>
    @endif

</div>
