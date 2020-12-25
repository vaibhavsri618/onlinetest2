<?php

require 'connection.php';
require 'header.php';
if (isset($_SESSION["userdata"])) {
    $category = $_SESSION['status'];

    if (isset($_GET['offset'])) {
        $offset = $_GET['offset'];

    } else {
        $offset = 0;
    }

    $arr = array();
    if (isset($_POST['submit10'])) {
        $radio = $_POST['radio'];
        array_push($arr, $radio);

    }
    print_r($arr);

    ?>



    <body>
        <div id="main">
            <h1 id="h2">Welcome <?php echo $_SESSION["userdata"]["username"] ?> to <?php echo $_SESSION['status'] ?> Test Set 1</h1>
            <div id="content">
                <input type="hidden" name="hidden" id="hidden" value="<?php echo $category ?>">
                <input type="hidden" name="hidden" id="hidden1" value="<?php echo $offset ?>">
                <input type="hidden" name="hidden" id="hidden3">

            </div>
            <div id="show1">
            <form action="result.php" method="post">
            <div id="show">

            </div>

            </form>
</div>

        <script>
            $(document).ready(function(){
                var cat=$("#hidden").val();
                var offset=$("#hidden1").val();


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






                $.ajax({
                    method: "POST",
                    url: "page.php",
                    data: { category: cat,offset:offset}
                    })
                    .done(function( msg ) {
                        $("#show").html(msg);

                        $("#a").click(function(e){



                            $radioval=$("input[name*='radio']:checked").val();


                                    $.ajax({
                                        method: "POST",
                                        url: "page.php",
                                        data: { radioval: $radioval}
                                        })
                                        .done(function( msg1 ) {

                                        });










                        });
                    });
        });
        </script>
    </body>
</html>
<?php

} else {
    header("Location:Loginalert.php");
}
?>