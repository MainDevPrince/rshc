<?php
    include "../utils/functions.php";   

    $secretPhrase = generateSecretPhrase();
    $response_array['phrase'] = $secretPhrase;
    echo json_encode($response_array);
?>