<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM equipment ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'code',
	2 => 'article',
	3 => 'description',
	4 => 'date',
	5 => 'unitValue',
	6 => 'totalValue',
	7 => 'sourceOfFund'
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE code like '%".$search_value."%'";
	$sql .= " OR article like '%".$search_value."%'";
	$sql .= " OR totalValue like '%".$search_value."%'";
	$sql .= " OR unitValue like '%".$search_value."%'";
	$sql .= " OR description like '%".$search_value."%'";
	$sql .= " OR sourceOfFund like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['code'];
	$sub_array[] = $row['article'];
	$sub_array[] = $row['description'];
	$sub_array[] = $row['date'];
	$sub_array[] = $row['unitValue'];
	$sub_array[] = $row['totalValue'];
	$sub_array[] = $row['sourceOfFund'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
