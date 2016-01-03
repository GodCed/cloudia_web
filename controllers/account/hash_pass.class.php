<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
/**
 *  Class for hashing a password
 */
class hash_pass {
    private static $hashCount = 1294;    /**<Hashcount */
    private static $hashName = "sha512"; /**<Hashing function name */
    public static  $saltLength = 28;     /**<Salt Length */   
    
    /**  
     * @see singleHash() Function for hashing password WITHOUT salt
     * @param $stringToHash Password to hash
     */
    public static function singleHash($stringToHash) {
        return hash(self::$hashName, $stringToHash);
    }
    
    /**  
     * @see hash() Function for hashing password
     * @param $password Password to hash
     * @param $salt Salt to make password harder to decrypt
     * @return string Password hashed 
     */
    public static function hash($password, $salt) {
        $hashedPassword = "";
        for($i = 0; $i < self::$hashCount; ++$i) {
            $hashedPassword = self::singleHash($hashedPassword.$password.$salt);
        }
        return $hashedPassword;
    }
    
    /**  
     * @see generateSalt() Function for generate a random salt
     * @return Generated salt
     */
    public static function generateSalt() {
        if(function_exists("mcrypt_create_iv")){
            //using a function from php's cryptographic library which is
            //considered to be secure to use to generate a random salt even though
            //it's main purpose is to generate an initialiazation vector for
            //different algorithms (see php's documentation)
            
            return substr(base64_encode(mcrypt_create_iv(self::$saltLength, MCRYPT_DEV_RANDOM)),0,self::$saltLength);
        }else{
            return substr(str_shuffle("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 0, self::$saltLength);
        }
    }
}