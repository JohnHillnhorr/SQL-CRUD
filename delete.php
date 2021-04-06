<?php 

include_once("./connections/connection.php");

$con = connection();

$id =  $_GET['ID'];






if(isset($_POST['submit'])){
  $sql = "DELETE FROM student_list
  WHERE id = '$id'";
   $con->query($sql) or die($con->error);
  
    echo header("Location: index.php");
    
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<form action="" method="post">
<h2 style="color: red;">You sure you wan't to delete this?</h2>
<h2>Once you delete this data it will be deleted forever</h2>
<input type="submit" name='submit' value="Delete">
</form>

</body>
</html>
