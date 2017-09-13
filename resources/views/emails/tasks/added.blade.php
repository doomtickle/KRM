@component('mail::message')
# You have a new task in KRM.

{{ $createdBy }} added a new task for you.

Click the button below to view the task

@component('mail::button', ['url' =>  $url ])
View the task
@endcomponent

Thanks,<br>
Your friendly Kerigan Developers.
@endcomponent
