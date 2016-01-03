<?php
include("../header/session_start.php");
include("../../controllers/account/log_in/verifyLogin.php");
include("../../multilanguage/apply_language.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap.css" media="screen"/>
	<link rel="stylesheet" href="../../lib/bootstrap/css/bootstrap-theme.css" media="screen"/>
    <link rel="stylesheet" href="../../style/style.css" media="screen"/>
	<title><?php echo $language['nav_app_title']?></title>
</head>
<body>	
    <div id="dataarea" class="wrapper">
        <?php include("../header/header.php"); ?>
		<div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-right red-header"><?php echo $language['error_no_logged_h1']?></h2>
                    <h3 class="text-right"><?php echo $language['error_no_logged_h2']?></h3>
                </div>
            </div>
        </div>
        <div class="bottom">
            <?php include("../footer/footer.php"); ?>
        </div>
    </div>
</body>
</html>