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
          $id = $_GET['threadid'];
          $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $title = $row['thread_title'];
            $desc = $row['thread_description'];
            $thread_user_id = $row['thread_user_id'];
          
            //Query the users table to find out the name of op
            $sql2 = "SELECT user_email FROM `users` WHERE Sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_email'];
            

        }
          
          ?>


<?php 
          $showAlert = false;
          $method = $_SERVER['REQUEST_METHOD'];
          if($method == 'POST')
          {
            //insert into comment db
            $comment = $_POST['comment'];

            // Xss attack security
            // $comment = str_replace("<",  "$lt;", $comment);
            // $comment = str_replace(">",  "$gt;", $comment);
          $sn = $_POST['sno'];
           $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) 
           VALUES ('$comment', '$id', '$sn', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert)
            {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong>  Your thread has been added!
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
                              <h1 class="display-4"> <?php echo $title; ?></h1>
                              <p class="lead"><?php echo $desc; ?>
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
                              <p class="text-left"> Posted by: <em><b><?php echo $posted_by; ?></b></em></p>
                    </div>
          </div>



          <?php
        if(isset($_SESSION['loggedin'])  &&   $_SESSION['loggedin'] == true)
        {  
         echo ' <div class="container">
         <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
            <h1>Post a Comment</h1>

<div class="form-group">
  <label for="exampleFormControlTextarea1">Type your comment</label>
  <textarea class="form-control" id="description" name="comment" rows="3"></textarea>
  <input type="hidden" name="sno" value="'.$_SESSION["Sno"].'">
</div>
<button type="submit" class="btn btn-success">Post Comment</button>
</form></div>';
}
else 
{
  echo '<div class="container">
  <h1>Post a Comment</h1>
  <p class="lead"> You are not loged in. Please login to be able to post Comments</p>
</div>';
}
?>








          <div class="container my-3 mb-5">
                    <h1 class="py-3">Discussions</h1>

                    <?php 
          $id = $_GET['threadid'];
          $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
          $result = mysqli_query($conn, $sql);
          $noResult = true;
          while($row = mysqli_fetch_assoc($result))
          {
            $noResult = false;
               $id = $row['comment_id'];
              $content = $row['comment_content'];
              $comment_time = $row['comment_time'];
              $thread_user_id = $row['comment_by'];
              $sql2 = "SELECT user_email FROM `users` WHERE Sno='$thread_user_id'";
              $result2 = mysqli_query($conn,$sql2);
              $row2 = mysqli_fetch_assoc($result2);
              //$desc = $row['thread_description'];

                    echo '<div class="media">
  <img src="d1.jpg" width="64" class="mr-3" alt="...">
  <div class="media-body">
  <p class="font-weight-bold col2">'.$row2['user_email'].'    at '.$comment_time.'</p> 
    '.$content.'
   </div>
</div>';

}
   
if($noResult)
{
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Comments Found</h1>
    <p class="lead">Be the first person to ask a comment.</p>
  </div>
</div>';
}
 
?>


<!-- Remove later putting this just to check html alignment -->
<!-- <div class="media my-3">
  <img src="d1.jpg" width="64" class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Unable to install Pyaudio error in Windows</h5>
    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
  </div>
</div>




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