<!DOCTYPE html>
<html lang="en">
<!-- Base for Dashboard -->
<head>
<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Common CSS -->
        <!-- Core CSS -->
        <link href="../../static/css/shop/shop.css" rel="stylesheet" type="text/css">

        <!-- Core CSS -->
        <link href="../../static/css/core/core.css" rel="stylesheet" type="text/css">
        
        <!-- Template CSS -->
        <link href="../../static/css/core/template.css" rel="stylesheet" type="text/css">
        <link href="../../static/css/core/modal.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../../static/css/core/customfonts.css" rel="stylesheet" type="text/css">

        <!--jQuery libraries-->
        <script src="../../static/js/core/jquery-1.11.3.min.js"></script>
</head>

<body>
<mainContent>
<ul class="tab">
    <li tab="Measurements">Measurements</li>
    <li> > </li>
    <li tab="Checkout">Checkout</li>

</ul>

<div id="Measurements" class="tabcontent firsttab">
  <h2> Your Profile </h2>
<?php
  if($_SESSION['valid_id'] == NULL){
    echo 'Add items to cart first.';
  }
  else{
    $customer_id = $_SESSION['valid_id'];
    $measure_id = getParamFromTableWithKeyValuePair('measure_id','Customers','id',$customer_id);
    $select = "SELECT * from Measurements WHERE id=$measure_id";
    $result = $db->query($select);
    if($result){
      echo '<form id=measurements method="post" action="processmeasurements.php">
      <table class=checkout_table>' ;
      $i=0;
      while($row = $result->fetch_assoc()){

        foreach($row as $key => $value){
          if($key=='id'){}
          else{
            if($value==NULL){$value='';}
            print "<tr><td> $key </td><td><input type='text' name=$key value=$value ></input>  </td></tr>";
          }
          
        }
      }
      echo '<tr><td><button class="buttonBlackInverse" type="submit"> UPDATE OR SUBMIT</td></tr>';
      echo '</table></form>';
    }
  }


?>
<br><br><br><br><br>
</div>
<div id="Checkout" class="tabcontent">
<?php 


$select = "SELECT * from orders where customer_id=" . $_SESSION['valid_id'] . " AND status='Pending'";
// get customer info
  if($_SESSION['valid_id'] == NULL or isQueryNull($select)){
    echo 'your cart is empty';
    
  }
  else{
    $customer_id = $_SESSION['valid_id'];

  $address = getParamFromTableWithKeyValuePair('address', 'Customers', 'id', $customer_id);
  $paymentinfo = getParamFromTableWithKeyValuePair('paymentinfo', 'Customers', 'id', $customer_id);
  $firstname = getParamFromTableWithKeyValuePair('firstname', 'Customers', 'id', $customer_id);
  $lastname = getParamFromTableWithKeyValuePair('lastname', 'Customers', 'id', $customer_id);

$order_id = getOrderIDFromCustID($customer_id);

// echo 'cust id: ' . $customer_id . '<br>';

// echo 'orderid: ' . $order_id . '<br>';

$select = "SELECT TRUNCATE(SUM(Products.price * Order_items.quantity), 2) as totalcost FROM Order_items INNER JOIN Products ON Order_items.product_id=Products.id WHERE Order_items.order_id=" . $order_id;

$totalcost = getResultFromQuery($select, 'totalcost');




echo 
  '<br><br>
    <table class=checkout_summary>
      <tr style="background:#f1f1f1; font-weight:bold;"> 
        <td> Product Name </td> 
        <td> Unit Price </td> 
        <td> Quantity </td> 
        <td> Sub Total </td> 

      </tr>
    ';
$select = "SELECT * from Order_items WHERE order_id=" . $order_id;

$result = $db->query($select);
  if($result){
    $i=0;
    while($row = $result->fetch_assoc()){
      $product_id = $row[product_id];
      $product_quantity = $row[quantity];

      $product_name = getParamFromTableWithKeyValuePair('name', 'Products', 'id', $product_id);
      $product_price = getParamFromTableWithKeyValuePair('price', 'Products', 'id', $product_id);

      echo 
        "<tr> 
          
          <td> $product_name </td>
          <td>$ $product_price </td>
          <td> $product_quantity </td>
          <td> $ " . $product_quantity*$product_price . " </td>   
          <td> 
            <form id='add' method='post' action='process_addone.php'> 
              <button class='button buttonBlack' name='addone' type='submit' style='padding:5px 10px 5px 10px;'>Add 1</button> 
              <input type='hidden' name='hidden-productid' value='$product_id' />
              <input type='hidden' name='hidden-orderid' value='$order_id' />
            </form>
          </td>
          <td> 
            <form id='remove' method='post' action='process_removeone.php'> 
              <button class='button buttonBlack' name='removeone' type='submit' style='padding:5px 10px 5px 10px;'>Remove 1</button>
              <input type='hidden' name='hidden-productid' value='$product_id' />
              <input type='hidden' name='hidden-orderid' value='$order_id' />
              <input type='hidden' name='hidden-productqty' value='$product_quantity' />
            </form>
          </td>
          
        </tr>";   
        $i++;
    }  
  }
  echo 
  ' </table> 

  <br>
  
  <h2>Total Cost: ' . $totalcost . '</h2><br>
  
  <table class="checkout_table">
   <form id = "checkout" method="post" action="processcheckout.php"> 
    <tr>
      <td> Delivery Address: </td>
      <td> <input type="text" name="address" value="' . $address . '" required/>
      </td>
    </tr>
    <tr>
      <td> Payment info: </td>
      <td>
        <input type="text" name="paymentinfo" value="' . $paymentinfo .'" required/>
      </td>
      
    </tr>
  </table>
  
  
    <input type="hidden" name="hidden-order_id" value="' . $order_id . '" />
    <input type="hidden" name="hidden-totalcost" value="' . $totalcost . '"/>
    <center><button class="buttonBlackInverse" type="submit">PURCHASE NOW</button></center>
  </form>';

  }
  
?>
</div>
<div id="ordercomplete" style="display:none; ">
<p>Thanks for shopping with us. Your order has been processed and is being shipped. </p>
</div>



</mainContent>
 
<script>
  
    $('form#checkout').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "processcheckout.php",
        type: "POST",
        data: $('form#checkout').serialize(),
        success: function(data){
          $('div#ordercomplete').show();
          // alert('Your order has been submitted.');
        },
        error: function  (jXHR, textStatus, errorThrown){},
      });
    });

    $('form#add').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "process_addone.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data){
         location.reload();
          // alert('Your order has been submitted.');
        },
        error: function  (jXHR, textStatus, errorThrown){},
      });
    });

    $('form#remove').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "process_removeone.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data){
          location.reload();
          
          // alert('Your order has been submitted.');
        },
        error: function  (jXHR, textStatus, errorThrown){},
      });
    });

</script>


</body>
    <!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <!-- <script src="{%  static 'js/button_toggle.js'%}"></script> -->
    <!-- <script src="{%  static 'js/plugins/morris/raphael.min.js'%}"></script> -->
</html>