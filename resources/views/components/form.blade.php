@props([
    'action',
    'post'=>null,
    'put'=>null,
    'patch'=>null,
    'delete'=>null,
])

@php
    $method = $post || $put || $patch || $delete ? 'post' : 'get';
@endphp

<form action="{{ $action }}" method="{{ $method }}" {{ $attributes }}>
    @csrf

    @if($post)
        @method('post')
    @endif

    @if($patch)
        @method('patch')
    @endif

    @if($put)
        @method('put')
    @endif

    @if($delete)
        @method('delete')
    @endif

    {{ $slot }}
</form>
