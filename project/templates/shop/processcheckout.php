

<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>
<?php

$totalcost = $_POST['hidden-totalcost'];
$order_id = $_POST['hidden-order_id'];
$customer_id = getParamFromTableWithKeyValuePair('customer_id', 'Orders', 'id', $order_id);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$paymentinfo = $_POST['paymentinfo'];

echo 'address is ' . $address;
echo 'pmt info is ' . $paymentinfo;

$update = 
"
UPDATE Orders
SET status= 'Processing', totalcost = " . $totalcost . 
" WHERE id =" . $order_id;
echo $update . '<br>';
$db->query($update);

$update = 
"
UPDATE Customers
SET paymentinfo=" . $paymentinfo . 
" WHERE id =" . $customer_id;
echo $update . '<br>';
$db->query($update);

$insert = "INSERT INTO Delivery_addresses (addr) VALUES ($address)"; 
echo $insert . '<br>';
$db->query($insert);

$delivery_add_id = getRecentIDEntryFromTable('Delivery_addresses');

$update = 
"
UPDATE Orders
SET delivery_add_id= '" . $delivery_add_id . 
"' WHERE id =" . $order_id;
$db->query($update);

echo $update;
// update the delivery address in the table "Delivery_addresses", referencing the delivery_add_id. 




// $result = $db->query($select);

// UPDATE Orders
// SET status= 'Pending', totalcost = 0 WHERE id =7;


?>