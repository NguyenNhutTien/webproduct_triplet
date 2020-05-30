<?php
function public_url($url = '')
{
    return base_url('public/') . $url;
}

function base_url($url = '')
{
    return  getFullHost() . $url;   // http://localhost/webproduct_triplet/
}

function view_path($path = '')
{
    return  base_url('application/views/')  . $path;
}

function redirect($path)
{
    header("Location: " . $path);
}

function getFullHost() {
    $protocole = $_SERVER['REQUEST_SCHEME'] . '://';
    $host = $_SERVER['HTTP_HOST'] . '/';
    $project = explode('/', $_SERVER['REQUEST_URI'])[1];
    return $protocole . $host . $project . '/';
}

function confirm_recaptcha()
{
    // your secret key
    //$secret = "6LfKFagUAAAAAGP6WBVp4-tuR8Meql2a7nTWw5yW";
    $secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
    // empty response
    $response = null;
    // check secret key
    $reCaptcha = new ReCaptcha($secret);
    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }
    if ($response != null && $response->success) {
        return true;
    } 
    return false;
}

function printArr($obj)
{
    echo "<pre>";
    print_r($obj);
    echo "</pre>";
}

function sendMail($mTo, $nTo, $subject, $content){

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
//$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
$mail->Port = 587;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
$mail->Username = "dienmaytriplet@gmail.com";
$mail->Password = "triplet123456";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "dienmaytriplet@gmail.com";
$mail->FromName = "Dien may triplet";
 
$mail->addAddress($mTo,$nTo);
// $mail->addAddress("user.2@gmail.com","User 2");
 
// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");
$mail->AddReplyTo('dienmaytriplet@gmail.com', 'Dien may TRIPLET'); //khi nguoi dung phan hoi se duoc gui den email nay
$mail->Subject = $subject;
$mail->Body = $content;
 
if(!$mail->Send())
 //echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
 return false;
else
 //echo "Message has been sent";
 return true;
}