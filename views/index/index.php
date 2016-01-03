<?php
include("../header/session_start.php");
include("../../controllers/account/log_in/verifyLogin.php");
include("../../multilanguage/apply_language.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css" media="screen"/>
	<link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap-theme.css" media="screen"/>
	<link rel="stylesheet" href="../../style/style.css"/>
	<script src="../../lib/jquery.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.js"></script>
    <title><?php echo $language['home_title']?></title>
</head>	
<body>	
    <div class="wrapper" id="homearea">
        <?php include("../header/header.php");?>		
        <div class="content">
            <?php include("../body/carousel.php");?>
            <?php include("../body/about.php");?>
            <?php include("../body/sponsor.php");?>		
        </div>
        <?php include("../footer/footer.php"); ?>     
    </div>
</body>	
</html>
