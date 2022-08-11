

<?php
  DEFINE('DB_USER', 'ee4717');
  DEFINE('DB_PASSWORD', 'johnandrobert');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'bookDB');

  @ $db_books = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if (mysqli_connect_errno()){
    echo "Hey you piece of junk, cannot connect to DB lah";
    exit;
  }
?>