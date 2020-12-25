<?php 

session_start();
$error=array();
require 'connection.php';
   
if (isset($_SESSION['userdata'])) {
    if (isset($_POST['submit'])) {
        $name=isset($_POST['name'])?$_POST['name']:'';

        $image=isset($_POST['image'])?$_POST['image']:'';
        $about=isset($_POST['about'])?$_POST['about']:'';

        if ($name=="" || $about=="" || !empty($_POST['image'])) {
            $error[]=array("id"=>'form','msg'=>"Field cant be empty");
        }

        $sql1 = "SELECT * FROM test WHERE name='".$name."'";
        $result = $conn->query($sql1);
    
        if ($result->num_rows > 0) {
            $error[]=array("id"=>'form','msg'=>"Same Question already present");
    
        } 


        $filename = $_FILES["image"]["name"]; 
        $tempname = $_FILES["image"]["tmp_name"];     
        $folder = "images/".$filename; 

        if (count($error)==0) {

            $sql = "INSERT INTO test 
            (name, image, about)
            VALUES ('".$name."','".$filename."','".$about."')";
    
    
    
            if ($conn->query($sql) === true) {
                echo "<p style='margin-left:18%;color:green'><b>Test Category added successfully<b></p> <br>";
                if (move_uploaded_file($tempname, $folder)) { 
                } else { 
                    echo "Failed to upload image"; 
                } 
             
    
            } else {
    
            } 
        } else {
            foreach ($error as $err) {
                $display=$err['msg'];
            }
       

        } 
    
        
        
    

    }
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
            <?php echo '<a href="Logout.php" id="a">Logout</a>';
            if (isset($_SESSION['userdata'])) {
                echo "<h1 style='margin:10px 0px 0px 35%'>Welcome 
                ".$_SESSION["userdata"]["username"]."</h1>";
            }
            ?>
                

            <h4 id='error'><?php 
            if (count($error)>0) {
            
                echo $display; 
            } ?></h4>
            
                

                <form action="#" method="post" enctype="multipart/form-data">
                <label> Category Name:</label>
                <input type="text" name="name" id="name"><br>
               
                <label>Image:</label>
                <input type="file" name="image" id="image"><br>
                <label>About:</label>
                <input type="text" name="about" id="about"><br>
                <input type="submit" name="submit" value="Submit" id="submit1">
</form>
               
               

            </div>

        </div>
    </body>
</html>