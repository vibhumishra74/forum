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
    #ques{
      min-height:443px;
    }
    </style>
</head>

<body>
    <?php include "partials/dbconnect.php"; ?>
    <?php include "partials/header.php" ;  ?>


    <!-- show alert start -->
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

    <!-- show alert end -->
    <!-- caresole start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x700/?coding,program,developer,php
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?codeing,program,developer,js
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x700/?coder,code,program,developer,html
" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- caresole end -->

    <div class="container my-3" id="ques">
        <h1 class="text-center my-3">Categories</h1>


        <div class="row" >
            <!-- fetch all categories
            and use loop to itrate -->
            <?php     
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  $id = $row['categories_id'];
                  // echo $row['categories_name'];
                  // echo $row['categories_discription'];
                  
                  $cat = $row['categories_name'];
                  echo '      
                  <div class="col-md-4 my-3 ">
                  <div class="card " style="width: 18rem;">
              <img src="https://source.unsplash.com/500x400/?'.$cat.',coding
                  " class="card-img-top" alt='.$cat.'>
              <div class="card-body">
                  <h5 class="card-title"><a href="./partials/threadslist.php?catid='.$id.'">'.$row['categories_name'].'</a></h5>
                  <p class="card-text">'.substr($row['categories_discription'],0,50).'...</p>
                  <a href="./partials/threadslist.php?catid='.$id.'" class="btn btn-primary">View threads</a>
              </div>
              </div>
              </div>';
                }
                ?>

        </div>
    </div>






    <?php include "partials/footer.php" ;  ?>
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