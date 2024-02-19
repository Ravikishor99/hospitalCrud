
<?php

include"database.php";

if(isset($_GET['id'])) {
    
  $id = $_GET['id']; 
}
 
    $sql="SELECT * FROM patient_details WHERE id =$id"; 
    $result = mysqli_query($con, $sql);
    
    while($row = mysqli_fetch_assoc($result))
   
      {
        $FirstName  = $row['name'];
        $room_id  = $row['room_id'];
        $ipnum   = $row['ip_no'];
        $consultant      = $row['consultant'];
        $age   = $row['age'];
        $cash_insurance   = $row['cash_insurance'];
        $attender_no   = $row['attender_no'];
        $date_of_join = $row['date_of_join'];
        $gender     =$row['gender'];
        // print_r($_FILES['Photo']);
        $Photo = $row['image'];
      
    }
if (isset($_POST['update'])) {

  
  $FirstName  = $_POST['name'];
    $room_id  = $_POST['room_id'];
    $ipnum   = $_POST['ip_no'];
    $consultant      = $_POST['consultant'];
    $age   = $_POST['age'];
    $cash_insurance   = $_POST['cash_insurance'];
    $attender_no   = $_POST['attender_no'];
    $date_of_join = $_POST['date_of_join'];
    $gender     =$_POST['gender'];
    // print_r($_FILES['Photo']);
    $Photo = basename($_FILES['Photo']['name']);


$sql = "UPDATE patient_details  SET room_id='$room_id',image='$Photo', age='$age',gender='$gender',name='$FirstName', consultant='$consultant',cash_insurance='$cash_insurance',attender_no='$attender_no',
date_of_join='$date_of_join',image='$Photo' WHERE id=$id";
$result = mysqli_query($con, $sql);
move_uploaded_file($_FILES['Photo']['tmp_name'], 'files/' . $Photo);

if($result==true){
  echo"updated succesfully";
  header("location:/FINALFORM2/table.php");
  exit;
  
}
else
{
  echo"not updated:".  mysqli_error($con);
}
}

$con->close();

  

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
<body style="background-color:rgb(203, 184, 184);">
  
<form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1 class="heading space">REGISTRATION FORM</h1>
        <div class="form-row space">
        <div class="col-md-4 mb-3">
            <label for="validationDefault01">Room ID</label>
            <input name='room_id' type="number" class="form-control" id="validationDefault01" placeholder="000" value="<?php echo $room_id ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault01">Patient Name</label>
            <input name='name'type="text" class="form-control" id="validationDefault01" placeholder="name" value="<?php echo $FirstName ?>" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationDefault01">IP Number</label>
            <input name='ip_no'type="number" class="form-control" id="validationDefault01" placeholder="000000" value="<?php echo $ipnum ?>" required>
          </div>
          
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="validationDefault06">Consultant</label>
              <input name='consultant' type="text" class="form-control" id="validationDefault03" placeholder="Consultant" value="<?php echo $consultant ?>" required/>
            </div>
            <div class="form-group col-md-6">
              <label for="validationDefault05">Age</label>
              <input name='age' class="form-control" id="inputEmail4" placeholder="age" type="number" value="<?php echo $age?>" required>
            </div>
          </div>
         
          <div class="form-row">
            <div class="col">
            <label for="validationDefault06">Cash/Insurance</label>
              <input name='cash_insurance' type="text" class="form-control" id="validationDefault03" placeholder="" value="<?php echo $cash_insurance ?>" required/>
            </div>
            <div class="col">
              <label for="validationDefault06">Attender Number</label>
              <input name='attender_no' type="number" class="form-control" id="validationDefault03" placeholder="912345678" value="<?php echo $attender_no ?>" required/>
            </div>
            </div><br>
       
        <div class="form-row">
          <div class="col">
            <label for="validationDefault10">Select Gender</label>
            <div class="form-check">
                <input name='gender' class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Male">
                <label value='Male' class="form-check-label" for="flexRadioDefault1">
                  Male
                </label>
              </div>
              <div class="form-check">
              <input name='gender' class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='female'>
                <label gender='female' class="form-check-label" for="flexRadioDefault1">
                  Female
                </label>
              </div>
              <div class="form-check">
              <input name='gender' class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='others'>
                <label gender='others'  class="form-check-label" for="flexRadioDefault1">
                  Others
                </label>
              </div>
              </div>
              <div class="col">
              <label for="Photo">Photo:</label>
              <input type="file" class="form-control" id ="Class" name="Photo" value="photo">
              </div>
              <div class="col-md-4 mb-3">
            <label for="validationDefault01">Date of Join</label>
            <input name='date_of_join' type="date" class="form-control" id="validationDefault01" placeholder="Date" value="<?php echo $date_of_join ?>">
          </div>
            </div><br>
          
          <input type="hidden">
        <button href='' class="btn btn-primary" name="update"  value="update" type="update">Submit form</button>
    </div>
    </form>
    </body>
</html>
