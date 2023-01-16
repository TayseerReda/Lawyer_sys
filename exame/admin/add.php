<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
include '../general/functions.php';
?>
<?php
auth(1);
$select="SELECT * FROM roles ";
$row=mysqli_query($conn,$select);
if(isset($_POST["go"])){
    
$name=$_POST["name"];
$email=$_POST["email"];
$password =$_POST["password"];
$phone=$_POST["phone"];
$ddress=$_POST["address"];
$age=$_POST["age"];
$role=$_POST["role"];

//$password=sah1($password);
$password=$password;
//echo $role;

    $fname=time().$_FILES["image"]["name"];
    $temp_name=$_FILES["image"]["tmp_name"];
    $direct='../upload/'.$fname;
    move_uploaded_file($temp_name,$direct);

    $insert="INSERT INTO `admin` VALUES (null,'$name',$age,'$ddress','$phone','$email','$password','$direct',$role)";
    $r=mysqli_query($conn,$insert);

//if($r)echo "true";
 

}


?>






<div class="form">

<div  class="container col-6">
    
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group ">
      <label for="" >NAME</label>
        <input type="text" class="form-control" name="name" >
      </div>
      <div class="form-group">
      <label for="">AGE</label>
        <input type="text" class="form-control" name ="age">
      </div>
      <div class="form-group">
      <label for="">ADDRESS</label>
        <input type="text" class="form-control"  name ="address">

      </div>
      <div class="form-group">
      <label for="">PHONE</label>
        <input type="text" class="form-control"  name ="phone">

      </div>
      <div class="form-group">
      <label for="">upload photo</label>
      <input type="file" name="image">
      </div >

         <div class="form-group">
      <label for="">EMAIL</label>
        <input type="email" class="form-control"  name ="email">

      </div>
      <div class="form-group">
      <label for="">PASSWORD</label>
        <input type="password" class="form-control"  name ="password">
      </div>

      <div class="form-group">
      <label for="">Role</label>
        <select name="role" id="">
          <?php foreach($row as $data){?>
            
         <option value="<?=$data["id"]?>"><?=$data["description"]?></option>
        <?php  }?>
         
        </select>
      </div>
    
      <button type="submit" class="btn btn-primary " name="go">Submit</button>
    </form>
    
    </div>
    
  
    
    </div>
    </div>
