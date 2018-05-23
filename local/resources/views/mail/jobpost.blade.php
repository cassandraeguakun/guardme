@component('mail::message')

<h2>Dear {{ $userName }},</h2>
<div>
    <p>
        Check out this job that's just been posted on GuardME. It's less than {{ $specificAreaMax }}KM from your address and we thought that you might just be interested...
    </p>
</div>

  Thanks,
  <br>
  {{ config('app.name') }}
  
@endcomponent