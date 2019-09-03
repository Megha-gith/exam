<!DOCTYPE html>
<html>
      <title>form</title>
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>

</head>
<body>
<?php
require 'config.php';
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
    //echo "hello";
  $code=$_POST['code'];
  //echo $code;
 $result=mysqli_query($conn,"SELECT * FROM message WHERE codeg='$code'");
  $rows=mysqli_num_rows($result);
  if ($rows==1) {
  $message=$result->fetch_assoc();
    $id=$message['id'];
    $title=$message['title'];
    $image=$message['image'];
    $content=$message['contentt'];
    $datep=$message['datep'];
    $link=$message['link'];




  }

}
?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
           
              <hr class="my-4">
              <span><p><h4 style="color: red;">subject:</h4></p></span>
              <span><p>Manage  mail  by: <?php echo $name."(".$contact.")"; ?> </p></span>
              <div class="w3-third w3-margin-bottom" style="border:1px solid black;">
                  <?php 

                  if($image){
                  echo "<img src=data:image/jpg;base64,$image width='100%'>";
                }else{
                    echo"There are not image attached to this message";
                }
                  ?> 
                
                </div>
                 <hr class="my-4">
                 <p>Message: <?php echo $msg; ?> </p>
                 <hr class="my-4">
                 <p>Download File: <?php 

                  if(file_exists($code)){

                 if ($handle = opendir($code)) { //---- open directory and read inside
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {// possible to find file 
                            $thefile = $code."/".$entry; //--- the path of the stored file
                            echo "<a href = ".$thefile.">$entry</a>";//---- echo the name offile as a link
                            echo "<br>";
                        }
                    }
                closedir($handle);
              }
            }else{
              echo "No file attached ";
            }


                 ?> </p>
                 <form action="delete.php" method="post">
                  <input type="hidden" name="code" value="<?php echo $code;?>">

                 <button class="btn btn-lg btn-success btn-block text-uppercase" name="submit"type="submit" value="submit">Delete msg</button><BR>
               </form>
              <a href = "index.php"><button class="btn btn-lg btn-success btn-block text-uppercase">HOME</button></a><BR>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php

?>
</body>

<p id = "result"></p>




</body>
</html>
