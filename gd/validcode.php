<?php

$image=imagecreatetruecolor(80, 30);
$bgcolor=imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0,0 ,$bgcolor);
imageline(image, x1, y1, x2, y2, color);
$dots=mt_rand(300,350);
for ($i=0; $i <$dots; $i++) { 
	$x=mt_rand(1,100);
	$y=mt_rand(1,30);
	$dotcolor=imagecolorallocate($image,mt_rand(50,200),mt_rand(50,200),mt_rand(50,200));
	imagesetpixel($image, $x, $y, $dotcolor);
}
$lines=mt_rand(2,6);
for ($i=0; $i <$lines ; $i++) { 
	$linecolor=imagecolorallocate($image,mt_rand(0,100),mt_rand(0,100), mt_rand(0,100));
	imageline($image, mt_rand(0,100), mt_rand(0,30), mt_rand(0,100), mt_rand(0,30),$linecolor);
}
$str='abcdefghjkmnopqrstvuzxy746282345678536547586833957869ABCDEFGHJKLMNOPQRSTYZW';
for ($i=0; $i <4 ; $i++) { 
	$x=$i*80/4+rand(2,5);
	$y=20+mt_rand(0,5);
	$str=str_shuffle($str);
	$text=substr($str,mt_rand(1,strlen($str)-4),1);
	$font_size=mt_rand(15,20);
	$angle=mt_rand(-30,30);
	$color=imagecolorallocate($image, mt_rand(50,150),mt_rand(50,150), mt_rand(50,150));
	imagettftext($image, $font_size, $angle, $x, $y, $color, './arial.ttf', $text);
}
header("content-type:image/png");
imagepng($image);
imagedestroy($image);

?>