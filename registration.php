
<!DOCTYPE html>
<html>
<head>
	<title>registration form</title>
</head>
<style>
body{
 margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-image: url("regi.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
.registration-box{
	width: 280px;
	position: absolute;
	top: 40%;
	left: 50%;
	transform: translate(-50%,-50%);
}
</style>
<body>
	<div class="registration-box">
	<h1>Registration Form</h1>
	<form method="POST" action="" enctype="multipart/form-data">
		<label>Username</label>
		<input type="text" name="username"><br><br>
		<label>Email</label>
		<input type="text" name="email"><br><br>
		
		<label>ProfileImage</label><br><br>
		<input type="file" name="image"><br><br>
        <label>Password</label>
		<input type="password" name="password1"><br><br>
		<label>Confirm password</label>
		<input type="password" name="password2"><br><br>

		<input type="submit" name="submit" value="registration">

	</form>

	<?php
	//Make a connection
	$conn=mysqli_connect('localhost','root','','disease');
	if(!$conn){
		echo "connection failed";
	}

	if(isset ($_POST['submit'])){
		//declare variables who hold data from the form fields
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password1'];
		$confirompassword=$_POST['password2'];
		$dater= date('y-m-d');
		if($password==$confirompassword){// check if password are the same




		$imagepath=$_FILES['image']['tmp_name'];
	
		 $password=md5($password);

		 if($imagepath){

		 	$binary =fread(fopen($imagepath, 'r'),filesize($imagepath));//see the content of the image
		 	$picture =base64_encode($binary);//convert image into base64

		 	//echo $picture;// display base64 image for checking
		 	//insert data into table
		 	$insert=mysqli_query($conn,"INSERT INTO user(username, email, password, image, dater) VALUES ('$username','$email','$password','$picture','$dater')");
		 	if($insert){// if the query has been executed
		 		echo"good";
		 		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./login.php')";
		 		echo "</script>";


		 	}
		 	else{
		 		echo ("error".mysqli_error($conn));//if the query didn't worked
		 	}

		 }
		 else{
		 	echo "choose your image profile";// if no image selected
		 }

}
}else{
	echo "password not the same";// if password are not the same
}


?>


</div>
</body>
</html>
