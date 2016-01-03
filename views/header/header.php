<!DOCTYPE html>
<header>
    <?php  ?>
    <nav class="navbar navbar-default navbar-fixed-top navigbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php echo $language['header_toggle']?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index/index.php">
                    <img class="cloudia-logo" src="../../res/images/cloudia-logo-3.png"</img>
                </a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if(isset($_SESSION['username'])&&($_SESSION['username'])) : ?>
    				<ul class="nav navbar-nav navbar-right">
    					<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" id="accountDrop" aria-expanded="false"><?php echo $language['header_user']?> <?= $_SESSION['username']?><span class="caret"></span>
    						</a>
    	          			<ul class="dropdown-menu" role="menu" aria-labelledby="accountDrop">
    				            <li><a href="../account/change_password.php"><?php echo $language['header_change_password']?></a></li>
    				            <li class="divider"></li>
    				            <li><a href="../account/log_out.php"><?php echo $language['header_log_out']?></a></li>
    						</ul>
    					</li>
    					<li><a href="../stations/show_measure.php"><?php echo $language['header_data']?></a></li>
    				</ul>
    			
                <?php else : ?>
    				<ul class="nav navbar-nav navbar-right">
    					<li><a href="../account/log_in.php"><?php echo $language['header_log_in']?></a></li>
    				</ul>
    			<?php endif; ?>	
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
