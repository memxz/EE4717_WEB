<?php 

include '../php/connect_DB.php'; 
include 'functions.php';

function listProductsByQuery($query){
    include '../php/connect_DB.php';
    echo 'hihi'. $query;
    $result = $db->query($query);
    if($result){
      $i=0;
      while($row = $result->fetch_assoc()){
        $product_price = $row[price];
        $product_id = $row[id];
        echo 
          '<div class="item center-div">' . 
            '<img src="../../static/img/shop/shop_' . $row[image] . '.png">' . 
            '<div class="item-title">' . $row[name] . '</div>' . 
            '<p> Description: ' . $row[description] . '</p>' . 
            '<div class="item-price">$' . $product_price . '</div>' . 
            '<form id="addtomycart" method="post" action="processaddtocart.php">

              <input type="hidden" name="hidden-price" value="' . $product_price . '" />
              <input type="hidden" name="hidden-id" value="' . $product_id . '" />
              <input class="addtocart buttonBlack" type="submit" value="Add To Cart" />
            </form>  
          </div>';
      $i++;
      }  
    }
  }

  function listproducts($catid){
    include '../php/connect_DB.php';
    $select = "SELECT * FROM Products WHERE cat_id=" . $catid;
    listProductsByQuery($select);

  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Shop CSS -->
    <link href="../../static/css/shop/shop.css" rel="stylesheet" type="text/css">
    <!-- Common CSS -->
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

<?php
    if (!empty($_SESSION['valid_userid'])) {
        echo 
            "Welcome " . $_SESSION['valid_firstname'] . " " . $_SESSION['valid_lastname'] . "! <br />" . 
            "You are logged in as: " . $_SESSION['valid_userid'] . " <br />" . 
            "<button type='button' class='buttonBlackInverse' onclick='location.href=\"../register/logout.php\";'>LOGOUT</button><br>";
    }
?>

<div>

<?php
  $flag=1;
  $select = "SELECT * FROM Products ";
  $select = generateSearchStringFromParamTableKeyArray($select, 'cat_id', 'name', 'Categories');
  $select = generateSearchStringFromParamTableKeyArray($select, 'colour_id', 'name', 'Colours');
  $select = generateSearchStringFromParamTableKeyArray($select, 'style_id', 'name', 'Style');
  

  $min = $_POST['min'];

  if($min!=NULL){ 
    if($flag==0){$select .= " AND ";}
    else{$select.= " WHERE "; $flag=0;}
    $select .= " price > " . $min; 
  }

  $max = $_POST['max'];
  
  if($max!=NULL){ 
    if($flag==0){$select .= " AND ";}
    else{$select.= " WHERE "; $flag=0;}
    $select .= " price < " . $max; 
  }

  // echo $select;

  if(isset($_POST['wildcard'])){
    $string_like = " name LIKE '%" . $_POST['wildcard'] . "%' OR description LIKE '%" . $_POST['wildcard'] ."%' ";
    if($GLOBALS['flag'] == 0){ $select .= " OR " . $string_like; }
    else { 
      $select .= " WHERE " . $string_like; 
      $GLOBALS['flag'] = 0;
    }
  }
  // echo $select;
?>

<form id="refinesearch" method="post" >
  <ul class="search">
    <li><input type="text" name="wildcard" placeholder="Enter Search Term" /></li>
    <li><input type="submit" value="Search" /></li>
  </ul>
  <p id="searchoptionslink"> More Search Options </p>
  <table class="searchoptions" style="display:none;">
    <tr> 
      <td>Filter by Category</td>
    </tr>
    <?php generateTableRows('name', 'Categories') ?>

    <tr> 
      <td>Filter by Price</td>
    </tr>
    <tr>
      <td> <input type="number" name="min" placeholder="Min Price" size="4"/> </td>
      <td> <input type="number" name="max" placeholder="Max Price" size="4"/></td>
    </tr>

    <tr> 
      <td>Filter by Colour</td>
    </tr>
    <?php generateTableRows('name', 'Colours') ?>
    <tr> 
      <td>Filter by Style</td>
    </tr>
    <?php generateTableRows('name', 'Style') ?>

    </table>

    
   
    <?php generateSearchSections('name', 'Categories', 'Filter by Categories') ?>
    <?php generateSearchSections('name', 'Style', 'Filter by style') ?>
    <?php generateSearchSections('name', 'Colours', 'Filter by colour') ?>
     <div class="searchoptions" >
      <table>
        <tr>
          <td class='searchtitle'> Filter by Price </td>
        </tr>
        <tr>
          <td> <input type="number" name="min" placeholder="Min Price" size="4"/> </td>
          <td> <input type="number" name="max" placeholder="Max Price" size="4"/></td>
        </tr>
      </table>
    </div>

  </form>
</div>

<ul class="tab" style="clear:left;">
    <li tab="Search">Search</li>
    <li tab="Jacket">Jacket</li>
    <li tab="Shirt">Shirt</li>
    <li tab="Pants">Pants</li>
    <li tab="Shoes">Shoes</li>
    <li tab="Tie">Tie</li>
</ul>

<div id="Search" class="tabcontent firsttab">

  <?php listProductsByQuery($select); ?>
</div>

<div id="Jacket" class="tabcontent firsttab">
  <?php listproducts(1); ?>
</div>

<div id="Shirt" class="tabcontent">
  <?php listproducts(2); ?>
</div>

<div id="Pants" class="tabcontent">
  <?php listproducts(3); ?>
</div>

<div id="Shoes" class="tabcontent">
  <?php listproducts(4); ?>
</div>

<div id="Tie" class="tabcontent">
  <?php listproducts(5); ?>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content" id="john">
    <span class="close">×</span>
    <p class="modal-text"></p>
  </div>
</div>


<?php 

$customer_id = $_SESSION['valid_id'];
$totalcost = 0.00;

if($customer_id != NULL){
  $order_id = getOrderIDFromCustID($customer_id);
    if($order_id != NULL){
    $select = "SELECT TRUNCATE(SUM(Products.price * Order_items.quantity), 2) as totalcost FROM Order_items INNER JOIN Products ON Order_items.product_id=Products.id WHERE Order_items.order_id=" . $order_id;

    $totalcost = getResultFromQuery($select, 'totalcost');
    }
}


?>

<div>
<h2>Total Price: $ <span id="totalprice"><?php echo $totalcost?></span></h2>
<script>
  var totalprice = 0.00;
  $('input[name="add_to_cart"]').click(function(){
    var value = $(this).prev().text();
    var value = parseFloat(value);
    totalprice += value;
    $('#totalprice').html(totalprice);
  });
</script>
</div>

<button type="button" class="buttonBlackInverse" onclick="location.href='checkout.php';">CHECKOUT</button>

<br><br><br><br><br><br>

</mainContent>

<script>
  
    $('form#addtomycart').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "processaddtocart.php",
        type: "POST",
        data: $(this).serialize(),
        success: function(data){
          // $('div#ordercomplete').show();
          
        },
        error: function  (jXHR, textStatus, errorThrown){},
      });
    });

</script>


</body>
    <!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/shop/searchoptions.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>

</html>