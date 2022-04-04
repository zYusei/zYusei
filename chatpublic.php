<?php
$id = mysqli_connect("127.0.0.1","root","","chat");
if(isset($_POST["bout"])){
    if(!isset($_POST["message"]) || $_POST["message"]==""){
        $erreur2 = "Veuillez entrer votre message!.";
    }
    if(isset($_POST["message"]) && $_POST["message"]!=""){
        $message = mysqli_real_escape_string($id,$_POST["message"]);
        $req = "insert into messages values (null,'-','$message',now())";
        mysqli_query($id,$req);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <header>
            <h1>Chattez'en direct! Chatbox</h1>
        </header>
        <div class="messages">
            <ul>
                <?php
                
                $req = "select * from messages order by date desc";
                $res = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($res)){ 
                echo "<li class='message'>".$ligne["date"]." - " 
                                            .$ligne["pseudo"]." - "
                                            . $ligne["message"].". </li>";
                }
                ?>
            </ul>
        </div>
        <?php if(isset($erreur1)) echo "<div class='erreur'>$erreur1</div>";?>
        <?php if(isset($erreur2)) echo "<div class='erreur'>$erreur2</div>";?>
        <div class="formu">
            <form action="" method="post">
                <input type="text" name="message" placeholder="Entrez votre message :">
                <br>
                <input class="bout" type="submit" value="Envoyer" name="bout">
            </form>

        </div>
    </div>
</body>
</html>