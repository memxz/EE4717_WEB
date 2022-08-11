<?php
  // create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $find = $_POST['find'];
?>
<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php
	date_default_timezone_set("Asia/Singapore");
	echo date_default_timezone_get();
	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

	echo "<p>Your order is as follows: </p>";

	$totalqty = 0;
	$totalqty = $tireqty + $oilqty + $sparkqty;
	echo "Items ordered: ".$totalqty."<br />";


	if ($totalqty == 0) {

	  echo "You did not order anything on the previous page!<br />";

	} else {

	  if ($tireqty > 0) {
		echo $tireqty." tires<br />";
	  }

	  if ($oilqty > 0) {
		echo $oilqty." bottles of oil<br />";
	  }

	  if ($sparkqty > 0) {
		echo $sparkqty." spark plugs<br />";
	  }
	}


	$totalamount = 0.00;

	define('TIREPRICE', 100);
	define('OILPRICE', 10);
	define('SPARKPRICE', 4);

	$sub_tires = $tireqty * TIREPRICE;
	$sub_oil = $oilqty * OILPRICE;
	$sub_spark = $sparkqty * SPARKPRICE;
	$totalamount = $sub_tires + $sub_oil + $sub_spark;

	echo "Subtotal: $".number_format($totalamount,2)."<br />";

	$taxrate = 0.10;  // local sales tax is 10%
	$totalamount = $totalamount * (1 + $taxrate);
	echo "Total including tax: $".number_format($totalamount,2)."<br />";

	if($find == "a") {
	  echo "<p>Regular customer.</p>";
	} elseif($find == "b") {
	  echo "<p>Customer referred by TV advert.</p>";
	} elseif($find == "c") {
	  echo "<p>Customer referred by phone directory.</p>";
	} elseif($find == "d") {
	  echo "<p>Customer referred by word of mouth.</p>";
	} else {
	  echo "<p>We do not know how this customer found us.</p>";
	}


?>

<table border="1">
<caption>Order Sheet</caption>
<thead>
 <tr> 
	 <th id="item">Item</th>
	 <th id="cost">Item Cost</th>
	 <th id="quantity">Quantity</th>
	 <th id="subtotal">Subtotal</th>
 </tr>
 </thead>
 <tbody>
 <tr> 
	 <td headers="item">Tires</td>
	 <td headers="cost"> <?php echo TIREPRICE ?>  </td>
	 <td headers="quantity"> <?php echo $tireqty ?> </td>
	 <td headers="subtotal"> <?php echo $sub_tires ?>  </td>
 </tr>
  <tr> 
	 <td headers="item">Oil</td>
	 <td headers="cost"> <?php echo OILPRICE ?> </td>
	 <td headers="quantity"> <?php echo $oilqty ?> </td>
	 <td headers="subtotal"> <?php echo $sub_oil ?> </td>
 </tr>
  <tr> 
	 <td headers="item">Spark Plugs</td>
	 <td headers="cost"> <?php echo SPARKPRICE ?> </td>
	 <td headers="quantity"> <?php echo $sparkqty ?>  </td>
	 <td headers="subtotal"> <?php echo $sub_spark ?> </td>
 </tr>
  
 </tbody>
 <tfoot>
 <tr> 
	 <td headers="day" colspan=3 align=right>Total Cost ($)</td>
	 <td headers="hours"> <?php echo $totalamount ?> </td>
 </tr>

</tfoot>
</table>


</body>

<style>

<style>
table { margin:auto;
		width: 200px;
	}
table, td,th { border-style: none; }
caption { font-weight: bold;
		font-size: 2em;
	}
thead { background-color: #eaeaea; }
tbody { font-family: arial, sans-serif;
		font-size: .90em;
	}
tbody td { border-bottom: 1px #000033 dashed;
		padding-left: 25px;
	}
tfoot { background-color: #eaeaea;
		font-weight: bold;
		font-align: center;
	}
</style>


</html>
