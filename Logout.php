<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.




    //$_SESSION['cart1'] = array();

    session_destroy();
    header("Location:index.php");




?>