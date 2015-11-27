<!DOCTYPE html>
<html>
<head>
	<title>Jobtip</title>
</head>
<body>

<h1>Hi, {{ $fname }}</h1>

<h2>You have requested for password reset</h2>
<p>
To reset your password <a href="{{ URL::to('reset/password', array($token)) }}">click here</a>.
</p>
</body>
</html>