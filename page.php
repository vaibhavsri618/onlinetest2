<?php
require 'connection.php';
session_start();
if(!isset($_SESSION['array2']))
{
$_SESSION['array2']=array();
}

$category = $_SESSION['status'];
if (isset($_POST['category'])) {
    $category = $_POST['category'];
    $offset = $_POST['offset'];
}

if(isset($_POST['radioval']))
{
    $radioval=$_POST['radioval'];
   
    array_push($_SESSION['array2'],$radioval);
   print_r($_SESSION['array2']);
   
} 


$limit = 1;

$sql5 = "SELECT id as qid from addagn WHERE category='" . $category . "'";
$result5 = $conn->query($sql5);
$countques = $result5->num_rows;

$sql = "SELECT id as qid from addagn WHERE category='" . $category . "' LIMIT {$offset},{$limit}";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $length = $result->num_rows;
    while ($row = $result->fetch_assoc()) {

        $qid = $row['qid'];

        $sql2 = "SELECT * FROM addtest where qid=" . $qid . "";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                echo "<p style='margin-left:20px'>Ques:-" . $row2['question'] . "</p>";




                $sql3 = "SELECT * FROM addanswer where qid=" . $qid . "";
                $result3 = $conn->query($sql3);

                

                if ($result3->num_rows > 0) {

                    while ($row3 = $result3->fetch_assoc()) {
                        
                        echo "<p style='margin-left:40px'><input type='radio' id='radio' name='radio[" . $row3['qid'] . "]' value=" . $row3["id"] . ">" . $row3["answer"] . "</p>";
                       
                    }
                    
                    if ($offset < ($countques-1)) {
                        echo "<a href='pagination.php?offset=" . ($offset + 1) . "' id='a' name='submit1'>Next</a></button2>";
                       
                    } else {
                        echo '<input type="submit" name="submit" id="submit2">';
                    }
                    
                    ?>
                    
                    <script>
                    
                      
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

                      
                    </script>

                    <?php
                                    } else {

                }

            }
        } else {

        }

    }

}




?>
                <!-- </div>

             <input type="submit" name="submit" id="submit2">
             <br> -->
