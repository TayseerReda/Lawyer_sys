<?php

include '../general/environment.php';
include  '../shared/header.php';
include '../shared/nav.php';
include '../shared/footer.php';
include '../general/functions.php'
?>

<?php
auth(1,2);
$select="SELECT * FROM lawyer ";
$row=mysqli_query($conn,$select);
?>

</table>

<div >
<table class="table table-dark">


<?php foreach($row as $data){ ?>
    <tr>
    <td>ID</td>
    <td><?=$data["id"]?></td>
    </tr>
    <tr>
    <td>NAME</td>
    <td><?=$data["name"]?></td> 
    </tr>
    <tr>
    <td>SALARY</td>
    <td><?=$data["salary"]?></td>
    </tr>
    <tr>
    <td>PHONE</td>
    <td><?=$data["phone"]?></td>
    </tr>
   <tr>
   <td>EMAIL</td>
    <td><?=$data["email"]?></td>
   </tr>
   
   <tr>
   <td>ADDRESS</td>
   <td><?=$data["address"]?></td>
   </tr>
   <tr>
   <td>AGE</td>
   <td><?=$data["age"]?></td>
   </tr>
   <tr>
   <td>YEAR EX</td>
   <td><?=$data["yearEX"]?></td>
   </tr>
    
   <tr>
   <td>PROFILE</td>
   <td><img src="<?=$data["image"]?> " width="100" alt=""></td>
   </tr>
<tr>
    <td>
     <a class="btn btn-info"  href="./view_lawyer_article.php?id=<?=$data['id']?>"> View lawyer's article </a>
     <a class="btn btn-danger" href="./delete.php/?delete=<?=$data['id']?>">DELETE</a>
      <a class="btn btn-success"  href="./update.php?edit=<?=$data['id']?>"> UPDATE </a>
    </td>
   
</tr>
<?php } ?>

</table>