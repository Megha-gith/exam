<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<div class="login-box">
	<form method="POST" action="post.php" enctype="multipart/form-data">
<table width="50%" height="60%" bgcolor="808080" align="center">

<tr>
<td colspan=2><center><font size=8><b>Login</b></font></center></td>
</tr>
		<tr>
<td>Email:</td>
<td><input type="email" size=45 name="email"></td><br><br>
</tr>

<tr>
<td>Password:</td>
<td><input type="Password" size=45 name="pwd"></td><br><br>
</tr>

<tr>
<td><input type="submit" value="Login" style="background-color: #b4b4b4; width: 90px; height: 40px;"></td>
</tr>

</table>

	</form>

	<?php
	//Make connection
	$conn=mysqli_connect('localhost','root','','disease');
	if(!$conn){
		echo "connection failed";
	}

	if(isset ($_POST['submit'])){
		// create variables to store values from form
		$email=$_POST['email'];
		$password=md5($_POST['password1']);
		//select some information inside table
		$select=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password'");
		$number=mysqli_num_rows($select);// get number of result
		
		if($select){
			//echo "good";
			if($number==1){
				session_start();
				$userinfo=$select->fetch_assoc();
				$userid=$userinfo['id'];
				$_SESSION['id']=$userid;
				echo "<script language='Javascript'>";
		 		echo "document.location.replace('./page.php')";
		 		echo "</script>";
			}
			else{
				echo "wrong password";
			}

		}

		else{
		 		echo ("error".mysqli_error($conn));
		 	}
}

?>
</body>
</html>