<?php
session_start();

// connection au serveur apache
include "connexion.php";
 if (session_start()) {
     session_destroy();
     header('location:connecter.php');
 }