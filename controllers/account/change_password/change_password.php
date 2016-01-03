<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
    //include
    include ('../../../controllers/account/User.php');//Verify User in table
    
    /**  
     * @var $error Error to send if have one
     */
    $User = new User(); /**< Class User to change the password */
    $error = '0';   /**< Error to send if have one */
    
    if ($User->set_email_or_pseudo($_POST['email'])){
        $error = $User->update_password($_POST['current_password'],$_POST['new_password']);
    }
    else{
        $error = "e-mail not found!";
    }
 ?> 
    // go to views result 
    <script type="text/javascript">
        var result = <?php echo json_encode($error) ?>;           
    window.location = "../../../views/account/change_password_result.php?change="+result;</script>';


