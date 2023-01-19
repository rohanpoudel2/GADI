@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://cdn-icons-png.flaticon.com/512/744/744465.png" class="logo" alt="App Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
