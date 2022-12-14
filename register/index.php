<?php
require_once "../Connexion/db.php";
?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
	<title>CREATION D'UN COMPTE - GESTION DU BUDGET FINANCIER QUOTIDIEN</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="CONNEXION - GESTION DU BUDGET FINANCIER QUOTIDIEN" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<div class="main-bg">
		<!-- title -->
		<h1>Créer un compte</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style">
					<img src="images/logo.png" width="80px" alt="" />
				</div>
				
				<form action="#" method="post">
					<p class="legend">S'inscrire<span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="text" placeholder="Nom d'utilisateur" name="username" required />
						<span class="fa fa-user"></span>
					</div>
					<div class="input">
						<input type="email" placeholder="Adresse email" name="email" required />
						<span class="fa fa-envelope"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Mot de passe" name="password" required />
						<span class="fa fa-lock"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Re-tapez le mot de passe" name="password2" required />
						<span class="fa fa-lock"></span>
					</div>
					<button type="submit" name="register" class="btn submit">
						<span class="fa fa-sign-in"></span>
					</button>
				</form>
				
				<?php 
				if(isset($_POST['register']))
				{
					$username = strtolower(htmlspecialchars($_POST['username']));
					$email = strtolower(htmlspecialchars($_POST['email']));
					$password = htmlspecialchars($_POST['password']);
					$password2 = htmlspecialchars($_POST['password2']);


					if($password == $password2)
					{
						//correct, on continue
						$req = $pdo->prepare("SELECT username, email FROM Utilisateurs WHERE username = ? OR email = ?");
						$req->execute([$username, $email]);
						$res = $req->fetchAll(PDO::FETCH_ASSOC);
						if($res){
							echo "<b style='color: #f44;'>Désolé ! le nom d'utilisateur ou l'adresse<br />mail existe déjà.</b><br />";
						}else{
							//correct, on continue
							$hash_password = md5($password);
							$date = date("Y-m-d H:i:s");
							$roleId = 2;
							$req1 = $pdo->exec('INSERT INTO Utilisateurs SET username = "'.$username.'", email = "'.$email.'", password_hash = "'.$hash_password.'", date_inscription = "'.$date.'", idRoles_k = "'.$roleId.'"');
							
							echo "<b style='color: #0f0;'>Inscription effectué avec succès.</b><br />";
						}
						
					}else
					{
						echo "<b style='color: #f44;'>Erreur ! Mot de passe incorrect.</b><br />";
					}

					echo "<br />";
				}
				?>
				
				Déjà une compte? <a href="../login" class="bottom-text-w3ls">Se connecter par ici.</a> <br />
				
			</div>
		</div>
		<!-- //content -->
		<!-- copyright -->
		<div class="copyright">
			<h2>&copy; 2022 GESTION DU BUDGET FINANCIER. All rights reserved | Design by
				<a href="http://blog.freehzaix.com" target="_blank">Jean-Luc DOH</a>
			</h2>
		</div>
		<!-- //copyright -->
	</div>
</body>

</html>