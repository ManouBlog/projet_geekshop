
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEEKSHOP</title>
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
.content_bouton form input[type="submit"]{
    width: 120px;
    height: 40px;
    border: none;
    background-color: rgb(17, 4, 202);;
    color: white;
    font-weight: bold;
    font-size: 1.2em;
    border-radius:5px;
    cursor: pointer;
}
.content{
    width: 80%;
    margin: 1em auto;
}
.content h2{
    font-size:2em;
}
table{
    margin: auto;
}
.content_bouton form {
    text-align: right;
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
    padding:1em;
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
.btn{
    text-decoration:none;
}
.editer{
    background: black;
    color:white;
    padding:.5em 1em;
}
.delete{
    background: red;
    color:black;
    padding:.5em 1em;
}

    </style>
</head>
<body>
   <header>
   <h1>GEEKSHOP</h1>
   <button><a href="bord.php">Accueil</a></button>
   </header>

    <div class="content">
        <h2 style="text-align:center;">Catalogue de tous les produits</h2>
    <table>
        <tr>
            <th>Reference</th>
            <th>Libelle</th>
            <th>Quantite_minimale</th>
            <th>Quantite_stock</th>
            <th colspan="2" style="background:crimson;">Action</th>
        </tr>
        
            <?php
              // connection au serveur apache
    include "connexion.php";

            $sql= "SELECT * FROM produit";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                $nombre = 1;
                while ($row=mysqli_fetch_assoc($result)) {
                    $reference = $row['reference'];
                    $libelle = $row['libelle'];
                    $quantite_minimale = $row['quantite_minimale'];
                    $quantite_stock = $row['quantite_en_stock'];
                    ?>
                    <tr>
                        <td><?php echo $nombre++; ?></td>
                        <td><?php echo $libelle; ?></td>
                        <td><?php echo $quantite_minimale; ?></td>
                        <td><?php echo $quantite_stock; ?></td>
                        <td> <a class="btn editer" href="editer.php?reference=<?php echo $reference;?>">Editer</a></td>
                        <td> <a class="btn delete"  href="delete.php?reference=<?php echo $reference;?>">Supprimer</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
    </table>
    <div class="content_bouton">
       <form action="ajouter.php" method="post">
           <input type="submit" value="AJOUTER">
       </form>
    </div>
 
   </div>
</body>
</html>