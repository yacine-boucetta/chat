
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="script.js"></script>
    <script src="script2.js"></script>
    <title>Document</title>
</head>
<body>
    <header style="width:100%;">

        <nav>
            <?php
            if (!isset($_SESSION['user'])) {
                echo "<a href='Index.php'>Home</a>&nbsp";
                echo "<a href='SignUp.php'>inscription</a>&nbsp";
                echo "<a href ='SignIn.php'> connexion </a>";
            } else {
                echo "<a href='Index.php'>Home</a>&nbsp";
                echo "<a href='Profil.php'>Profil</a>&nbsp";
                echo "<a href='Discord.php'>Discord</a>&nbsp";
                echo "<a href='Disconnect.php'>Deconnexion</a>&nbsp";
                if ($_SESSION['user']['id_droit'] == 2) {
                    echo "<a href='Admin.php'>Admin</a>";
                }
            } ?>

        </nav>
    </header>