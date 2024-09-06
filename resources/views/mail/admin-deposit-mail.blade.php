<x-mail::message>
    # {{ $deposit->user->name }} Submitted Deposit

    Hi Admin,

    {{ $deposit->user->name }} has submitted a deposit of {{ formatAmount($deposit->amount) }}. Please login the admin
    to confirm.


    Thanks,<br>
    {{ site('name') }}
</x-mail::message>
