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
          <style>
                    #maincontainer{
                              min-height: 82vh;
                    }
                    </style>
</head>

<body>

<?php include 'dbconnect.php'; ?>
<?php include 'header.php'; ?>

  <!-- search result -->

  <div class="container my-3 id="maincontainer">
  <h1 class="py-3">Search results for <em>"<?php echo $_GET['search'] ?>"</em></h1>

<?php
$noresults = true;
$query = $_GET["search"];
$sql = "SELECT * FROM threads where match (thread_title, thread_description) against ('$query')";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
          $title = $row['thread_title'];
          $desc = $row['thread_description'];
          $thread_id=$row['thread_id'];
          $url = "threads.php?threadid=".$thread_id;
          $noresults = false;
          //Display the search result 
          echo '<div class="result">
          <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
          <p>'.$desc.'</p> </div>';
}
if($noresults)
{
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <p class="display-4">No Results Found</p>
  <p class="lead">Suggestions:<ul>
  <li>Make sure that all words are spelled correctly.</li>
  <li>Try different keywords.</li>
  <li>Try more general keywords.</li></ul></p></div></div>';
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