<!DOCTYPE html>
<html lang="en">
<head>
<title> JavaJam Coffee House </title>
<meta charset="utf-8">
<link href="javajam.css" rel="stylesheet">

<?php include 'php/define_connectdb.php'; ?>

<?php 
  // forming the select string
  $flag = 0;
  foreach( $coffee as $name => $value ){
      if($flag != 0){ $select .= ' OR '; }
      $select .= $coffeestring[$name];
      $flag = 1;
  }
  
?>



</head>
  <body> 
  <div id="wrapper">
   <h1 id="header"> <img src="javalogo.gif" width="620" height="117" title="JavaJam Coffee House"> </h1>

	<div id="nav"> 
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="menu.html">Menu</a></li>
			<li><a href="music.html">Music</a></li>
			<li><a href="jobs.html">Jobs</a></li>
		</ul>
	</div>	
 
	<div id="content">
		<h2>Coffee at JavaJam</h2>


<?php

  $result_jamjam = $db_jamjam->query($select);
  // if($result_jamjam){
  //   $i = 0;
  //   while($row = $result_jamjam->fetch_assoc()){
  //     $coffee[$cf[$i]] = new Coffee;
  //     $coffee[$cf[$i]]->NAME = $row[NAME];
  //     $coffee[$cf[$i]]->P_SINGLE = $row[P_SINGLE];
  //     $coffee[$cf[$i]]->P_DOUBLE = $row[P_DOUBLE];
  //     $coffee[$cf[$i]]->P_ENDLESS = $row[P_ENDLESS];
  //     $i += 1;
  //   }
  // }

 echo 
  '<form id = "myform" method="post">
    <table>';
  if($result_jamjam){
    $openinputstring = '<td> <input type="text" size="3" value = "';
    $nameinputstring = '';
    $closeinputstring = '"></td> ';
    $i=0;
    while($row = $result_jamjam->fetch_assoc()){
      echo 
        '<tr id = " ' . $cf[$i] . ' ">'
          . '<td> <input type="checkbox" name=" ' . $cf[$i] . ' "></td>'
          . '<td>' . $row[NAME] . '</td>'
          . $openinputstring . $row[P_SINGLE] . $closeinputstring = '"></td> '
          . $openinputstring . $row[P_DOUBLE] . $closeinputstring = '"></td> '
          . $openinputstring . $row[P_ENDLESS] . $closeinputstring = '"></td> '
        . '</tr>';   

        $i++;
    }  
  }
  echo '<tr> <td> <input type="submit" value = "Update and Submit">  </td></tr>';
  echo 
  ' </table>
  </form>';
?>



    <form action="coffeemenu.php" method="post">
  		<table> 
  			<tbody>
  				<tr> 
            <td> <input type="checkbox" name="justjava"> </td>
  					<th> <?php echo $coffee['justjava']->NAME ?> </th>
  					<td> Regular house blend, decaffeinated coffee, or flavor of the day. <br> Endless Cup 
            $ <?php echo $coffee['justjava']->P_ENDLESS ?>
            </td> 
  				</tr>
  				<tr> 
            <td> <input type="checkbox" name="cafeaulait"> </td>
  					<th> <?php echo $coffee['cafeaulait']->NAME ?> </th>
  					<td> House blended coffee infused into a smooth, steamed milk. 
            <br> Single $<?php echo $coffee['cafeaulait']->P_SINGLE ?> &nbsp; 
            Double $<?php echo $coffee['cafeaulait']->P_DOUBLE ?> </td> 
  				</tr>
  				<tr> 
            <td> <input type="checkbox" name="icedcappucino"> </td>
  					<th> <?php echo $coffee['icedcappucino']->NAME ?> </th>
  					<td> Sweet espresso blended with icy-cold milk and served in a chilled glass. 
            <br> Single $<?php echo $coffee['icedcappucino']->P_SINGLE ?>
             &nbsp; Double $<?php echo $coffee['icedcappucino']->P_DOUBLE ?> </td> 
  				</tr>
          <tr> 
            <td> <input type="submit" value="Submit Order"></td></td>
          </tr>
  			</tbody>
  		</table>
    </form>
		
	</div>	   
		   
	<div id="footer">
	<small><i> Copyright © 2016 JavaJam Coffee House</i><br>

	<small><a href="mailto:robert@naquila.com">robert@naquila.com</a>
	</div>
	</div>
</body>
</html>