<?php
include("../header/session_start.php");
include("../../controllers/account/log_in/verifyLogin.php");
include("../../multilanguage/apply_language.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data | ClouDIA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css" media="screen"/>
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap-theme.css" media="screen"/>
	<link rel="stylesheet" href="../../style/style.css"/>
    <script src="../../lib/jquery.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../lib/highstock.js"></script>
    <script src="../../lib/highcharts-more.js"></script>
    <script src="../../lib/exporting.js"></script>
    <script src="../../lib/export-csv.js"></script>
    <script src="../js/graph.js"></script>
    <script src="../js/nav_app.js"></script>    
</head> 
    <body>
        <div id="dataarea" class="wrapper">
            <?php include("../header/header.php"); ?>
            <div class="content container-fluid">
                <div class="row">
                    <div id="navarea" class="col-sm-2">
                    <table class='table'>
                        <thead>
                            <th><?php echo "Select a Station";?></th> 
                        </thead>
                        <tbody id="station">                    
                            <script>show_station();</script>
                        </tbody>
                    </table>
                </div>
                <div id="grapharea" class="displaydata col-sm-10"></div>
            </div>
            <p id="imagesrc-r" >http://static.pexels.com/wp-content/uploads/2014/12/blurred-drop-of-water-nature-3782.jpg</p>
            <div class="bottom">
                <?php include("../footer/footer.php"); ?>
            </div>
        </div>
    </body>
</html>
<?php include("../header/redirect_logout.php");?>


