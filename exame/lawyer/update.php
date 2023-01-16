
<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
include '../general/functions.php'
?>






<?php
auth(1,2);
if(isset($_GET['edit'])){
  $id=$_GET['edit'];
  $sel="SELECT * FROM lawyer WHERE id=$id";
  $update=mysqli_query($conn,$sel);
  $table=mysqli_fetch_assoc($update);

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

    $update="UPDATE lawyer SET (`name`='$name',age=$age,`address`='$address',salary=$salary,
    yearEX=$year,phone='$phone',email='$email',`pass`='$password',image='$direct')";
    $r=mysqli_query($conn,$update);
  //  print_r($_FILES);

//if($r)echo true;
  //header('Location:read.php');

}
}
?>

<div class="form">

<div  class="container col-6">
    
    <form method="POST" enctype="multipart/form-data">
      
      <div class="form-group ">
      <label for="" >lawer name</label>
        <input type="text" class="form-control" name="name" value="<?=(isset($table['name']))?
        $table['name']:""?>" >
      </div>


      <div class="form-group">
      <label for="">lawyer age</label>
        <input type="text" class="form-control" name ="age" value="<?=(isset($table['age']))?
        $table['age']:""?>">
      </div>


      <div class="form-group">
      <label for="">lawyer address</label>
        <input type="text" class="form-control"  name ="address" value="<?=(isset($table["address"]))?
        $table["address"]:""?>" >
      </div>

      <div class="form-group">
      <label for="">lawyer phone</label>
        <input type="text" class="form-control"  name ="phone" value="<?=(isset($table["phone"]))?
        $table["phone"]:""?>">
      </div>


      <div class="form-group">
      <label for="">Profile Photo</label>
      <img src="<?=$table["image"]?>" alt="" width =100>
     <input type="file" name="image"> 
      </div >


         <div class="form-group">
      <label for="">lawyer salary</label>
        <input type="text" class="form-control"  name ="salary" value="<?=(isset($table["salary"]))?
        $table["salary"]:""?>">
      </div>


      <div class="form-group">
      <label for="">lawyer password</label>
        <input type="password" class="form-control"  name ="password" value="<?=(isset($table["pass"]))?
        $table["pass"]:""?>">
      </div>
      
    
      <div class="form-group">
      <label for="">lawyer email</label>
        <input type="text" class="form-control"  name ="email" value="<?=(isset($table["email"]))?
        $table["email"]:""?>">
      </div>

      
      <div class="form-group">
      <label for="">year EX</label>
        <input type="text" class="form-control"  name ="year" value="<?=(isset($table["yearEX"]))?
        $table["yearEX"]:""?>">
      </div>
    
     
      <button type="submit" class="btn btn-primary " name="go">Submit</button>
    </form>
    
    </div>
    </div>
