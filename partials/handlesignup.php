<?php
   $show = false;
   $showalert = false;
   $exits = false;

    if($_SERVER["REQUEST_METHOD"]=="POST"){
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
        $email = $_POST["email"];
        $user = $_POST["user"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
        $sqlexist = "SELECT * FROM `user` WHERE `name` = '$user'";
        $usercheck = mysqli_query($conn,$sqlexist);
        $row = mysqli_num_rows($usercheck);
        if($row>0){
          $exits = true;
          header("location: /forum/stsrt.php");
        }
   if($password==$cpassword){
       $hash = password_hash($password,PASSWORD_DEFAULT);
       $sql = "INSERT INTO `user` (`sr no.`, `name`, `email`, `password`, `dt`) VALUES (NULL, '$user', '$email', '$hash', current_timestamp())";
       $result = mysqli_query($conn,$sql);
       if($result){
           $show = true;
           header("location: /forum/stsrt.php");
       }
    //    else{
    //        $showalert = true;
    //     }
        
    }else{
        $showalert = true;
        header("location: /forum/stsrt.php");
   }

    }



?>


<?php 
  if($show)
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>successfully!</strong> your account has been created login to continue...!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
   

  ?>
    <?php 
  if($showalert)
   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>sorry!</strong> Your password donot match please try again ...
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';

  ?>

    <?php 
  if($exits)
   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>sorry!</strong> user already exist. Please try with different user name.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';

  ?>