

<?php

require 'header.php';
$error=array();
require 'connection.php';

if (isset($_POST['submit'])) {
    $name=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    
    if ($name=="" || $password=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    if (count($error)==0) {
        $sql = "SELECT * FROM login WHERE email='".$name."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($password==$row['userpass'])
                {
                if ($row['email']==$name && $row['userpass']==$password) {
                    if ($row['role']=="admin") {
                        $_SESSION['userdata']=array('userid'=>$row['id'],
                        'username'=>$row['username'],'email'=>$row['email']);  
                        print_r($_SESSION['userdata']);
                        header('Location:admin.php'); 
                    } else if($row['role']=="student") {

                        $_SESSION['userdata']=array('userid'=>$row['id'],
                        'username'=>$row['username'],'email'=>$row['email']);  
                        //echo "avgqjsb";
                        print_r($_SESSION['userdata']);
                        header('Location:homeuser.php');
                    }
                }
                } else {
                        echo "<script>alert('Password Incorrect')</script>";
                }
            }
        } else {
            echo "<script>alert('Please Register First')</script>";
    } 

    } else {
        foreach ($error as $err) {
            $display=$err['msg'];
        }
    }

}

$conn->close();

?>

    























<!-- <!DOCTYPE html>
<html>
    <head>
       
    </head>
    <link rel="stylesheet" type="text/css" href="style.css"> -->
    <body>
    <h1 style="text-align: center;padding: 20px;font-style: italic;">Login</h1>
        
    <h4 id='error'><?php 
    if (count($error)>0) {
    
        echo $display; 
    } ?></h5>
        <div id="form">
        <form action="#" method="POST">
            <label><b>Email:</b></label>
            <input type="text" name="username" id="user" placeholder="Username"><br>
            <label><b>Password:</b></label>
            <input type="password" name="password"
             id="user2" placeholder="Password"><br>
            <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
      
        </form>
    </div>

    <?php

    require 'footer.php';
    ?>
    </body>
    
</html>