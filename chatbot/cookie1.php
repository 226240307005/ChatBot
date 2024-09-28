<?php
$c=setcookie("username","yk bhavsar hello",time()+60);
if($c)
{
	echo "set";
}
else
{
	echo "destroy";
}
?>