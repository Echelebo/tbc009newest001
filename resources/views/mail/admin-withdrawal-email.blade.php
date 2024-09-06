<x-mail::message>
    # {{ $withdrawal->user->name }} Submitted Withdrawal

    Hi Admin,

    {{ $withdrawal->user->name }} has submitted a withdrawal request. Please login the admin to confirm.


    Thanks,<br>
    {{ site('name') }}
</x-mail::message>
