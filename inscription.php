<?php 
    
    if(isset($_POST["btn"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $id = mysqli_connect("127.0.0.1","root","","chat");
        $req = "select * from users where pseudo = '$pseudo'";
        $rep = mysqli_query($id, $req);
        $verif = 0;
        if(mysqli_num_rows($rep)>0){
            echo "<h3>Cette utilisateur existe déjà...</h3>";
            $verif = 1;
        }
        if($verif==0){
            $req = "insert into users values 
                (null,'$pseudo','$mdp','$nom','$prenom')";
                $rep = mysqli_query($id, $req);
                echo "Inscription réussie, vous allez être redirigé, veuillez vous connecter...";
                header("refresh:3;url=connexion.php");
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
    <title>Inscription au Chat</title>
</head>
<body>
    <h1>Inscription :</h1>
    <form action="inscription.php" method="post">

        
        <label for="nom">Nom :</label><input type="text" name="nom">

        
        <label for="prenom">Prenom :</label><input type="text" name="prenom">

        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo">

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">

        <input type="submit" name="btn" value="S'inscrire" class="btn">

    </form>
</body>
</html>