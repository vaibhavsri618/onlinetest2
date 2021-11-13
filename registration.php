<?php

require 'connection.php';
require 'header.php';
$error=array();
if (isset($_POST['submit'])) {
    //print_r($_POST);die;
    $username=isset($_POST['username'])?$_POST['username']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";
    $confirmpassword=isset($_POST['confirmpassword'])?$_POST['confirmpassword']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";

    if ($username=="" || $password=="" || $confirmpassword=="" || $email=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    if ($password!=$confirmpassword) {
        $error[]=array("id"=>'form','msg'=>"Password does not matches ");
    }

    
    $sql1 = "SELECT * FROM login WHERE username='".$username."'";
    $result = $conn->query($sql1);
    if ($result->num_rows > 0) {
        $error[]=array("id"=>'form','msg'=>"Username already present");

    } 

    $sql2 = "SELECT * FROM login WHERE email='".$email."'";
        $result1 = $conn->query($sql2);

    if ($result1->num_rows > 0) {
        $error[]=array("id"=>'form','msg'=>"Email already Exist please try with 
        any other email");

    }   
    
    if (count($error)==0) {

            $sql = "INSERT INTO login (username, userpass, email, role)
            VALUES ('".$username."', '".$password."', '".$email."', 'student')";
        if ($conn->query($sql) === true) {
            echo '<p style="color:green;margin-left:30%;font-size:20px;
            margin-top:10px">Registration done successfully.Please <a href="homeuser.php">Click here</a> to login <p>';
        } else {
        }
    } else {
        foreach ($error as $err) {
            $display=$err['msg'];
        }
    }

    $conn->close();

   // header("Location:homeuser.php");
}

?>



   
    






















    <body>
    <h1 style="text-align: center;padding: 20px;font-style: italic;">
    Welcome , Please Fill the Form to Register Youself</h1>
        
    <h4 id='error'><?php 
    if (count($error)>0) {
    
        echo $display; 
    } ?></h4>
        <div id="form">
        <form action="#" method="POST">
            <label><b>UserName:</b></label>
            <input type="text" name="username" id="user" placeholder="Username"><br>
            <label><b>Password:</b></label>
            <input type="password" name="password"
             id="user10" placeholder="Password"><br>
            <label><b>Confirm Password:</b></label>
            <input type="password" name="confirmpassword" 
            id="user1" placeholder="Confirm Password"><br>
            <label><b>Email:</b></label>
            <input type="email" name="email" id="user4" placeholder="Email"><br><br>
            <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success">
      
        </form>
       
    </div>
    </body>
</html>