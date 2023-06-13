<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>ASMR Login</title>
    <style>
        body {
            background-image: url(cinema1.jpg);
            background-size: cover;
            font-family: Arial, sans-serif;
        }

    </style>
</head>
<body>
	<fieldset class="logo-login" >
<img class="asmrlogo" src="asmrlogo.png" alt="">
	</fieldset>
    <div class="logincontainer">
		<h1>LOGIN</h1>
		<form action="verification.php" method="POST">
			<label for="username" style="color: black;">Nom d'utilisateur</label>
			<input type="text" id="username" name="username" placeholder="Entrer le nom d'utilisateur" class="logininput" required >

			<label for="password" style="color: black;">Mot de passe</label>
			<input type="password" id="password" name="password" placeholder="Entrer le mot de passe" required>

			<?php
				session_start();
				if (isset($_SESSION['error'])) {
					echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
					unset($_SESSION['error']);
				}
				if (isset($_GET['success']) && $_GET['success'] == 1) {
					echo '<p style="color: green;">Account created successfully, login now!</p>';

				}
			?>

			<input type="submit" value="Login" class="loginbutt">
		</form>

		<p style="color:black">Première visite? <a href="create_account.php">Créer un compte</a></p>
	</div>
</body>
</html>
