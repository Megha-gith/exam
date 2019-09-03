<!DOCTYPE html>
<html>
<head>
	<title>Disease</title>
  <link rel="stylesheet" type="text/css" href="http://wowslider.com/sliders/demo-42/engine1/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/gallery.css">
<link rel="stylesheet" href="css/pagination.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    <style>


  .header {
  background-color: #666;
  padding: 10px;
  width: 100%;
  display: flex;
  flex-flow: row;
  justify-content: space-between;

}

.header img{
  width: auto;
  height: 90px;
  margin-left: 4%;
  font-color:#FFFFFF;
}
.head{
  font-size: 20px;
  color:white;
  padding: 20px;
  text-decoration: none;
  display: flex;
  flex-flow: row;

}

.container{
  font-size: 30px;
  padding: 20px;
  text-decoration: none;
  display: flex;
  flex-flow: row;
}

div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

</style>
</head>

<body>

  <div class=header>
  <div class="logo">
  <img src="images.jpeg" class="logo_header">
  </div>
      
 <div class="head">
    Helpline : +91 8892 555 000<br><br>
    Email : meghapatil@gmail.com

</div>
  </div>
    <div class = "container">

<a href="login.php">Login</a>|<a href="registration.php">Registration</a><br>
</div>
<div id="wowslider-container1">
<div class="ws_images"><ul>
<li><img src="maxresdefault.jpg" title="disease" ></li>
<li><img src="images (2).jpeg" alt="disease" title="disease" ></li>
<li><img src="images (7).jpeg" alt="disease" title="disease" ></li>
<li><img src="images (4).jpeg" alt="disease" title="disease" ></li>
<li><img src="images (9).jpeg" alt="disease" title="disease" ></li>
<li><img src="images (8).jpeg" alt="disease" title="disease" ></li>
</ul></div></div>


<?php
    $conn=mysqli_connect('localhost','root','','disease');
	if(!$conn){
		echo "connection failed";
	}

//select all

	$perpage = 6;
          if(isset($_GET["page"])){
          $page = intval($_GET["page"]);
          }else {
          $page = 1;
          }
          $calc = $perpage * $page;
          $start = $calc - $perpage;
          $result = mysqli_query($conn, "SELECT * FROM postinfo ORDER BY id DESC  Limit $start, $perpage");
          $rows = mysqli_num_rows($result);

          if($rows){
          $i = 0;
        while($your_post = mysqli_fetch_assoc($result)) {
    	$id=$your_post['id'];
    	$title=$your_post['title'];
    	$image=$your_post['image'];
    	$content=$your_post['content'];
    	$content = substr($content,0,30).'...';
    	$link="article.php?id=".$id;

    echo' <div class="gallery">';
    echo' <div class="desc"><h3>'.$title.'</h3></div>';
   echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
 echo' <div class="desc">'.$content.'</div>';
 echo"<br>";
 echo'<a href="'.$link.'">Read More</a>';
echo '</div>';
    }


   

    
 
      }else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }
	?>
    <br><br>
    

</div>
<center>
<?php
//page number footer
    if(isset($page)){
    $result = mysqli_query($conn,"select Count(*) As Total from postinfo");
    $rows = mysqli_num_rows($result);
    if($rows){
    $rs = mysqli_fetch_assoc($result);
    $total = $rs["Total"];
    }
    $totalPages = ceil($total / $perpage);
    if($page <=1 ){
    //echo "<span id='page_links' style='font-weight: bold;'>&laquo;</span>";
    }else{
    $j = $page - 1;
    echo "<a href='index.php?page=$j'>&laquo;</a>";
    }
    for($i=1; $i <= $totalPages; $i++){
    if($i<>$page){
      echo "<a href='index.php?page=$i'>$i</a>";
    }
    else
    {
      echo "<a href='index.php?page=$i' class='active'>$i</a>";
    }
  }
  if($page == $totalPages )
  {
//echo "<span id='page_links' style='font-weight: bold;'>&raquo;</span>";
  }else{
    $j = $page + 1;
    echo "<a href='index.php?page=$j'>&raquo;</a>";
    }
    }
    ?>
  </center>
</body>
</html>