<x-mail::message>
# {{$update->user->name}} Submitted Send Button Request

Hi Admin,

{{$update->user->name}} has submitted a send button request. Please login the admin to confirm.


Thanks,<br>
{{ site('name') }}
</x-mail::message>
