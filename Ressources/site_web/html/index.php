<!Doctype html>
<html>
	<head>
		<title> ConnectedFlower </title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Ranga&display=swap" rel="stylesheet">
		<style>
			body {
				background-color: #8FBC8F;
			}
			h1 {
				font-family: 'Ranga', cursive;
				text-align:center;
			}
			.info {
				font-size: 0.9em;
			}
			#info {
				width:60%;
				margin: auto;
				margin-top: 10px;
				margin-bottom: 10px;
			}
			.conn {
				text-align:center;
				font-size:0.9em;
			}
			form {
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1> ConnectedFlower </h1>
		<form method="post" action="connexion.php">
			<input type="submit" placeholder="Connexion" Value="Connexion">
		</form>
		<br>
		<hr>
		<div id="info">
			<p class="info"> Bienvenue sur PlanteConnecté, notre entreprise gère la gestion de vos plantes en un coup de main. </p>
			<p class="info"> Vous pourrez désormais regarder et contrôler la pousser de votre plante et ses besoins. 
							 Connecter ses plantes est devenue maintenant possible grâce à notre système de connexion.  </p>
		</div>
		<hr>
		<p class="conn"> Si vous possédez déjà un compte, <a href="connexion.php"> connectez-vous </a> </p>
		<p class="conn"> Si vous ne possédez pas de compte, <a href="inscription.php"> inscrivez-vous </a> </p>
	</body>
</html>

