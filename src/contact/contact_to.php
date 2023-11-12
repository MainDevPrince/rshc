<?php
    include "../config/db_config.php";   
    include "../utils/functions.php";   

    function decrypt($encryptedData, $password) {
        $method = "aes-256-cbc";
        $data = base64_decode($encryptedData);
        $salt = substr($data, 0, 16);
        $iv = substr($data, 16, openssl_cipher_iv_length($method));
        $encrypted = substr($data, 16 + openssl_cipher_iv_length($method));
        $key = openssl_pbkdf2($password, $salt, 32, 10000, 'sha256');
        $decrypted = openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }
    $param=$_POST["param"];
    $deparam=decrypt($param,"rshc love manager");
    parse_str($str, $data);
    foreach ($data as $key => $value) {
        echo $key . " => " . $value . "\n";
        if($key=='to')$email = $value;
        if($key=='ia')$investamount = $value;
        if($key=='ip')$investperiod = $value;
        if($key=='ds')$description = $value;
        if($key=='ln')$lastName = $value;
        if($key=='fn')$firstName = $value;
    }
    $email = $_POST["email"];
    $reply = $_POST["reply"];
    $investamount = $_POST["investamount"];
    $investperiod = $_POST["investperiod"];
    $description = $_POST["description"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $headline = $_POST["headline"];

    $timestamp = date("Y-m-d H:i:s");
    // $de=str_replace("aA","'",$description);
    // $re=str_replace("aA","'",$reply);
    // $sql = "INSERT INTO `contacts`
    // (`firstname`, `lastname`, `email`, `mobile`, `description`, `investamount`, `investperiod`, `created_at`) 
    // VALUES ('$firstName','$lastName','$email','$mobile','$de','$investamount','$investperiod','$timestamp')";
    // mysqli_query($con, $sql);





    $to = "support@rshcoin.com";
    $admin=$email;
    $alias='support@rshcoin.com';
    $subject = "Investor for RSHC";
    
    $message = "<h1> Dear ".$firstName." ".$lastName."!</h1>";
    $message .= "<span style={font-size:'medium'}>I am glad to let you know followings from this:</span>";
    // $message .= "<span style={font-size:'medium'}>".str_replace("aA","'",$description)."<br />invest amount: ".$investamount."&euro;"."<br />invest period:".$investperiod."<br />contact date :".$timestamp."</span><br />".'<div style="border:none;border-radius:3px;color:white;padding:15px" bgcolor="#5865f2"><div style="text-decoration:none;line-height:100%;background:#5865f2;color:white;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:15px;font-weight:normal;text-transform:none;    padding: 20px; border-radius: 5px;" >'.str_replace("aA","'",$reply).'
        
    //   </div></div>';   
    $message='<div style="word-spacing:normal;background-color:#f6f6f6"><div style="background-color:#f6f6f6"><div style="margin:0px auto;max-width:608"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center"><div style=" display: flex;justify-content: center;align-items: center;background:transparent;background-color:transparent;margin:0px auto;max-width:608px;"><img width="800" src="https://rshcoin.com/assets/emailcoin.png" style="border:0;display:block;outline:none;" class="CToWUd" data-bit="iit"></div><div class="m_862733370776013404round-border" style="background:#ffffff;background-color:#ffffff;margin:0px auto;max-width:608px"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:9px; background:#ffffff;background-color:#c7dee4;width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0;text-align:center"><div style="margin:0 auto;max-width:608px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:50px; width:100%;background-color:#c7dee4;padding-top: 20px;padding-bottom: 20px;"><tbody><tr style="vertical-align:top"><td background="https://ci3.googleusercontent.com/proxy/YGiPg7rQfKbr4xRBYH7wAl8VTgIA8JeirE6tB6VFrHpUj-PvujpnEwOTg8Kg370oaWZLDy92wGzHorxmBT7ow8TX7BxXGWpkk2zn53umY29C-FVmYsGVz3N42Ro5TTc=s0-d-e1-ft#https://cdn.discordapp.com/email_assets/5caf86093a983b3623cd6677a5032c92.png" style="background:#ffffff url('."'https://ci3.googleusercontent.com/proxy/YGiPg7rQfKbr4xRBYH7wAl8VTgIA8JeirE6tB6VFrHpUj-PvujpnEwOTg8Kg370oaWZLDy92wGzHorxmBT7ow8TX7BxXGWpkk2zn53umY29C-FVmYsGVz3N42Ro5TTc=s0-d-e1-ft#https://cdn.discordapp.com/email_assets/5caf86093a983b3623cd6677a5032c92.png'".') no-repeat center center/cover; height="94"><div style="margin:0px auto;width:608px"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0px"><tbody><tr><td><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0px;background-color:#c7dee4;"><tbody><tr><td align="center" style="font-size:0px;padding:0;word-break:break-word;"><h2 style="font-size:50px;text-align: center; width: 80%;">'.$headline.'</h2></td></tr></tbody></table></td></tr></tbody></table></div><div style="background:#ffffff;margin:0px auto;max-width:608px"><table align="center" border="0" cellpadding="0"  cellspacing="0" role="presentation" style="background:#ffffff;background-color: #c7dee4;width:100%"><tbody><tr><td  style="direction:ltr;font-size:0px;padding:0 24px 24px;text-align:center"><div class="m_862733370776013404mj-column-per-100"  style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"><table border="0"  cellpadding="0" cellspacing="0"  role="presentation" style="vertical-align:top;" width="100%"><tbody><tr><td align="left" style="font-size:0px;padding:0px;word-break:break-word"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:20px;line-height:24px;text-align:left;color:#737f8d"><h2 style="font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-weight:500;font-size:20px;color:#4f545c;letter-spacing:0.27px">Dear ' .$firstName.' '.$lastName.'</h2><p>'.str_replace("aA","'",$reply).'</p></div></td></tr><tr><td align="center" class="m_862733370776013404cta-button" style="font-size:0px;padding:10px 0 24px;word-break:break-word"></td></tr><tr><td class="m_862733370776013404help-text" style="font-size:0px;padding:0px;word-break:break-word"><div class="m_862733370776013404help-text"style="background:#ffffff;background-color:#c7dee4;margin:0px auto;max-width:560px"><table align="center"  border="0"  cellpadding="0"  cellspacing="0"  role="presentation"  style="background:#ffffff;background-color:#c7dee4;width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0px;text-align:center"><p style="border-top:solid 1px #dcddde;font-size:1px;margin:0px auto;width:100%"></p><div style="background:#ffffff;background-color:#c7dee4;margin:0px auto;max-width:560px"><table  align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;background-color:#c7dee4;width:100%"> <tbody><tr><td style="direction:ltr;font-size:0px;padding:24px 0 0;text-align:center"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:1;text-align:left;color:#747f8d"><p>If you have any questions or want to support us to grow faster, let‘s work together, text us directly <a href="https://rshcoin.com/contact-us.html" style="font-family:Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;color:#5865f2;font-size:15px;" target="_blank">support@rshcoin.com</a>.</p></div></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="height:24px;line-height:24px"> </div><div style="background:transparent;background-color:transparent;margin:0px auto;max-width:608px"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:transparent;background-color:transparent;width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:0;text-align:center"><div class="m_862733370776013404mj-column-per-100" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top" width="100%"><tbody><tr><td style="font-size:0px;word-break:break-word"><div style="height:4px;line-height:4px"> </div></td></tr></tbody></table></div></td></tr></tbody></table></div><div class="m_862733370776013404round-border" style="background:#ffffff;background-color:#c7dee4;margin:0px auto;max-width:608px"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"style="background:#ffffff;background-color:#c7dee4;width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:24px;text-align:center"><div class="m_862733370776013404mj-column-per-30" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"><table border="0" cellpadding="0" cellspacing="0" role="presentation"  width="100%"><tbody><tr><td style="vertical-align:top;padding:0"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:20px;word-break:break-word"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px"><tbody><tr><td style="width:128px"><img alt="rshcoin Logo"  height="auto" src="https://ci6.googleusercontent.com/proxy/0B9LT60CGLpPUOmpesgSVACaIP91wanpLASVNFdwomvhzq3wWkp-0Yphm5tOf-CtD1M9Q_GCdY5UQUBg27yzxrx4WDmCPi_fhO41IT17JKlu5F7qimYnMW2y7QJShrw=s0-d-e1-ft#https://cdn.discordapp.com/email_assets/6f92414a138938a7bf86b3d366a48836.png"  style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px" width="128" class="CToWUd" data-bit="iit"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div><div class="m_862733370776013404mj-column-per-70" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"><table border="0" cellpadding="0"  cellspacing="0" role="presentation" width="100%"><tbody><tr><td style="vertical-align:top;padding:0"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%"><tbody><tr><td align="left" class="m_862733370776013404mobile-title"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:18px;line-height:1;text-align:left;color:#4f545c">You sent this message:</div></td></tr><tr><td align="left" style="font-size:0px;padding:0;word-break:break-word"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:16px;line-height:24px;text-align:left;color:#737f8d"><span class="im">'.str_replace("aA","'",$description).'<br>invest amount:'.$investamount.'&euro;<br>invest period:'.$investperiod.'<br></span>contact date:'.$timestamp.'<br></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table></div><div style="background:transparent;background-color:transparent;margin:0px auto;max-width:608px"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:transparent;background-color:transparent;width:100%"><tbody><tr><td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center"><div class="m_862733370776013404mj-column-per-100" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="padding-bottom: 20px;" width="100%"><tbody><tr><td align="center" style="font-size:0px;padding:0;word-break:break-word"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center;color:#99aab5">sent by RSHC International FZCO,</div></td></tr><tr><td align="center" style="font-size:0px;padding:0;word-break:break-word"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center;color:#99aab5">Silicon Oasis, DDP, IFZA Building A2, Dubai, UAE </div></td></tr><tr><td align="center" style="font-size:0px;padding:0;word-break:break-word"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center;color:#99aab5"><a href="https://rshcoin.com/" style="color:#0067e0;text-decoration:none" target="_blank">rshcoin.com</a></div></td></tr><tr><td align="center" style="font-size:0px;padding:0;word-break:break-word;"><div style="font-family:Poppins,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;font-size:12px;line-height:24px;text-align:center;color:#99aab5">2023 RSHC All rights reserved.</div></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div></td></tr></tbody></table></div><img src="https://ci5.googleusercontent.com/proxy/B305agVfdc8pkIRqUDEUWlYSH1jg2ZM9lq99spIKprTnMl7M3fwm0wl6tmwtwqg41jmMugm8IQi-ZrSqLy4zyfcdjjggNTDjfVwifrCCn9TTKq3st9v8o9ZWJ3SNSujCOGCiiPCP5N8P6ssc53j6sd0mu-Pndf0AfITFQ6Niu7sLC-tsHNhdGDHlz8845Uwh4azb_OElVlWfbBu2d6KJHcvJyZqkQrhHDH0f7xMuHNTJBHmxh8APtHS6r--RkQNRx2AElD3QdKEC7Fjoye9Gui29D30EoOy0r8JThyJbeBFjUgjwupmXJV4RU_bmtsIkzbFKXIsNW-6ZTc64rqC7rAFfs1TZrqkgD4n1ROaN15Ccz8nMXBoUhTqRl-ju3jMWyCQTSWR0O3o7tvBZcjICoVRl9f0W7C8sYOi_GcamYV39uaTswPFTZP2n819W43cSLO0XZFATSIkorII7NCzhR6M8sgl6J9eWdRM=s0-d-e1-ft#https://click.discord.com/wf/open?upn=GHr-2FFRIZMrimxczN0PACumJyZQQ5XLuB-2BYkPI80XOx1yqH320Fe8Ypjf9JTeK5gj1piXeqA-2BBC0iAIRfjsJFoU5rZUUh48f8IrLYMNYk5EMyCCnbYkGmvCktxNpGWrnFsQv-2FCI5xSvfY6privQ2XBIyjNncfSBXn9G41ZP-2FzrnT0WMQOvbfDn5wJywgHZBfkxU8s-2Bb-2FA2MPVxbpKXYIrOlqadDGYvjuFUuFn4KZHZwCI2wK8B7Y-2B-2B2pxFF-2B8Zmz7UfwbhULos4ithDW54zavSA-3D-3D" alt="" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" class="CToWUd" data-bit="iit"></div></div>';

    // $message='<img height="90" src="https://www.grootpandacoin.com/assets/emailcoin.png" style="border:0;border-radius:50%;display:block;outline:none;text-decoration:none;height:90px;width:100%;font-size:13px" width="90" class="CToWUd" data-bit="iit">';
    $header = "From: $email \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    // $retval = mail ($to,$subject,$message,$header);

    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';

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
        
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'RSHC';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->Body    =$message;
        $mail->send();
        $response_array['success'] = true;
        $response_array['de'] = true;
        $response_array['re'] = true;
        echo json_encode($response_array);
    } catch (Exception $exc) {
        echo $exc;
    }

    // $response_array['success'] = true;
    // echo json_encode($response_array);
?>