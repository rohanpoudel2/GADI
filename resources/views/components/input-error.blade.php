@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge() }}>
        @foreach ((array) $messages as $message)
            <li style="color:red; font-size:12px;">{{ $message }}</li>
        @endforeach
    </ul>
@endif
