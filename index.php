<?php
session_start();
include "database.php";
?>
<!DOCTYPE html>

<html lang="en">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="finalforms.css">


</head>

<body>


<?php $result = mysqli_query($con, "SELECT * FROM patient_details");?>

<form method="post" action=" ">
    <div class="container">

    <a href="logout.php" class="btn btn-primary">Logout</a> 
<div class="container mt-5">
    
<table class="table table-hover  table-bordered mt-3">
<a href="finalforms.php" class="btn btn-primary">Create New </a>     
     
    <thead >
        <tr  class ="danger">
        <th >id</th>
        <th >Room ID</th>

        <th>Picture</th>

        <th>Patient Name</th>

        <th>Age</th>

        <th>Gender</th>

        <th>Consultant</th>

        <th>Cash/Insurance</th>
        
        <th>Attender No</th>

        <th>IP No</th>

        <th>Date of Join</th>

        
    </tr>
</thead>
<tbody >
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
            
            
            
            echo " <td class='text-center' > <a href='edit.php?id=".$row['id']."' class='btn btn-primary'><i class='bi bi-pencil'></i> Edit</a> </td>";
          
            echo " <td  class='text-center'>  <a href='delete.php?id=".$row['id']."' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'> <i class='bi bi-trash'></i> DELETE</a> </td>";
            
            
             '</tr>';
        
            
        }
       
    } else {
        echo '<tr><td>No Records</td></tr>';
    }
    
    ?>
 

</tbody>
</table> 
</div>
</form>
</body>
</html>