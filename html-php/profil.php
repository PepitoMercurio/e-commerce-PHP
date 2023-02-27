<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
	<link rel="stylesheet" href="../css/stlprofil.php" />
    <title>Barrage</title>
</head>

<?php
    session_start();
	$Id = $_SESSION["ID"];
	$Username = $_SESSION["prenom"];
	$Lastname = $_SESSION["nom"];
	$Birth = $_SESSION["birthday"];
    $db = new PDO('sqlite:e-commerce-SQL.db');
    $sqlQuery = 'SELECT * FROM user where Id_user="'.$Id.'";  ';
    $db_lenght = $db->prepare($sqlQuery);
    $db_lenght->execute();
    $result = $db_lenght->fetchAll();
    foreach ($result as $test) {
        $_SESSION["email"] = $test['Email'];
        $_SESSION["password"]= $test['Password'];
        $Email = $_SESSION["email"];
    }
?>

<body>
    <Div class="container">
        <nav>
            <a href="product-list.php" class="logo" id="logo">Barrage</a>
        
            <ul>
            <li class="nav-item"><a href="profil.php" class="nav-link"><?php if(isset($Username)) echo $Username; ?> </a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
                <li class="nav-item">
                    <a href="alter.php" class="nav-link"><button type="button" , role="button" class="btn" id="displayForm">Modifier Informations</button></a>
                </li>

            </ul>
        </nav>
        <div class="mid">
            <div class="gauche">
                <div class="panier">
                    <a href="cart.php"><h2>Panier</h2></a>
                    <div class="zone"> 
                    <?php
                    $pdo = new PDO('sqlite:e-commerce-SQL.db');
                    $sqlQuery = 'SELECT Name, Price, Stock FROM cart INNER JOIN product ON cart.Id_product = product.Id_product WHERE Id_user = '. $Id . ' LIMIT 3';
                    $db_lenght = $pdo->prepare($sqlQuery);
                    $db_lenght->execute();
                    $Cart = $db_lenght->fetchAll();

                    if (count($Cart) == 0) {
                        echo '<p>Panier Vide</p>';
                    } else {
                        foreach ($Cart as $elem) {
                            echo '<p>' . ' - ' . $elem['Name'] . ' '. '</p>';
                        }
                    }
                    
                    ?>
                    </div>
                    
                </div>
                <div class="commandes">
                    <a href="order-history.php"><h2>Historique des commandes</h2></a>
                    <div class="zone">
                        <?php
                        $sqlQuery = 'SELECT Name, command_date FROM command INNER JOIN product ON command.Id_product = product.Id_product INNER JOIN invoices ON command.Id_command = invoices.Id_command WHERE Id_user = '. $Id . ' LIMIT 3';
                        $db_lenght = $pdo->prepare($sqlQuery);
                        $db_lenght->execute();
                        $Command = $db_lenght->fetchAll();

                        if (count($Command) == 0) {
                            echo '<p>Aucune commande passée</p>';
                        } else {
                            foreach ($Command as $elem) {
                                echo '<p>' . ' - '  . $elem['Name'] . ' ' . '</p>';
                            }
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
            <div class="droite">
                <div class="img">
                    <img src="../css/img/barage.png" alt="test">
                </div>
                <div class="rectangle">
                <?php
                    echo '<div class="text">';
                    echo '<h2>' . $Username . ' ' . $Lastname . '</h2>';
                    echo '<h2>' . $Email . '</h2>';
                    echo '<h3>'. $Birth . '</h3>';
                    echo '</div>';

                    $sqlQuery = 'SELECT Address, City, Country, Appartement FROM address WHERE Id_user = '. $Id;
                    $db_lenght = $pdo->prepare($sqlQuery);
                    $db_lenght->execute();
                    $Address = $db_lenght->fetchAll();
                    foreach ($Address as $elem) {
                    if ($elem['Address'] != '') {
                        echo '<div class="adress">';
                        if (isset($elem['Appartement']) != '') {
                            echo '<h3>Appartement : ' . $elem['Appartement'] . '</h3>';
                        }
                        echo '<h3>' . $elem['Address'] . '</h3>';
                        echo '<h3>' . $elem['City'] . '</h3>';
                        echo '<h3>' . $elem['Country'] . '</h3>';
                        echo '</div>';
                    }
                    }
                ?>
                </div>
            </div>
        </div>
    </Div>
</body>
</html>