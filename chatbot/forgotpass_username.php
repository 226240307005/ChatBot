<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="css//bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <style>
        form {
            padding-top: 10px;
            padding-bottom: 20px;
        }

        div.form-group {
            padding-top: 20px;
        }
    </style>
</head>
<body class="container">
<center>
    <form action="forgotpass_otp.php" method="post">
        <div class="col-md-6 form-group">
            <div class="input-group">
                <div class="input-group-text">@</div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
        </div>
        <div class="col-md-6 form-group">
            <input type="submit" class="btn btn-primary" name="submituser" value="Submit">
        </div>
    </form>
</center>


<script src="js//bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
