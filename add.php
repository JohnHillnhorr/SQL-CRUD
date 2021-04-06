<?php 

include_once("./connections/connection.php");

$con = connection();

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname']  ?? '';
$birthday = $_POST['birthday']  ?? '';
$gender = $_POST['gender']  ?? '';



if(isset($_POST['submit'])){
  $sql =  "INSERT INTO `student_list` (`first_name`, `last_name`, `birth_day`, `gender`)
    VALUES ('$firstname', '$lastname', '$birthday', '$gender')";
    $con->query($sql) or die($con->error);

    echo header("Location: ./index.php");
    
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
        <input type="text" name='firstname' id='firstname'>
        <label>Lastname</label>
        <input type="text" name="lastname" id='lastname'>
        <label> Birthday</label>
        <input type="date" name='birthday' id='birthday'>
        <label>Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>


        <input type="submit" name='submit' value='SUBMIT'>






    </form>

</body>
</html>

