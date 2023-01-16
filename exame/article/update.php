
<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
?>



<?php
if(isset($_GET['edit'])){
  $id=$_GET['edit'];
  $sel="SELECT * FROM article WHERE id=$id";
  $update=mysqli_query($conn,$sel);
  $table=mysqli_fetch_assoc($update);

  if(isset($_POST["go"])){
    // echo 2;
       $title=$_POST["title"];
       $description=$_POST["description"];
       $auther=$_POST["auther"];
       $create_time=$_POST["create_time"];

       $fname=time().$_FILES["image"]["name"];
       $temp_name=$_FILES["image"]["tmp_name"];
       $direct='../upload/'.$fname;
       move_uploaded_file($temp_name,$direct);
   
      $update="UPDATE article SET auther='$auther',title='$title',descreption='$description',
      `image`='$direct',create_time='$create_time'";
     $r= mysqli_query($conn,$update);

    if($r)echo true;
    //header('Location:/EXAME/article/view_articles.php');
       }



}

?>

<div class="form">

<div  class="container col-6">
    
    <form method="POST" enctype="multipart/form-data">
      
    <div class="form-group">
      <label for="">Profile Photo</label>
      <img src="<?=$table["image_profile"]?>" alt="" width =100>
     
      </div >
      <div class="form-group">
      <label for="">Auther</label>
        <input type="text" class="form-control"  name ="auther" value="<?=(isset($table["auther"]))?
        $table["auther"]:""?>">
      </div>

      <div class="form-group ">
      <label for="" >Title</label>
        <input type="text" class="form-control" name="title" value="<?=(isset($table['title']))?
        $table['title']:""?>" >
      </div>


      <div class="form-group">
      <label for="">Description</label>
        <input type="text" class="form-control" name ="description" value="<?=(isset($table['descreption']))?
        $table['descreption']:""?>">
      </div>


      <div class="form-group">
      <label for="">Create Time</label>
        <input type="text" class="form-control"  name ="create_time" value="<?=(isset($table["create_time"]))?
        $table["create_time"]:""?>" >
      </div>

      


      <div class="form-group">
      <label for="">Image</label>
      <img src="<?=$table["image"]?>" alt="" width =100>
     <input type="file"  name="image"> 
      </div >

    
  
      
    
     
      <button type="submit" class="btn btn-primary " name="go">Submit</button>
    </form>
    
    </div>
    </div>
