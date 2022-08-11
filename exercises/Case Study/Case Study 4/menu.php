<!DOCTYPE html>
<html lang="en">
<head>
  <title> JavaJam Coffee House </title>
  <meta charset="utf-8">
  <link href="javajam.css" rel="stylesheet">
  <script src="js/jquery-1.11.3.min.js"></script>
  
</head>

<?php include 'php/define_connectdb.php'; ?>




<body> 
  <div id="wrapper">
   <h1 id="header"> <img src="img/javalogo.gif" width="620" height="117" title="JavaJam Coffee House"> </h1>

	<div id="nav"> 
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="music.html">Music</a></li>
			<li><a href="jobs.html">Jobs</a></li>
		</ul>
	</div>	
 
	<div id="content">
		<h2>Coffee at JavaJam</h2>


<?php
$select = "SELECT * FROM jamjamproducts";

$result_jamjam = $db_jamjam->query($select);

 echo 
  '<form id = "myform" method="post">
    <table>';
  if($result_jamjam){
    $openinputstring = '<td> <input type="text" size="5" value = "';
    $nameinputstring = ' " name = " ';
    $closeinputstring = '"></td> ';
    $i=0;
    while($row = $result_jamjam->fetch_assoc()){
      echo 
        '<tr id = " ' . $cf[$i] . ' ">'
          . '<td> <input type="checkbox" name=" ' . $cf[$i] . ' "></td>'
          . '<td> <input readonly="readonly" type="text" value = "' . $row[NAME] . $nameinputstring . 'mycoffee[' . $i . '][' . NAME .']' . $closeinputstring 
          . $openinputstring . $row[P_SINGLE] . $nameinputstring . 'mycoffee[' . $i . '][' . P_SINGLE .']' . $closeinputstring 
          . $openinputstring . $row[P_DOUBLE] . $nameinputstring . 'mycoffee[' . $i . '][' . P_DOUBLE .']' . $closeinputstring 
          . $openinputstring . $row[P_ENDLESS] . $nameinputstring . 'mycoffee[' . $i . '][' . P_ENDLESS .']' . $closeinputstring 
        . '</tr>';   
        $i++;
    }  
  }
  echo 
  ' </table>
  <input type="submit"  value = "Update and Submit">
  </form>';


$select = "SELECT C_ID AS coffeeID, (SUM(Single_Order)+ SUM(Double_Order)) as total_sum FROM Orders GROUP by C_ID";

$select = "SELECT jamjamproducts.coffeename as coffeetype, (SUM(Orders.Single_Order * jamjamproducts.price_single)+ SUM(Orders.Double_Order*jamjamproducts.price_double) + SUM(Orders.Endless_Order*jamjamproducts.price_endless)) as totalsum  FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
$sales_report = $db_jamjam->query($select);
$i=0;
echo 
    '<table>';
while($row = $sales_report->fetch_assoc()){
  echo 
    '<tr id = " ' . $cf[$i] . ' ">'
      . '<td>' . $row['coffeetype'] . '</td>' 
      . '<td>' . $row['totalsum'] . '</td>'   
    . '</tr>';   
    $i++;
}
  echo 
  ' </table>';
$select = "SELECT jamjamproducts.coffeename as coffeetype, SUM(Orders.Single_Order) as singlesum, SUM(Orders.Double_Order) as doublesum,  SUM(Orders.Endless_Order) as endlesssum, SUM(Orders.Single_Order + Orders.Double_Order + Orders.Endless_Order) as totalsum FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
$sales_report = $db_jamjam->query($select);
$i=0;
echo 
    '<table>';
while($row = $sales_report->fetch_assoc()){
  echo 
    '<tr id = " ' . $cf[$i] . ' ">'
      . '<td>' . $row['coffeetype'] . '</td>' 
      . '<td>' . $row['singlesum'] . '</td>'   
      . '<td>' . $row['doublesum'] . '</td>'  
      . '<td>' . $row['endlesssum'] . '</td>' 
      . '<td>' . $row['totalsum'] . '</td>'   
    . '</tr>';   
    $i++;
}
  echo 
  ' </table>';

  $select = "SELECT jamjamproducts.coffeename as coffeetype, SUM(Single_Order) as singlesum, SUM(Double_Order) as doublesum,  SUM(Endless_Order) as endlesssum, SUM(Single_Order + Double_Order + Endless_Order) as totalsum FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
  $select = "SELECT SUM(Single_Order*jamjamproducts.price_single) as hi, SUM(Double_Order), SUM(Endless_Order)  FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID;";

?>


		
	</div>	   
		   
	<div id="footer">
	<small><i> Copyright © 2016 JavaJam Coffee House</i><br>

	<small><a href="mailto:robert@naquila.com">robert@naquila.com</a>
	</div>
	</div>
</body>
<script src = "js/updateDB"></script>
</html>