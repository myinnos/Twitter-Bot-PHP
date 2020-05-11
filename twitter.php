<?php

date_default_timezone_set('Asia/Kolkata'); 

    $ApiKey = <API_KEY>;
    $ApiSecretKey = <API_SECRET_KEY>;
    $AccessToken = <ACCESS_TOKEN>;
    $AccessTokenSecret = <ACCESS_TOKEN_SECRET>;

    // add the codebird library
    require_once('codebird/src/codebird.php');
    \Codebird\Codebird::setConsumerKey($ApiKey, $ApiSecretKey);
    $cb = \Codebird\Codebird::getInstance();
    $cb->setToken($AccessToken, $AccessTokenSecret);

    //build an array of images to send to twitter
    $reply = $cb->media_upload(array(
        'media' => <IMAGE_URL> or <IMAGE_URI>
    ));
    
    //upload the file to your twitter account
    $mediaID = $reply->media_id_string;

    // implode mandatory only for multile media uploads
    $params = array(
             'status' => "#message",
             'media_ids' => implode(',', [$mediaID]) // optional
        );
   
    //post the tweet with codebird
    $reply = $cb->statuses_update($params);
    
    function get_content($URL)
     {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $URL);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
     }

?>
