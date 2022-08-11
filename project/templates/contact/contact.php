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
    if (!empty($_SESSION['valid_userid'])) {
        echo 
            "<h2>Welcome " . $_SESSION['valid_firstname'] . " " . $_SESSION['valid_lastname'] . "!</h2>" . 
            "You are logged in as: " . $_SESSION['valid_userid'] . " <br />" . 
            "<button type='button' class='buttonBlackInverse' onclick='location.href=\"../register/logout.php\";'>LOGOUT</button><br>";
    }
?>

<img src="../../static/img/contact/contactUs.png" id="contactUs">

            <form name="contact" method="POST" action="enquiry.php" id="contact_form">

                <fieldset id="contact">

                    <legend><h1>Contact Us</h2></legend>
                    <br>

                    <label for="myfirstname"> First Name<sup>*</sup> </label>
                    <input type="mytext" name="myfirstname" id="myfirstname" value="<?php echo $_SESSION['valid_firstname'] ?>" >

                    <label for="mylastname"> Last Name<sup>*</sup> </label>
                    <input type="text" name="mylastname" id="mylastname" value="<?php echo $_SESSION['valid_lastname'] ?>" >

                    <label for="myemail"> Email<sup>*</sup> </label>
                    <input type="text" name="myemail" id="myemail" value="<?php echo $_SESSION['valid_email'] ?>" >

                    <label for="myphone"> Mobile </label>
                    <input type="text" name="myphone" id="myphone" value="<?php echo $_SESSION['valid_phone'] ?>">

                    <label for="myenquiry"> Type of Enquiry </label>
                    <select name="myenquiry" id="myenquiry">
                        <option value="general">General Enquiry</option>
                        <option value="product">Products/Services</option>
                        <option value="shipping">Shipping</option>
                        <option value="order">Order Status</option>
                        <option value="website">Website</option>
                    </select><br>

                    <label for="mycomment"> Comments<sup>*</sup> </label>
                    <textarea name="mycomment" id="mycomment" cols="20" rows="6" ></textarea>

                </fieldset>
                
                <button class="button buttonBlack inlineBlock" type="submit" name="submit" id="submit">SUBMIT</button>
                <button class="button buttonBlack inlineBlock" type="reset" id="reset">RESET</button>
            </form>

            <h1>Locate Us</h1>
            <table id="locate">
                <tr>
                    <td id="locateText">
                        <b id="company">Mix &amp; Match Pte Ltd</b>
                        <p id="description">Computer Lab II<br>
                        50 Nanyang Avenue<br>
                        Singapore 639798<br>
                        <a href="#mailto:enquiry@mixnmatch.com">enquiry@mixnmatch.com</a><br>
                        (+65) 8765 4321<br></p>

                    </td>
                    <td id="locateImg">
                        <img src="../../static/img/contact/map.png" id="locateUs">
                    </td>
                </tr>
            </table>
            <br><br><br><br>
            
</mainContent>

<!-- Form Validation Javascript-->
<script src="../../static/js/contact/contact.js"></script>

<!--Button toggling Javascript-->
<script src="../../static/js/generateContent/baseContent.js"></script>
<!-- <script src="{%  static 'js/plugins/morris/raphael.min.js'%}"></script> -->

</body>
</html>