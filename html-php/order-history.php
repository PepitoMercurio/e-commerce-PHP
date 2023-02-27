<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stlnav.php" />
    <link rel="stylesheet" href="../css/stlorder.php" />
    <title>Barrage</title>
</head>
<body>
    <div class="container">
        <nav>
			<a href="product-list.php" class="logo" id="logo">Barrage</a>
			<ul>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="product-list.php" class="nav-link">Accueil</a></li>
                    
                </a></li>
			</ul>
		</nav>
        <div class="cadre">
            <div class="sous">
            <h2>Mes commandes</h2>
            </div>
            <?php
            session_start();
            $Id = $_SESSION["ID"];
            $connectedUserId = 50;

            $pdo = new PDO('sqlite:e-commerce-SQL.db');

            $sqlQuery = 'SELECT command_date, Name, Price, Image FROM invoices INNER JOIN command ON invoices.Id_command = command.Id_command INNER JOIN product ON product.Id_product = command.Id_product INNER JOIN photo ON product.Id_photo = photo.Id_photo WHERE command.Id_user = ' . $Id . ' ORDER BY command_date DESC';
            $db_lenght = $pdo->prepare($sqlQuery);
            $db_lenght->execute();
            $result = $db_lenght->fetchAll();

            foreach ($result as $test) {
                    echo '<p>' . ' - ' . $test['command_date'] . " " . $test['Name'] . " " . $test['Price'] . " " . '</p>';
            }

            ?>
        </div>
    
    </div>

</body>
</html>