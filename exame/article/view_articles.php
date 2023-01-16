<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
?>

<?php
$select="SELECT * FROM article ";
$row=mysqli_query($conn,$select);
?>

</table>

<div >
<table class="table table-dark">


<?php foreach($row as $data){ ?>
    <tr>
    <td>Title</td>
    <td><?=$data["title"]?></td>
    </tr>

    <tr>
    <td>Description</td>
    <td><?=$data["descreption"]?></td> 
    </tr>

    <tr>
    <td>Image</td>
    <td><img src="<?=$data["image"]?> " width="100" alt=""></td>
    </tr>

    <td>Create Time</td>
    <td><?=$data["create_time"]?></td> 

    

    <tr>
    <td>Auther</td>
    <td><?=$data["auther"]?></td>
    </tr>
  
   <tr>
   <td>PROFILE</td>
   <td><img src="<?=$data["image_profile"]?> " width="100" alt=""></td>
   </tr>

<tr>
  <?php  if(isset($_SESSION["admin"])){?>
<td>
<a class="btn btn-danger" href="./delete.php/?delete=<?=$data['id']?>">DELETE</a>
 <a class="btn btn-success"  href="./update.php?edit=<?=$data['id']?>"> UPDATE </a>
</td>
 <?php } ?>
    
   
</tr>
<?php } ?>

</table>