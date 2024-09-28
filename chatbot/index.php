
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css//bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
<style>
    form{
        padding-top: 2%;
    }
    div{
      padding-top: 20px;
    }
    nav{
        width: 100%;
        height: 50%;
        border: 2px solid royalblue;
        border-radius: 20px;
    }
    header{
        width: 200px;
        height:50px;
        border: 2px solid blue;
        background: black;
        border-radius: 10px;
    }
    p{
        font-size: 30px;
        color: floralwhite;

    }
</style>
</head>
<body class="container">
   <marquee style="background-color: black; border: 1px solid red;"><h2 style="color:azure;">Welcome To ChatGuru ChatBot System</h2></marquee>

<br><br><center>
<header>
<p>Login</p>
</header>
</center>
    <center>
        <br>
        <nav>
<form  action="" method="post">
    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">@</div>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">*</div>
            <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required>
        </div>
    </div>

    
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
            <div class="col">
                <input type="reset" class="btn btn-primary" name="reset" value="Reset">
            </div>
        </div>

    <a href='forgotpass_username.php' class='btn btn-info'>Forgot password</a>
    <a href='signup_chatguru.php' class='btn btn-info'>SignUp</a>

</form><br>
</nav>
</center>

<?php
include 'db_conn_chatbot.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    
    $select_query = "SELECT * FROM login WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $select_query);

    
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
             header("Location:ChatGuru.php");
        }
    } else {
        echo "<br><div class='alert alert-danger' role='alert'>Incorrect Username Or Password!!</div>";

    }
}

mysqli_close($conn);
?>


<script src="js//bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

</script>

</body>
</html>
