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
    <title><?php echo $language['forget_password_title']?></title>
</head>
<body>
    <div class="wrapper" id="passarea">		
        <?php include("../header/header.php"); ?>
        <div class="container-fluid content">
            <div class="row">		
                <div id="passgroup" class="container-fluid col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8">
                    
                    <div class="row">	
                        <h2 class="col-md-12 text-left green-header"><?php echo $language['forget_password_head']?></h2>				
                        <p class="col-md-12 text-left">
                            <?php echo $language['forget_password_text']?>
                        </p>
                    </div>
                    
                    <div class="row">
                        <form id="passform" class="col-md-12" action="../../controllers/account/forget_password/forgot_password.php" method="post">
                            <div class="form-group">
                                <label><?php echo $language['create_account_enter_email']?></label> 
                                <input class="form-control" type="email" name="email" maxlength="50" placeholder="<?php echo $language['create_account_email']?>" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-default" type="submit" value="<?php echo $language['button_submit']?>">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <p id="imagesrc" >http://upload.wikimedia.org/wikipedia/commons/f/f6/Waterfall_Lepena.JPG</p>
        <?php include("../footer/footer.php"); ?>
    </div>
</body>
</html>
