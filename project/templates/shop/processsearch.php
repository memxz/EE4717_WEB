<?php 
include '../php/connect_DB.php'; 
include 'functions.php';
?>

<?php



  // generateSearchArray('name', 'Categories');
  // generateSearchArray('name', 'Colours');
  // generateSearchArray('name', 'Style');
  $flag=1;
  $select = "SELECT * FROM Products WHERE ";
  $select = generateSearchStringFromParamTableKeyArray($select, 'cat_id', 'name', 'Categories');
  $select = generateSearchStringFromParamTableKeyArray($select, 'colour_id', 'name', 'Colours');
  $select = generateSearchStringFromParamTableKeyArray($select, 'style_id', 'name', 'Style');

  // wildcard search
  echo $select;

  $result=$db->query($select);

  ?>