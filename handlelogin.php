<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
          include 'dbconnect.php';
          $email1 = $_POST['loginEmail'];
          $pass1 = $_POST['loginPass'];

          $sql =  "SELECT * FROM `users` WHERE user_email ='$email1'";
          $result = mysqli_query($conn, $sql);
          $numRows = mysqli_num_rows($result);
          if($numRows==1)
          {
                    $row = mysqli_fetch_assoc($result);
                    
                              if(password_verify($pass1, $row['user_pass']))
                              {
                                        echo "Successfully login";
                                        session_start();
                                        $_SESSION['loggedin'] = true;
                                        $_SESSION['Sno'] = $row['Sno'];
                                        $_SESSION['useremail'] = $email1;
                                       echo "logged in ".$email1;
                                        header("Location: index.php");
                                       exit();
                              }
                              else
                              {
                                        header("Location: index.php");
                              }

                    }
                    header("Location: index.php");
          }
?>
