<?php 

include_once("./connections/connection.php");

$con = connection();

$id =  $_GET['ID'];


$sql = "SELECT * FROM `student_list` WHERE id = '$id'";
$user = $con->query($sql) or die ($con->error);
$row = $user->fetch_assoc();


$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname']  ?? '';
$birthday = $_POST['birthday']  ?? '';
$gender = $_POST['gender']  ?? '';

if(isset($_POST['update'])){
  $sql = "UPDATE student_list SET first_name = '$firstname', last_name = '$lastname', birth_day= '$birthday', gender='$gender' WHERE id = '$id'";
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
        <label>FirstName</label>
        <input type="text" name='firstname' id='firstname' value="<?php echo $row['first_name'] ?>">
        <label>Lastname</label>
        <input type="text" name="lastname" id='lastname' value="<?php echo $row['last_name'] ?>">
        <label> Birthday</label>
        <input type="date" name='birthday' id='birthday' value="<?php echo $row['birth_day'] ?>">
        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == 'Male')? "selected": ""; ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == 'Female')? "selected": ""; ?>>Female</option>
        </select>


        <input type="submit" name='update' value='Update'>






    </form>

</body>
</html>
