    <!-- <?php
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
        }
   if($password==$cpassword){
       $hash = password_hash($password,PASSWORD_DEFAULT);
       $sql = "INSERT INTO `user` (`sr no.`, `name`, `email`, `password`, `dt`) VALUES (NULL, '$user', '$email', '$hash', current_timestamp())";
       $result = mysqli_query($conn,$sql);
       if($result){
           $show = true;
       }
    //    else{
    //        $showalert = true;
    //     }
        
    }else{
        $showalert = true;

   }

    }



?>   -->


   <!-- Button trigger modal -->
   <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signup">
  signup modal
</button> -->

   <!-- Modal -->



   <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="signupLabel">Signup</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">

                   <form action="/forum/partials/handlesignup.php" method="POST">
                       <div class="form-group">
                           <label for="user">user name</label>
                           <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">

                       </div>
                       <div class="form-group">
                           <label for="email">Email address</label>
                           <input type="email" class="form-control" id="email" name="email"
                               aria-describedby="emailHelp">
                           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                               else.</small>
                       </div>
                       <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="password" id="password">
                       </div>
                       <div class="form-group">
                           <label for="cpassword">confirm Password</label>
                           <input type="password" class="form-control" name="cpassword" id="cpassword">
                       </div>



               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">SignUp</button>
               </div>

               </form>

           </div>
       </div>
   </div>