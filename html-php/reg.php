<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'D:\xampp\htdocs\z\e-commerce-PHP\e-commerce-PHP\vendor\autoload.php';
// C:\xampp\htdocs\php\site-php(fini)\e-commerce-PHP
$pdo = new PDO('sqlite:e-commerce-SQL.db');
$sqlQuery = 'SELECT * FROM user';
$db_lenght = $pdo->prepare($sqlQuery);
$db_lenght->execute();
$result = $db_lenght->fetchAll();


function Sendemail($prenom,$nom,$birthday,$email,$password) {
	$init = new PHPMailer(true);
	$init->isSMTP();
	$init->Host = 'smtp.gmail.com';
	$init->SMTPAuth = true;
	$init->Username = 'chimiflyimik@gmail.com';
	$init->Password = 'wlifbnqcngwruazg';
	$init-> SMTPSecure =  'ssl';
	$init->Port = "465";
	$init->setFrom('chimiflyimik@gmail.com');
	$init->addAddress($email);
	$init->isHTML(true);
	$init->Subject = "Barrage";
	$num_str = sprintf("%06d", mt_rand(1, 999999));
	$init->Body = "Votre code est :"."\n".$num_str;
	$init->send();
	session_start();
	$_SESSION["code"] = $num_str;
	$_SESSION["prenom"] = $prenom;
	$_SESSION["nom"] = $nom;
	$_SESSION["birthday"] = $birthday;
	$_SESSION["email"] = $email;
	$_SESSION["password"] = $password;
	
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$validation = true;
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email']; 
	$password = $_POST['mdp']; 
	$password1 = $_POST['mdp1'];
	$check = isset($_POST['check']);
	$date = strtotime($_POST['date']);
	$dat=date('d',$date);
    $month=date('m',$date);
    $year=date('Y',$date);
	$final_date = $year."-".$month."-".$dat;
	if (empty($check)) { 
		$errcheck = "*";
		$validation = false;
	}
	if (empty($prenom)) { 
		$errprenom = "prenom vide";
		$validation = false;
	}
	if (empty($nom)) { 
		$errnom = "nom vide";
		$validation = false;
	}
	if (empty($email)) { 
		$errmail = "Email input vide";
		$validation = false;
	}  
	if (empty($password)) { 
		$errpswd = "Password input vide";
		$validation = false;
	}  
	if (empty($password1)) { 
		$errpswd1 = "Password1 input vide";
		$validation = false;
	}
	if ($password != $password1){
		$errpswd = "Les mots de passes ne sont pas identiques";
		$validation = false;
	}
	if(strlen($password) > 1 && strlen($password)< 4) {
		$errpswd = "La taille du mot de passe doit etre superieur a 4";
		$validation = false;
	}
	foreach ($result as $test) {
		if($email == $test['Email']){
			$errmail ="Email deja pris";
			$validation = false;
		}
	}
	if ($validation == true){
		Sendemail($prenom,$nom,$final_date,$email,$password);
		header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/validation.php", true, 301);
		exit();
	};
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
		<link rel="stylesheet" href="../css/stlpage.php" />
    <title>Barrage - Registration</title>
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
						<div class="card-header">
							<a href="log.php">
								<button type="submit" class="formButton">Se connecter</button>
							</a>
							<!-- <div id="forRegister" class="form-header active">
								<a href="reg.php">S'inscrire</a>
							</div> -->
						</div>

                        <form method="post" action="#" id="registerForm" class="toggleForm">									
					        <input name="prenom" type="text" class="form-control" placeholder="Prenom..."/>
							<span class="error"><?php if(isset($errprenom)) echo $errprenom; ?> </span>
							<input name="nom" type="text" class="form-control" placeholder="Nom..." />
							<span class="error"><?php if(isset($errnom)) echo $errnom; ?> </span>
							<input name="email" type="email" class="form-control" placeholder="Email..." />
							<span class="error"><?php if(isset($errmail)) echo $errmail; ?> </span>      
							<input name="mdp" type="password" class="form-control" placeholder="Mot de passe..." />
							<span class="error"><?php if(isset($errpswd)) echo $errpswd; ?> </span>  
							<input name="mdp1" type="password" class="form-control" placeholder="Confirmer mot de passe..." />
							<span class="error"><?php if(isset($errpswd1)) echo $errpswd1; ?> </span>
							<input name="date" type="date" id="start" name="trip-start"
       							min="0000-00-00" max="2022-12-31">
							
							<label for="remember">
							<span class="error"><?php if(isset($errcheck)) echo $errcheck; ?> </span>
								<input name="check" type="checkbox" class="form-check" id="privacy" />
								J'accepte les termes et les conditions d'utilisations
							</label>
							
							<button type="submit" class="formButton">Inscription</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>