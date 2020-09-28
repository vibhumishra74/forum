   <!-- <?php
$login = false;
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
         $login = true;
         session_start();
         $_SESSION['login'] = true;
         if($login){
          
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>successfully!</strong> login.!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
           
         }
        //  header("location: /forum/about.php");

       }
       else{
        if(!$login)
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>error!</strong> try  login again.!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
         
       }
     }
    }
    }

?> -->




<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">
  login modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="/forum/partials/loginhandle.php" method="POST">
  <div class="form-group">
    <label for="username">User name</label>
    <input type="text" class="form-control" id="username" name ="username" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name = "password">
  </div>
 
  <!-- <button type="submit" class="btn btn-primary">Login</button> -->
  
  
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">login</button>
</div>

</form>
    </div>
  </div>
</div>