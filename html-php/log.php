<?php

$db = new PDO('sqlite:e-commerce-SQL.db');

function redirect(){
	header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/product-list.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Input_email = $_POST['email'];
	$Input_password = $_POST['password'];
	if (empty($Input_email)) { 
		$err_input_email = "Veuillez mettre votre Email";
	}
	if (empty($Input_password)) { 
		$err_input_pswd = "Veuillez mettre votre Mot de passe";
	}
	$pdo = new PDO('sqlite:e-commerce-SQL.db');
            $sqlQuery = 'SELECT * FROM user where Email="'.$Input_email.'";  ';
            $db_lenght = $pdo->prepare($sqlQuery);
            $db_lenght->execute();
            $result = $db_lenght->fetchAll();
			foreach ($result as $test) {
			$Id = $test['Id_user'];
			$Firstname = $test['First_name'];
			$Lastname = $test['Last_name'];
			$Birth = $test['Birth_date'];
			$Email = $test['Email'];
			$Password = $test['Password'];
			$reponse = $Input_password == $Password ? true : false;
			if($reponse){
				session_start();
				$_SESSION["code"] = true;
				$_SESSION["ID"] = $Id;
				$_SESSION["prenom"] = $Firstname;
				$_SESSION["nom"] = $Lastname;
				$_SESSION["birthday"] = $Birth;
				$_SESSION["email"] = $Email;
				$_SESSION["password"] = $Password;
				redirect();
			}else{
				$err_input_email = "Mot de passe ou Email incorrect";
			}
		}
			
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../css/stlnav.php" />
		<link rel="stylesheet" href="../css/stlpage.php" />
		<title>Barrage - Loging</title>
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
								<!-- <div id="forLogin" class="form-header active">
									<a href="log.php">Se connecter</a>
								</div> -->
								<a href="reg.php">
									<button type="submit" class="formButton">S'inscrire</button>
								</a>
							</div>
							<div class="card-body" id="formContainer">
								<form method="post" action="#" id="loginForm">
									<input name="email" type="text" class="form-control" placeholder="Email" />
									<span class="error"><?php if(isset($err_input_email)) echo $err_input_email ?> </span>
									<input name="password" type="password" class="form-control" placeholder="Mot de passe" />
									<span class="error"><?php if(isset($err_input_pswd)) echo $err_input_pswd ?> </span>
									<label for="remember">
										<input type="checkbox" class="form-check" id="remember" />
										Se Souvenir de moi
									</label>
									<button class="formButton">Connexion</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>