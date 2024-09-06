<x-mail::message>
#  Withdrawal approved

Hi {{ $demo->name }},


Your withdrawal request of USD{{ $demo->amount }} has been approved.



Thanks,<br>
{{ site('name') }}
</x-mail::message>
