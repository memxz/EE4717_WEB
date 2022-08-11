<?php
    session_start();
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
    <link href="../../static/css/about/about.css" rel="stylesheet" type="text/css">


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
        if (!empty($_SESSION['valid_userid'])) {
            echo 
                "Welcome " . $_SESSION['valid_firstname'] . " " . $_SESSION['valid_lastname'] . "! <br />" . 
                "You are logged in as: " . $_SESSION['valid_userid'] . " <br />" . 
                "<button type='button' class='buttonBlackInverse' onclick='location.href=\"../register/logout.php\";'>LOGOUT</button><br>";
        }
    ?>

    <div class="center">
        <h1>About Us</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div id="howitworks" class="center">
        <h2>How It Works</h2>
        <div id="clothing">
            <img src="../../static/img/index/main_clothing.png"><br>
            <p>Choose your CLOTHING</p>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
        </div>
        <div id="design">
            <img src="../../static/img/index/main_design.png"><br>
            <p>Choose your DESIGN</p>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
        </div>
        <div id="size">
            <img src="../../static/img/index/main_size.png"><br>
            <p>Choose your SIZE</p>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
        </div>
    </div>
    <!-- Image Slider -->
    <div id="imgSlider" class="w3-content" style="max-width:1200px">
        <h2>Our Satisfied Customers</h2>
        <div class="w3-row-padding w3-section">
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider1.png" style="width:100%" onclick="currentDiv(1)">
            </div>
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider2.png" style="width:100%" onclick="currentDiv(2)">
            </div>
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider3.png" style="width:100%" onclick="currentDiv(3)">
            </div>
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider4.png" style="width:100%" onclick="currentDiv(4)">
            </div>
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider5.png" style="width:100%" onclick="currentDiv(5)">
            </div>
            <div class="w3-col">
                <img class="demo w3-border w3-hover-shadow" src="../../static/img/about/about_slider6.png" style="width:100%" onclick="currentDiv(6)">
            </div>
        </div>

        <img class="mySlides" src="../../static/img/about/about_feedback1.png" style="width:100%">
        <img class="mySlides" src="../../static/img/about/about_feedback2.png" style="width:100%">
        <img class="mySlides" src="../../static/img/about/about_feedback3.png" style="width:100%">
        <img class="mySlides" src="../../static/img/about/about_feedback4.png" style="width:100%">
        <img class="mySlides" src="../../static/img/about/about_feedback5.png" style="width:100%">
        <img class="mySlides" src="../../static/img/about/about_feedback6.png" style="width:100%">
    </div>

</mainContent>

</body>

<!-- Image Slider Javascript -->
    <script src="../../static/js/about/feedback.js"></script>

<!--Button toggling Javascript-->
    <script src="../../static/js/generateContent/baseContent.js"></script>
    <script src="../../static/js/generateContent/inDivTabs.js"></script>
    <script src="../../static/js/core/modal.js"></script>
</html>