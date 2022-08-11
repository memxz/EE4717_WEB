<?php
// Defines and connect to DB

  DEFINE('DB_USER', 'ee4717');
  DEFINE('DB_PASSWORD', 'johnandrobert');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'johnlim');

  DEFINE('COFFEE1', 'justjava');
  DEFINE('COFFEE2', 'cafeaulait');
  DEFINE('COFFEE3', 'icedcappucino');

  DEFINE('NAME', 'coffeename');
  DEFINE('P_SINGLE', 'price_single');
  DEFINE('P_DOUBLE', 'price_double');
  DEFINE('P_ENDLESS', 'price_endless');

  $cf[0] = COFFEE1;
  $cf[1] = COFFEE2;
  $cf[2] = COFFEE3;

  class Coffee {
    public $NAME;
    public $P_SINGLE;
    public $P_DOUBLE;
    public $P_ENDLESS;
  }

  @ $db_jamjam = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if (mysqli_connect_errno()){
    echo "Hey you piece of junk, cannot connect to DB lah";
    exit;
  }

   $insert = "INSERT into jamjamproducts (NAME, P_SINGLE, P_DOUBLE, P_ENDLESS) values('$coffeename', '$price_single','$price_double','$price_endless') ";
  $select = "SELECT * FROM jamjamproducts WHERE ";
  $update = "UPDATE jamjamproducts SET price_single=1.45 WHERE coffeename='Just Java'";

  $coffeename = $_POST[NAME];
  $price_single = $_POST[P_SINGLE];
  $price_double = $_POST[P_DOUBLE];
  $price_endless = $_POST[P_ENDLESS];

  $coffee[COFFEE1] = $_POST[COFFEE1];
  $coffee[COFFEE2] = $_POST[COFFEE2];
  $coffee[COFFEE3] = $_POST[COFFEE3];

  $coffeestring[COFFEE1] = "coffeename='Just Java' ";
  $coffeestring[COFFEE2] = " coffeename='Cafe Au Lait' ";
  $coffeestring[COFFEE3] = "coffeename='Iced Cappuccino' ";

  
// to generate table columns
  


?>