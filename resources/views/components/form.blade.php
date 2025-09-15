@props(['post' => null])

@php
    $method = $post ? 'post' : 'get';
@endphp

<form {{  $attributes->merge(['class' => 'space-y-6']) }} method="{{ $method }}" >
    @if($post)
        @csrf
    @endif
    {{ $slot }}
</form>