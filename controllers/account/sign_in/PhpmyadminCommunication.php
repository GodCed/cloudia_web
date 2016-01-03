<!--
    Author : Donavan Martin
    Team : CLouDIA WEB
    Country: Sherbrooke, Quebec, Canada 
    Date : 1 juin 2015
-->
<?php
    //include 
    include ("../../controllers/account/hash_pass.class.php"); // Hash Class

    $DBsettings = include '../../server/DB_settings.php'; /**<D.B. settings  */
    $available = true;                                         /**<Username avaible to input in D.B */
    $hash_sha512 = new hash_pass();                            /**<For hasching user's password */
    
    try{
        // Connect to database 
        $bdd =new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8', 
                            $DBsettings[0],
                            $DBsettings[1]),
                            $DBsettings[2],
                            $DBsettings[3]);
    }catch(Exception $e){
        // Stop if errors 
        die('Erreur : '.$e->getMessage());
    }

    //Get all e-mail and username
    $reponse = $bdd->query('SELECT username, email_address FROM user_account');/**<Query reponse */

    //Verify in table the e-mail or username already exists
    while ($donnees = $reponse->fetch()){
        if ($_POST['Email']==$donnees['email_address'] OR $_POST['Username'] == $donnees['username']){
            $available = false;
        }
    }
    
    //Verify the password if the account not founded
    if($available){
        // Haching password
        $pass_hache = $hash_sha512->singleHash($_POST['Password1']);

        // Insert new account
        $req = $bdd->prepare('INSERT INTO `test`.`user_account`(username, password, first_name, last_name, email_address, phone_number, subscribe_date, extension, active) VALUES(:pseudo, :pass, :f_name, :l_name, :email, :phone, CURDATE(), :ext, :active)');
        $req->execute(array(
            'pseudo' => $_POST['Username'],
            'pass'   => $pass_hache,
            'f_name' => $_POST['FirstName'],
            'l_name' => $_POST['LastName'],
            'email'  => $_POST['Email'],
            'phone'  => $_POST['TelephoneNumber'],
            'ext'    => "member",
            'active' => 0));
        $reponse->closeCursor(); // End of Query
        echo '<script>window.location = "../account/account_created.php";</script>';
    }
    else{
        echo "E-mail alreday used, SORRY ! <br />";
    }
    $reponse->closeCursor(); // End of Query
?>

