@component('mail::message')


<h3>New message from {{$contact_form_data['email']}}</h3>
<p>name:{{$contact_form_data['name']}}</p>
<p>phone:{{$contact_form_data['phone']}}</p>
<p>message:{{$contact_form_data['message']}}</p>


@endcomponent
