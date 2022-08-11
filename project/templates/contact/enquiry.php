<?php

	session_start();
	include "../php/connect_DB.php";

	$myfirstname = $_POST['myfirstname'];
	$mylastname = $_POST['mylastname'];
	$myphone = $_POST['myphone'];
	$myemail = $_POST['myemail'];
	$myenquiry = $_POST['myenquiry'];
	$mycomment = $_POST['mycomment'];

	if (isset($_POST['submit'])) {

		if (empty($myfirstname) || empty($mylastname) || empty($myphone) || 
			empty($myemail) || empty($mycomment) ) {
				// header("Location: contact.php?error=empty");
				echo "<script>" . 
					 "alert('Fill out all necesary fields.');" . 
					 "window.location.href='javascript:history.back(1);';" . 
					 "</script>";
				exit;
		}

		else {
			//if enquirer is not logged in or unregistered
			echo "Enquirer is not logged in or unregistered in database.";
			$enquiry = "INSERT INTO Enquiries (firstname, lastname, email, phone, type, comment) 
					 	VALUES ('$myfirstname', '$mylastname', '$myemail', '$myphone', '$myenquiry', '$mycomment')";
			$resultEnquiry = $db->query($enquiry);

			if (!$resultEnquiry) {
				echo "<script>" . 
					 "alert('Enquiry query failed.');" . 
					 "window.location.href='javascript:history.back(1);';" . 
					 "</script>";
				exit;
			}

			else {
?>

<html lang="en">
<!-- Base for Dashboard -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Registration CSS -->
    <link href="../../static/css/contact/contact.css" rel="stylesheet" type="text/css">

    <!-- Common CSS -->
        <!-- Core CSS -->
        <link href="../../static/css/core/core.css" rel="stylesheet" type="text/css">
        
        <!-- Template CSS -->
        <link href="../../static/css/core/template.css" rel="stylesheet" type="text/css">

        <!-- Custom Fonts -->
        <link href="../../static/css/core/customfonts.css" rel="stylesheet" type="text/css">

        <!--jQuery libraries-->
        <script src="../../static/js/core/jquery-1.11.3.min.js"></script>
</head>

<body>

<mainContent>

<?php
				echo 
					"<center>" . 
					"<h1>Contact Us</h1>" . 
					"<h2>Your comment has been sent!</h1>" . 
					"Thank you ". $myfirstname . " " . $mylastname . ". Your feedback is important to us.<br/>" . 
					"We will get back to you as soon as possible." . 
					"</center>";
			}
		}
	}

?>

</mainContent>

</body>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
<!--     <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script> -->

</html>