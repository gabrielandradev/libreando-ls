@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'classname']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
