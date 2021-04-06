<?php 

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'admin') {
    echo 'Welcome'." ". $_SESSION['UserLogin']. '<br> <br>';
}else {
    echo header('Location: ./index.php');
}

$id =  $_GET['ID'] ?? '';

include_once("./connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list WHERE id='$id'";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();

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


<a href="./edit.php?ID=<?php echo $row['id']?>">Edit</a>
<a href="./delete.php?ID=<?php echo $row['id']?>">Delete</a>
<br><br>
<label> FullName:</label>
<h2>
<?php echo $row['first_name'] ?> <?php echo $row['last_name']  ?>
</h2>
<label>Birthday: </label>
<h2>
<?php echo $row['birth_day']  ?> 
</h2>
<label>gender:</label>
<h2>
<?php echo $row['gender'] ?>
</h2>



</body>
</html>

