<?php
include_once "dbconnect.php";
$logincheck = false;
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==true){
  $logincheck = true;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum/stsrt.php">Discuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum/stsrt.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/about.php">about</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      
      $sql = "SELECT categories_name, categories_id FROM `categories` LIMIT 4";
       $result = mysqli_query($conn,$sql);
       while ( $row = mysqli_fetch_assoc($result)) {
         
        
       echo '<a class="dropdown-item" href="/forum/partials/threadslist.php?catid='.$row['categories_id'].'">'.$row['categories_name'].'</a>';
        
        }
         
     echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/contact.php" tabindex="-1" >Contact</a>
    </li>
  </ul>
  <div class="row">

  

 ';
  if($logincheck){
    echo " <span style='padding: 10px;'class ='text-light font-weight-bold'> welcome ".$_SESSION['username']." </span>  ";
   echo '<button class="btn btn-outline-success mx-2">
      <a  href="/forum/partials/logout.php" class="text-decoration-none text-success" >logout</a>
    </button>';
  }
  if(!$logincheck){
   echo '<button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#login"> login </button>
  <button class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#signup"> Signup </button>';
  }
 echo  '</div>
</div>
</nav>';

include "loginmodal.php";
include "signupmodal.php";

?>










