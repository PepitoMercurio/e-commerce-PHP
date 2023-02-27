<?php
session_start();
$Username = $_SESSION["prenom"] ;
if(!isset($_SESSION['code'])){
	header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/log.php", true, 301);
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
	<link rel="stylesheet" href="../css/stlcontact.php" />
    <title>Barrage</title>
</head>
<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
				<li class="nav-item"><a href="profil.php" class="nav-link"><?php if(isset($Username)) echo $Username; ?></a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
			</ul>
		</nav>
		<div class="mid">
            <div class="gauche">
				<form>
					<div class="envoie-mail">
						<h3>Si vous rencontrez des soucis lors de vos commandes vous pouvez sois contacté par mail ou en appelant les numéros ci-dessous.</h3>
						<div class="mail">
							<label for="input">Mail:</label>
							<br>
							<input type="text" id="input">
						</div>
						<div class="sujet">
							<label for="input">Sujet:</label>
							<br>
							<input type="text" id="input">
						</div>
						<div class="zone-text">
							<label for="input">Text:</label>
							<br>
							<textarea name="input" id="input" cols="30" rows="10"></textarea>
						</div>
						<div class="form-send">
							<input type="submit" value="SEND" class="form-btn">
						</div>
					</div>
				</form>
            </div>
            <div class="droite">
                <div class="img">
                    <img src="../css/img/barage.png" alt="test">
                </div>
                <div class="rectangle">
                    <div class="text">
                        <h2>Ryan Rais</h2>
						<h2>07 82 68 81 07</h2>
                        <h2>ryan.rais@ynov.com</h2>
                        <h3>11/09/01</h3>
                    </div>
                    <div class="adress">
                        <h1></h1>
                        <h3>50 rue Haute</h3>
                        <h3>Deuil-la-barre</h3>
                        <h3>France</h3>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>