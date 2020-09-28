<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Discuss</title>
    <style>
    #ques {
        min-height: 443px;
    }
    </style>
</head>

<body>
    <?php include "../partials/dbconnect.php"; ?>
    <?php include "../partials/header.php" ;  ?>
    <?php 
$id = $_GET["threadid"];
  $noresult = true;
 $sql = "SELECT * FROM `threads` WHERE thread_id = '$id'";
 $result = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_assoc($result)) {
     $noresult = false;
     $title = $row["thread_title"];
     $desc = $row["thread_desc"];
     $time = $row["timestamp"];
     $thread_user_id = $row["thread_user_id"];

     $sql2 = "SELECT * FROM `user` WHERE `sr no.` = '$thread_user_id'";
     $result2 = mysqli_query($conn,$sql2);
     $row2 = mysqli_fetch_assoc($result2);
     $posted_by = $row2['name'];
     
 }
?>




    <div class="container my-3">
        <h1 class="text-center my-3">Categories</h1>
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title;?> </h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum for sharing knowledege with each other
                No Spam / Advertising / Self-promote in the forums is not allowed
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Do not PM users asking for help.
                Remain respectful of other members at all times.</p>
            <p>posted by<em> <?php echo $posted_by; ?> </em> at <?php echo $time;?> </p>

        </div>
    </div>
    
<?php
if(isset($_SESSION['login']) && $_SESSION['login']==true){
   echo '<div class="container">
        <h1 class="py-2">post a comment</h1>

        <form action="'.$_SERVER['REQUEST_URI'].' " method="POST">

            <div class="form-group">
                <label for="desc">type your comments</label>
                <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>

                <input type="hidden" name="sno"  class="hidden" value="'.$_SESSION["sr no."].'">
            </div>
            <button type="submit" class="btn btn-success m-4"> Post comment </button>
        </form>


    </div>';
}else{
   echo '<div class="container">
    <h2>login to post a comment</h2>
    </div>';
}
?>
    <div class="container" id="ques">
        <h1 class="py-2">Discussion</h1>


        <?php
  $id = $_GET['threadid'];
 $method = $_SERVER['REQUEST_METHOD'];
//  ECHO $method;
 $showalert1 = false;
 if($_SERVER['REQUEST_METHOD']=='POST'){
  //  inserting data in thread dp 
//   $th_title = $_POST['title'];
  $comment_content = $_POST['desc'];

  $comment_content = str_replace("<","&lt;",$comment_content);
  $comment_content = str_replace(">","&gt;",$comment_content);
  
  $sno = $_POST["sno"];
  $sql = "INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (NULL, '$comment_content', '$id', '$sno', current_timestamp())";
  $result = mysqli_query($conn,$sql);
  $showalert1 = true;
  if($showalert1){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>success!</strong> Your thread has been added! this time:)
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
  }
 }

?>




        <?php 
$id = $_GET["threadid"];

 $sql = "SELECT * FROM `comments` WHERE `thread_id` = '$id'";
 $result = mysqli_query($conn,$sql);
 $noresult = true;
 
 while ($row = mysqli_fetch_assoc($result)) {
     $noresult = false;
     $id = $row["comment_id"];
     $content = $row["comment_content"];
     
     $thread_user_id = $row['comment_by'];
    //  $sql2 = "SELECT `email` FROM `user` WHERE `sr no.` = '$thread_user_id'";
     $sql2 = "SELECT * FROM `user` WHERE `sr no.` = '$thread_user_id'";
     $result2 = mysqli_query($conn,$sql2);
     $row2 = mysqli_fetch_assoc($result2);

   
        

        
     echo  ' <div class="media my-3">
            <img src="./user.png" width ="54px" class="mr-3" alt="user pic">
            <div class="media-body">
            <p class = "font-weight-bold my-0">'.$row2["name"].'</p>
                
               '.$content.'
            </div>
        </div>';
    }
    ?>

        <?php
      

      if($noresult){
        echo 
        '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <p class="display-4">No Reply found </p>
          <p class="lead">Be the 1st persone to reply</p>
        </div>
      </div>';
      }
       ?>


    </div>





    <?php include "../partials/footer.php" ;  ?>
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