<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
include '../general/functions.php'
?>
<?php
auth(1,2);
if(isset($_POST["go"])){
$name=$_POST["name"];
$email=$_POST["email"];
$password =$_POST["password"];
$year=$_POST["year"];
$phone=$_POST["phone"];
$salary=$_POST["salary"];
$age=$_POST["age"];
$address=$_POST["address"];

$password=sha1($password);
    $fname=time().$_FILES["image"]["name"];
    $temp_name=$_FILES["image"]["tmp_name"];
    $direct='../upload/'.$fname;
    move_uploaded_file($temp_name,$direct);

    $insert="INSERT INTO lawyer VALUES (null,'$name',$age,'$address',$salary,$year,
    '$phone','$email','$password','$direct')";
    $r=mysqli_query($conn,$insert);

//if($r)echo true;
  header('Location:/EXAME/lawyer/read.php');

}


?>




<div class="form">

<div  class="container col-6">
    
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group ">
      <label for="" >lawer name</label>
        <input type="text" class="form-control" name="name" >
      </div>
      <div class="form-group">
      <label for="">lawyer age</label>
        <input type="text" class="form-control" name ="age">
      </div>
      <div class="form-group">
      <label for="">lawyer address</label>
        <input type="text" class="form-control"  name ="address">

      </div>
      <div class="form-group">
      <label for="">lawyer phone</label>
        <input type="text" class="form-control"  name ="phone">

      </div>
      <div class="form-group">
      <label for="">upload photo</label>
      <input type="file" name="image">
      </div >

         <div class="form-group">
      <label for="">lawyer salary</label>
        <input type="text" class="form-control"  name ="salary">

      </div>
      <div class="form-group">
      <label for="">lawyer password</label>
        <input type="password" class="form-control"  name ="password">

      </div>
      
    
      <div class="form-group">
      <label for="">lawyer email</label>
        <input type="text" class="form-control"  name ="email">

      </div>
      <div class="form-group">
      <label for="">year EX</label>
        <input type="text" class="form-control"  name ="year">

      </div>
    
     
      <button type="submit" class="btn btn-primary " name="go">Submit</button>
    </form>
    
    </div>
    
  
    
    </div>
    </div>
