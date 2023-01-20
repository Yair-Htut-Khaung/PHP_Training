<?php include 'header.php' ?>
<div class="l-container">
    <div class="profile-card">
        <h3 class="profile-ttl">Forget Password</h3>
        <form method="post" class="form">
            <p class="comn-inputp">Email</p>
            <input type="email" name="email" class="inputtext" placeholder="name@example.com" id="" required>
            <div class="clear-fix">
                <a href="login.php" class="loginlink f-left">Login</a>
                <input type="submit" value="Send" class="comn-btn f-right">
            </div>
        </form>
    </div>
</div>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // define variables and set to empty values
    $email = "";


    $email = test_input($_POST["email"]);
    session_start(); //pass value of email to resetpass for dispaly 
    $_SESSION["tryloginuser"] = $email;
    try {
        $mail = new PHPMailer(true);
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'yairhtut35p@gmail.com';                     //SMTP username
        $mail->Password   = 'deauxjxoaegxwilc';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('yairhtut35p@gmail.com'); //receiver main
        $mail->addAddress("$email");

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Click the link to reset password';
        $mail->Body = '<p><b>If you still having any problem feel free to ask our customer services</b></p>';
        $mail->Body   .= '<span>---&gt;<a href="localhost/Tutorial_10/resetpass.php">resetpassword_here</a>&lt;---</span>'; // can't use dynamic so please change it to your directory starting from local host

        $mail->send();
        echo "<div class='message'><span class='message-succ'>Message send please confirim in mailbox....</span></div>";
    } catch (Exception $e) {
        echo "<div class='message'><span class='message-error'>Unexpected error occur pleasce check your email again....</span></div>";
        header("refresh:1;url=forgotpass.php");
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php include 'footer.php' ?>