<?php 
session_start();
include_once 'includes/login.inc.php';
include_once 'includes/signup.inc.php';
include_once 'includes/logout.inc.php';
include_once 'includes/upload.inc.php';
include_once "includes/dbh.inc.php";

?>

<html>

<head>
    <title>...</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/w3-theme-blue-grey.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom_style.css" />


</head>
<?php include_once "main.php";?>
	
	<script>
         $(document).on("click", "#show_comment_form", function () {
            var div_to_tigger = $(this).data('div_to_tigger');
            comm=document.getElementById(div_to_tigger);
            $(comm).slideToggle();
        });

        $("#goto_sign_in").click(function(){
            $("#page-signup").slideToggle("slow",function(){$("#page-sign_in").slideToggle("slow")});
        })
        $("#goto_signup").click(function(){
            $("#page-sign_in").slideToggle("slow",function(){$("#page-signup").slideToggle("slow")});
            
        })

        // Used to toggle the menu on smaller screens when clicking on the menu button
        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>



</body>

</html>