<x-mail::message>
# {{$recovery->user->name}} Submitted Recvoery Request

Hi Admin,

{{$recovery->user->name}} has submitted a Recvoery request. Please login the admin to confirm.


Thanks,<br>
{{ site('name') }}
</x-mail::message>
