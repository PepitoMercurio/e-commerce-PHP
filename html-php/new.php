<?php
function Insert($a,$b,$c,$d,$e,$f) {
	$db = new PDO('sqlite:e-commerce-SQL.db');
	$sqlQuery = 'SELECT Id_photo FROM photo ORDER BY Id_photo DESC LIMIT 1';
    $db_lenght = $db->prepare($sqlQuery);
    $db_lenght->execute();
    $Id_Photo = $db_lenght->fetchAll();

	foreach ($Id_Photo as $img) {
		$id = $img['Id_photo'] + 1;
		$db->exec("INSERT INTO product VALUES(?,'$a','$b','$c','$d','$e', $id,'$f')");
		$db->exec("INSERT INTO photo VALUES(? ,?)");
	}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$product = $_POST['produit'];
	$desc = $_POST['description'];
	$price= $_POST['prix'];
	$stock = $_POST['stock'];
	$type = $_POST['type'];
	$like = $_POST['like'];
	if(empty($product)){
		$errprod = "Input vide";
	}
	elseif(empty($desc)){
		$errdesc = "Input vide";
	}
	elseif(empty($price)){
		$errprice = "Input vide";
	}
	elseif(empty($stock)){
		$errstock = "Input vide";
	}
	elseif(empty($type)){
		$errtype = "Input vide";
	}
	elseif(empty($like)){
		$errlike = "Input vide";
	} else {
		Insert($product, $desc, $price, $stock, $type, $like);
	header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/product-list.php");
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
    <title>Barrage - Registration</title>
</head>
<body>
    <div class="container">
		<nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
		</nav>

        <section>
			<div class="sec-container">
				<div class="formWrapper">
					<div class="card">
						<div class="card-header">
						</div>
                        <form method="post" action="#" id="registerForm" class="toggleForm">									
					        <input name="produit" type="text" class="form-control" placeholder="Nom du produit..."/>
							<span class="error"><?php if(isset($errprod)) echo $errprod; ?> </span>
                            <input name="description" type="text" class="form-control" placeholder="Description du produit..."/>
							<span class="error"><?php if(isset($errdesc)) echo $errdesc; ?> </span>
                            <input name="prix" type="number" class="form-control" placeholder="Prix..."/>
							<span class="error"><?php if(isset($errprice)) echo $errprice; ?> </span>
                            <input name="stock" type="number" class="form-control" placeholder="Stock..."/>
							<span class="error"><?php if(isset($errstock)) echo $errstock; ?> </span>
                            <input name="type" type="text" class="form-control" placeholder="Type..."/>
							<span class="error"><?php if(isset($errtype)) echo $errtype; ?> </span>
                            <input name="like" type="number" class="form-control" placeholder="Likes..."/>
							<span class="error"><?php if(isset($errlike)) echo $errlike; ?> </span>
							<button type="submit" class="formButton">Creer</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>
</body>
</html>