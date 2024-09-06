<x-mail::message>
# Deposit Initiated

Hi {{ $deposit->user->name }},

Your plan deposit request of {{ formatAmount($deposit->amount) }} has been received. You will be notified via when your plan deposit is processed.


Thanks,<br>
{{ site('name') }}
</x-mail::message>
