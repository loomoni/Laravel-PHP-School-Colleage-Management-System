@component('mail::message')
Hello {{$user->name}}

<p>We understand it happens, you forgot password Click the button below to reset your password</p>
   
@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
    Reset your password
@endcomponent
    <p>In case you have any issues recovering your passwrod, please contact us</p>

Thanks, <hr>
{{ config('app.name') }}
@endcomponent