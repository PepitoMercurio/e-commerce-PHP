<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
	<link rel="stylesheet" href="../css/stlpage.php" />
    <title>Barrage - Payment</title>
</head>


<?php

   // $sqlQuery = 'DELETE FROM payment';
    //$db_lenght = $pdo->prepare($sqlQuery);
    //$db_lenght->execute();
    function Insert0($id,$a,$b) {
        $pdo = new PDO('sqlite:e-commerce-SQL.db');
        $sqlQuery = 'SELECT * FROM user WHERE Id_user = ' . $id;
        $db_lenght = $pdo->prepare($sqlQuery);
        $db_lenght->execute();
        $Query='UPDATE user SET Email = "'.$a.'", Password = "a" WHERE Id_user= '.$id.'';
        $s = $pdo->prepare($Query);
        $s->execute();
        //$resultId = $s->fetchAll();
    }

    session_start();
	$Id = $_SESSION["ID"];
	$Username = $_SESSION["prenom"];
	$Lastname = $_SESSION["nom"];
	$Birth = $_SESSION["birthday"];
	$Email = $_SESSION["email"];
	$Password = $_SESSION["password"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Newmail = $_POST['newmail'];
    $pswd = $_POST['1'];
    $pswd1 = $_POST['2'];
    if(empty($Newmail)){
        $a = "Veuillez entrez un Nouvel Email";
    }
    if(empty($pswd)){
        $b = "Veuillez entrez Nouveau mot de passe";
    }
    if(empty($pswd1)){
        $c = "Veuillez Confirmez le Nouveau mot de passe";
    }
    if($pswd != $pswd1){
        $d = "Mots de passes non identiques";
    }else{

        Insert0($Id,$Newmail,$pswd);
        header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/profil.php");
        exit;
    }
    }
?>

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
        <section>
			<div class="sec-container">
                
				<div class="formWrapper">
					<div class="card">
                        <form method="post" action="#" id="registerForm" class="toggleForm">								
                    	<input name="newmail" type="email" class="form-control" placeholder="Nouvelle adresse Email..."/>
							<span class="error"><?php if(isset($a)) echo $a; ?> </span>
							<input name="1" type="password" class="form-control" placeholder="Nouveau mot de passe" />
							<span class="error"><?php if(isset($b)) echo $b; ?> </span>
                            <input name="2" type="password" class="form-control" placeholder="Confirmez mot de passe" />   
                            <span class="error"><?php if(isset($c)) echo $c; ?> </span>   
                            <span class="error"><?php if(isset($d)) echo $d; ?> </span>  
							<button type="submit" class="formButton">Valider</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>

</body>
</html>