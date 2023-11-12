<?php
    include "../config/db_config.php";   
    include "../utils/functions.php";   

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $investamount = $_POST["investamount"];
    $investperiod = $_POST["investperiod"];
    $description = $_POST["description"];
    $updatedDescription = str_replace("\\'", "'", $description);
    $timestamp = date("Y-m-d H:i:s");
    // $sql = "INSERT INTO `contacts`
    // (`firstname`, `lastname`, `email`, `mobile`, `description`, `investamount`, `investperiod`, `created_at`) 
    // VALUES ('$firstName','$lastName','$email','$mobile','$description','$investamount','$investperiod','$timestamp')";
    // mysqli_query($con, $sql);

    
    function encrypt($data, $password) {
        $method = "aes-256-cbc";
        $salt = openssl_random_pseudo_bytes(16);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
        $key = openssl_pbkdf2($password, $salt, 32, 10000, 'sha256');
        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
        $encoded = base64_encode($salt . $iv . $encrypted);
        return $encoded;
    }



    $to = "support@rshcoin.com";
    // $admin="grootpanda@aol.com";
    $admin="kiddodev050@gmail.com";
    $alias='support@rshcoin.com';
    $subject = "Investor for RSHC";
    $param='to='.$email.'&fn='.$firstName.'&ln='.$lastName.'&mn='.$mobile.'&ia='.$investamount.'&ip='.$investperiod.'&ds='.$description; 
    $enparam=encrypt($param,"rshc love manager");
    $message = "<h1>".$firstName." ".$lastName."</h1>";
    $message .= "<h1>".$updatedDescription."<br />invest amount: ".$investamount."&euro;"."<br />invest period:".$investperiod."<br />contact date :".$timestamp."</h1><br />".'<span>https://rshcoin.com/contact-to.html?param='.$enparam.'</span><br/>'.'<div style="border:none;border-radius:3px;color:white;padding:15px" bgcolor="#5865f2"><a href="https://rshcoin.com/contact-to.html?param=';  
    
    $style='" style="text-decoration:none;line-height:100%;background:#5865f2;color:white;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:15px;font-weight:normal;text-transform:none;    padding: 20px; border-radius: 5px;" target="_blank" >
        Go to reply
      </a></div>';
    $message=$message.$enparam.$style;
      
    $header = "From: $email \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    // $retval = mail ($to,$subject,$message,$header);

    require '../PHPMailer/SMTP.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/Exception.php';

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);
  
    try {
        // Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.ionos.es';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $alias;                     // SMTP username
        $mail->Password   = 's7sDN9htwXHzpbFdmzMM';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above        
        // Recipients
        $mail->setFrom($alias, 'no-reply');
        $mail->addAddress($admin);               // Name is optional    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'RSHC';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->Body    =$message;
        $mail->send();
        $response_array['success'] = true;
        echo json_encode($response_array);
    } catch (Exception $exc) {
        echo $exc;
    }
?>
