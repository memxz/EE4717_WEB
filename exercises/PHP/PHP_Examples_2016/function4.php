<html>
<body>
<table border = 1>
<thead>
<tr>
<th>Code</th>
<th>Description</th>
<th>Price</th>
</tr>
</thead>
 
<?php
function create_table($data) { 
//   var_dump($data); 
	reset($data); // Remember this is used to point the beginning

	$row = current($data);
	echo "</br>";
//	var_dump($row);
	
	foreach ($data as $row) {
		echo "<tr>";
		foreach ($row as $element){   
			echo "<td>".$element."</td>";
		}
		echo "</tr>";
	}
}
$products = array( array('TIR', 'Tires', 100),
					  array('OIL', 'Oil',10),
					  array('SPK', 'Spark Plugs',4));
// $my_array = array('Line one.','Line two.','Line three.');

create_table($products);

?>
</table>
</body>
</html>