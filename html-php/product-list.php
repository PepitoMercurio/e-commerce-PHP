<?php
session_start();
$Id = $_SESSION['ID'];
$Username = $_SESSION["prenom"] ;
if(!isset($_SESSION['code'])){
	header("Location: http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/log.php", true, 301);
	exit();
}
function filter($get_search, $get_category, $get_min, $get_max, $get_order): string {
    if ($get_category == "Tous") {
        $category = 'Id_product > 0';
    } else {
        $category = 'Type = "' . $get_category . '"';
    }

    if ($get_min >= 0) {
        $min = $get_min;
    } else {
        $min = 0;
    }

    if ($get_max >= 0) {
        $max = $get_max;
    } else {
        $max = 100000000;
    }

    if ($min <= $max) {
        $price = 'Price >= ' . $min . ' AND Price <=' . $max;
    } else {
        $price = 'Price >= 0';
    }

    if ($get_order == "null") {
        $order = '';
    } elseif ($get_order == "croissant") {
        $order = 'ORDER BY Price';
    } elseif ($get_order == "decroissant") {
        $order = 'ORDER BY Price DESC';
    }
    return 'SELECT Id_product as Id, Name, Like, Price, Stock, Image FROM product INNER JOIN photo ON product.Id_photo = photo.Id_photo WHERE Name LIKE \'' . $get_search . '%\' AND ' . $category . ' AND ' . $price . ' ' . $order;
}

$pdo = new PDO('sqlite:e-commerce-SQL.db');

$sqlQueryCategory = 'SELECT DISTINCT Type FROM product ORDER BY Type';
$db_lenght_category = $pdo->prepare($sqlQueryCategory);
$db_lenght_category->execute();
$category = $db_lenght_category->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
    <link rel="stylesheet" href="../css/stlproductlist.php" />
    <title>Barrage</title>
</head>
<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
				<li class="nav-item"><a href="profil.php" class="nav-link"><?php if(isset($Username)) echo $Username; ?> </a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="deco.php" class="nav-link">Deconnexion</a></li>
			</ul>
		</nav>
        <div class="tous"> 
            
            
            <div class="filter">
                <h1>    <?php
            if($Id == 12){
                echo '<button type="submit" class="formButton"><a href="new.php">New Product<a/></button>';
            }
            ?>Filtres</h1>
            

                <form method="post" action="" id="registerForm" class="toggleForm">
                    <input type="text" name="search" placeholder="Rechercher..." id="recherche"/>
                    <h2>Catégorie :</h2>
                    <select name="categorie" id="categorie">
                        <option value="Tous">Tous</option>
                        <?php
                        foreach ($category as $elem) {
                            echo '<option value="' . $elem['Type'] . '">' . $elem['Type'] . '</option>';
                        }
                        ?>
                    </select>

                    <h2>Prix :</h2>
                    <input type="number" name="min" value="min" placeholder="Min"/>
                    <input type="number" name="max" value="max" placeholder="Max"/>

                    <h2>Trier par :</h2>';
                    <select name="tri" id="tri">
                        <option value="null">Pertinance</option>
                        <option value="croissant">Du - au + cher</option>
                        <option value="decroissant">Du + au - cher</option>
                    </select>

                    <button type="submit" class="formButton">Valider</button>
                </form>
            </div>

            <div class="fond-icon">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sqlQuery = filter($_POST['search'], $_POST['categorie'], $_POST['min'], $_POST['max'], $_POST['tri']);
                } else {
                    $sqlQuery = 'SELECT Id_product as Id, Name, Price, Stock, Like, Image FROM product INNER JOIN photo ON product.Id_photo = photo.Id_photo ORDER BY Id_product';
                    
                }
    
                $db_lenght = $pdo->prepare($sqlQuery);
                $db_lenght->execute();
                $result = $db_lenght->fetchAll();

                foreach ($result as $test) {
                    $Id_product = $test['Id'];
                    $_SESSION['idprod'] = $Id_product;
                    echo '<a href="http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/product.php?Id='. $test['Id'] .'"><div class="test3">';
                    if ($test['Image'] == '') {
                        echo '  <img src="../css/img/barage-item.png" alt="product"/>';
                    } else {
                        echo '  <img src="'. $test['Image'] .'"/>';
                    }
                
                    // echo '<button type="submit" class="formButton">Inscription</button>';
                    echo '<div class="fond-info">';
                    echo '  <h1>' . $test['Name'] . '</h1>';
                    echo '  <h1>' . $test['Price'] . '€     ' . '</h1>';
                    echo '  <h1>' . $test['Stock'] . ' exemplaires restant</h1>';
                    echo '  <a><iconify-icon icon="il:heart"></iconify-icon>' . $test['Like'] . '</a>';
                    
                    echo '</a>';
                    if($Id == 12){
                        echo '<button type="submit" class="formButton"><a href="http://localhost/z/e-commerce-PHP/e-commerce-PHP/html-php/product.php?Id='. $test['Id'] .'">Modifier<a/></button>';
                    }
                    
                    echo '</div>';
                    
                    echo '</div>';
                    
                }
                ?>
                <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
                <script>

                </script>
            </div>
        </div>
    </div>
</body>
</html>