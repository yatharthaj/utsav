@component('mail::message')
{{ $data['subject']}}.<br>
@component('mail::panel')
User info: {!! $data['user_info'] !!}
@endcomponent  
Full name: {{$data['name']}}<br>
Email    : <a href="mailto:{{$data['email'] }}">{{$data['email'] }}</a> <br>
Mobile no.: {{$data['mobile']}}<br>
Message     :
@component('mail::panel')
{{$data['bodyMessage'] }}
@endcomponent
Nepal Ski Guides
@endcomponent
