
<?php 
function isQueryNull($myquery)
 {
 	include '../php/connect_DB.php';
 	$result = $db->query($myquery);
	$num_results = $result->num_rows;
	if($num_results == 0){ return true;}
	else {return false;}
 }

function getOrderID($myquery){
	include '../php/connect_DB.php';
	$result = $db->query($myquery);
	$row = $result->fetch_assoc();
	$order_id = $row['id'];
	return $order_id;
}



function getOrderIDSelectStringFromCustID($cust_id){
	return 
	"SELECT id FROM orders 
	WHERE customer_id = " . $cust_id . 
	" AND status='Pending' ";
}

function getOrderIDFromCustID($cust_id){
	$select = getOrderIDSelectStringFromCustID($cust_id);
	$order_id = getOrderID($select);
	return $order_id;
}


function getProductNameFromID($pdct_id){
	include '../php/connect_DB.php';
	$select = "SELECT * from Products WHERE id=" . $pdct_id;
	$result = $db->query($select);
	$row = $result->fetch_assoc();
	$product_name = $row['name'];
	return $product_name;
}

function getResultFromQuery($myquery, $parameter){
	include '../php/connect_DB.php';
	$result = $db->query($myquery);
	$row = $result->fetch_assoc();
	return $row[$parameter];
}

function getParamFromTableWithKeyValuePair($param, $table, $key, $value){
	include '../php/connect_DB.php';
	$select = "SELECT * from " . $table . " WHERE " . $key ."=" . $value;
	$result = $db->query($select);
	$row = $result->fetch_assoc();
	$desiredparam = $row[$param];
	return $desiredparam;
}

  function generateTableRows($param, $table){
    include '../php/connect_DB.php';
    $select = "SELECT " . $param . " FROM " . $table;
    $result = $db->query($select);
    if($result){
      while($row = $result->fetch_assoc()){
        $param_out = $row[$param];
        echo '
        <tr>
          <td>' . $param_out .  '</td>
          <td> <input type="checkbox" name="' . $param_out . '" </td>
        </tr>
        ';
      }
    }
  }

  function generateSearchSections($param, $table, $title){
    include '../php/connect_DB.php';
    $select = "SELECT " . $param . " FROM " . $table;
    $result = $db->query($select);
    if($result){
      echo '<div class="searchoptions" ><table> ';
      echo "<tr><td class='searchtitle'> $title </td></tr>";
      while($row = $result->fetch_assoc()){
        $param_out = $row[$param];
        echo '
        <tr>
          <td>' . $param_out .  '</td>
          <td> <input type="checkbox" name="' . $param_out . '" </td>
        </tr>
        ';
      }
      echo '</table></div>';
    }
  }


  function generateSearchStringFromParamTableKeyArray($string, $key, $param, $table){
    include '../php/connect_DB.php';
    $select = "SELECT * FROM " . $table;
    $result = $db->query($select);
    // put query here to check if result is a null set or not
    if($result){
      $index = 0;
      while($row = $result->fetch_assoc()){
        $param_out = $row[$param];
        $id = $row['id'];
        $search[$param_out] = $_POST[$param_out];
        if(isset($search[$param_out])){
          // then the category has been selected.
          if($GLOBALS['flag'] == 0){ 
            if($index == 0){ $string .= ' AND ' . $key . " = " . $id; }
            else{ $string .= ' OR ' . $key . " = " . $id; }
          }      
          else { 
            $string .= " WHERE " . $key . " = " . $id; 
            $GLOBALS['flag'] = 0;
            
          }
          $index = 1;
        }
        
      }
    }
    return $string; 
  }

  function isWildCardSet($inputname){

  }

  function getRecentIDEntryFromTable($table){
    include '../php/connect_DB.php';
    $select = "SELECT MAX(id) from " . $table;
    $result = $db->query($select);
    $row = $result->fetch_assoc();
    return $row['MAX(id)'];
  }



?>