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
	$Name=$_POST['Name'];
        $ema=$_POST['email'];
        $pwd=$_POST['password'];
        //$pwd1=PASSWORD_HASH($pwd,PASSWORD_DEFAULT);
        $cont=$_POST['contact'];
        $city=$_POST['city'];
        $addre=$_POST['address'];
        if($Name==""||$ema==""||$pwd==""||$cont==""||$city==""||$addre==""):
            echo "fill all fields";
        else:
            ini_set('SMTP','mysmpserver');
	 ini_set('smtp_port',25);
            $ema=filter_var($ema, FILTER_SANITIZE_EMAIL);
            $ema= filter_var($ema, FILTER_VALIDATE_EMAIL);
            if(!$ema):
                echo "invalid email";
            else:
	     $sql = "SELECT * FROM signup WHERE Email = '$ema' ";
	     $result=mysqli_query($conn,$sql);
	     $count = mysqli_num_rows($result);
	     if($count==0):

                	$sql = "INSERT INTO signup (Name, Email , Passwd, Contact , City ,Address) VALUES ('$Name','$ema','$pwd','$cont','$city','$addre')";
                	if(mysqli_query($conn, $sql)):
                    		echo "Records inserted successfully.";
                	else:
                    		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                	endif;
                //echo "You Have succesfuuly registered , Check your mail.";
	      else:
		echo "Email is already registered";
	      endif;
            endif;
        endif;
            
	
endif;

?> 