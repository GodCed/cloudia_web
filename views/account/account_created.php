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
		<script src="../../lib/jquery.js"></script>
        <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
		<title><?php echo $language['create_asessionccount_title']?></title>
    </head>
    <body>	
        <div id="signarea" class="wrapper">
            <?php include("../header/header.php"); ?>
                <div class="content container-fluid">
                    <div class="row">
                	<div class="col-sm-12">
                            <h2 class="text-right green-header"><?php echo $language['create_account_succes']?></h2>
				<h3 class="text-right"><?php echo $language['create_account_succes_message']?></h3>
		        </div>
                    </div>
          	</div>
            <?php include("../footer/footer.php"); ?>
        </div>
    </body>
</html>