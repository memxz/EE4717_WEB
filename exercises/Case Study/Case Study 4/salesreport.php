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
      <li><a href="admin.php">Menu Price Update</a></li>
      <li><a href="salesreport.php">Sales Report</a></li>
    </ul>
	</div>	
 
	<div id="content">
		<h2>Coffee at JavaJam</h2>


<?php

$select = "SELECT C_ID AS coffeeID, (SUM(Single_Order)+ SUM(Double_Order)) as total_sum FROM Orders GROUP by C_ID";



$select = "SELECT jamjamproducts.coffeename as coffeetype, (SUM(Orders.Single_Order * jamjamproducts.price_single)+ SUM(Orders.Double_Order*jamjamproducts.price_double) + SUM(Orders.Endless_Order*jamjamproducts.price_endless)) as totalsum  FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
$sales_report = $db_jamjam->query($select);
$i=0;
echo 
    '<h3> Sales Revenue </h3>
    <table>
      <tr>
        <th> Coffee Type </th> 
        <th> Total Sales Money ($) </th> 
      </tr>
    ';

while($row = $sales_report->fetch_assoc()){
  echo 
    '<tr id = " ' . $cf[$i] . ' ">'
      . '<td>' . $row['coffeetype'] . '</td>' 
      . '<td>' . $row['totalsum'] . '</td>'   
    . '</tr>';   
    $i++;
}
  echo 
    '</table>'; // end of sales revenue table
?>

<?php 

$select = "SELECT jamjamproducts.coffeename as coffeetype, SUM(Orders.Single_Order) as singlesum, SUM(Orders.Double_Order) as doublesum,  SUM(Orders.Endless_Order) as endlesssum, SUM(Orders.Single_Order + Orders.Double_Order + Orders.Endless_Order) as totalsum FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
$sales_report = $db_jamjam->query($select);
$i=0;
echo 
    '<h3> Sales Quantity </h3>
     <table>
      <tr>
        <th> Coffee Type </th> 
        <th> Single </th> 
        <th> Double </th> 
        <th> Endless </th> 
        <th> Total </th> 
      </tr>
    ';
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
  ' </table>'; // end of sales quantity table

?>

<?php 

  // $select = "SELECT jamjamproducts.coffeename as coffeetype, SUM(Single_Order) as singlesum, SUM(Double_Order) as doublesum,  SUM(Endless_Order) as endlesssum, SUM(Single_Order + Double_Order + Endless_Order) as totalsum FROM Orders INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID GROUP BY coffeetype";
  $create_temp = "CREATE TEMPORARY TABLE IF NOT EXISTS SalesProductCategory( 
                    Parameter varchar(255), 
                    Single_PC int, 
                    Double_PC int,
                    Endless_PC int
                    )";

  $subquerysql = "INSERT INTO SalesProductCategory (Parameter, Single_PC, Double_PC, Endless_PC) VALUES 
                ('Quantity', 
                (SELECT SUM( SELECT Single_Order from Orders )),
                (SELECT SUM(Double_Order) from Orders),
                (SELECT SUM(Endless_Order) from Orders)
                 )";

  $subquerysql = "REPLACE INTO SalesProductCategory (Parameter, Single_PC, Double_PC, Endless_PC) VALUES 
                ('Quantity', 
                (SELECT (
                    (SUM(Single_Order) from Orders ) * 
                    (SUM(price_single) from jamjamproducts)
                    )
                ),
                (SELECT SUM(Orders.Double_Order) from Orders),
                (SELECT SUM(Orders.Double_Order) from Orders)
                 )";

  // INSERT OR REPLACE  into SalesProductCategory(Parameter, Single_PC, Double_PC, Endless_PC)  Values ( (SELECT Single_PC from SalesProductCategory WHERE Parameter = "Price"), 33, 5, 44);

  $db_jamjam->query($create_temp);

  $select = "SELECT 
                    SUM(Single_Order*price_single) as Single_TotQty, 
                    SUM(Double_Order*price_double) as Double_TotQty, 
                    SUM(Endless_Order*price_endless) as Endless_TotQty 
                    FROM Orders 
                    INNER JOIN jamjamproducts ON Orders.C_ID=jamjamproducts.C_ID;";

  $sales_report = $db_jamjam->query($select);

  echo 
    '<h3> Sales Revenue </h3>
     <table>
      <tr>
        
        <th> Single ($) </th> 
        <th> Double ($) </th> 
        <th> Endless ($) </th>    
      </tr>
    ';

  while($row = $sales_report->fetch_assoc()){
    echo 
      '<tr id = " ' . $cf[$i] . ' ">'
        . '<td>' . $row['Single_TotQty'] . '</td>' 
        . '<td>' . $row['Double_TotQty'] . '</td>'   
        . '<td>' . $row['Endless_TotQty'] . '</td>'  
      . '</tr>';   
      $i++;
  }
    echo 
    ' </table>'; // end of sales quantity table


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