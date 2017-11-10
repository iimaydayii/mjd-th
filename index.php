
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <!-- MAKE IT RESPONSIVE -->
    </head>
    <body>
        <?php
 
                $strAccessToken = "S/WKkJ/cr6+vqEj2bCvpy4oYGRc0PE2pH7Io97Ijf1yOllU6u0Mdu54yzxHiNMVzTlDTDD3a3BO3bBYwtwNOzU6U8pZPpqtptKZvyVSbRfX93pkWuAaSo6yublI6URZaGZkez/1eRJy3f/VW4bPeqQdB04t89/1O/w1cDnyilFU=";
                $content = file_get_contents('php://input');
                $arrJson = json_decode($content, true);
                $strUrl = "https://api.line.me/v2/bot/message/reply";

                 $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "template";
                  $arrPostData['messages'][0]['altText'] = "test altText";
                  $arrPostData['messages'][0]['template']['type'] = "buttons";
                  $arrPostData['messages'][0]['template']['thumbnailImageUrl'] = "http://www.mjd.co.th/images/slide_photo/1509940201.jpg";
                  $arrPostData['messages'][0]['template']['title'] = "Menu";
                  $arrPostData['messages'][0]['template']['text'] = "select";
                  $arrPostData['messages'][0]['template']['actions'][0]['type'] = "uri";
                  $arrPostData['messages'][0]['template']['actions'][0]['label'] = "view";
                  $arrPostData['messages'][0]['template']['actions'][0]['uri'] = "http://www.mjd.co.th/";

                  echo json_encode($arrPostData);
                  exit;
                 
                $arrHeader = array();
                $arrHeader[] = "Content-Type: application/json";
                $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
                if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "text";
                  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
                }else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "text";
                  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
                }else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง"){
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "text";
                  $arrPostData['messages'][0]['text'] = "ฉันทำอะไรไม่ได้เลย คุณต้องสอนฉันอีกเยอะ";
                }else if($arrJson['events'][0]['message']['text'] == "mjd"){
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "template";
                  $arrPostData['messages'][0]['altText'] = "test altText";
                  $arrPostData['messages'][0]['template']['type'] = "buttons";
                  $arrPostData['messages'][0]['template']['thumbnailImageUrl'] = "http://www.mjd.co.th/images/slide_photo/1509940201.jpg";
                  $arrPostData['messages'][0]['template']['title'] = "Menu";
                  $arrPostData['messages'][0]['template']['text'] = "select";
                  $arrPostData['messages'][0]['template']['actions'][0]['type'] = "uri";
                  $arrPostData['messages'][0]['template']['actions'][0]['label'] = "view";
                  $arrPostData['messages'][0]['template']['actions'][0]['uri'] = "http://www.mjd.co.th/";
                  
                }else{
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "text";
                  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
                }
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$strUrl);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                curl_close ($ch);
 
?>
        
    </body>
    
    <!-- END BODY -->
</html>