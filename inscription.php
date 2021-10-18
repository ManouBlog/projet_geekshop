<?php
session_start();
$msg_success="";
$msg_error="";
$msg_pass_error="";
$msg_error_input="";
// connection au serveur apache
include "connexion.php";

// verification pour inserer les donnees dans la base de donnée
if (isset($_POST['submit'])) {
    
    $nom = htmlspecialchars($_POST['nom']);
    $prenom =htmlspecialchars($_POST['prenom']);
    $user =htmlspecialchars($_POST['user']);
    $pass =htmlspecialchars($_POST['pass']);
    $cpass =htmlspecialchars($_POST['cpass']);
    $_SESSION['nom']=$nom;
    
    
// verification pour savoir si les inputs sont vides
    if (!empty($nom && $prenom && $user && $pass && $cpass )) {

        $pass =htmlspecialchars($_POST['pass']);
        $cpass =htmlspecialchars($_POST['cpass']);
        // verifie si les mots de passe sont les memes et insere tes donnees.
        if ($pass === $cpass ) {

            $sql = "INSERT INTO geekshop_users (nom,prenom,user,pass,cpass) VALUES ('$nom','$prenom','$user','$pass','$cpass')";
            $query = mysqli_query($conn,$sql);
           if ( $query ) {$msg_success="Inscription Reussie";}else {$msg_error="Non Connecter";}
        }
        else {
            $msg_pass_error="Mot De Passe Incorrect";
        }
    }else {
        $msg_error_input="Tous les champs doivent etre renseignés";
    }
}


?>




<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <title>Inscription</title>
    <style>
        *,*::after,*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #020407;
    color: white;
}
.content{
    text-align: center;
}
.content h1{
    font-size:3em;
    margin-bottom: .5em;
}
form{
    width: 50%;
    margin: auto;
    padding:0 3em;
}
form .input{
    width: 100%;
    height: 50px;
    margin-bottom: 1em;
    outline: none;
    padding-left: 2em;
    font-size: 1em;
    font-weight: bold;
}
form div{
    position: relative;
}
form div i{
    position: absolute;
    color: black;
    right: 0em;
    top: 10%;
    font-size: 2.3em;
    cursor: pointer;
}
::placeholder{
    font-size: 1.5em;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.form_submit{
    text-align: right;
}
form input[type="submit"]{
    width: 120px;
    height: 30px;
    font-size: 1.5em;
    font-weight: bold;
    border: none;
    cursor: pointer;
    border-radius: 3px;
}
.form_se_connecter{
    margin-top: 3em;
}
.form_se_connecter span {
    font-size: 1.3em;
    font-weight: bold;
}
.form_se_connecter span a{
    text-decoration: none;
    color: #D50041;
}
.msg{
    text-align:center;
}
.msg span,.msg_error{
    color: #D50041;
}
    </style>
</head>
<body> 
    <h1>GEEKSHOP</h1>
    <div class="msg">
    <span >
            <?php
            echo $msg_success;
            ?>
        </span>
    </div>
    <div class="msg">
    <span>
            <?php
            echo $msg_error_input;
            ?>
        </span>
    </div>
        
       
    <div class="content">
        <h1 class="titre_content">Inscription</h1>
        <form action="" method="post">
            <div>
            <input class="input" type="text" name="nom" id="nom" placeholder="Nom" value="<?php 
            if(isset($_POST['submit'])){
                echo htmlspecialchars($_POST['nom']);
            }
            ?>">
            </div>
            <div>
            <input class="input"  type="text" name="prenom" id="prenom"placeholder="Prénoms" value="<?php 
            if(isset($_POST['submit'])){
                echo htmlspecialchars($_POST['prenom']);
            }
            ?>">
            </div>
            <div>
            <input class="input"  type="text" name="user" id="user"placeholder="Nom Utilisateur"  value="<?php 
            if(isset($_POST['submit'])){
                echo htmlspecialchars($_POST['user']);
            }
            ?>"> 
            </div>
           <div>
           <i class="fas fa-low-vision"></i>
           <input class="input"  type="password" name="pass" id="pass"placeholder="Mot De Passe" > 
           </div>
          
           <div>
           <i class="fas fa-low-vision"></i>
           <input class="input"  type="password" name="cpass" id="cpass"placeholder="Confirmation Mot De Passe"> 
           </div>
           <span class="msg_error">
            <?php
            echo $msg_pass_error;
            ?>
           </span>
            <div class="form_submit">
            <input type="submit" value="ENTREE" name="submit">
            </div>
        </form>
        <div class="form_se_connecter">
            <span>Déjà un compte ?</span>
            <span><a href="connecter.php">Se connecter</a></span>
        </div>

    </div>
    <script>
        let btn=document.getElementByClassName("btn");
        let input =document.getElementById("pass");
        
     
    </script>
</body>
</html>