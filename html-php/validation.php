<?php
session_start();
$true_code = $_SESSION["code"];
$prenom = $_SESSION["prenom"];
$nom = $_SESSION["nom"];
$birthday = $_SESSION["birthday"];
$email = $_SESSION["email"];
$password = $_SESSION["password"];

function Insert($prenom,$nom,$birthday,$mail,$password) {
	$db = new PDO('sqlite:e-commerce-SQL.db');
	$db->exec("INSERT INTO user VALUES(?,'$prenom','$nom','$birthday','$mail','$password',?,?)");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$input_code = $_POST['validation'];
	if (empty($input_code)) { 
		$errinput = "Veuillez inserer le code";
	}
	if ($input_code == $true_code){
		Insert($prenom,$nom,$birthday,$email,$password);
		header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/log.php", true, 301);
		exit();
		// compte créer + cookies + connection au site
	}else{
		$errinput = "Code Faux";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
		<link rel="stylesheet" href="../css/stlvalidation.php" />
    <title>Barrage - Validation</title>
</head>
<body>
    <div class="container">
		<nav>
			<a href="#" class="logo" id="logo">Barrage</a>
			
		</nav>
        <section>
			<div class="sec-container">
				<div class="formWrapper">
					<div class="card">
						<div class="titre">
							<h1>Verifiez votre adresse e-mail</h1>
						</div >
						<div class="text">
							<p>Encore une étape pour vérifier votre identité.</p>
							<p>Nous vous avons envoyé un code de vérification a l'adresse.</p>
							<p><?php if(isset($_SESSION['mail'])) echo $_SESSION['mail']; ?> </p>
								<div class="card-header">
									<form method="post" action="#" id="registerForm" class="toggleForm">
										
									<input name="validation" type="text" class="form-control" placeholder="Saisir le code de vérification"/>					
								</form>
								</div>
								<a href="/VALABA">Vous n'avez pas recu le code ?</a>	
								<span class="error"><?php if(isset($errinput)) echo $errinput; ?> </span>
						</div>
                    </div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>