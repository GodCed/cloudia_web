<?php
/**
 *  Class email_sender
 */

require_once '../../../lib/swift-mailer/lib/swift_required.php';

class email_sender {
   
    private $hashed_link; /**< Hasched link to send */
    private $email;       /**< The email adress to send an email */
    private $subject;     /**< Email's subject */
    private $message;     /**< Email's message + generated link */
    private $headers;     /**< Email's header */
    
    
    /**  
     * @see __construct() construct
     */
    public function __construct($hashed_link,$email) {
        echo "constructor";
        die(print_r($stuff, true ));
        $this->hashed_link = (string) $hashed_link;
        $this->email = (string) $email;
    }
    
    /**  
     * @see send_password_reset() send an email for a forgotten password
     */
    public function send_password_reset() {
        echo "test";
        try {
        $this->message = 'You can reset your password by using this link :'
                 . ' www.cloudiaproject.org/controllers/account/forget'
                 . '_password.php?link='.$this->hashed_link; 
         
        $this->subject = "Cloudia : Reset your password"; 
        
        Swift::init('swiftmailer_configurator');

        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465)
            ->setUsername('cloudiaweb@gmail.com')
            ->setPassword('Pampa%Burger');

        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);
        
        // Create a message
        $message = Swift_Message::newInstance()
               
        // Give the message a subject
          ->setSubject($this->subject);
        
        // Set the From address with an associative array
          ->setFrom(array('cloudiaweb@gmail.com' => 'ClouDIA\'s team'))
          
        // Set the To addresses with an associative array
           ->setTo(array($this->email, 'cloudiaweb@gmail.com' => 'A name'))
        
        // Give it a body
           ->setBody($this->message);
        
        // And optionally an alternative body
          ->addPart('<q>Here is the message itself</q>', 'text/html');

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
    }
}
