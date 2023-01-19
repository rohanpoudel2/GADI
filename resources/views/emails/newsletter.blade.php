<x-mail::message>
    # Welcome to our Newsletter

    Thank you for subscribing to our newsletter, {{ $subscriber->email }}

    <x-mail::button :url="'/'">
        Go to our website
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
