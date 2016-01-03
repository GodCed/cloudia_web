<!--
    Authors : Cedric Godin, Danick Cote-Martel, Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->

<?php

/**
 *  Class User
 */
class User {
    private $database        = array();/**<D.B. settings */
    private $bdd             = NULL;   /**<Bdd for query */
    private $username        = NULL;   /**<Username         */
    private $password        = NULL;   /**<Password         */
    private $first_name      = NULL;   /**<First_name       */
    private $last_name       = NULL;   /**<Last_name        */
    private $email_address   = NULL;   /**<Email_address    */
    private $phone_number    = NULL;   /**<Phone_number     */
    private $subscribe_date  = NULl;   /**<Subscribe_date   */
    private $extension       = NULL;   /**<Extension        */
    private $active          = NULL;   /**<Active           */
    private $forget_password = NULL;   /**<Forget_password  */

    /**  
     * @see __construct() construct
     */   
    public function __construct() {
        include ("hash_pass.class.php");
        //include(dirname(__DIR__).'/config.php');

        $setting = $_SERVER['DOCUMENT_ROOT'];
        $setting .= "/server/DB_settings.php";
        $this->database = include $setting;
        $this->construct_bdd();   
    }
    
    /**  
     * @see get_username() get username
     * @param $stringToHash Password to hash
     */
    public function get_username(){
        return $this->username;
    }

    /**  
     * @see set_email_or_pseudo() set email or pseudo
     * @param $email_address_or_pseudo user or pseudo to set
     * @return boolean TRUE if user exist , FALSE if user doesn't exist
     */
    public function set_email_or_pseudo($email_address_or_pseudo){
        if ($this->user_exist($email_address_or_pseudo)){
            
            return true;
        }
        else {
            return false;
        }     
    }
    
    /**  
     * @see check_password() check the password for this pseudo or email
     * @param $password password to verify
     * @return boolean TRUE == good password , FALSE == Wrong password
     */
    public function check_password($password){
        if ($this->username != NULL OR $this->email_address != NULL){
            return $this->verify_password($_POST['Password_login']);
        }else{
            return false;
        }
    }
    
    /**  
     * @see construct_bdd() connection to database
     */
    public function construct_bdd() {
        // Connect to database
        try{
            $this->bdd =new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8', $this->database[0], $this->database[1]), $this->database[2], $this->database[3]);
        //On error , it displays a message and stops all
        }catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    
    /**  
     * @see user_exist() verigy in D.B. if user already exist
     * @param $email_address_or_username pseudo or email to verify
     * @return boolean TRUE == exist , FALSE == don't exist
     */
    public function user_exist($email_address_or_username) {
        // SQLQuery : Verify an existing account by email or username 
        $reponse = $this->bdd->query('SELECT username, email_address FROM user_account');

        while ($donnees = $reponse->fetch())
        {
            // Verification email
            if (strtoupper($email_address_or_username)==strtoupper($donnees['email_address'])){
                
                $this->email_address = $donnees['email_address'];
                $reponse->closeCursor(); 
                return true;
            }
            
            // Verification username
            else if (strtoupper($email_address_or_username)==strtoupper($donnees['username'])){
                $this->username = $donnees['username'];
                $reponse->closeCursor(); 
                return true;
            }
        }
    }
    
    /**  
     * @see verify_password() verify if password in database
     * @param $password Password to verify
     * @return boolean TRUE == good password , FALSE == Wrong password
     */
    public function verify_password($password) {
        /**
         * @var class hash_pass Class Hash_pass
         */
;
        $hash_sha512 = new hash_pass();
        // Hash the password
        $pass_hache = $hash_sha512->singleHash($password);

        // Checking in the database
        $reponse = $this->bdd->prepare('SELECT * FROM user_account WHERE username =:user OR email_address =:user');
        if ($this->username != NULL){
            $reponse->execute(array('user' => $this->username));}
        else if ($this->email_address != NULL){
            $reponse->execute(array('user' => $this->email_address));}
        $donnees = $reponse->fetch();
        // Log user if password is good
        if ($pass_hache==$donnees['password']){            
            // maybe something can be safely this way by unseting session 
            

            //Redirection to index.php
            $reponse->closeCursor();
            return true;
            
        }
        $reponse->closeCursor(); 
        return false;
    }
    
    /**  
     * @see update_password() update current password
     * @param $old_password Current password
     * @param $new_password New password
     * @return string Return error \\ Return True if changed
     */
    public function update_password($old_password, $new_password) {
        $hash_sha512 = new hash_pass();
        //something do not work with $this->database[1] so we use $DBsettings[1]
        $DBsettings = include $setting;

        // Check if the old password is correct first!
        if ($this->verify_password($old_password)){
            if ($old_password != $new_password){
                $error = $this->verify_password_restriction($new_password);
                if ($error == false){
                    // Change Password
                    $pass_hache = $hash_sha512->singleHash($new_password);
                    if ($this->email_address != NULL){
                        $sql = "UPDATE $DBsettings[1].`user_account` SET `password` = '$pass_hache' WHERE `user_account`.`email_address` = '$this->email_address'";
                    }else if ($this->username != NULL){
                        $sql = "UPDATE $DBsettings[1].`user_account` SET `password` = '$pass_hache' WHERE `user_account`.`email_address` = '$this->username'";
                    }else {
                        return false;
                    }  
                    $reponse = $this->bdd->prepare($sql);
                    $reponse->execute();

                    $reponse->closeCursor(); // End of Query
                    return "true";
                }
                return $error;
            }
            $error = "Current Password and New password are the same";
            return $error;
        }
        return "Current password do not match";
    }
    
    /**  
     * @see verify_password_restriction() verify if new password syntaxely correct
     * @param $password New password
     * @return boolean FALSE == not correct , TRUE == correct
     */
    public function verify_password_restriction($password){
        if($password != ""){        
            // REGEX 
            $reg = '#[a-x]#';
            if( preg_match($reg, $password, $m)){
                $reg = '#[A-Z]#';
                 if( preg_match($reg, $password, $m)){
                    $reg = '#[0-9]#';
                    if( preg_match($reg, $password, $m)){
                        return false;
                    }else{
                        //return 'The password must contain at least one number <br />';
                    }
                }else{
                    //return 'The password must contain at least one uppercase letter<br />';
                }
            }else{
                //return 'The password must contain at least one lowercase letter<br />';
            }
        }else{
            //return 'Password\'s field is empty <br />';
        }
    }
    
    /**  
     * @see generate_password_recover() generate a hask link for recover a password
     * @return boolean Always return true
     */
    public function generate_password_recover(){
        /**
         * @var class hash_pass Class Hash_pass
         * @var class $DBsettings D.B settings
         */
        $hash_sha512 = new hash_pass();
        $DBsettings = include $setting;//something do not work with $this->database[1] so we use $DBsettings[1]
        $hashed_link = $hash_sha512->hash($this->email_address,$hash_sha512->generateSalt());
        
       // Update new link for reset password
            $sql = "UPDATE $DBsettings[1].`user_account` SET `forget_password` = '$hashed_link' WHERE `user_account`.`email_address` = '$this->email_address'";
            $reponse = $this->bdd->prepare($sql);
            $reponse->execute();
            
            try {
               try {
                  error_reporting(E_ALL);
                  ini_set('display_errors', 1);

                  require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/swiftmailer/lib/swift_required.php');
                } catch (Exception $e) {
                        echo 'Exception reçue : ' .  $e->getMessage() . "\n";
                }
                  $this->message = 'You can reset your password by using this link :'
                            . ' www.cloudiaproject.org/controllers/account/forget'
                            . '_password.php?link='.$hashed_link; 
                   
                    $this->subject = "Cloudia : Reset your password"; 
                  
                    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                        ->setUsername('cloudiaweb@gmail.com')
                        ->setPassword('Pampa%Burger');
                 
                    // Create the Mailer using your created Transport
                    $mailer = Swift_Mailer::newInstance($transport);
                    
                    // Create a message
                    $message = Swift_Message::newInstance()
                    
                    // Give the message a subject
                        ->setSubject($this->subject)

                    // Set the From address with an associative array
                        ->setFrom(array('cloudiaweb@gmail.com' => 'ClouDIA\'s team'))

                    // Set the To addresses with an associative array
                        ->setTo(array('cloudiaweb@gmail.com', 'cloudiaweb@gmail.com' => 'A name'))

                    // Give it a body
                        ->setBody($this->message)

                    // And optionally an alternative body
                        ->addPart('<q>TEXT DINDICATION</q>', 'text/html');
                       
                    if ($mailer->send($message)) {
                        echo "Sent\n";
                    }
                    else {
                        echo "Failed\n";
                    }
                 
                    
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                echo '<pre>' . $e->getTraceAsString() . '</pre>';
            }

            $email_sender = new email_sender($hashed_link, $this->email_address);
            echo "before send_password_reset()";
            $email_sender->send_password_reset();
            
            $reponse->closeCursor(); // End of Query
            return true;
    }
}
