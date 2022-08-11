<?php
  DEFINE('DB_USER', 'ee4717');
  DEFINE('DB_PASSWORD', 'johnandrobert');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_NAME', 'johnlim');

@$dbcnx = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
// @ to ignore error message display //
if ($dbcnx->connect_error){
	echo "Database is not online"; 
	exit;
	// above 2 statments same as die() //
	}
/*	else
	echo "Congratulations...  MySql is working..";
*/
if (!$dbcnx->select_db ("johnlim"))
	exit("<p>Unable to locate the database</p>");
?>	