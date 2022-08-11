<?php

	session_start();
	include "../php/connect_DB.php";

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$paymentinfo = $_POST['paymentinfo'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	if (isset($_POST['submit'])) {
		if (empty($firstname) || empty($lastname) || empty($phone) || 
			empty($email) ||empty($address) || empty($paymentinfo) || 
			empty($username) || empty($password) || empty($password2) ) {
				// header("Location: registration.php?error=empty");
				echo "<script>" . 
					 "alert('Fill out all fields.');" . 
					 "window.location.href='javascript:history.back(1);';" . 
					 "</script>";
				exit;
		}

		else {
		
			if ($password != $password2) {
				echo "<script>" . 
					 "alert('Sorry passwords do not match.');" . 
					 "window.location.href='javascript:history.back(1);';" . 
					 "</script>";
				exit;
			} 

			else{

				$register = "SELECT username FROM Login 
						  WHERE username = '$username'";
				$resultRegister = $db->query($register);

				if ($resultRegister->num_rows >0 ) {
					//if user already registered in database
					// header("Location: registration.php?error=username");
					echo "<script>" . 
						 "alert('Username " . $username . " has already been taken.');" . 
						 "window.location.href='javascript:history.back(1);';" . 
						 "</script>";
				}

				else {
					//register user to Customers database
					$password = md5($password);
					$insert = "INSERT INTO Delivery_addresses (addr) VALUES (". $address . ")";

					$cust = "INSERT INTO Customers (firstname, lastname, phone, 
							email, address, paymentinfo) 
							VALUES ('$firstname', '$lastname', '$phone', 
							'$email', '$address', '$paymentinfo')";
					$resultCust = $db->query($cust);

					if (!$resultCust){
						echo "<script>" . 
							 "alert('Customer query failed.');" . 
							 "window.location.href='javascript:history.back(1);';" . 
							 "</script>";
					}

					else {
						//register user to Login database
						$select = "SELECT * FROM Customers WHERE email='$email'";
						$resultSelect = $db->query($select);
						$rowCust = $resultSelect->fetch_assoc();
						$id = $rowCust['id'];
						$login = "INSERT INTO Login (customer_id, username, password) 
								 VALUES (" . $id . " , '" . $username . "', '" . $password . "')";
						$resultLogin = $db->query($login);

						if (!$resultLogin) {
							echo "<script>" . 
								 "alert('Login query failed.');" . 
								 "window.location.href='javascript:history.back(1);';" . 
								 "</script>";
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
    <link href="../../static/css/register/register.css" rel="stylesheet" type="text/css">

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
							//registration successful
							echo 
								"<center>" . 
								"<h1>Registration</h1>" . 
								"<h2>You are now registered!</h1>" . 
								"Welcome ". $firstname . " " . $lastname . "<br/>" . 
								"<button type='button' class='button buttonBlack' onclick='location.href=\"../index/index.php\";'>LOGIN</button>" . 
								"</center>";
						}
					}
				}
			}
		}
	}
		
?>

</mainContent>

</body>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>

</html>