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
    <link rel="stylesheet" href="../../style/style.css" media="screen"/>
	<script src="../../lib/jquery.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
	<title><?php echo $language['change_password_title']?></title>
</head>

<body>	
	<div class="wrapper" id="passarea">		
	    <?php include("../header/header.php"); ?>
		<div class="content container-fluid">
            <div class="row">	                
                <div id="passgroup" class="container-fluid col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8">			
                    
                    <?php if ($_GET['change']=="true"):?>
                        <div class="row">
                            <h2 class="col-md-12 green-header"><?php echo $language['change_password_success_header']?></h2>
                            <p class="col-md-12"><?php echo $language['change_password_success_message']?></p>
                            <a id="homebtn" class="col-md-6 col-md-offset-3 btn btn-default"  href="../index/index.php"><?php echo $language['change_password_home']?></a>
                        </div>
                        
                    <?php else:?>
                        <div class="row">
                            <h2 class="col-md-12 red-header"><?php echo $language['change_password_failed_header']?></h2>
                            <p class="col-md-12">
                                <strong><?php echo $_GET['change']?></strong><br>
                                <?php echo $language['change_password_failed_message']?>
                            </p>
                        </div>	
						
                        <div class="row">
                            <form id="passform" class="col-md-12" action="../../controllers/account/change_password/change_password.php" method="post">				
                                <div class="form-group">
                                    <label><?php echo $language['change_password_enter_email']?></label> 
                                    <input class="form-control" type="email" name="<?php echo $language['change_password_email']?>" maxlength="50" placeholder="<?php echo $language['change_password_email']?>" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo $language['change_password_enter_current_password']?></label> 
                                    <input class="form-control" type="password" name="current_password" maxlength="50" placeholder="<?php echo $language['change_password_current_password']?>" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo $language['change_password_enter_new_password']?></label> 
                                    <input class="form-control" type="password" name="<?php echo $language['change_password_new_password']?>" maxlength="50" placeholder="<?php echo $language['change_password_new_password']?>" required>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-default" type="submit" value="<?php echo $language['change_password_try_again']?>">
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <p id="imagesrc" >http://upload.wikimedia.org/wikipedia/commons/f/f6/Waterfall_Lepena.JPG</p>
        <?php include("../footer/footer.php"); ?>
    </div>
</body>
</html>
