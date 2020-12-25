<?php

require 'connection.php';
session_start();
echo '<a href="Logout.php" style="float:right">Logout</a>';
if (isset($_SESSION["userdata"])) {


    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Aptitude Test</title>
    </head>
    <link rel="stylesheet" type="text/css" href="test.css">
    <body>
        <div id="main">
            <h1 id="h2">Welcome <?php echo $_SESSION["userdata"]["username"]?> to <?php echo $_SESSION['status']?> Test Set 1</h1>
            <div id="content">
                <form method="post" action="result.php">
                <?php
                $category=$_SESSION['status'];
                $sql="SELECT qid from addagn WHERE category='".$category."'";
                $result=$conn->query($sql);
                if ($result->num_rows > 0) {
                    $length=$result->num_rows;
                    while ($row=$result->fetch_assoc()) {
                        $qid=$row['qid'];
                        $sql2 = "SELECT * FROM addtest where qid=".$qid."";
                        $result2 = $conn->query($sql2);
    
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<p style='margin-left:20px'>Ques:-".$row2['question']."</p>";   
                                $sql3 = "SELECT * FROM addanswer where qid=".$qid."";
                                $result3 = $conn->query($sql3);
            
                                if ($result3->num_rows > 0) {
                                    while ($row3 = $result3->fetch_assoc()) {
                                        echo "<p style='margin-left:40px'><input type='radio' name='radio[".$row3['qid']."]' value=".$row3["aid"].">".$row3["answer"]."</p>";    
                                
                                    }
                                } else {
                                
            
                                    
                                }
             
                        
                            }
                        } else {
                        
    
                            
                        }
    
                    }

                }
            
                ?>
                </div>
        
             <input type="submit" name="submit" id="submit2">   
             <br>
            </form>
            </div>
    </body>
</html>
<?php } else {
    header("Location:Loginalert.php");
}
?>