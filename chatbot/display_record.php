<html>
<head>
    <style>
        
    </style>
</head>
<body>
<?php
$host="localhost";
$uname="root";
$pass="";
$db="chatbot";

$conn=mysqli_connect($host,$uname,$pass,$db);

if($conn)
{
	

    $sql2="SELECT *FROM commands";
    $show=mysqli_query($conn,$sql2);

    echo "<table border='2px'>";
    echo "<tr><th>user</th> <th>ChatBot</th></tr>";
    while($row=mysqli_fetch_assoc($show))
    {
          echo "<tr border='1px'>";
    	echo "<td>".$row['user']."</td>"."<br>";
    	
    	echo "<td>".$row['bot']."</td>"."<br>";
        echo "</tr>";

    }
    echo "</table>";

}
?>
</body>
</html>