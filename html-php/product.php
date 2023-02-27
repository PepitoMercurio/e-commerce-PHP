<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
    <link rel="stylesheet" href="../css/stlproduct.php" />
    <title>Barrage</title>
</head>
<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
				<li class="nav-item"><a href="profil.php" class="nav-link">Profil</a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
			</ul>
		</nav>
        <div class="test">
            
            <?php
            function GetIdfromUrl(){
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
            else  
            $url = "http://";      
            $url.= $_SERVER['HTTP_HOST'];      
            $url.= $_SERVER['REQUEST_URI'];    
            $Id_prod =  substr($url, 73);
                return $Id_prod;
            }
            $IDprod = GetIdfromUrl();
            session_start();
            $Id = $_SESSION["ID"];
            $_SESSION['ID_product'] = $IDprod;
            
           

            $pdo = new PDO('sqlite:e-commerce-SQL.db');
            $sqlQuery = 'SELECT Id_product as Id, Name, Price, Stock, Description, Image FROM product INNER JOIN photo ON product.Id_photo = photo.Id_photo WHERE Id = '. htmlspecialchars($_GET['Id']);
            $db_lenght = $pdo->prepare($sqlQuery);
            $db_lenght->execute();
            $result = $db_lenght->fetchAll();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $sqlAddCart = 'INSERT INTO cart (Id_user, Id_product) VALUES ('. $Id . ', ' . htmlspecialchars($_GET['Id']) . ')';
                $db_lenght_cart = $pdo->prepare($sqlAddCart);
                $db_lenght_cart->execute();
                $addCart = $db_lenght_cart->fetchAll();
            }

                foreach ($result as $test) {
                    echo '<div class="fond">';
                    echo '<div class="image">';
                    echo '<div class="case" >';
                    echo '<div class="zoom" id="zoom">';
                    if ($test['Image'] == '') {
                        echo '  <img src="../css/img/barage-item.png" alt="product"/>';
                    } else {
                        echo '  <img  src="'. $test['Image'] .'"/>';
                        echo '</div>';
                        echo '<div class="zonebtn" >';
                       
                        echo '  <p>' . $test['Description'] . '</p>';
                        if($Id == 12){
                            echo '<button type="submit" class="formButton"><a href="modif.php">Modifier<a/></button>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="ecrit">';
                    echo '<div class="text">';
                    echo '  <h1>' . $test['Name'] . '</h1>';
                    echo '  <h1>' . $test['Price'] . '€</h1>';
                    echo '  <h1>' . $test['Stock'] . ' exemplaires restant</h1>';
                    //echo $test['Like'];
                    echo '</div>';
                    echo '  <form method="post" action="" id="registerForm" class="toggleForm">';
                    echo '      <button>Ajouter au panier</button>';
                    
                    echo '  </form>';
                    
                    echo '</div>';
                    echo '</div>';
                }

            ?>
        </div>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.20/jquery.zoom.min.js"></script>
<script>
	$(document).ready(function(){
	    $('#zoom').zoom(2);
       
	});
</script>