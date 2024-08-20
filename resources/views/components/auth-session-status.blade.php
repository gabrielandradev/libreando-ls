@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'classname']) }}>
        {{ $status }}
    </div>
@endif
