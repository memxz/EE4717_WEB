

<?php include 'php/define_connectdb.php'; ?>

<?php 
  $flag = 0;
  foreach( $coffee as $name => $value ){
    if(isset($value)  ){
      if($flag != 0){ $select .= ' OR '; }
      $select .= $coffeestring[$name];
      $flag = 1;
    }
  }
?>

<?php
// to generate table columns
  $result_jamjam = $db_jamjam->query($select);
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

  // $result_jamjam->free();
  // $db_jamjam->close();

?>
<div id="myoutput">
</div>

<script src="js/jquery-1.11.3.min.js"></script>
<script src = "js/updateDB"></script>
<!-- 
<form action="coffeemenu.php" method="post">
      <table> 
        <tbody>
          <tr>
            <th> <?php ?></th>
            <td> <input type="checkbox" name="justjava"> </td> 
          </tr>
          <tr> 
            <td> <input type="checkbox" name="cafeaulait"> </td>
            <th> Cafe au Lait </th>
            <td> House blended coffee infused into a smooth, steamed milk. <br> Single $2.00 &nbsp; Double $3.00 </td> 
          </tr>
          <tr> 
            <td> <input type="checkbox" name="icedcappucino"> </td>
            <th> Iced Cappuccino </th>
            <td> Sweet espresso blended with icy-cold milk and served in a chilled glass. <br> Single $4.75 &nbsp; Double $5.75 </td> 
          </tr>
          <tr> 
            <td> <input type="submit" value="Submit Order"></td></td>
          </tr>
        </tbody>
      </table>
    </form>
 -->