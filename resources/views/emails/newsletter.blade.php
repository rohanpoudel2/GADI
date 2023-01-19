@component('mail::message')
    # Welcome to our Newsletter

    Thank you for subscribing to our newsletter, {{ $subscriber->email }}

    In this newsletter, you'll find the latest news and updates from our company. We'll also share some useful tips and
    tricks to help you make the most of our products and services.

    We promise to only send you relevant and valuable information, and we'll never share your email address with anyone
    else.

    @component('mail::button', ['url' => url('/')])
        Visit our website
    @endcomponent

    If you ever want to unsubscribe, you can do so by clicking the unsubscribe link at the bottom of this email.

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
