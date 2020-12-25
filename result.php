<?php

require 'connection.php';
$c = 0;
require 'header.php';
// echo '<a id="button" href="Logout.php" >Logout</a>';
if (isset($_SESSION['userdata'])) {
    $name = $_SESSION['userdata']['username'];
    if (isset($_SESSION['status'])) {
        $category = $_SESSION['status'];
        if (isset($_POST['submit'])) {
            if (!empty($_POST['radio'])) {
                $count = count($_SESSION['array2']);

                //echo $count;
                $check = $_POST['radio'];
                foreach ($check as $key => $val) {
                    $val = $val;
                }

                array_push($_SESSION['array2'], $val);
                // print_r($_SESSION['array2']);
                $sql = "SELECT * FROM addtest";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        foreach ($_SESSION['array2'] as $ans) {

                            if ($ans == $row['aid']) {
                                $c = $c + 1;
                            }
                        }
                    }

                }
                $per = ($c) * 10;

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
                <p><?php echo $count . "(";

                foreach ($_SESSION['array2'] as $que => $ans) {
                    echo $que + 1 . ",";
                }

                echo ")";

                ?></p>
            </div>

            <div class="left">
                <p>Percentage Of Marks Obtain</p>

            </div>
            <div class="right">
                <p><?php
echo "Your Score is " . $per . "% <br>";
                unset($_SESSION['array2']);
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