<?php
function test()
{
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
	//$name=$POST['Name'];
	$sql = "INSERT INTO signup (Name, Email , Passwd, Contact , City ,Address) VALUES ('sfhjf',  'peterparker@mail.com','12345','7','Delhi','gzb')";
	if(mysqli_query($conn, $sql)):
		echo "Records inserted successfully.";
	else:
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	endif;
endif;
}
?> 