<?php
session_start();

// Check if the user is logged in or not
if(isset($_SESSION['id'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

// If session is active
if(session_status() === PHP_SESSION_ACTIVE){
    // Session is active
    include "database.php";
} else {
    // Session is not active
    // Handle the case where the session is not active
    // For example, redirect the user to the login page
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php 
    // Show the appropriate button based on login status
    if($loggedIn) {
        echo '<a href="logout.php" class="btn btn-primary">Logout</a>';
    } else {
        echo '<a href="login.php" class="btn btn-primary">Login</a>';
    }
    ?>
    
    <?php $result = mysqli_query($con, "SELECT * FROM patient_details");?>

    <form method="post" action=" ">
        <div class="container">
            <a href="finalforms.php" class="btn btn-primary">Create New </a>     
            <table class="table table-hover table-bordered mt-3">
                <thead>
                    <tr class="danger">
                        <th>id</th>
                        <th>Room ID</th>
                        <th>Picture</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Consultant</th>
                        <th>Cash/Insurance</th>
                        <th>Attender No</th>
                        <th>IP No</th>
                        <th>Date of Join</th>
                        <?php if($loggedIn): ?>
                            <th class='text-center'>Edit</th>
                            <th class='text-center'>DELETE</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo '<tr class = "info" >';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['room_id'].'</td>';
                            echo '<td><img src="files/'.$row['image'].'" width="50" height="50"></td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['age'].'</td>';
                            echo '<td>'.$row['gender'].'</td>';
                            echo '<td>'.$row['consultant'].'</td>';
                            echo '<td>'.$row['cash_insurance'].'</td>';
                            echo '<td>'.$row['attender_no'].'</td>';
                            echo '<td>'.$row['ip_no'].'</td>';
                            echo '<td>'.$row['date_of_join'].'</td>';
                            if($loggedIn){
                                echo "<td class='text-center'><a href='edit.php?id=".$row['id']."' class='btn btn-primary'><i class='bi bi-pencil'></i> Edit</a></td>";
                                echo "<td class='text-center'><a href='delete.php?id=".$row['id']."' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'><i class='bi bi-trash'></i> DELETE</a></td>";
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="12">No Records</td></tr>';
                    }
                    ?>
                </tbody>
            </table> 
        </div>
    </form>
</div>

</body>
</html>
