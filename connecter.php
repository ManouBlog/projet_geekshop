<?php
session_start();
$msg_error="";
$msg_pass_error="";
// connection au serveur apache
include "connexion.php";

   // Verifier si le boutou submit est enfoncer
if (isset($_POST['submit'])) {
  

    $user = $_POST['user'];
    $query = "SELECT user FROM geekshop_users WHERE user='$user'";
    $result = mysqli_query($conn,$query);
          // Verifier si l'utilisateur est dans la base de donnee. 
    if ($row_num = mysqli_num_rows($result) > 0) {

        $pass = $_POST['pass'];
        $query_pass = "SELECT pass FROM geekshop_users WHERE pass='$pass'";
        $result_pass = mysqli_query($conn,$query_pass);

          // Verifier si le mot de passe est le meme que ce que l utilisateur a entree. 
        if ($row_num_pass = mysqli_num_rows($result_pass) > 0) {
            header('location:bord.php');
            $_SESSION['nom']=$user;
        }else {
            $msg_pass_error="le mot de passe est incorrect";
        }
    }else {
        $msg_error="vous n'etes pas fichier";
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
    margin-bottom: 2em;
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
    margin-top: 2em;
}
.form_inscription{
    margin-top: 3em;
}
.form_inscription span {
    font-size: 1.3em;
    font-weight: bold;
}
.form_inscription span a{
    text-decoration: none;
    color: #D50041;
}
.msg{
    color: #D50041;
    text-align:center;
}
.msg_pass{
    color: #D50041;
}
    </style>
</head>
<body>
    <h1>GEEKSHOP</h1>
    <div class="msg">
      <span>
      <?php  echo $msg_error;  ?>
      </span>
    </div>
    <div class="content">
        <h1 class="titre_content">Se Connecter</h1>
        <form action="" method="post">
            <div>
            <input class="input"  type="text" name="user" id="user"placeholder="Nom Utilisateur"> 
            </div>
           <div>
           <i class="fas fa-low-vision" id="view"></i>
           <input class="input"  type="password" name="pass" id="pass"placeholder="Mot De Passe"> 
           </div>
           <span class="msg_pass">
                <?php echo $msg_pass_error; ?>
            </span>
            <div class="form_submit">
            <input type="submit" value="ENTREE" name="submit">
            </div>
        </form>
        <div class="form_inscription">
            <span>Pas un compte ?</span>
            <span><a href="inscription.php">Inscription</a></span>
        </div>

    </div>
    <script>
        let btn=document.getElementById("view");
        let input =document.getElementById("pass");
        btn.addEventListener("click",function () {
            if (input.type == "password") {
        input.type="text";
    }else{
        input.type="password";
    }
        })
    </script>
</body>
</html>