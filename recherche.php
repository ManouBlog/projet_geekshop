
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <title>Recherche</title>
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
    align-items:center;
    padding:1em 2em;
}
h5{
    text-align: center;
    margin-bottom: -1em;
    margin-top:1em;
    font-size: 1em;
    color:crimson;
}
form{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 2em 0;
}
table{
    width:80%;
    margin:2em auto;
}

table,th,td{
 border:1px solid gray;
 border-collapse:collapse;
 padding: 0 2em;
 text-align:center;
 font-weight:bold;
}
th{
    text-transform:uppercase;
    background:rgb(24, 24, 202);
    color:white;
    padding:1em;
    
}
td{
    padding:.5em;
}
.content{
    position: relative;
    height:100vh;
}
.content form input[type="search"]{
    width: 500px;
    height: 50px;
    border: 1px solid gray;
    outline: none;
    padding-left:2.5em;
    font-size: 1.3em;
}

.content form input[type="submit"]{
    width: 120px;
    height: 50px;
    border: none;
    outline: none;
    background-color: rgb(0, 0, 0);
    color: #dc0047;
    font-weight: bold;
    font-size: 1.3em;
    cursor: pointer;
}
div{
    position: relative;
}
i{
    position: absolute;
    left: .2em;
    top: 25%;
    font-size: 1.5em;
}
.msg_error,.msg{
    text-align:center;
    font-weight:bold;
    font-size:2.5em;
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
td a{
    text-decoration:none;
}
.editer a{
    background: #000;
    padding:.4em 1.5em;
    color:white;
    font-weight:bold;
}
.delete a{
    background:red;
    padding:.4em 1.5em;
    font-weight:bold;
    color:black;
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
   <h1>RECHERCHE UN PRODUIT</h1>
    <button><a href="bord.php">Accueil</a></button>
   </header>
<div class="content">
<h5>Recherche par nom de produit(ex:bière) ou tape Recherche pour afficher tous les produits</h5>
    <form action="" method="get">
        <div>
        <input type="search" name="recherche" id="recherche"placeholder="Recherche Produit">
        <i class="fas fa-search"></i>
        </div>
     <div>
     <input type="submit" name="submit" value="recherche">
     </div>
    </form>
   
    <table>
        <tr>
            <th>reference</th>
            <th>libelle</th>
            <th>quantite_minimale</th>
            <th>quantite_stock</th>
            <th colspan="2" style="background:crimson;">action</th>
        </tr>
        <?php 
        // connection au serveur apache
            include "connexion.php";
            $msg_error="";
            $msg="";

        if (isset($_GET['submit'])) {
            $libelle = $_GET['recherche'];
            $sql = "SELECT * FROM produit WHERE libelle LIKE '%$libelle%' ";
            $query = mysqli_query($conn,$sql) or die (mysqli_connect_error());
        
            if (mysqli_num_rows($query) > 0) {
              $count = 1;
              while ($row=mysqli_fetch_assoc($query)) {

                $reference = $row['reference'];
                $libelle = $row['libelle'];
                $quantite_minimale = $row['quantite_minimale'];
                $quantite_stock = $row['quantite_en_stock'];
                ?>
                  <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $libelle; ?></td>
                        <td><?php echo $quantite_minimale; ?></td>
                        <td><?php echo $quantite_stock; ?></td>
                        <td class="editer"> <a  href="editer.php?reference=<?php echo $reference;?>">Editer</a></td>
                        <td class="delete"> <a  href="delete.php?reference=<?php echo $reference;?>">Supprimer</a></td>
                    </tr>
                <?php
                       
              }
              $msg ="Resultat du Mot: ".$libelle;
            } else {
                $msg_error =$libelle." n'existe pas dans la base de Donnée.";
            }
            
        }
        
        ?>
        <p class="msg"> 
            <?php
            echo $msg;
            ?>
        </p>
        <p class="msg_error">
           <?php
            echo  $msg_error;
            ?>
        </p>

    </table>
    <footer>
        <p>GEEKSHOP@2021</p>
    </footer>
   
</div>
 
</body>
</html>