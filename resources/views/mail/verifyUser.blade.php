<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the buy and travel</title>
</head>
 
<body>
<h2>Thanks for registering to out site, {{$user['name']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
</body>
 
</html>