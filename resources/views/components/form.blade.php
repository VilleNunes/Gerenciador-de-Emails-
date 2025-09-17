@props(['post' => null,'delete'=>null])

@php
$method = $post || $delete ? 'post' : 'get';
@endphp

<form {{ $attributes->merge(['class' => '']) }} method="{{ $method }}" >
    @if($method == 'post')
    @csrf
    @endif

    @if ($delete)
    @method('delete')
    @endif
    {{ $slot }}
</form>