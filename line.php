<?php

function send_LINE($msg){
 $access_token = '1tlmm/d9df3hO97beA0QAud1N4mwWusIO/Y9doSemnS6BWUg1sOLUOfs9vpCw9jZ6/+z2YLbKXY450QS5dO1oLb4GKSvsl+Tgb7bI1trWU1pLa2HuulmA4XgY0AxntB9BQ3i3qTYKTc8BxM8jC78vgdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)" 
 $messages = [
        'type' => 'text',
        'text' => $msg
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => 'Ubc56224df6fd53570fc744482ab3f244',         //PUT LINE ID at "Your user ID"
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
