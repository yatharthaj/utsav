@component('mail::message')
@component('mail::panel')
Senders info: {!! $data['user_info'] !!}
@endcomponent
{{ $data['subject']}} for {{ $data['pax'] }} people.<br>
@component('mail::table')
|Travellers Details                                                                      |
| ------------- |-----------------------------------------------------------------------:| 
| Trip name     | {{ $data["subject"] }}                                                 |   
| Start Date    | {{ $data["start"] }}           										 | 
| Start Date    | {{ $data["start"] }}           										 | 
| First name    | {{ $data["fname"] }}                                                   |          
| Last name     | {{ $data["lname"] }}                                                   |
| No. of pax   | {{ $data["pax"] }}                                                      |
| D.O.B         | {{ $data["DOB"] }} 											         |  
| Email         | {{ $data["email"] }}                                                   |     
| Mobile        | {{ $data["mobile"] }}                                                  | 
| Country       | {{ $data["country"] }}                                                 |       
| Address       | {{ $data["address"] }}                                                 | 
| Passport      | {{ $data["pNo"] }}                                                     |  
| Expiry        | {{ $data["expiry"] }}                                                  |  
@endcomponent
<br>
{{ config('app.name') }}
@endcomponent
