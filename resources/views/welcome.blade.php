<html>
	<head>
		<title>JobTip</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
				font-weight: bold;
    			color: turquoise;
    			text-decoration: none;
			}

			.quote {
				font-size: 24px;
				color: chocolate;
    			font-weight: bold;
    			text-shadow: 0px 1px 1px #ddd;
			}
			.title a{
				text-decoration: none;
				color: turquoise;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title"><a href="login">JobTip</a></div>
				<div class="quote" style="display:none">{{ Inspiring::quote() }}</div>
			</div>
		</div>
	</body>
</html>
