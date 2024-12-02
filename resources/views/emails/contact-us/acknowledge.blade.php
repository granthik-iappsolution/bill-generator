@component('mail::message')
# We received your message

Hi {{ $request['name'] }},

We have received your message, and we will get back to you soon. Stay tuned.

Following was your message:

@component('mail::panel')
{{ $request['message'] }}
@endcomponent

Love,<br>
**{{ config('app.name') }}**
@endcomponent
