@component('mail::message')
# Introduction

{{ $order->status }}
@component('mail::button', ['url' => ''])
Button Text 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
