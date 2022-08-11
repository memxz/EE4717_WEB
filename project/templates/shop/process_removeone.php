
<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>
<?php 

	$order_id = $_POST['hidden-orderid'];
	$product_id = $_POST['hidden-productid'];
	$qty = $_POST['hidden-productqty'];

	if($qty>1){
		$update=
		"
		UPDATE Order_items 
		set quantity=quantity-1 
		WHERE order_id = $order_id 
		AND product_id = $product_id
		";
		echo $update;
		$db->query($update);

	}
	else{
		$delete =
		"
		DELETE FROM Order_items 
		WHERE order_id = $order_id 
		AND product_id = $product_id
		";
		echo $delete;
		$db->query($delete);
	}	

	

?>