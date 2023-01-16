<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
?>
<?php
if(isset($_SESSION["admin"])){
  //echo 1;
  $emal=$_SESSION["admin"];
$select="SELECT * FROM `admin` WHERE email='$emal'";
$row=mysqli_query($conn,$select);
//if($row) echo 3;
$row=mysqli_fetch_assoc($row);
}


else if(isset($_SESSION["lawyer"])){
  $emal=$_SESSION["lawyer"];
  $select="SELECT * FROM `lawyer` WHERE email='$emal'";
$row=mysqli_query($conn,$select);
//if($row) echo 3;
$row=mysqli_fetch_assoc($row);
}


if(isset($_POST["go"])){
 // echo 2;
    $title=$_POST["title"];
    $description=$_POST["description"];
    $auther=$row["name"];
    $img_prof=$row["image"];
        $fname=time().$_FILES["image"]["name"];
        $temp_name=$_FILES["image"]["tmp_name"];
        $direct='../upload/'.$fname;
        move_uploaded_file($temp_name,$direct);
    
        $insert="INSERT INTO `article` VALUES (null,'$title','$description',null,'$auther',
        '$direct','$img_prof')";
        $r=mysqli_query($conn,$insert);
        if($r)echo 1;
    }
    
    
    ?>
    
    
    <div class="form">
    
    <div  class="container col-6">
        
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group ">
          <label for="" >title</label>
            <input type="text" class="form-control" name="title" >
          </div>
          <div class="form-group">
          <label for="">description</label>
            <input type="text" class="form-control" name ="description">
          </div>
       

          <div class="form-group">
          <label for="">upload photo</label>
          <input type="file" name="image">
          </div >
    
          <button type="submit" class="btn btn-primary " name="go">Submit</button>
        </form>
        
        </div>
        
      
        
        </div>
        </div>
    