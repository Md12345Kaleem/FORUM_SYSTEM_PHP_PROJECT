<!doctype html>
<html lang="en">

<head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                    crossorigin="anonymous">
                   
          <title>welcome to iDiscuss - Coding Forum</title>
</head>

<body>

<?php include 'dbconnect.php'; ?>
         
<?php include 'header.php'; ?>


          <!-- slider start from here -->

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                              <div class="carousel-item active">
                                        <img src="https://source.unsplash.com/2400x700/?apple,code"
                                                  class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                        <img src="https://source.unsplash.com/2400x700/?programmers,microsoft"
                                                  class="d-block w-100" alt="...">
                              </div>
                              <div class="carousel-item">
                                        <img src="https://source.unsplash.com/2400x700/?coding,apple"
                                                  class="d-block w-100" alt="...">
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

          <!-- Category container start here -->
          <div class="container my-3">
                    <h1 class="text-center">iDiscuss - Browse Categories</h1>
                    <div class="row">

                              <!-- Fetch all the categories -->

                              <!-- Use a loop to iterate through categories -->
                              <?php
                     $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                     while($row = mysqli_fetch_assoc($result))
                     {
                      // echo $row['categories_id'];
                      $id = $row['categories_id'];
                      $cat = $row['categories_name'];
                      $disc = $row['categories_description'];

                     echo '<div class="col md-4 my-2">
                      <div class="card" style="width: 18rem;">
                                <img src="https://source.unsplash.com/500x400/?'.$cat.',coding"
                                          class="card-img-top" alt="...">
                                <div class="card-body">
                                          <h5 class="card-title"><a href="threads.php?catid='.$id.'">'.$cat.'</a></h5>
                                          <p class="card-text">'.substr($disc, 0,90).'....</p>
                                          <a href="threads.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                                      </div>
                                    </div>
                                 </div>';
                     }
                     ?><br></div></div>

          <?php include 'footer.php'; ?>



          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                    crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>
</body>

</html>