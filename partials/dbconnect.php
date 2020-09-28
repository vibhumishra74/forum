<?php

// connecting data base
$servername = "localhost";
$user = "root";
$password = "";
$database = "idiscus";

$conn = mysqli_connect($servername,$user,$password,$database);

if(!$conn){
//     echo "connection successful";
// }else{
    echo "not connected".mysqli_connect_error($conn);
 }



?>