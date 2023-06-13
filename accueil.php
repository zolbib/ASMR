<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ASMR</title>
	<style>
		body {
            background-image: url(cinema1.jpg);
            background-size: cover;
            font-family: Arial, sans-serif;
        }
		h1 {
			text-align: center;
			font-size: 48px;
			margin-top: 100px;
			margin-bottom: 50px;
			color: yellow;
			font-family: 'Roboto', sans-serif;
		}
		p {
			text-align: center;
			font-size: 24px;
			margin-top: 0;
			color: yellow;
			font-family: 'Roboto', sans-serif;
		}
		button {
			background-color: #008CBA;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-family: 'Roboto', sans-serif;
			font-size: 16px;
		}
		button:hover {
			background-color: #006C9E;
		}
		.container {
			text-align: center;
			margin-top: 50px;
		}
		.line {
			height: 3px;
			background-color: #008CBA;
			margin: 20px 0;
			width: 200px;
			margin-left: auto;
			margin-right: auto;
		}
		.answer {
			text-align: center;
			font-size: 36px;
			font-family: 'Caveat', cursive;
			color: #008CBA;
		}
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>
	<h1>Welcome to ASMR</h1>
	<p>What movie are you watching next? <span class="answer">The answer is here.</span></p>
	<p>Quel film regarderez-vous ensuite? <span class="answer">La réponse est ici.</span></p>
	<div class="container">
		<button onclick="window.location.href='login.php'">Login</button>
		<button onclick="window.location.href='create_account.php'">Create Account</button>
		<div class="line"></div>
	</div>
</body>
</html>
