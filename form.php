<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $message = "Name: " . $_POST["name"] . "\n";
        $message .= "Phone: " . $_POST["phone"] . "\n";
        $message .= "Message: " . $_POST["message"] . "\n";
        $subject = "Pool Website Message from $name";
        
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('frcedenoivy2014@gmail.com', 'Francisco');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $subject = "Pool Website Message from $name";
*/

/*
    require "vendor/autoload.php"

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    if(isset($Post["send"])){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.example.com";
        $mail->SMTPSecure = PHPMailer::ENCRYTPION_STARTTLS;
        $mail->Port = 465; //Google SMTP Port

        //Credentials for SMTP Server
        $mail->Username = "frcedenoivy2014@gmail.com"; // Your Gmail
        $mail->Password = "vxprkudsrrewovdy"; // Your Gmail app password
    }
        
*/

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for debugging


/*
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.example.com";
    $mail->SMTPSecure = PHPMailer::ENCRYTPION_STARTTLS;
    $mail->Port = 587; //Google SMTP Port

    //Credentials for SMTP Server
    $mail->Username = "frcedenoivy2014@gmail.com"; // Your Gmail
    $mail->Password = "vxprkudsrrewovdy"; // Your Gmail app password

    //Recipient email
    $mail->setFrom($email, $name);
    $mail->addAddress("marco@example.com", "Marco"); //name optional

    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        header("Location: index_message_sent.html");
    }

    else{
        echo 
        "
        <script>
        alert('Message not sent.')
        document.location.href = 'index.html';
        </script>
        "
    }
    */

/*
    // Define your email address where you want to receive the form submissions
    $to = "frcedenoivy2014@gmail.com";

    // Email subject
    $subject = "Pool Website Message from $name";

    // Email message
    $message = "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Your message was sent successfully!";
    } else {
        // Email sending failed
        echo "Error! Your message was not sent.";
    }

} else {
    // If the form wasn't submitted via POST, handle accordingly
    echo "Invalid request";
}

*/

?>