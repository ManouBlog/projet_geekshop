<?php

   // connection au serveur apache
    include 'connexion.php';

    $reference = $_GET['reference'];
    $sql = "DELETE FROM produit WHERE reference ='$reference'";
    $result = mysqli_query($conn,$sql);

    if ($result) {
       header('location:produit.php');
    }else {
        echo "error";
    }


?>