<?php

session_start();
if (isset($_SESSION['userdata'])) {
    if (isset($_GET['id'])) {
        $status=$_GET['id'];
        $_SESSION['status']=$_GET['id'];
        echo $status;
        if ($status=="Aptitude") {
            header("Location:pagination.php");
        }

        if ($status=="Reasoning") {
            header("Location:pagination.php");
        }

        if ($status=="Coding") {
            header("Location:pagination.php");
        }



    }
} else {
    header("Location:Loginalert.php");
}
?>
