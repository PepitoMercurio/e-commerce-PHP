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
    $pdo = new PDO('sqlite:e-commerce-SQL.db');
   // $sqlQuery = 'DELETE FROM payment';
    //$db_lenght = $pdo->prepare($sqlQuery);
    //$db_lenght->execute();

    session_start();
	$Id = $_SESSION["ID"];
	$Firstname = $_SESSION["prenom"];
	$Lastname = $_SESSION["nom"];
	$Birth = $_SESSION["birthday"];
	$Email = $_SESSION["email"];
	$Password = $_SESSION["password"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Input_card = $_POST['card'];
        $Input_expiration = $_POST['expiration'];
        $Input_crypto = $_POST['crypto'];
        $date = str_replace('/', '-', $Input_expiration);
        $result = date('Y-m-d', strtotime($date));
        

        if (empty($Input_card) || empty($Input_expiration) || empty($Input_crypto) || strlen($Input_card) != 16 || $result  < date("Y-m") || strlen($Input_crypto) != 3) {
            if (empty($Input_card)) {
                $err_input_card = "Veuillez mettre votre numéro de carte";
            } elseif (strlen($Input_card) != 16) {
                $err_input_card = "Numéro de carte invalide";
            }
            if (empty($Input_expiration) ) {
                $err_input_expr = "Veuillez mettre votre date d'expiration";
            } elseif ($result  < date("Y-m-d")) {
                $err_input_expr = "Date d'expiration invalide";
            }
            if (empty($Input_crypto)) {
                $err_input_crypto = "Veuillez mettre votre cryptograme";
            } elseif (strlen($Input_crypto) != 3) {
                $err_input_crypto = "Cryptograme invalide";
            }
            
        } else {
            $sqlQuery = 'SELECT Id_payment FROM user WHERE Id_user = ' . $Id;
            $db_lenght = $pdo->prepare($sqlQuery);
            $db_lenght->execute();
            $SelectedId = $db_lenght->fetchAll();
            foreach ($SelectedId as $Select) {
                if ($Select['Id_payment'] == null) {
                    $sqlQuery = ("INSERT INTO payment VALUES(?,'$Input_card','$result','$Input_crypto')");
                    $db_lenght = $pdo->prepare($sqlQuery);
                    $db_lenght->execute();
                    $SelectedId = $db_lenght->fetchAll();

                    $sqlQuery = 'SELECT Id_payment FROM payment ORDER BY Id_payment DESC LIMIT 1';
                    $db_lenght = $pdo->prepare($sqlQuery);
                    $db_lenght->execute();
                    $Idpay = $db_lenght->fetchAll();

                    foreach ($Idpay as $test) {
                        $sqlQuery = 'UPDATE user SET Id_payment = ' . $test['Id_payment'] . ' WHERE Id_user = ' . $Id;
                        $db_lenght = $pdo->prepare($sqlQuery);
                        $db_lenght->execute();
                        $resultId = $db_lenght->fetchAll();
                    }
                }
                header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/address.php", true, 301);
            }
        }
    }
?>

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
                    <input type="checkbox" name="check" onclick="onlyOne1(this)">
                    <img src="https://img.icons8.com/color/36/000000/visa.png">
                    <input type="checkbox" name="check" onclick="onlyOne2(this)">
                    <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                    <input type="checkbox" name="check" onclick="onlyOne3(this)">
                    <img src="https://img.icons8.com/color/36/000000/amex.png">
                    <input type="checkbox" name="check" onclick="onlyOne4(this)">
                    <img src="https://img.icons8.com/color/36/000000/paypal.png">
                    <input type="checkbox" name="check" onclick="onlyOne5(this)">
                    <img src="https://img.icons8.com/color/36/000000/stripe.png">
                        <form method="post" action="#" id="registerForm" class="toggleForm">								
                    	<input name="card" type="number" class="form-control" placeholder="Numéro de carte..."/>
							<span class="error"><?php if(isset($err_input_card)) echo $err_input_card; ?> </span>
                            <img src="" id="myImg" alt="">
							<input name="expiration" type="date" class="form-control" placeholder="Date d'expiration..." />
							<span class="error"><?php if(isset($err_input_expr)) echo $err_input_expr; ?> </span>
							<input name="crypto" type="number" class="form-control" placeholder="Cryptograme..." />
							<span class="error"><?php if(isset($err_input_crypto)) echo $err_input_crypto; ?> </span>      
							<button type="submit" class="formButton">Valider</button>
						</form>
                    </div>
				</div>
			</div>
		</section>
	</div>
    <script>function onlyOne1(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    var imgUrl = "https://img.icons8.com/color/36/000000/visa.png"
    var modelName = "Model Name"
    //   document.getElementById("myText").innerHTML = modelName;
    document.getElementById("myImg").src = imgUrl;
        if (item !== checkbox) item.checked = false
    })
    }
    function onlyOne2(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    var imgUrl = "https://img.icons8.com/color/36/000000/mastercard.png"
    var modelName = "Model Name"
    //   document.getElementById("myText").innerHTML = modelName;
    document.getElementById("myImg").src = imgUrl;
        if (item !== checkbox) item.checked = false
    })
    }
    function onlyOne3(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    var imgUrl = "https://img.icons8.com/color/36/000000/amex.png"
    var modelName = "Model Name"
    //   document.getElementById("myText").innerHTML = modelName;
    document.getElementById("myImg").src = imgUrl;
        if (item !== checkbox) item.checked = false
    })
    }
    function onlyOne4(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    var imgUrl = "https://img.icons8.com/color/36/000000/paypal.png"
    var modelName = "Model Name"
    //   document.getElementById("myText").innerHTML = modelName;
    document.getElementById("myImg").src = imgUrl;
        if (item !== checkbox) item.checked = false
    })
    }
    function onlyOne5(checkbox) {
    var checkboxes = document.getElementsByName('check')
    checkboxes.forEach((item) => {
    var imgUrl = "https://img.icons8.com/color/36/000000/stripe.png"
    var modelName = "Model Name"
    //   document.getElementById("myText").innerHTML = modelName;
    document.getElementById("myImg").src = imgUrl;
        if (item !== checkbox) item.checked = false
    })
    }
</script>
</body>
</html>