<?php
    session_start();
    $Id = $_SESSION["ID"];
    $Firstname = $_SESSION["prenom"];
    $Lastname = $_SESSION["nom"];
    $Birth = $_SESSION["birthday"];
    $Email = $_SESSION["email"];
    $Password = $_SESSION["password"];

function Insert($a,$b,$c,$d,$e) {
	$db = new PDO('sqlite:e-commerce-SQL.db');
	$db->exec("INSERT INTO address VALUES(?,'$a','$b','$c','$d','$e')");
}

function Alter($Id){
    $db = new PDO('sqlite:e-commerce-SQL.db');
    $db->exec("DELETE FROM address WHERE Id_user = '$Id';");

}
function Isexist($Id){
    $db = new PDO('sqlite:e-commerce-SQL.db');
	$sqlQuery = 'SELECT Id_user FROM address WHERE Id_user = ' . $Id;
    $db_lenght = $db->prepare($sqlQuery);
    $db_lenght->execute();
    $SelectedId = $db_lenght->fetchAll();
    foreach ($SelectedId as $Select) {
        if ($Select['Id_user'] == null) {
            return true;
        }else{
            return false;
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Adress = $_POST['Address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $Appart = $_POST['appartment'];
    if(empty($Adress)){
        $err_adress = "Veuillez entrez une Adresse";
    }
    if(empty($city)){
        $err_city = "Veuillez entrez une Ville";
    }
    if(empty($country)){
        $err_country = "Veuillez entrez un Pays";
    }
    if(empty($Appart)){
        $err_appart = "Veuillez entrez votre numéro d'appartement";
    }
    $reponse = Isexist($Id);
    if($reponse){
        Insert($Id, $Adress, $city, $country, $Appart);
        header("Location: profil.php");
    }else{
        Alter($Id);
        Insert($Id, $Adress, $city, $country, $Appart);
        header("Location: profil.php");
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
	<link rel="stylesheet" href="../css/stlpage.php" />
    <title>Barrage - Payment</title>
</head>



<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
            <li class="nav-item"><a href="profil.php" class="nav-link"><?php if(isset($Firstname)) echo $Firstname; ?></a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
				
			</ul>
		</nav>
        <section>
			<div class="sec-container">
				<div class="formWrapper">
					<div class="card">
                        <form method="post" action="#" id="registerForm" class="toggleForm">									
					        <input name="Address" type="text" class="form-control" placeholder="Addresse..."/>
							<span class="error"><?php if(isset($err_adress)) echo $err_adress; ?> </span>
							<input name="city" type="text" class="form-control" placeholder="Ville..." />
							<span class="error"><?php if(isset($err_city)) echo $err_city; ?> </span>
							<input name="country" type="text" class="form-control" placeholder="Pays..." />
							<span class="error"><?php if(isset($err_country)) echo $err_country; ?> </span>   
                            <input name="appartment" type="text" class="form-control" placeholder="Appartement..." />
							<span class="error"><?php if(isset($err_appart)) echo $err_appart; ?> </span>         
							
							<button type="submit" class="formButton">Valider</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>
    
</body>
</html>