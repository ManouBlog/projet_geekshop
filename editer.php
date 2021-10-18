<?php

   // connection au serveur apache
    include 'connexion.php';

    $reference = $_GET['reference'];
    $sql = "SELECT * FROM produit WHERE reference ='$reference'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $libelle = $row['libelle'];
        $quantite_minimale=$row['quantite_minimale'];
        $quantite_stock = $row['quantite_en_stock'];
    }


?>

<!DOCTYPE html>
<html lang="fr">
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
    height: 50px;
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
    <h1>EDITER UN PRODUIT</h1>
   <div class="content">
   <form action="action_editer.php" method="post">
        <div class="one">
            <div> 
                <label for="libelle">Libelle</label><br> 
                <input type="text" name="libelle" id="libelle" value="<?php echo $libelle ;?>">
            </div>
            <div>
                <label for="quantite_minimale">Quantite_minimale</label><br>
                <input type="text" name="quantite_minimale" id="quantite_minimale" value="<?php echo $quantite_minimale;?>">
            </div>
        </div>
        <div>
            <label for="quantite_en_stock">Quantite_stock</label><br>
            <input type="text" name="quantite_en_stock" id="quantite_en_stock" value="<?php echo $quantite_stock;?>">
            <input type="hidden" name="reference" value="<?php echo $reference;?>">
        </div>
        <div class="btn_div" style="text-align:right;">
       <input class="btn" type="submit" name="submit" value="ok">
        <a class="btn btn_annuler"  href="produit.php">ANNULER</a>
       </div>
    </form>
   </div>
   <footer>
        <p>GEEKSHOP@2021</p>
    </footer>
</body>
</html>