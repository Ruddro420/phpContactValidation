<?php 

include_once 'lib/Databse.php';

// php mailer specific
include_once 'PHPmailer/Exception.php';
include_once 'PHPmailer/PHPMailer.php';
include_once 'PHPmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Contact{
    public $db;

    function __construct(){
        $this->db = new Database();
    }

  
    public function GetContact($data){


        function sendemail_varifi($email,$message)
        {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            $mail->isSMTP(); //Send using SMTP
            $mail->SMTPAuth = true; //Enable SMTP authentication

            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'aliruddro@gmail.com'; //SMTP username
            $mail->Password = 'hijqhflfddppapra';

            $mail->SMTPSecure = 'tls'; //Enable implicit TLS encryption
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('aliruddro@gmail.com', $email);
            $mail->addAddress('looserali420@gmail.com');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Contact Form';

            $email_template = "
                <h2>Contact Information</h2>
               
                <h3> <a>Email</a> : $email</h3>
                <h3> <a>Message</a> : $message</h3>
            ";

            $mail->Body = $email_template;
            $mail->send();
        }


        $email = $data['email'];
        $message = $data['message'];
        if(empty($email) || empty($message)){
            $error = 'Field Must not be empty';
            return $error;
        }else{
            sendemail_varifi($email,$message);
            $success = 'Contact successfully.';
            return $success;
        }
    }

}




?>