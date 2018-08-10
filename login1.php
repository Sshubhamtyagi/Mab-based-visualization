<?php
$servername = "localhost";
$username = "root";
$password = "";
$name="qwert";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$name);

// Check connection
if (! $conn):
	die('could not connect ' . mysqli_error($conn)  );
else:
	session_start();
	//echo "dvhd";
	//if($_SERVER["REQUEST_METHOD"]=="POST"):
		//$_POST['Email]="sdkjbsdfdsvhjdv";
                      //$_POST['password']="djfshd";
	$myus=mysqli_real_escape_string($conn,$_POST['Email']);
	$mypwd=mysqli_real_escape_string($conn,$_POST['password']);
	$sql = "SELECT * FROM signup WHERE Email = '$myus' and passwd='$mypwd'";
	$result=mysqli_query($conn,$sql);
	//echo $result;
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo $row['Name'] ."    " .  $row['City'];
	//echo "vdjv"; 
	$count = mysqli_num_rows($result);
	echo $count;
	if($count==1):
		//session_register("myus");
		$_SESSION['login_user']=$myus;
		//echo $_SESSION['login_user'];
		header("location: welcome.php");
	else:
		echo "not valid";
	endif;
endif;
?> 