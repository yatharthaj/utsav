@component('mail::message')
{{ $data['subject']}}.<br>
@component('mail::panel')
User info: {!! $data['user_info'] !!}
@endcomponent
{$data['subject']}} <br>
Full name: {{$data['fullName']}}<br>
Email    : <a href="mailto:{{$data['email'] }}">{{$data['email'] }}</a> <br>
Mobile no.: {{$data['mobile']}}<br>
Message     :
@component('mail::panel')
{{$data['enquiryMessage'] }}
@endcomponent
Nepal Ski Guides
@endcomponent
