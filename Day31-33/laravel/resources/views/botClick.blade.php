<form action={{route('bot.status')}} method="post">@csrf<button type="submit">Click me</button></form>
@if(!empty($success))
<p>{{$success}}</p>
@endif