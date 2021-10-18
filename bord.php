<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau de bord</title>
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
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:0 2em;
}
.content{
    height:100vh;
}
main{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    justify-items: center;
    align-items:center;
    width: 80%;
    height:70vh;
    margin:1em auto;
    color:white;
}
.catologue_produits{
    background-color: teal;
    width:300px;
    padding:3em;
    text-align:center;
    position: relative;
    
}
.recherche_produit{
    background-color: crimson;
    width:300px;
    padding:3em;
    text-align:center;
}
.modifier_produit{
    background-color: rgb(226, 204, 4);
    width:300px;
    padding:3em;
    text-align:center;
}
.ajouter_produit{
    background-color: rgb(8, 11, 43);
    width:300px;
    padding:3em;
    text-align:center;
}
.catologue_produits a,.recherche_produit a,.modifier_produit a,.ajouter_produit a{
    text-decoration: none;
    color:white;
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
header span{
    margin-left:1em;
    font-weight:bold;
}
header span a{
    text-decoration:none;
    color:darkblue;
}


    </style>
</head>
<body>
 <div class="content">
 <header>
        <h1>GEEKSHOP</h1>
        <div>
            <span>
                <?php echo $_SESSION['nom'];?>
            </span>
            <span>
                <a href="deconnexion.php">se deconnecter</a>
            </span>
        </div>
    </header>
    <main>
        <div class="catologue_produits">
            <a href="produit.php">
                <h1>Catalogue <br> des produits</h1>
            </a>
        </div>
        <div class="recherche_produit">
            <a href="recherche.php">
            <h1>Recherche <br> un produit</h1>
            </a>
        </div>
        <div class="modifier_produit">
           <a href="produit.php">
           <h1>Modifier <br> un produit</h1>
           </a>
        </div>
        <div class="ajouter_produit">
           <a href="ajouter.php">
           <h1>Ajouter <br> un produit</h1>
           </a>
        </div>
    </main>
    <footer>
        <p>GEEKSHOP@2021</p>
    </footer>
 </div>

</body>
</html>