<?php

   // connection au serveur apache
    include 'connexion.php';

    if (isset($_POST['submit'])) {

    $libelle = $_POST['libelle'];
    $qt_minimale = $_POST['quantite_minimale'];
    $qt_stock = $_POST['quantite_en_stock'];
    $sql = "INSERT INTO produit (libelle,quantite_minimale,quantite_en_stock)  VALUES ('$libelle','$qt_minimale','$qt_stock')";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        header('location:produit.php');
    }else {
        echo "error";
    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Ajouter</title>
    <style>

*,*::after,*::before{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
header{
    display:flex;
    justify-content:space-between;
    padding: .5em 1em;
    align-items:center;
}
button{
    width: 120px;
    height: 40px;
    border:none;
    background-color: rgb(17, 4, 202);
    border-radius:5px;
  
}
button a{
    text-decoration:none;
    font-size: 1.8em;
    color:white;
    font-weight:bold;
   
}
form .one{
    display: flex;
}
.one div{
    width: 50%;
}

form input{
    width: 200px;
    height: 30px;
    margin:1em 0;
}
.content{
    width: 80%;
    margin: 1em auto;
    padding: 0 3em;
}
.btn{
    cursor: pointer;

    width:150px;
    height: 51px;
    font-size:1.5em;
    padding:.1em 0;
    color:white;
    border:none;
    font-weight:bold;
    background:blue;
    border-radius:5px;
}
.btn_annuler{
    text-decoration:none;
    padding:.398em 1em;
   
}
label{
    font-weight:bold;
}
footer{
    position: absolute;
    bottom: 0em;
    background-color: #3F31FF;
    width:100%;
    padding:1em 0;
    color:white;
    font-weight:bold;
    text-align:center;
    font-size:.8em;
}
    </style>
</head>
<body>
    <header>
    <h1>AJOUTER UN PRODUIT</h1>
   <button><a href="bord.php">Accueil</a></button>
   </header>
   <div class="content">
   <form action="" method="post">
        <div class="one">
            <div> 
                <label for="libelle">Libelle</label><br> 
                <input type="text" name="libelle" id="libelle">
            </div>
            <div> 
                <label for="quantite_minimale">Quantite_minimale</label><br>
                <input type="text" name="quantite_minimale" id="quantite_minimale">
            </div>
        </div>
        <div> 
            <label for="quantite_en_stock">Quantite_stock</label><br>
            <input type="text" name="quantite_en_stock" id="quantite_en_stock">
        </div>
        <div class="btn_div" style="text-align:right;">
        <input class="btn" type="submit" name="submit" value="ok">
        <a class="btn btn_annuler" href="produit.php">ANNULER</a>
        </div>
    </form>

  
   </div>
   <footer>
        <p>GEEKSHOP@2021</p>
    </footer>
</body>
</html>