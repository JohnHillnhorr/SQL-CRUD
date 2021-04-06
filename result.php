<?php 




include_once("./connections/connection.php");

$con = connection();


$query = $_GET['searchname'];
$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$query%' || last_name LIKE '%$query%'";
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
    <h1>Student Management System</h1>
    <br>
        <form action="./result.php" method="get">
            <input type="text" name="searchname" id="searchname">
            <button type='submit'>Search</button>

        
        
        </form>

    <br>

    <?php if(isset($_SESSION['UserLogin'])) { ?>
    <a href="./logout.php">Logout</a>
        <?php           } else {?>

    <a href="./login.php">Login</a>
    
<?php   } ?>
    <a href ="./add.php">ADD NEW</a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>
                    First Name
                </th>
                <th>
                    Last Name
                </th>
            </tr>

        </thead>
           
        <tbody>

        <?php    do{   ?>
        <tr>
            <td><a href="./details.php?ID=<?php echo $row['id']; ?>">View Details</a></td>
            <td> <?php   echo $row['first_name'];    ?></td>
            <td> <?php   echo $row['last_name'];   ?></td>
        </tr>
        <?php    }while($row = $student->fetch_assoc());    ?>
        </tbody>
        


        </tbody>


    
    </table>

</body>
</html>

