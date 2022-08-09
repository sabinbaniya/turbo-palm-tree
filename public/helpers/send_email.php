<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../../vendor/autoload.php';

require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';

function send_email($name, $email, $username, $password)
{
    // for sending mail to user's after creation is done 

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'baniya.sabinn@outlook.com';              //SMTP username
        $mail->Password   = file_get_contents(__DIR__ . '/google_password.txt'); //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('baniya.sabinn@outlook.com', 'Sabin Baniya');
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo('baniya.sabinn@outlook.com', 'Sabin Baniya');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Login Details for Website\'s Admin Panel for $name";
        $mail->Body    = "Here\'s your login details for the admin panel: <hr/><br/>, username: $username  <br/> password : $password";
        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}

function send_confirmation_email($name, $email, $username, $confirmation_code)
{
    // for sending mail to user's after creation is done 

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV["email_account_address"];              //SMTP username
        $mail->Password   = $_ENV["email_account_password"]; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV["email_account_address"], $_ENV["email_account_name"]);
        $mail->addAddress($email, $name);     //Add a recipient    
        $mail->addReplyTo($_ENV["reply_to_email_account_address"], $_ENV["reply_to_email_account_name"]);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Account Confirmation at D & B Engineering';

        $mail->Body    = "
        <html lang='en'>
            <head>
                <meta charset='UTF-8' />
                <meta http-equiv='X-UA-Compatible' content='IE=edge' />
                <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            </head>
            <body style='max-width: 700px; margin: 40px auto'>
                <div>
                <h1>D & B Engineering Account Confirmation</h1>
                <p>
                    You recieved this email because you had signed up at our site,
                    www.d&bengineering.com
                </p>
                <p>Your Account Details are:</p>
                <ul style='list-style-type: none'>
                    <li>Username: $username</li>
                    <li>Name: $name</li>
                </ul>
                <p>Click the link below to confirm your account.</p>
                <a href='./login.php?code=$confirmation_code'>Confirm Now</a>
                </div>
            </body>
        </html>        
        ";

        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}

function send_contact_email($name, $email, $subject, $mobile, $message)
{

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

        //Send using SMTP

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-mail.outlook.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV["email_account_address"];              //SMTP username
        $mail->Password   = $_ENV["email_account_password"]; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPSecure = "TLS";                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV["email_account_address"], $_ENV["email_account_name"]);
        $mail->addAddress('baniya.sabinn@gmail.com', 'Sabin Baniya');     //Add a recipient    
        $mail->addReplyTo($_ENV["reply_to_email_account_address"], $_ENV["reply_to_email_account_name"]);
        $message = htmlspecialchars($message);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Wooshhh somebody dropped a message in the contact form of Hotel's Website";
        $mail->Body    = "
            <hr/>
            <h4>Here's their contact details:</h4>
            <hr/>
            <p>Name : $name</p>
            <p>Email: $email</p>
            <p>Phone: $mobile</p>
            <hr/>
            <h4>Here's what they had to say: </h4>
            <hr/>
            <p>Subject: $subject</p>
            <p>Message: $message</p>
        ";
        $mail->AltBody = 'Please use a client-mail that supports html';
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
        echo ($mail->ErrorInfo);
    }
}
