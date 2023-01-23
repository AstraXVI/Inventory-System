<?php 
include('connection.php');
$code = $_POST['code'];
$article = $_POST['article'];
$date = $_POST['date'];
$unitValue = $_POST['unitValue'];
$totalValue = $_POST['totalValue'];
$sourceOfFund = $_POST['sourceOfFund'];
$id = $_POST['id'];
$description = $_POST['description'];

$sql = "UPDATE `equipment` SET `code` = '$code', `article` = '$article',`date` = '$date',`unitValue`='$unitValue', `totalValue`='$totalValue', `description` = '$description',`sourceOfFund`='$sourceOfFund' WHERE id='$id' ";
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