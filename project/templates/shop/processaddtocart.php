<?php

/* flow:
First, check the client's customer id. 
If the customer clicks "addtocart", and he doesn't already have a current order in the "Order" table that is "PENDING", then it will create a new entry in the "Order" table. How we know this is by checking the "customer_id" in the "Orders" table. 

Subsequently, create a new entry in the "Order_items" table that references the id in the "Orders" table. 

Subsequently, if the customer continues to add stuff to Cart, then it will check if that item already exists in the "Orde_items" table. If it exists, then it qill update the quantity. Otherwise, it will insert a new record. 

When the client clicks "buy", then the "status" changes from "pending" to "Processing" in the "Order" table. 

When he adds more stuff to cart, then the cycle begins all over again. 
*/
	
	include '../php/connect_DB.php';	
	include 'functions.php';
	
	// Grab results from the POST
	$product_id = $_POST['hidden-id'];
	$product_price = $_POST['hidden-price'];
	
	if($_SESSION['valid_id'] == NULL){
		echo 'null lar';
		$insert = "INSERT INTO Measurements () VALUES ()";
		$db->query($insert);

		$measure_id = getRecentIDEntryFromTable('Measurements');
		$insert = "INSERT INTO Customers (measure_id) VALUES ($measure_id)";
		$db->query($insert);

		$_SESSION['valid_id'] =  getRecentIDEntryFromTable('Customers');
	}
	$customer_id = $_SESSION['valid_id'];

	echo $customer_id;
	
	$select = "SELECT * FROM Orders WHERE Status='Pending' AND customer_id = " . $customer_id . ";";

	// if cannot find pending order, then create a new order
	if(isQueryNull($select)){
		$insert = "INSERT INTO Orders(customer_id, status, totalcost) VALUES (". 
			  $customer_id . ", " .
			  " 'Pending' " . ", " .
			  "0 )";
		echo $insert;
		$result = $db->query($insert);
	}
	echo 'cus id - ' . $customer_id . 'end';
	$order_id = getOrderIDFromCustID($customer_id);
	echo 'orderid - ' . $order_id . 'end';

// check if entry exists in the Order_items table:
	$row_location = "order_id=" . $order_id . " AND product_id =". $product_id;

	$select = "SELECT * from Order_items WHERE " . $row_location;
	// echo $select;

	if(!isQueryNull($select)){
		echo 'there are results';
		$update = 
		"
		UPDATE Order_items oi
		SET quantity= oi.quantity + 1
		WHERE " . $row_location;
		echo $update;
		$result = $db->query($update);
	}
	else {
		$insert = "INSERT INTO Order_items(order_id, product_id, quantity) VALUES (". 
			  $order_id . ", " . 
			  $product_id . ", " .
			  "1)";
		echo $insert;
		$result = $db->query($insert);
	}

	$select = "SELECT TRUNCATE(SUM(Products.price * Order_items.quantity), 2) as totalcost FROM Order_items INNER JOIN Products ON Order_items.product_id=Products.id WHERE Order_items.order_id=" . $order_id;

	$totalcost = getResultFromQuery($select, 'totalcost');
	echo "totalcost is $totalcost";




	// $result = $db->query($insert);






	



?>