<x-mail::message>
# Introduction

Your account has been created.
<br/>
Your email address is: {{ $email }}
<br>
Your password is: {{ $password }}
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
