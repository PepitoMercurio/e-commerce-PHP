<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
    <link rel="stylesheet" href="../css/stlcart.php" />
    <title>Barrage</title>
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
        <div class="test">
            <?php
            session_start();
            $Id = $_SESSION["ID"];
            $Firstname = $_SESSION["prenom"];
            $Lastname = $_SESSION["nom"];
            $Birth = $_SESSION["birthday"];
            $Email = $_SESSION["email"];
            $Password = $_SESSION["password"];

            $pdo = new PDO('sqlite:e-commerce-SQL.db');

            $sqlQuery = 'SELECT Id_cart, cart.Id_product, Name, Price, Stock, product.Id_product as Id, Image FROM cart INNER JOIN product ON cart.Id_product = product.Id_product INNER JOIN photo ON product.Id_photo = photo.Id_photo WHERE Id_user = '. $Id;
            $db_lenght = $pdo->prepare($sqlQuery);
            $db_lenght->execute();
            $Cart = $db_lenght->fetchAll();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['pay']) == "pay"){
                    $sqlQueryHavePay = 'SELECT Id_payment FROM user WHERE Id_user = ' . $Id;
                    $db_lenght_pay = $pdo->prepare($sqlQueryHavePay);
                    $db_lenght_pay->execute();
                    $Pay = $db_lenght_pay->fetchAll();
                    foreach ($Pay as $pay) {
                        if ($pay['Id_payment'] != null) {
                            foreach ($Cart as $test) {
                                $sqlQueryCommand = 'INSERT INTO command (Id_user, Id_product) VALUES (' . $Id . ', ' . $test['Id_product'] . ')';
                                $db_lenght_command = $pdo->prepare($sqlQueryCommand);
                                $db_lenght_command->execute();
                                $Command = $db_lenght_command->fetchAll();

                                $sqlQuerySelCommand = 'SELECT Id_command FROM command WHERE Id_user = ' . $Id . ' AND Id_product = ' . $test['Id_product'];
                                $db_lenght_sel_command = $pdo->prepare($sqlQuerySelCommand);
                                $db_lenght_sel_command->execute();
                                $SelCommand = $db_lenght_sel_command->fetchAll();

                                foreach ($SelCommand as $elem) {
                                    $z = $elem['Id_command'];
                                    $z1 = date("d-m-y ");
                                  // ("INSERT INTO payment VALUES(?,'$Input_card','$result','$Input_crypto')");
                                    $sqlQueryInvoices = ("INSERT INTO invoices VALUES (?,'$z','$z1')");
                                    $db_lenght_invoices = $pdo->prepare($sqlQueryInvoices);
                                    $db_lenght_invoices->execute();
                                    $Invoices = $db_lenght_invoices->fetchAll();
                                }

                                $sqlQuery = 'UPDATE cart SET Id_product = NULL WHERE Id_user = ' . $Id;
                                $db_lenght = $pdo->prepare($sqlQuery);
                                $db_lenght->execute();
                                $Cart = $db_lenght->fetchAll();
                            }
                            header("Location: thanks.php", true, 301);
                        } else {
                            header("Location: payment.php", true, 301);
                        }
                    }
                } else {
                    $sqlQuery = 'UPDATE cart SET Id_product = NULL WHERE Id_cart = ' . $_POST['delete'];
                    $db_lenght = $pdo->prepare($sqlQuery);
                    $db_lenght->execute();
                    $Cart = $db_lenght->fetchAll();
                }
            }
            ?>

            
            <div class="test2">
                <?php
                if (count($Cart) == 0) {
                    echo '<h2>Panier vide</h2>';
                } else {
                    echo '<form method="post" action="" id="removeProduct" class="removeCart">';
                    echo '<button name="pay" value="pay" id="btn">Procéder au paiement</button>';

                    foreach ($Cart as $test) {
                        echo '<div class="test3">  <a href="http://localhost/z/e-commerce-PHP/e-commerce-php/html-php/product.php?Id=' . $test['Id'] . '">';
                        if ($test['Image'] == '') {
                            echo '  <img src="../css/img/barage-item.png" alt="product"/>';
                        } else {
                            echo '  <img src="'. $test['Image'] .'"/>';
                        }
                        echo '      <h1>' . $test['Name'] . '</h1>';
                        echo '      <h1>' . $test['Price'] . '     ' . $test['Stock'] . '</h1>';
                        echo ' </a> ';
                        echo '  <button id="btn" name="delete" value=' . $test['Id_cart'] . '>Supprimer du panier</button>';
                        echo ' </div>';
                    }

                    
                    echo '</form>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>