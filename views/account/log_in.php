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
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <title><?php echo $language['login_page_title']?></title>
</head>
	
<body>
    <div id="logarea" class="wrapper">
        <?php include("../header/header.php"); ?>	
        <div class="container-fluid content">	
            <div class="row">			
                <h2 class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8 text-left green-header"><?php echo $language['login_page_header']?></h2>	
                <p class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8 text-left">
                    <?php echo $language['login_page_text']?>
                </p>
            </div>
				
            <div class="row">
                <form id="logform" class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8" action="log_in.php" method="post">	
                    <div class="form-group">
                        <label><?php echo $language['login_page_enter_user']?></label> 
                        <input type="text" class="form-control" name="Pseudo_login" maxlength="250" placeholder="<?php echo $language['login_page_user']?>" value="<?=
                        $Pseudo_login ?>" required>
                    </div>	
                    <div class="form-group">
                        <label><?php echo $language['login_page_enter_password']?></label>
                        <input type="password" class="form-control" name="Password_login" maxlength="250" placeholder="<?php echo $language['login_page_password']?>" value="<?=
                        $Password_login ?>" required >
                    </div> 
                    <div class="form-group">
                        <label>
                            <a id="forget" href="forget_password.php" ><?php echo $language['login_page_forget_password']?></a>
                        </label>
                    </div>
                    <div class="form-group container-fluid">
						<div class="row">
							<input class="col-xs-5 btn btn-default" type="submit" value="<?php echo $language['login_page_log_btn']?>">
			                <a class="col-xs-5 col-sm-offset-2 btn btn-default" id="signbtn" href="sign_in.php" ><?php echo $language['login_page_sign_btn']?></a>
						</div>
                    </div>
                <form>
            </div>
            <p id="imagesrc" >http://commons.wikimedia.org/wiki/File:Cataract_Canyon_Sunrise.jpg</p>
            <?php include("../footer/footer.php"); ?>
        </div>
    </div>
</body>
    

    
