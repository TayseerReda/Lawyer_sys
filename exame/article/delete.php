
<?php
$con=mysqli_connect("localhost", "root", "", "law_office");
$id=$_GET['delete'];
$del="DELETE FROM article WHERE id= $id ";
mysqli_query($con,$del);

header('Location:/EXAME/article/view_articles.php');