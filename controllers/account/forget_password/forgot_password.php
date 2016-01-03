<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
    include ('../../../controllers/account/User.php');//Verify User in table
    $User = new User();/**< User to change password */
    
    if ($User->set_email_or_pseudo($_POST['email'])){
        $User->generate_password_recover();
        echo '<script>window.location = "../../../views/account/forgot_password_result.php?found=1";</script>';
        }
    else{
        echo '<script>window.location = "../../../views/account/forgot_password_result.php?found=0";</script>';
     
    }
?>
