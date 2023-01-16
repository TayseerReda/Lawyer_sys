<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
?>
<?php
if(isset($_POST["go"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pass=$_POST["password"];
    //$pass=sha1($pass);
    $pass=$pass;
      $select="SELECT * FROM `admin` where `email`='$email' and `pass`='$pass' ";
      $row=mysqli_query($conn,$select);
  
     // if($row)echo "true";
      $num=mysqli_num_rows($row);
    //  echo $num;
      $data=mysqli_fetch_assoc($row);
     if($num==1){
        //  echo "true";
       
       $_SESSION["admin"]=[
        'email'=>$email,
        'role'=>$data['role'],
       ];
       
       
       //echo $_SESSION["admin"];
       
       
      }
    
    else{
      $select="SELECT * FROM `lawyer` where `email`='$email' and pass='$pass'";
      $row=mysqli_query($conn,$select);
  
     // if($row)echo "true";
      $num=mysqli_num_rows($row);
    //  echo $num;
      $data=mysqli_fetch_assoc($row);
     if($num==1){
        //  echo "true";
       
       $_SESSION["lawyer"]=$data["email"];
       //echo $_SESSION["admin"];
       
       
      }
    
    }
 
    
    
}



?>

<div class="form">

<div  class="container col-6">
    
    <form method="POST" >
      <div class="form-group ">
      <label for="" > Name</label>
        <input type="text" class="form-control" name="name" >
      </div>
      <div class="form-group">
      <label for="">email </label>
        <input type="email" class="form-control" name ="email">
      </div>
      <div class="form-group">
      <label for="">Password </label>
        <input type="password" class="form-control" name ="password">
      </div>
    
      <button type="submit" class="btn btn-primary " name="go">login</button>
    </form>
    
    </div>
    </div>
    </div>


