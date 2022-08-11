<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>

<?php
// get measure_id from customers table
$customer_id = $_SESSION['valid_id'];
echo $customer_id;
$measure_id =  getParamFromTableWithKeyValuePair('measure_id', 'Customers', 'id', $customer_id);
echo $measure_id;
if(!isset($measure_id)){
	$insert = "INSERT into Measurements (";
	$values = " VALUES( ";

	$select = "SELECT * from Measurements";
	$result = $db->query($select);
	if($result){
	$i=0;
	$row = $result->fetch_assoc();
	  foreach($row as $key => $value){
	  	if($i != 0) {
	  		if($key=='neck') {
	  			$insert .= "$key )";
	  			$values .= "$value )";
	  		}
	  		else {
	  			$insert .= "$key , ";
	  			$values .= "$value , ";
	  		}
	  	}
	  	$i=1;
	  }
	  $insert .= $values;
	  echo $insert;
	  $db->query($insert);
	}
	$measure_id=getRecentIDEntryFromTable('Measurements');
	$update = "UPDATE Customers set measure_id = $measure_id where id=$customer_id";
	echo $update;
    $db->query($update);
}
else{
	$select = "SELECT * from Measurements";
  $result = $db->query($select);
  if($result){
  	$update = "UPDATE Measurements SET ";
    $i=0;
    $row = $result->fetch_assoc();

      foreach($row as $key => $value){
      	if($i != 0) {
      		if($key=='neck') {$update .= "$key = $_POST[$key] ";}
      		else {$update .= "$key = $_POST[$key], ";}
      	}
      	$i=1;
      }
      $update .= " WHERE id=$measure_id";
    echo $update;
    $db->query($update);
  }

}

?>