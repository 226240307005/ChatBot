<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BotGuru</title>
    <link href="css//bootstrap.min.css" rel="stylesheet" >
<link rel="stylesheet" href="css_chatbot.css">
</head>
<body>
<br><br>
	<center>
<header>
<p>ChatGuru</p>	
</header>
<div>
	<br>
	
	<br>
	<br>
	<?php
        $user = isset($_POST['user']) ? $_POST['user'] : '';

if(!empty($user))
 {
	echo '<span class="responsive">';
	echo printuser();
	echo '</span>';
   
}
?>
<?php
$user = isset($_POST['user']) ? $_POST['user'] : '';



if($_SERVER['REQUEST_METHOD']=="POST" )
{
include 'db_conn_chatbot.php';

$submit=$_POST['submit'];
if ($submit) {

    
    if (empty($user)) {
    	
    	echo '<center>';
      
         echo "<main>";

        	 echo '<div class="message-box2">';
                  echo '<div class="thinking-icon2"></div>';
                echo '<span><strong>ChatGuru:</strong>Ask me Something!! What can i help you ? </span>';
                      echo '</div>';
             echo '</main>';
            echo '</center>';
        
    } else {
        $select = "SELECT bot FROM commands WHERE user LIKE lower('%$user%') LIMIT 1";
        $result = mysqli_query($conn, $select);

        if ($result && mysqli_num_rows($result) > 0) {
        	echo '<center>';
        	
            while ($row = mysqli_fetch_assoc($result)) {
            	      
                    while(!empty($user))
                {
                  echo '<span>';
            	 printchatbot($row);
            	echo '</span>';
                break;
                  }
                     

               
            }

            
            echo '</center>';
        } else {
        	
        	$insert="INSERT INTO commands (user) VALUES ('$user')";
             $sql=mysqli_query($conn,$insert);
 
        	echo '<center>';
        	echo '<main>';
        	 echo '<div class="message-box2">';
                  echo '<div class="thinking-icon2"></div>';
                echo '<span><strong>ChatBot:</strong>Sorry!! I can not Understand? But i got it and I work on it to Know More about </span>';
                echo '<b style="font-size:30px";>';
                echo "$user";
                echo '</b>';
                      echo '</div>';
            
             echo '</main>';
            echo '</center>';
        }
    }

}
    
}


?>


<nav class="mb-3">
	
	
		<form action="<?php $_PHP_SELF ?>" method="post"> 
			<div class="input-group mb-3">
  <input type="text" name="user"class="form-control" placeholder="Your Input..." aria-label="Your Input...." aria-describedby="button-addon2">
  <input class="btn btn-primary" type="submit" name="submit" id="button-addon2" value="➜">




  <br>
  <br>
</div>
</form>


</nav>
</div>
</center>


<?php
function printuser()
{
	$user = isset($_POST['user']) ? $_POST['user'] : '';

    echo '<div class="message-box1">';
  echo '<div class="thinking-icon1">';
  echo '</div>';
  echo '<strong style="float:right;">:You</strong>'. $user ;
echo '</div>';
}
	

function printchatbot($row) {
   
    echo '<div class="message-box2">';
    echo '<div class="thinking-icon2"></div>';
    echo '<strong style="float:left;">ChatBot:</strong><br>';
    echo $row['bot'];
    echo '</h6>';
    echo '</div>';

}


?>




<script src="js//bootstrap.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
