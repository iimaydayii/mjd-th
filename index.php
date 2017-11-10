
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
                }else{
                  $arrPostData = array();
                  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  $arrPostData['messages'][0]['type'] = "template";
                  $arrPostData['messages'][0]['altText'] = "MJD TH MENU";
                  $arrPostData['messages'][0]['template']['type'] = "buttons";
                  $arrPostData['messages'][0]['template']['thumbnailImageUrl'] = "https://mjd-th.herokuapp.com/images/banner_2.jpg";
                  $arrPostData['messages'][0]['template']['title'] = "คู่มือผู้ใช้";
                  $arrPostData['messages'][0]['template']['text'] = "ต้องการให้เมเจอร์ช่วยเรื่องอะไรค่ะ";
                  $arrPostData['messages'][0]['template']['actions'][0]['type'] = "message";
                  $arrPostData['messages'][0]['template']['actions'][0]['label'] = "ติดต่อแผนกบริการหลังการขาย";
                  $arrPostData['messages'][0]['template']['actions'][0]['text'] = "AFFTER SALE SERVICE";

                 

                  // $arrPostData = array();
                  // $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                  // $arrPostData['messages'][0]['type'] = "template";
                  // $arrPostData['messages'][0]['altText'] = "MJD TH MENU";
                  // $arrPostData['messages'][0]['template']['type'] = "image_carousel";
                  
                  // $arrPostData['messages'][0]['template']['columns'][0]['imageUrl'] = "https://mjd-th.herokuapp.com/images/banner_3.jpg";
                  // $arrPostData['messages'][0]['template']['columns'][0]['action']['type'] = "message";
                  // $arrPostData['messages'][0]['template']['columns'][0]['action']['label'] = "ติดต่อแผนกบริการหลังการขาย";
                  // $arrPostData['messages'][0]['template']['columns'][0]['action']['text'] = "ติดต่อแผนกบริการหลังการขาย";

                  // $arrPostData['messages'][0]['template']['columns'][1]['imageUrl'] = "https://mjd-th.herokuapp.com/images/banner_2.jpg";
                  // $arrPostData['messages'][0]['template']['columns'][1]['action']['type'] = "message";
                  // $arrPostData['messages'][0]['template']['columns'][1]['action']['label'] = "MJD EXTRA VIVING";
                  // $arrPostData['messages'][0]['template']['columns'][1]['action']['text'] = "MJD EXTRA VIVING";

                  // $arrPostData['messages'][0]['template']['columns'][2]['imageUrl'] = "https://mjd-th.herokuapp.com/images/banner_2.jpg";
                  // $arrPostData['messages'][0]['template']['columns'][2]['action']['type'] = "message";
                  // $arrPostData['messages'][0]['template']['columns'][2]['action']['label'] = "ค้นหาข้อมูลโครงการ";
                  // $arrPostData['messages'][0]['template']['columns'][2]['action']['text'] = "ค้นหาข้อมูลโครงการ";
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