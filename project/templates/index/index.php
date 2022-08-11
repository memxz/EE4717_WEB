
<?php 
include "../php/connect_DB.php";
 ?>
<html lang="en">
<!-- Base for Dashboard -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Index CSS -->
    <link href="../../static/css/index/index.css" rel="stylesheet" type="text/css">

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
    include "../php/connect_DB.php";

    if (isset($_POST['userid']) && isset($_POST['password'])) {
      // if the user has just tried to log in
      $userid = $_POST['userid'];
      $password = $_POST['password'];

      $password = md5($password);
      $login = "SELECT * FROM Login 
                WHERE username = '$userid' and password = '$password'";
      $resultLogin = $db->query($login);

      if ($resultLogin->num_rows >0 ) {
        // if user is registered in database
        $rowLogin = $resultLogin->fetch_assoc();
        $customerid = $rowLogin['customer_id'];

        $cust = "SELECT * FROM Customers WHERE id = " . $customerid . ";";
        $resultCust = $db->query($cust);
        $rowCust = $resultCust->fetch_assoc();
        $firstname = $rowCust['firstname'];
        $lastname = $rowCust['lastname'];
        $email = $rowCust['email'];
        $phone = $rowCust['phone'];

        $_SESSION['valid_userid'] = $userid;
        $_SESSION['valid_firstname'] = $firstname;
        $_SESSION['valid_lastname'] = $lastname;
        $_SESSION['valid_email'] = $email;
        $_SESSION['valid_phone'] = $phone;
        $_SESSION['valid_id'] = $customerid;

      }

      //var_dump ($_SESSION);
      $db->close();
    }
?>
    <!-- Login Form -->
    <?php

      if (isset($_SESSION['valid_userid']))
      {
        echo 
            "<h2>Welcome " . $_SESSION['valid_firstname'] . " " . $_SESSION['valid_lastname'] . "!</h2>" . 
            "You are logged in as: " . $_SESSION['valid_userid'] . " <br />" . 
            "<button type='button' class='buttonBlackInverse' onclick='location.href=\"../register/logout.php\";'>LOGOUT</button>";
      }
      else
      {
        if (isset($userid))
        {
          // if they've tried and failed to log in
          echo 'Could not log you in.<br />';
        }
        else 
        {
          // they have not tried to log in yet or have logged out
          echo 'You are not logged in.<br />';
        }

        // provide form to log in 
        // echo '<div id="login" class="w3-content">';
        echo 
            '<form method="post" action="index.php">' . 
            '<input type="text" name="userid" placeholder="username" style="margin-right: 5px;">' . 
            '<input type="password" name="password" placeholder="password" style="margin-right: 5px;"">' . 
            '<button class="button buttonBlack" type="submit">LOGIN</button>' . 
            '</form>';
            '<a href="../register/registration.html">Sign up as a member</a>';
        // echo '</div>';
      }
    ?>

    <div id="imgSlider" class="w3-content w3-display-container shadow" style="max-width:800px">
        <!-- Image Slider -->
        <a href="../about/about.html"><img class="mySlides" src="../../static/img/index/main_slider1.png" style="width:100%"></a>
        <a href="../shop/browse.php"><img class="mySlides" src="../../static/img/index/main_slider2.png" style="width:100%"></a>
        <a href="../contact/contact.html"><img class="mySlides" src="../../static/img/index/main_slider3.png" style="width:100%"></a>
        <div class="w3-center w3-section w3-large w3-text-white w3-display-bottomleft" style="width:100%">
            <div class="w3-left w3-padding-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
            <div class="w3-right w3-padding-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
            <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
        </div>
    </div>

    <div class="floatingImg">
        <img src="../../static/img/index/main_formal3.png">
    </div>

    <div id="aboutUs">
        <h2>ABOUT MIX &amp; MATCH</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <div id="howitworks">
        <h2>HOW IT WORKS</h2>
        <div id="clothing">
            <p>Choose your</p>
            <b>CLOTHING</b>
        </div>
        <div id="design">
            <p>Choose your</p>
            <b>DESIGN</b>
        </div>
        <div id="size">
            <p>Choose your</p>
            <b>SIZE</b>
        </div>
        
        <button type="button" class="buttonBlackInverse" onclick="location.href='../shop/browse.php';">SHOP NOW</button>
    </div>

    <div id="greyBanner">
    </div>

    <div id="howtomeasure">
        <h2>HOW TO MEASURE YOURSELF</h2>

        <!-- YouTube media player -->
        <iframe width="400" height="225" src="https://www.youtube.com/embed/nwBniB9amJY" frameborder="0"></iframe>

        <br><br><br>
    </div>

</mainContent>

</body>

<!-- Image Slider Javascript -->
    <script src="../../static/js/index/imgSlider.js"></script>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/itemCategories.js"></script>
    <script src="../../static/js/core/modal.js"></script>

</html>