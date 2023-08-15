<?php 

	$username = "root";
    $password = "";
    $database = "rdstore";
    $hostname = "localhost";
    $con = mysqli_connect($hostname,$username,$password,$database) or die("Connection Corrupt");

    header('Content-Type: application/json')

?>