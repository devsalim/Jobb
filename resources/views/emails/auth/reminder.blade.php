<!DOCTYPE html>
<html>
<head>
	<title>Jobtip</title>
</head>
<body>
<h2>Password Reset</h2>
<div>
Reset your password, complete this form: {{ URL::to('password/reset', array($token)) }}.
This link will expire in {{ Config::get('auth.reminder.expire', 120) }} minutes.</div>
</body>
</html>