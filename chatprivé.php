<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8;', 'root', '');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $getid = $_GET['id'];
    $recupUser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){
        if(isset($_POST['envoyer'])){
            $message = htmlspecialchars($_POST['message']);
            $insererMessage = $bdd->prepare('INSERT INTO messageprive(message, id_destinataire, id_auteur)VALUES(?,
            ?,?)');
            $insererMessage->execute(array($message, $getid, $_SESSION['id']));
        }
    }else{
        echo "Aucun utilisateur trouvé !";
    }


}else{
    echo "Aucune identifiant trouvé";
}
?>

<?php

if(!isset($_SESSION["pseudo"])){
    header("location:connexion.php");
}
$login = $_SESSION["pseudo"];

$id = mysqli_connect("127.0.0.1","root","","chat");
mysqli_query($id,"SET NAMES 'utf8'");
if(isset($_POST["bout"])){
    if(!isset($_POST["pseudo"]) || $_POST["pseudo"]==""){
        $erreur1 = "Veuillez choisir un destinataire !";
    }
    if(!isset($_POST["message"]) || $_POST["message"]==""){
        $erreur2 = "Veuillez entrer votre message!.";
    }
    if(isset($_POST["pseudo"]) && $_POST["pseudo"]!="" && isset($_POST["message"]) && $_POST["message"]!=""){
        $pseudo = mysqli_real_escape_string($id,$_POST["pseudo"]);
        $message = mysqli_real_escape_string($id,$_POST["message"]);
        
        $req = "insert into messages (id_m,message,date,id_u)
                values (null,'$message',now(),'')";
        mysqli_query($id,$req);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="pragma" content="no-cache" /> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Bienvenue dans le Chat privé <span class="bv"><?php echo $login; ?> </span>!</h1>
        </header>
        <div class="messages">
            <ul>
                <?php
                    $recupMessages = $bdd->prepare('SELECT * FROM messageprive WHERE id_auteur = ? AND id_destinataire = ? OR 
                        id_auteur = ? AND id_destinataire = ?');
                    $recupMessages->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
                    while($message = $recupMessages->fetch()){
                        if($message['id_destinataire'] == $_SESSION['id']){
                            ?>
                            <p style="color:red;"><?= $message['message']; ?></p>
                            <?php
                        }elseif ($message['id_destinataire'] == $getid) {
                            ?>
                            <p style="color:green;"><?= $message['message']; ?></p>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
        <?php if(isset($erreur1)) echo "<div class='erreur'>$erreur1</div>";?>
        <?php if(isset($erreur2)) echo "<div class='erreur'>$erreur2</div>";?>

        <div class="formu">
        <form method="POST" action="">

            <label for="users">Ecrire votre message:</label>


            <textarea name="message" placeholder="Entrez votre message :"></textarea>
            <br/><br/>
            <br>
            <input class="bout" type="submit" name="envoyer">
        </form>
</body>
</html>