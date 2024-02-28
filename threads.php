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
          


          <?php 
          $id = $_GET['catid'];
          $sql = "SELECT * FROM `categories` WHERE categories_id=$id";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $catname = $row['categories_name'];
            $catdesc = $row['categories_description'];
          }

          ?>

          <?php 
          $showAlert = false;
          $method = $_SERVER['REQUEST_METHOD'];
          if($method == 'POST')
          {
            //insert into thread db
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
// <script>
//             $th_title = str_replace("<", "$th_title","$lt;");
//             $th_title = str_replace(">", "$th_title", "$gt;");

//             $th_desc = str_replace("<", " $th_desc", "$lt;");
//             $th_desc = str_replace(">", " $th_desc", "$gt;");
// </script>
            $sn = $_POST['sno'];
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`)
             VALUES ('$th_title', '$th_desc', '$id', '$sn', '2021-08-02 07:02:37.000000')";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert)
            {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong>  Your thread has been added! Please wait for community to respond.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
            }
          }
          ?>


          <!-- Category container start here -->
          <div class="container my-4">
                    <div class="jumbotron">
                              <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
                              <p class="lead"><?php echo $catdesc; ?>
                              </p>
                              <hr class="my-4">
                              <p>This is a peer to peer forum.
                              Forum Rules
No Spam / Advertising / Self-promote in the forums is not allowed.Do not post copyright-infringing material.
Do not post “offensive” posts, links or images.
Do not cross post questions.
Do not PM users asking for help. 
Remain respectful of other members at all times
                              </p>
                              <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
                    </div>
          </div>

<?php
        if(isset($_SESSION['loggedin'])  &&   $_SESSION['loggedin'] == true)
        {  
         echo ' <div class="container">
         <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
            <h1>Start a Discussion</h1>
<div class="form-group">
  <label for="exampleInputEmail1">Problem Title</label>
  <input type="text" class="form-control" id="title" name="title" aria-describedby="titleee" placeholder="Enter Problem">
  <small id="titlee" class="form-text text-muted">Keep your title as short and crisp as possible</small>
</div>
<input type="hidden" name="sno" value="'.$_SESSION["Sno"].'">
<div class="form-group">
  <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
  <textarea class="form-control" id="description" name="desc" rows="3"></textarea>
</div>
<button type="submit" class="btn btn-success">Submit</button>
</form></div>';
}
else 
{
  echo '<div class="container">
  <h1>Start a Discussion</h1>
  <p class="lead"> You are not loged in. Please login to be able to start a Discussion</p>
</div>';
}
?>


          <div class="container my-3 mb-5">
                    <h1>Browse questions</h1>

                    <?php 
          $id = $_GET['catid'];
          $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
          $result = mysqli_query($conn, $sql);
          $noResult =  true;
          while($row = mysqli_fetch_assoc($result))
          {
            $noResult = false;
              $id = $row['thread_id'];
              $title = $row['thread_title'];
              $desc = $row['thread_description'];
              $thread_time = $row['timestamp'];
              $thread_user_id = $row['thread_user_id'];
              $sql2 = "SELECT user_email FROM `users` WHERE Sno='$thread_user_id'";
              $result2 = mysqli_query($conn,$sql2);
              $row2 = mysqli_fetch_assoc($result2);


                    echo '<div class="media">
  <img src="d1.jpg" width="64" class="mr-3" alt="...">
  <div class="media-body">'. 
    '<h5 class="mt-0"><a class="text-dark" href="thread.php?threadid='.$id.'">'. $title. '</a></h5>
    '.$desc.'</div>'.'<p class="font-weight-bold">Asked by:  '.$row2['user_email'].   'at '.$thread_time.'</p>'.
'</div>';

}

//echo var_dump($noResult);
          if($noResult)
          {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Threads Found</h1>
              <p class="lead">Be the first person to ask a question.</p>
            </div>
          </div>';
          }
?>





          </div>


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