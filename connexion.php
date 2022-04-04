<?php
session_start(); 
$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8;', 'root', '');
if(isset($_POST['valider'])) {
    if(!empty($_POST['pseudo'])){

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $recupUser ->execute(array($_POST['pseudo']));

        if($recupUser->rowCount() > 0){

            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: index.php');

        }else{
            echo "Aucun utilisateur trouvé";
        }

    }else{
        echo "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-insc.css">
    <title>Document</title>
</head>
<body>
    <h1>Se connecter</h1><hr>
    <form action="connexion.php" method="post">
        <?php
            if(isset($erreur)) echo "<h3>$erreur</h3>";
        ?>
        <input type="text" name="pseudo" placeholder="Pseudo :">
        <input type="password" name="mdp" placeholder="Mot de passe :">
        <input type="submit" value="Connexion" name="valider"><br><br>
    </form>
</body>
</html>