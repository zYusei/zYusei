<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8;', 'root', '');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les utilisateurs sur le site</title>
</head>
<body>
    <h2>A qui voulez-vous envoyer un message ?</h2>
    <?php
    $recupUser = $bdd->query('SELECT * FROM users');
    while($user = $recupUser->fetch()){
        ?>
        <a href="chatprivé.php?id=<?php echo $user['id']; ?>">
            <p><?php echo $user['pseudo']; ?></p>
        </a>
        <?php
    }
    ?>
    <a href="/chat/chatpublic.php">Public Chat</a>


</body>
</html>