<x-mail::message>
# Trading Plan Activation Successful

Hi {{ $activation->user->name  }},

You have successfully activated {{ $activation->bot->name }} exchange plan.

Thanks,<br>
{{ site('name') }}
</x-mail::message>
