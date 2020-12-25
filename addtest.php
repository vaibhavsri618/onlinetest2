<?php 

session_start();
require 'connection.php';
$error=array();
if (isset($_SESSION['userdata'])) {
    if (isset($_POST['submit'])) {
        $question=isset($_POST['question'])?$_POST['question']:"";
        $opt1=isset($_POST['opt1'])?$_POST['opt1']:"";
        $opt2=isset($_POST['opt2'])?$_POST['opt2']:"";
        $opt3=isset($_POST['opt3'])?$_POST['opt3']:"";
        $opt4=isset($_POST['opt4'])?$_POST['opt4']:"";
        $answer=isset($_POST['answer'])?$_POST['answer']:"";
        $select=isset($_POST['select'])?$_POST['select']:'';
   
        
        if ($question=="" || $opt1=="" || $opt2=="" || $opt3=="" || $opt4=="" || $answer=="") {
            $error[]=array("id"=>'form','msg'=>"Field cant be empty");
        }

        if ($select=="Select") {
            $error[]=array("id"=>'form','msg'=>"Please select Catelogy");
        }
       

        $sql1 = "SELECT * FROM addagn WHERE question='".$question."'";
        $result = $conn->query($sql1);
    
        if ($result->num_rows > 0) {
            $error[]=array("id"=>'form','msg'=>"Same Question already present");
    
        } 
        if ($answer!=$opt1 && $answer!=$opt2 && $answer!=$opt3 && $answer!=$opt4) {
            $error[]=array("id"=>'form','msg'=>"Answer does'nt matches with provided option");
     
        }
        
        if (count($error)==0) {
            $sql2="INSERT INTO addagn(question,category,correctans) VALUES
             ('".$question."','".$select."','".$answer."')";
            if ($conn->query($sql2) === true) {
            } 

            $sql3="SELECT qid FROM addagn WHERE question='".$question."'";
            $result2=$conn->query($sql3);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $qid=$row['qid'];
                }
            }

            $sql4="INSERT INTO addanswer(answer,category,qid) VALUES 
            ('".$opt1."','".$select."','".$qid."'),
            ('".$opt2."','".$select."','".$qid."'),
            ('".$opt3."','".$select."','".$qid."'),
            ('".$opt4."','".$select."','".$qid."')";
           



            if ($conn->query($sql4)==true) {
                
            }

            $sql5="SELECT aid FROM addanswer WHERE answer='".$answer."'";
            $result5=$conn->query($sql5);
            if ($result5->num_rows > 0) {
                while ($row5 = $result5->fetch_assoc()) {
                    $aid=$row5['aid'];
                }
            }


            $sql6="INSERT INTO addtest(qid,category,question,correctans,aid) VALUES
             ('".$qid."','".$select."','".$question."','".$answer."','".$aid."')";
            if ($conn->query($sql6) === true) {
                echo '<p style="color:green;margin-left:30%;font-size:20px;
                margin-top:10px">Question Added successfully<p>';
            
            } 





        } else {
            foreach ($error as $err) {
                $display=$err['msg'];
            }
        }
    
    
    }

} else {
    header("Location:Loginalert.php");
}

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
                    <li class="li">Dashboard</li>
                    <li class="li"><a href="#">Test</a>
                    <ul class="ul">
                    <li class="li"><a href="addtest.php">
                    Add Test</li>
                    <li class="li"><a href="coding.php"
                    >Manage Test</li></ul></li>
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

                <h2 id="h2">Add Question for Aptitude Test</h2>
                

                <h4 id='error'><?php 
                if (count($error)>0) {
                
                    echo $display; 
                } ?></h5>
                <form action="#" method="post">
                <label>Question Category:</label>
                <select name="select" id="select">
                <option value="Select">Select</option>
                <?php
                $sql10 = "SELECT * FROM test";
                $result10 = $conn->query($sql10);
                
                if ($result10->num_rows > 0) {
                    
                    while ($row10 = $result10->fetch_assoc()) {
                        echo "<option value='".$row10['name']."'>
                        ".$row10['name']."</option>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                       

                </select><br><br>
                <label>Question:</label><br>
                <textarea id="question" name="question" rows="4" cols="110">
                </textarea><br>
                <label>Option1:</label>
                <input type="text" name="opt1" class="opt"><br>
                <label>Option2:</label>
                <input type="text" name="opt2" id="opt2" class="opt"><br>
                <label>Option3:</label>
                <input type="text" name="opt3" id="opt3" class="opt"><br>
                <label>Option4:</label>
                <input type="text" name="opt4" id="opt4" class="opt"><br>
                <label>Correct Answer:</label>
                <input type="text" name="answer" id="answer"><br>
                <input type="submit" name="submit" value="Submit" id="submit">
</form>
               
               
                
            </div>

        </div>
    </body>
</html>