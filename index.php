
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <!-- MAKE IT RESPONSIVE -->
    </head>
    <body>
        <?php
 
              
                    require_once '../vendor/autoload.php';
                    use Monolog\Logger;
                    use Monolog\Handler\StreamHandler;
                    use Monolog\Handler\FirePHPHandler;
                    $logger = new Logger('LineBot');
                    $logger->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));
                    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV["S/WKkJ/cr6+vqEj2bCvpy4oYGRc0PE2pH7Io97Ijf1yOllU6u0Mdu54yzxHiNMVzTlDTDD3a3BO3bBYwtwNOzU6U8pZPpqtptKZvyVSbRfX93pkWuAaSo6yublI6URZaGZkez/1eRJy3f/VW4bPeqQdB04t89/1O/w1cDnyilFU="]);
                    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV["97552ee15c9d150ee71c172eec6044d8"]]);
                    $signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
                    try {
                      $events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);
                    } catch(\LINE\LINEBot\Exception\InvalidSignatureException $e) {
                      error_log('parseEventRequest failed. InvalidSignatureException => '.var_export($e, true));
                    } catch(\LINE\LINEBot\Exception\UnknownEventTypeException $e) {
                      error_log('parseEventRequest failed. UnknownEventTypeException => '.var_export($e, true));
                    } catch(\LINE\LINEBot\Exception\UnknownMessageTypeException $e) {
                      error_log('parseEventRequest failed. UnknownMessageTypeException => '.var_export($e, true));
                    } catch(\LINE\LINEBot\Exception\InvalidEventRequestException $e) {
                      error_log('parseEventRequest failed. InvalidEventRequestException => '.var_export($e, true));
                    }
                    foreach ($events as $event) {
                          // Postback Event
                          if (($event instanceof \LINE\LINEBot\Event\PostbackEvent)) {
                            $logger->info('Postback message has come');
                            continue;
                          }
                          // Location Event
                          if  ($event instanceof LINE\LINEBot\Event\MessageEvent\LocationMessage) {
                            $logger->info("location -> ".$event->getLatitude().",".$event->getLongitude());
                            continue;
                          }
                          
                          // Message Event = TextMessage
                          if (($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage)) {
                            // get message text
                            $messageText=strtolower(trim($event->getText()));
                            
                          }
                        }  
                        $outputText = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("text message");
                        $bot->replyMessage($event->getReplyToken(), $outputText);
 
        ?>
        
    </body>
    
    <!-- END BODY -->
</html>