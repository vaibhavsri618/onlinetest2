
<?php

session_start();
echo '<a href="Logout.php" style="float:right;margin:0px 20px 0px 0px">Logout</a>';
require 'connection.php';
if (isset($_SESSION['userdata'])) {
    $name=$_SESSION['userdata']['username'];
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Previous</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styleshow.css">
    <body>
        <h2>Welcome <?php echo $name?> Your Previous Attempt Marks are:</h2><br>
        <div id="main">
            <table id="table" border=2px solid black>
                <tr>
                    <th>Test Number</th>
                    <th>UserName</th>
                    <th>Category</th>
                    <th>Marks Obtain</th>
                
                </tr> 

    <?php

    $sql = "SELECT * FROM user WHERE username='".$name."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           

                    echo '<tr>';
                    echo '<td>'.$row['id'] .'</td>';
                    
                    echo '<td>'.$row['username'] .'</td>';
                    echo '<td>'.$row['category'] .'</td>';
                    echo '<td>'.$row['mark'] .'</td>';
                   
                    echo '</tr>';
        }
    
    }
}
    

?>
        </table> <br>
        <a href="homeuser.php" style="margin-left:300px">GO Home </a>
        </div>

    </body>
</html>


        