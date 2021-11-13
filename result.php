<?php

require 'connection.php';
$c = 0;
require 'header.php';
if (isset($_SESSION['userdata'])) {
    $name = $_SESSION['userdata']['username'];
    if (isset($_SESSION['status'])) {
        $category = $_SESSION['status'];
        if (isset($_POST['submit'])) {
            if (!empty($_POST['radio'])) {
               
                //echo $count;
                $check = $_POST['radio'];
                foreach ($check as $key => $val) {
                    $val = $val;
                }
                if(!empty($_SESSION['array2'])) {
                    array_push($_SESSION['array2'], $val);
                
                    $count = count($_SESSION['array2']);

                    foreach($_SESSION['array2'] as $val) {
                        $sql = "SELECT * FROM addtest WHERE `aid` =".$val;
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $c++;
                            
                        }
                    }
                    $per = ($c * 100)/count($_SESSION['array2']);

                    $sql20 = "INSERT INTO user (username, category, mark)
                            VALUES ('" . $name . "', '" . $category . "', '" . $per . "')";

                    if ($conn->query($sql20) === true) {

                    }

                    //echo $c;
                    if ($per > 39) {
                        echo "<h3 id='h3'>Congrats You have Successfully Clear the test</h3>";
                    } else {
                        echo "<h4 id='h4'>Oops!!Hard Luck .... You have'nt clear the test</h4>";
                    }
                }
                ?>



    <link rel="stylesheet" type="text/css" href="resultstyle.css">
    <body>
        <div id="header">
            <div id="main">
                <h2>Result</h2>

            </div>
            <div id="content">
            <div class="left">
                <p>Question Attempted</p>

            </div>
            <div class="right">
                <p><?php 
                if(!empty($_SESSION['array2'])) {
                
                $str="";
                echo $count . "( ";

                foreach ($_SESSION['array2'] as $que => $ans) {
                    $str.=$que + 1 . ",";
                }
                $str=rtrim($str,",");
                echo $str." )";

            } else {
                echo "-";
            }?></p>
            </div>

            <div class="left">
                <p>Percentage Of Marks Obtain</p>

            </div>
            <div class="right">
                <p><?php if(!empty($per)) {
                    echo "Your Score is " . $per . "% <br>";
                    unset($_SESSION['array2']);
                } else {
                    echo "-";
                }
                ?></p>
            </div>
            <br>

            </div>
        </div>

        <script>
            $(document).ready(function()
                {
                function disablePrev()
                {
                window.history.forward()
                }
                window.onload = disablePrev();

                window.onpageshow = function(evt)
                {
                if (evt.persisted)
                {
                disableBack() ;
                }
                }
                });
        </script>

    </body>
</html>

                <?php

            } else {
                echo "<script>alert('Please Tick any question');
                window.location='homeuser.php';
                </script>";

            }

        }
    }
}

?>