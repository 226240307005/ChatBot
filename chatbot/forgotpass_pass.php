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
        height: 50%;
        border: 2px solid blue;
    }
  </style>
  </head>
  <body>
    <center>
        <br>
    <nav>
    
        <br><br>
    <form action="" method="post">
        <div class="col-md-6">
         <div class="input-group mb-4">
                <div class="input-group-text">@</div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
        </div>

     <div class="col-md-6">
        <div class="input-group mb-4">
            <div class="input-group-text">*</div>
            <input type="password" class="form-control" name="newpassword" id="pass" placeholder="New password" required minlength="8" maxlength="8">
        </div>
    </div>


    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">*</div>
            <input type="password" class="form-control" name="confpassword" placeholder="Confirm password" required>
        </div>
    </div>
<br><br>
    <div class="col-md-6 form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>

</form>
<br>
</nav>
</center>
   <?php


    if (isset($_POST['submit'])) {
        include 'db_conn_chatbot.php';
        $uname = $_POST['username'];
        $newpass = $_POST['newpassword'];
        $confpass = $_POST['confpassword'];

        if ($newpass == $confpass) {
            $check_username_query = "SELECT * FROM signup WHERE username='$uname'";
            $check_username_result = mysqli_query($conn, $check_username_query);
            if (mysqli_num_rows($check_username_result) == 0) {
                echo "<div class='alert alert-danger' role='alert'>Username does not exist!</div>";
                exit();
            }

            $update_signup = "UPDATE signup SET password= '$confpass' WHERE username='$uname'";
            $sqlupdate1 = mysqli_query($conn, $update_signup);

            $update_login = "UPDATE login SET password= '$confpass' WHERE username='$uname'";
            $sqlupdate2 = mysqli_query($conn, $update_login);

            echo "<div class='alert alert-success' role='alert'>Updated successfully!!</div>";
            echo "<a href='index.php' class='btn btn-success'>Login</a>";
            mysqli_close($conn);
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Password does not match!!</div>";
        }
    }
    

?>
    
    <script src="js//bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>