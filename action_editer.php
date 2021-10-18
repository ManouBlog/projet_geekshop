<?php

   // connection au serveur apache
    include 'connexion.php';
    $reference =$_POST['reference'];
    $libelle = $_POST['libelle'];
    $qt_minimale = $_POST['quantite_minimale'];
    $qt_stock = $_POST['quantite_en_stock'];
    $sql = "UPDATE produit SET libelle='$libelle',quantite_minimale='$qt_minimale',quantite_en_stock='  $qt_stock' WHERE reference ='$reference'";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        header('location:produit.php');
    }else {
        echo "error";
    }
?>