<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
    $Email       = NULL;       /**<Eamil  */
    $FirstName   = NULL;       /**<First Name  */
    $LastName    = NULL;       /**<Last Name */
    $Username    = NULL;       /**<Username  */
    $Password1   = NULL;       /**<Password  */
    $Password2   = NULL;       /**<Password (must be exactly same as $Password1) */
    $TelephoneNumber = NULL;   /**<Telephone number */
    verifyAll();
    
    /**  
     * @see  verifyAll() Verification of First Name
     * @return boolean TRUE == OK, FALSE == empty
     */
    function verifyAll(){
            
    if (verifyCaptcha()  &&
        verifyUsername()  &&
        verifyEmail()     &&
        verifyFisrtName() &&
        verifyLastName()  &&
        verifyPassword1() && 
        verifyPassword2() &&
        verifyTelephoneNumber()){   
        if(verifyCorrespond()) {
            //echo ' Passwords OK <br />';
            //echo '<br />Communication with the database<br />';
            include("PhpmyadminCommunication.php"); 
        }
        //echo 'Any field are filled <br />';
        }
    }
    
    /**  
     * @see verifyCaptcha() Verification of the captcha
     * @return boolean TRUE == OK, FALSE == Wrong captcha
     */
    function verifyCaptcha(){
        if(isset($_POST['Captcha'])AND $_POST['Captcha']== $_SESSION['captcha']['code']){  
            //echo 'Captcha OK <br />';
            return true;
        }else{
            //echo 'Wrong captcha ! <br />';
            return false;
        }
    } 
    
    /**  
     * @see verifyFisrtName() Verification of First Name
     * @return boolean TRUE == OK, FALSE == empty
     */
    function verifyFisrtName(){
        if(isset($_POST['FirstName']) AND $_POST['FirstName']!= ""){
            $GLOBALS['FirstName'] = $_POST['FirstName'];
            return true;
        }else{
            //echo 'Firstname\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyLastName() Verification of Last Name
     * @return boolean TRUE == OK, FALSE == empty
     */
    function verifyLastName(){
        if(isset($_POST['LastName']) AND $_POST['LastName']!= ""){
            $GLOBALS['LastName'] = $_POST['LastName'];
            return true;
        }else{
            //echo 'Lastname\'s field is empty <br />';
            $Lastname = NULL;
            return false;
        }
    }
    
    /**  
     * @see verifyUsername() Verification of Username
     * @return boolean TRUE == OK, FALSE == empty
     */
    function verifyUsername(){
        if(isset($_POST['Username']) AND $_POST['Username']!= ""){
            $GLOBALS['Username'] = $_POST['Username'];
            return true;
        }else{
            //echo 'Username\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyEmail() Verification of the email
     * @return boolean TRUE == OK, FALSE == Address not valid
     */
    function verifyEmail(){
        if(isset($_POST['Email']) AND $_POST['Email']!= ""){
            if (filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                $GLOBALS['Email'] = $_POST['Email'];
                   // echo "$GLOBALS[Email] The email address is a valid.<br />";
                    $is_email_valid = true;
                    return true;
            }else{
                //echo 'The email address is NOT a valide adresse. !<br />';
            } 
        }else{
            //echo 'Email adress\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyPassword1() Verification of first password field
     * Password must have at least 1 uppercase, 1 lowercase and 1 number
     * @return boolean TRUE == OK, FALSE == Wrong password
     */
    function verifyPassword1(){
        if(isset($_POST['Password1']) AND $_POST['Password1']!= ""){
            $GLOBALS['Password1'] = $_POST['Password1'];
            
            // REGEX 
            //lowercase
            $reg = '#[a-x]#';
            if( preg_match($reg, $_POST['Password1'], $m)){
                
                //uppercase
                $reg = '#[A-Z]#';
                 if( preg_match($reg, $_POST['Password1'], $m)){
                     
                    //number
                    $reg = '#[0-9]#';
                    if( preg_match($reg, $_POST['Password1'], $m)){
                        return true;
                    }else{//echo 'The password must contain at least one number <br />';
                    }
                }else{//echo 'The password must contain at least one uppercase letter<br />';
                }
            }else{//echo 'The password must contain at least one lowercase letter<br />';
            }
        }else{//echo 'Password\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyPassword1() Verification of second password field
     * @return boolean TRUE == OK, FALSE == Password is empty
     */
    function verifyPassword2(){
        if(isset($_POST['Password2']) AND $_POST['Password2']!= ""){
            $GLOBALS['Password2'] = $_POST['Password2'];
            return true;
        }else{
            //echo 'Password\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyTelephoneNumber() Verification of telephone number
     * @return boolean TRUE == OK, FALSE == Telephone field empty or wrong format
     */
    function verifyTelephoneNumber(){
        if(isset($_POST['TelephoneNumber']) AND $_POST['TelephoneNumber']!= ""){
            $GLOBALS['TelephoneNumber'] = $_POST['TelephoneNumber'];
            return true;
        }else{
            //echo 'Telephone number\'s field is empty <br />';
            return false;
        }
    }
    
    /**  
     * @see verifyCorrespond() Verification of exactly same Password
     * @return boolean TRUE == OK, FALSE == Password are not the same
     */
    function verifyCorrespond(){
        if($GLOBALS['Password1'] ==  $GLOBALS['Password2']){
            return  TRUE;
        }else{
           // echo 'Passwords do not match <br />';
            return false;
        }     
    }
    
?>