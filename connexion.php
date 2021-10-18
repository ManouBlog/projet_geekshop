<?php

// connection au serveur apache
$conn = mysqli_connect("localhost","root","") or die(mysqli_connect_error($conn));
$selection_db=mysqli_select_db($conn,"geekshop")or die(mysqli_connect_error($selection_db));

if (!$conn) {
    echo "ERROR";
}

?>
