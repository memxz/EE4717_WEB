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

  $value=current($data);
//  var_dump($value);
  for ($j=0; $j<3; $j++) {
	  echo "<tr>";
		for ($i=0; $i<3; $i++){
		echo "<td>".$data[$j][$i]."</td>";}
  echo "</tr>\n";
  }
}
$products = array( array('TIR', 'Tires', 100),
					  array('OIL', 'Oil',10),
					  array('SPK', 'Spark Plugs',4));

create_table($products);

?>
</table>
</body>
</html>