<?php
session_start();
if(isset($_SESSION['username'])){
	header('Location: ../app/');
}
require_once "../Connexion/db.php";
?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
	<title>CONNEXION - GESTION DU BUDGET FINANCIER QUOTIDIEN</title>
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
		<h1>Authentification</h1>
		<!-- //title -->
		<!-- content -->
		<div class="sub-main-w3">
			<div class="bg-content-w3pvt">
				<div class="top-content-style">
					<img src="images/logo.png" width="80px" alt="" />
				</div>
				<form action="#" method="post">
					<p class="legend">Se connecter<span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="text" placeholder="Identifiant ou E-mail" name="email" required />
						<span class="fa fa-envelope"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Mot de passe" name="mdp" required />
						<span class="fa fa-lock"></span>
					</div>
					<button type="submit" name="login" class="btn submit">
						<span class="fa fa-sign-in"></span>
					</button>
				</form>

				<?php 
				if(isset($_POST['login']))
				{
					$email = strtolower(htmlspecialchars($_POST['email']));
					$mdp = htmlspecialchars($_POST['mdp']);
					$mdp_hash = md5($mdp);

					//correct, on continue
					$req = $pdo->query('SELECT username, nomcomplet, email, password_hash, photo_profil, idRoles_k FROM Utilisateurs WHERE (username = "'.$email.'" OR email = "'.$email.'") AND password_hash = "'.$mdp_hash.'"');
					$res = $req->fetchAll(PDO::FETCH_OBJ);
						if($res){
							
							echo "<b style='color: #0f0;'>Connexion effectué avec succès.</b><br />";
							$_SESSION['username'] = $res[0]->username;
							$_SESSION['nomcomplet'] = $res[0]->nomcomplet;
							$_SESSION['email'] = $res[0]->email;
							$_SESSION['photo_profil'] = $res[0]->photo_profil;
							$_SESSION['idRoles_k'] = $res[0]->idRoles_k;

							header('Location: ../');
							
						}else{
							echo "<b style='color: #f44;'>Désolé ! le nom d'utilisateur, l'adresse mail ou le<br />mot de passe n'existe pas dans la base de données.</b><br />";
						}
					echo "<br />";
				}
				?>

				Pas encore de compte? <a href="../register" class="bottom-text-w3ls">Créer un compte ici.</a> <br />
				<a href="?password=reset" class="bottom-text-w3ls">Mot de passe oublié?</a>
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