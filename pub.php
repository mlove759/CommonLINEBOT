 <?php
 function pubMqtt($topic,$msg) {
    $APPID= "LineBotM/";      //PUT NETPIE APPID Name end with "/"
    $KEY = "ZGjKeID6gH2reEv";          //PUT NETPIE Key ID
    $SECRET = "S5U4fJUDJXCxWsdgE0N8D1Lzm";   //PUT NETPIE Secret ID 
    $Topic = "$topic";
  
    put("https://api.netpie.io/microgear/".$APPID.$Topic."?retain&auth=".$KEY.":".$SECRET,$msg);
  }

 function getMqttfromlineMsg($Topic,$lineMsg) {
    $pos = strpos($lineMsg, ":");
    if($pos) {
      $splitMsg = explode(":", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }
    else {
      $topic = $Topic;
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
  function put($url,$tmsg) {
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
     
     $response = curl_exec($ch);
     curl_close($ch);
     echo $response . "\r\n";
    return $response;
  }

?>
