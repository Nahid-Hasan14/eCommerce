<x-mail::message>
# Hello {{$name}},

Thanks for registering!
Please click the button below to verify your account.

<x-mail::button :url="route('customer.verify', $token)">
   Verify Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
