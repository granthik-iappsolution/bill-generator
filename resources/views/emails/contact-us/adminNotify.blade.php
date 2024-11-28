@component('mail::message')
# Received an inquiry from {{ config('app.name') }}

Greetings Administrator,

We have received an inquiry from <strong>{{ $request['name'] }}</strong> with email address of <strong> {{ $request['email'] }} </strong>.

Following are the inquiry details

@component('mail::panel')
<strong>Name: </strong> {{ $request['name'] }}
<br/>
<strong>Email: </strong> {{ $request['email'] }}
<br/>
<strong>Mobile: </strong> {{ $request['phone'] }}
<br/>
<strong>Message: </strong> {{ $request['message'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
