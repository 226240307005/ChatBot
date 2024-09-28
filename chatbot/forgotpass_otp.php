<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="css//bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
  <style>
      nav{
        width: 50%;
        padding-top: 20px;
        height: 50%;
        border: 3px solid royalblue;

      }
      div{
        padding-left: 20px;
        padding-right: 20px;
      }
  </style>
  </head>
  <body>
    <center>
        <br>
        <nav>
    <form action="" method="post">
    <div class="input-group ">
                <div class="input-group-text"></div>
                <input type="number" class="form-control" name="otp" placeholder="Authentication" required>
            </div><br>
    <div class="col-md-6 form-group">
            <input type="submit" class="btn btn-primary" name="submitotp" value="Submit">
        </div>
        </form>
        <br>
    </nav>
    </center>
   <?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    include 'db_conn_chatbot.php';

    if (isset($_POST['submituser'])) {
       
        $random = rand(100000, 500000);
        $_SESSION['rotp'] = $random; 

        
        $uname =  $_POST['username'];

       
        $email_query = "SELECT email FROM signup WHERE username='$uname'";
        $email_result = mysqli_query($conn, $email_query);
        $row = mysqli_fetch_assoc($email_result);

        if ($row) {
            $mailid = $row['email'];

        
            $gmail = mail($mailid, "Authentication", "OTP is: $random This is a one-time password", "From:bhavsaryash823@gmail.com");
            if ($gmail) {
                echo "<script>alert('Check your Email..')</script>";
            } else {
                echo "<script>alert('Somthing Went Wrong!! Please check your Internet connection!!');</script>";
                
                exit();
            }
        } else {
            echo "No email found for the provided username.";
        }
    }

    if(isset($_POST['submitotp'])) {
        $user_otp = $_POST['otp'];

        if (isset($user_otp) && isset($_SESSION['rotp'])) {
            $stored_otp = $_SESSION['rotp'];

            if ($user_otp == $stored_otp) {
                header("Location: forgotpass_pass.php");
                exit; 
            } else {
                echo "<script>alert('Incorrect OTP!')</script>";
            }
        } else {
            echo "Invalid OTP"; 
        }
    }

    mysqli_close($conn); 
}
?>


    
    <script src="js//bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>