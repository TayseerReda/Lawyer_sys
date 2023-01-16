<?php
include '../general/functions.php'

?>
<?php
auth(1,2);
$con=mysqli_connect("localhost", "root", "", "law_office");
$id=$_GET['delete'];
$del="DELETE FROM lawyer WHERE id= $id ";
mysqli_query($con,$del);

header('Location:/EXAME/lawyer/read.php');