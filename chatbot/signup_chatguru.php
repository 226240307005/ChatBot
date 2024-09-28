<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="css//bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>
    form{
        padding-top: 10%;
        

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
     <marquee><h2>Welcome To ChatGuru ChatBot System</h2></marquee><br><br>
    <center>
<header>
<p>Signup</p>
</header>
</center>
    <nav>

<form class="row g-3" action="" method="post">
    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">@</div>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">*</div>
            <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required minlength="8" maxlength="8">
        </div>
    </div>


    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">.</div>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-text">/</div>
            <input type="date" class="form-control" name="dob" required>
        </div>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Male" required>
        <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Female" required>
        <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="Other" required>
        <label class="form-check-label" for="inlineRadio3">Other</label>
    </div>


    <div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </div>
    <div class="col">
      <input type="reset" class="btn btn-primary" name="reset" value="Reset">
    </div>
    
  </div>
</div>


    <center>
    
    <div class="row" style="padding-top: 24px;">
        <div class="col">
    <a href='index.php'>Alrady have an account!!</a>
</div>
</div>
</center>
</form>
</nav>

<?php
include 'db_conn_chatbot.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    
         
    $check_query = "SELECT * FROM signup WHERE username='$uname'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<br>";
        echo "<div class='alert alert-danger' role='alert'>User already exists Please Login your self!</div>";
        exit();
    }

    
    $insertSignup = "INSERT INTO signup (username, password, email, dob, gender) VALUES ('$uname', '$pass', '$email', '$dob', '$gender')";
    $sqlSignup = mysqli_query($conn, $insertSignup);

    $insertLogin="INSERT INTO login (username,password) VALUES('$uname','$pass')";
    $sqlLogin=mysqli_query($conn,$insertLogin);

    if ($sqlSignup) {
        echo "<br>";
        echo "<div class='alert alert-success' role='alert'>SignUp successfully!!</div>";
        echo "<a href='index.php' class='btn btn-success'>LogIn</a>";
        mysqli_close($conn);
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($conn) . "</div>";
        mysqli_close($conn);
        exit();
    }
}

mysqli_close($conn);
exit();
?>

<script src="js//bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

</script>

</script>
</body>
</html>
