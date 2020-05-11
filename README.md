# Twitter-Bot-PHP
Twitter Bot for updating status automatically along with media using PHP.

**Register an App in twitter developer account** 

Register an application from the [Developer Page](https://developer.twitter.com). Remember to never reveal your consumer secrets. Now you have _**consumer key**_, _**consumer secret**_, _**access token**_ and _**access token secret**_.

**Download codebird-php** 

Use Codebird to connect to the Twitter REST API, Streaming API, Collections API, TON (Object Nest) API and Twitter Ads API from your PHP code — all using just one library. Codebird supports full 3-way OAuth as well as application-only auth.

Either can download from [HERE](https://github.com/myinnos/Twitter-Bot-PHP/tree/master/codebird) or [HERE](https://github.com/jublo/codebird-php)

      
How to use
-----
**Sending Message:** send a message to group or channel:
```php

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
  
```
##### Any Queries? or Feedback, please let me know by opening a [new issue](https://github.com/myinnos/Twitter-Bot-PHP/issues/new)!

## Contact
#### Prabhakar Thota
* :globe_with_meridians: Website: [myinnos.in](http://www.myinnos.in "Prabhakar Thota")
* :email: e-mail: contact@myinnos.in
* :mag_right: LinkedIn: [PrabhakarThota](https://www.linkedin.com/in/prabhakarthota "Prabhakar Thota on LinkedIn")
* :thumbsup: Twitter: [@myinnos](https://twitter.com/myinnos "Prabhakar Thota on twitter")    
* :camera: Instagram: [@prabhakar_t_](https://www.instagram.com/prabhakar_t_/ "Prabhakar Thota on Instagram")   

> If you appreciate my work, consider buying me a cup of :coffee: to keep me recharged :metal: by [PayPal](https://www.paypal.me/fansfolio)

License
-------

    Copyright 2020 MyInnos

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.

