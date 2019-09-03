 <style>


  .header {
  background-color: #00e50f;
  padding: 10px;
  width: 100%;
  display: flex;
  flex-flow: row;
  justify-content: space-between;

}
</style>
<div class="header">
<a href="index.php">HOME</a> |<a href="post.php">PUBLISH</a>| <a href="getid.php">MANAGE PUBLICATION</a> |  <a href="logout.php">LOGOUT</a><br><br></div>
	<?php
	//Check if there a session create
	session_start();
	if(isset($_SESSION['id'])){
		
		$userid=$_SESSION['id'];
		$conn=mysqli_connect('localhost','root','','disease');
	if(!$conn){
		echo "connection failed";
	}
//if session created get user name and profile image
	$select=mysqli_query($conn,"SELECT * FROM user WHERE id='$userid'");
		$number=mysqli_num_rows($select);
		$userinfo=$select->fetch_assoc();
		$username=$userinfo['username'];
		$image=$userinfo['image'];
		$email=$userinfo['email'];
		echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
		echo "<br>";
		echo "<h3>Hello ".$username."</h3>";


	}
	else{
		//if no session created
		echo "<script language='Javascript'>";
		 		echo "document.location.replace('./login.php')";
		 		echo "</script>";
	}

	?>
