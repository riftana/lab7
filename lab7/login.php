<?php
	session_start();
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form method="post">
		<table>
			
			<tr>
				<td><b>Email :</b></td>
				<td><input type="text" name="email"/></td>
				
			</tr>
			
			<tr>
				<td><b>Password :</b></td>
				<td><input type="password" name="pass"/></td>
				
			</tr>
			

			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>

		
	</form>
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "onick";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM user WHERE email = '".$_POST["email"]."' and password = '".$_POST["pass"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["email"]=$_POST["email"];
			  $_SESSION["login"]=true;
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>


	<a href="home.php"> back</a>
</body>