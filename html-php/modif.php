<?php
session_start();
$Id = $_SESSION["ID"];
$Id_prod = $_SESSION['ID_product'];
//echo $Id_prod;
function Insert0($id,$a,$b,$c) {
    $pdo = new PDO('sqlite:e-commerce-SQL.db');
    $sqlQuery = 'SELECT * FROM product WHERE Id_product = ' . $id;
    $db_lenght = $pdo->prepare($sqlQuery);
    $db_lenght->execute();
    $Query='UPDATE product SET Name = "'.$a.'", Description = "'.$b.'" , Price = "'.$c.'" WHERE Id_product= '.$id.'';
    $s = $pdo->prepare($Query);
    $s->execute();
    //$resultId = $s->fetchAll();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Name = $_POST['0'];
	$Descr = $_POST['1'];
	$Price = $_POST['2']; 
	if (empty($Name)) { 
		$a = "*";
	}
	if (empty($Descr)) { 
		$b = "*";
	}
	if (empty($Price)) { 
		$c = "*";
	}else{
        Insert0($Id_prod,$Name,$Descr,$Price);
		header("Location: product-list.php");
		exit();
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
</head>
<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
			
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
			</ul>
            
		</nav>
        <section>
			<div class="sec-container">
                
				<div class="formWrapper">
					<div class="card">
                        <form method="post" action="#" id="registerForm" class="toggleForm">								
                    	<input name="0" type="text" class="form-control" placeholder="Nom"/>
							<span class="error"><?php if(isset($a)) echo $a; ?> </span>
							<input name="1" type="text" class="form-control" placeholder="Description" />
							<span class="error"><?php if(isset($b)) echo $b; ?> </span>
                            <input name="2" type="text" class="form-control" placeholder="Prix" />   
                            <span class="error"><?php if(isset($c)) echo $c; ?> </span>   
							<button type="submit" class="formButton">Valider</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>
    
</body>
</html>