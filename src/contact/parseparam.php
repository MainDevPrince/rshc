<?php
$response_array=array();
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

$params =$_POST["param"];
$decodedParam = urldecode($params);
$deparam=decrypt($decodedParam ,"rshc love manager");
parse_str($deparam, $data);
foreach ($data as $key => $value) {
    if($key=='to')$response_array['email'] = $value;
    if($key=='fn')$response_array['firstName'] = $value;
    if($key=='ln')$response_array['lastName'] = $value;
    if($key=='mn')$response_array['mobile'] = $value;
    if($key=='ia')$response_array['investamount'] = $value;
    if($key=='ip')$response_array['investperiod'] = $value;
    if($key=='ds')$response_array['description'] = $value;
}
$response_array['success'] = true;
echo json_encode($response_array);

?>
