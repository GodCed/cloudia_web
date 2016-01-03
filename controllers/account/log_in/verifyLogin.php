<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
    //include
    include ('../../controllers/account/User.php'); // Class User
    
    $Pseudo_login   = NULL; /**< Username  */
    $Password_login = NULL; /**< Password of username (tempo.) */
    $acces_granted  = NULL; /**< Acces granted or denied */
    $User = new User();     /**< The User object */
    
    if(verifyUsernameLogin() && verifyPasswordLogin()){
        $User->set_email_or_pseudo($_POST['Pseudo_login']);
        if ($User->check_password($_POST['Password'])){
            //return to index.php
            session_unset();
            $_SESSION = array(); /**< PHP session  */
            $_SESSION['username'] = $User->get_username();
            $_SESSION['access'] = true;
            echo '<script>window.location = "../stations/show_measure.php";</script>';
        }else{
            $acces_granted = "Informations are not valids";
        }
    }
    
    /**  
     * @see verifyUsernameLogin() User field can't be empty
     * @return boolean FALSE == empty, TRUE == Filled
     */
    function verifyUsernameLogin(){
        if(isset($_POST['Pseudo_login']) AND $_POST['Pseudo_login']!= ""){
            $Pseudo_login = $_POST['Pseudo_login'];
            return true;
        }
        else{
            return false;
        }
    }
    
    /**  
     * @see verifyPasswordLogin() Password field can't be empty
     * @return boolean FALSE == empty, TRUE == Filled
     */ 
    function verifyPasswordLogin(){
        if(isset($_POST['Password_login']) AND $_POST['Password_login']!= ""){
            $Password_login = $_POST['Password_login'];
            return true;
        }
        else{
            return false;
        }
    }
?>