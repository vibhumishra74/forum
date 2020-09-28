<?php
$login2 = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
  // include "dbconnect.php";
  $servername = "localhost";
  $user = "root";
  $password = ""; 
  $database = "idiscus";
 $conn = mysqli_connect($servername,$user,$password,$database);
 if(!$conn){
 //     echo "connected signup";
 // }else{
     echo "not connected sign up".mysqli_connect_error($conn);
 }

     $username = $_POST['username'];
     $password = $_POST['password'];
     
     $sql = "SELECT * FROM `user` WHERE name = '$username'";
     $result = mysqli_query($conn,$sql);
     $rownum = mysqli_num_rows($result);
     if($rownum == 1){
     while($row = mysqli_fetch_assoc($result)){

       if(password_verify($password,$row['password'])){
         $login2 = true;
         session_start();
         $_SESSION['login'] = true;
         $_SESSION['sr no.'] = $row['sr no.'];
         $_SESSION['username'] = $username;
         echo "login done".$username;
         if($login2){
          
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>successfully!</strong> login.!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
           
         }
         header("location: /forum/stsrt.php");

       }
       else{
        if(!$login2)
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>error!</strong> try  login again.!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
         header("location: /forum/stsrt.php");
       }
     }
    }header("location: /forum/stsrt.php");
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>