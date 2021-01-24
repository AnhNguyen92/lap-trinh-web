<?php
// $db = mysqli_connect("localhost","root","","examples");
// //$db = mysqli_connect("http://192.168.64.3/","root","","examples");
// if(!$db)
// {
//     die("Connection failed: " . mysqli_connect_error());
// }
    $username = "root";
    $password = "";
    $servername = "localhost";
    $dbname = "examples";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>