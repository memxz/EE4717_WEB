<?php include 'define_connectdb.php'; ?>

<?php 

// $select = "SELECT coffeename FROM jamjamproducts";
// $result_jamjam = $db_jamjam->query($select);
// $coffeenamelist = array();
// while( $row = $result_jamjam->fetch_assoc()){
// 	$coffeenamelist[] =  $row[NAME];
// }
// echo $coffeenamelist[1];

$coffeepricearray = $_POST['mycoffee'];
$size = count($coffeepricearray);
echo var_dump($coffeepricearray);
echo $size;
echo '+++++++' . $coffeepricearray[2][NAME] . '+++++++';
for($x=0; $x<3; $x++){
 $update = " UPDATE jamjamproducts SET " . 
 P_SINGLE . "=" .  $coffeepricearray[$x][P_SINGLE] . ", " .
 P_DOUBLE . "=" .  $coffeepricearray[$x][P_DOUBLE] . ", " .
 P_ENDLESS . "=" .  $coffeepricearray[$x][P_ENDLESS] . 
 " WHERE coffeename= '" . $coffeepricearray[$x][NAME] . "'";
 echo $update;
 $result_jamjam = $db_jamjam->query($update);
}

?>