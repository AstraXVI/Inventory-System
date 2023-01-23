<?php 
include('connection.php');
$code = $_POST['code'];
$article = $_POST['article'];
$description = $_POST['description'];
$date = $_POST['date'];
$unitValue = $_POST['unitValue'];
$totalValue = $_POST['totalValue'];
$sourceOfFund = $_POST['sourceOfFund'];

$sql = "INSERT INTO `equipment` (`code`,`article`,`description`,`date`,`unitValue`, `totalValue`, `sourceOfFund`) values ('$code','$article','$description','$date','$unitValue','$totalValue', '$sourceOfFund')";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>