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