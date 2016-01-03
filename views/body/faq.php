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
    <title><?php echo $language['faq_name']?></title>
</head>
<body>
    <div class="wrapper" id="faqarea">
        <?php include("../header/header.php");?>
        <div class="container-fluid content">
            <div class="row">
                <h2 class="col-md-6 col-md-offset-6 text-right green-header"><?php echo $language['faq_header']?></h2>
            </div>
            <div class="row">
                <p class="col-md-6 col-md-offset-6 text-right">
                    <?php echo $language['faq_description']?>
                    <a href="https://www.facebook.com/projetcloudia"><?php echo $language['faq_contact']?></a>.
                </p>
            </div>
            <div class="row">
                <div class="col-md-12 faq">
                    <!-- FAQ -->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <?php echo $language['faq_goal']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <?php echo $language['faq_goal_text']?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <?php echo $language['faq_donate']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <?php echo $language['faq_donate_text']?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <?php echo $language['faq_create']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <?php echo $language['faq_create_text']?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <?php echo $language['faq_log_in']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <?php echo $language['faq_log_in_text']?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <?php echo $language['faq_data']?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">
                                    <?php echo $language['faq_data_text']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("../footer/footer.php");?>
        </div>
    </body>
</html>