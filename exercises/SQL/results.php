<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Book-O-Rama Search Results</title>
</head>
<body>
<a href="search.html"> Return </a>

<h1>Book-O-Rama Search Results</h1>

<?php include 'php/connect_DB.php'; ?>

<?php 



?>
<?php

  if(isset($_POST['mybooks'])){
    // $update = "SELECT "
    $bookpricearray = $_POST['mybooks'];
    // $size = count($bookpricearray);
    // echo var_dump($bookpricearray);
    // echo $size;
    // echo '+++++++' . $bookpricearray['isbn'] . '+++++++';
    // for($x=0; $x<$size; $x++){
     $update = " UPDATE books SET price =" . 
     $bookpricearray['price'] . 
     " WHERE isbn = '" . $bookpricearray['isbn'] . "'";
     $result_jamjam = $db_books->query($update);
    // }
  }
  else{
    $_SESSION["searchtype"]=$_POST['searchtype'];
    $_SESSION["searchterm"]=trim($_POST['searchterm']);
    
    if (!$_SESSION["searchtype"]|| !$_SESSION["searchterm"]) {
       echo 'You have not entered search details.  Please go back and try again.';
       exit;
    }

    if (!get_magic_quotes_gpc()){
      $_SESSION["searchtype"] = addslashes($_SESSION["searchtype"]);
      $_SESSION["searchterm"] = addslashes($_SESSION["searchterm"]);
    }

}
 
  $query = "SELECT * FROM books WHERE ". $_SESSION["searchtype"] ." like '%". $_SESSION["searchterm"] ."%'";
   // $query = "SELECT * FROM books";

  $result = $db_books->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of books found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Title: ";
     echo htmlspecialchars(stripslashes($row['title']));
     echo "</strong><br />Author: ";
     echo stripslashes($row['author']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Price: ";
     echo stripslashes($row['price']);
     echo "</p>";

     echo '
     <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
        <input id="[' . $i . ']" name="mybooks[isbn] " type="hidden" value="' . $row['isbn'] . '"/>
        <input id="[' . $i . ']" name="mybooks[price] " type="text" />
        <input value="Update Price" type="submit" />
     </form>
      ';
  }

  $result->free();
  $db_books->close();

?>


</body>
</html>
