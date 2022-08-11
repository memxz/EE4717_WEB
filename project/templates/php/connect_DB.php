<?php

  session_start();

  DEFINE('DB_USER', 'root');
  DEFINE('DB_PASSWORD', 'pepper25');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'MixAndMatch');

  @ $db = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if (mysqli_connect_errno()){
    echo "Unable to connect to database.";
    exit;
  }

  if (!$db->select_db ("MixAndMatch"))
	exit("<p>Unable to locate the database</p>");
?>