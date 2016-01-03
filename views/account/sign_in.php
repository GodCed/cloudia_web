<?php 
    include("../header/session_start.php");
    include("../../controllers/account/log_in/verifyLogin.php");
    include("../../multilanguage/apply_language.php"); 
    include("../../controllers/account/captcha/simple-php-captcha.php");
    $_SESSION['captcha'] = simple_php_captcha();
    session_write_close();
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
		<title><?php echo $language['create_account_title']?></title>
    </head>
	
	<body>
		
		<div class="wrapper" id="signarea">

		    <?php include("../header/header.php"); ?>
		
		    <div class="container-fluid content">
				<div class="row">
							
					<h2 class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8 text-left green-header"><?php echo $language['create_account_header']?></h2>
					
					<p class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8 text-left">
                        <?php echo $language['create_account_text']?>
					</p>
				</div>
				
				<div class="row">
		 
		            <form id="logform" class="col-sm-5 col-sm-offset-6 col-md-3 col-md-offset-8" action="sign_in.php" method="post">
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_first_name']?></label> 
	                        <input type="text" class="form-control" name="FirstName" maxlength="10" placeholder="<?php echo  $language['create_account_first_name']?>" required >
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_last_name']?></label> 
	                        <input type="text" class="form-control" name="LastName" maxlength="10" placeholder="<?php echo  $language['create_account_last_name']?>" required>
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_username']?></label> 
	                        <input type="text" class="form-control" name="Username" maxlength="10" placeholder="<?php echo  $language['create_account_username']?>" required>
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_email']?></label>
	                        <input type="email" class="form-control" name="Email" maxlength="250" placeholder="<?php echo$language['create_account_email']?>" required>
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_password']?></label>
                                <input type="password" class="form-control" name="Password1" maxlength="250" data-html="true" data-toggle="tooltip" data-placement="left" title="<?php echo $language['create_account_password_tooltip']?>"  placeholder="<?php echo  $language['create_account_password']?>" required>
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_confirm_password']?></label>
	                        <input  type="password" class="form-control" name="Password2" maxlength="250" placeholder="<?php echo $language['create_account_confirm_password']?>" required >
						</div>
						
						<div class="form-group">
	                        <label><?php echo $language['create_account_enter_phone']?></label> 
	                        <input type="text" class="form-control" name="TelephoneNumber" maxlength="12" placeholder="<?php echo  $language['create_account_phone']?>" required>
						</div>
							
						<div class="form-group">
                            <label><?php echo $language['create_account_enter_captcha']?></label> 
							<label><?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';?></label>
							<input type="text" class="form-control" name="Captcha" maxlength="6" placeholder="<?php echo  $language['create_account_captcha']?>"  required>
						</div>
						
						<div class="form-group">
							<input type="submit" class="btn btn-default"  value="<?php echo $language['create_account_sign_button']?>">
						</div>
						
		            </form>
				</div>
		    </div>
			<p id="imagesrc" >http://upload.wikimedia.org/wikipedia/commons/7/78/Doubtful_Sound_Clear.jpg</p>
			<?php include("../footer/footer.php"); ?>
		</div>
            
                <script>
                    $(document).ready(function(){
                        $('[data-toggle="tooltip"]').tooltip();   
                    });
                </script>
	</body>
</html>