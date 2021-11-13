<?php 

session_start();

?>



<html>
    <head>
        <title>Admin</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styleadmin.css">
    <body>
        <div class="main">
            <div id="asider">
                <h3 style="color:white">Hello Admin</h3>

                <ul>
                    <li class="li"><a href="admin.php">Dashboard</a></li>
                    <li class="li"><a href="#">Test</a>
                    <ul class="ul">
                    <li class="li"><a href="addtest.php">
                    Add Test</ul></li>
                    <!-- <li class="li"><a href="coding.php"
                    >Manage Test</li></ul></li> -->
                    <li class="li"><a href="category.php">Add New Test Category </li>
                    

                </ul>

            </div>
            <div class="container"> 
                <?php
                echo '<a href="Logout.php" id="a">Logout</a>';
                if (isset($_SESSION['userdata'])) {
                    echo "<h1 style='margin:10px 0px 0px 35%'>Welcome 
                        ".$_SESSION["userdata"]["username"]."</h1>";
                }
                
                ?>

            </div>

        </div>
    </body>
</html>