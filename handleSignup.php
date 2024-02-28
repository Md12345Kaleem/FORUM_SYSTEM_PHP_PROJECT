<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=="POST")
{
          include 'dbconnect.php';
          $email = $_POST['signupEmail'];
          $pass = $_POST['signupPassword'];
          $cpass = $_POST['signupcPassword'];
          


          // Check whether this email exists
           $existSql = "SELECT * FROM `users` WHERE user_email ='$email'";
          $result = mysqli_query($conn,$existSql);
          $numRow = mysqli_num_rows($result);
          if($numRow)
          {
                    $showError = "Email is already in use";
          }
          else 
          {
                    if($pass == $cpass)
                    {
                              $hash = password_hash($pass,PASSWORD_DEFAULT);
                              $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`)
                               VALUES ('$email', '$hash', current_timestamp())";
                               $result = mysqli_query($conn, $sql);
                               if($result)
                               {
                                         $showAlert = true;
                                         echo "Success";
                                       header("Location:/forum/index.php?signupsuccess=true");
                                        exit();
                               }
                    }
                    else
                    {
                              $showError = "Password do not match";
                              
                    }
          }
          header("Location:/forum/index.php?signupsuccess=false&error=$showError");
}
?>