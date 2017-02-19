<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Email</title>
</head>
<body>
	<h1>Thanks for Sign up!</h1>
	<p>
		You need to confirm your email address <a href="{{ url('register/confirm',$user->token) }}"> here </a> 
	</p>
</body>
</html>