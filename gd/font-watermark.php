<?php

/*
1.open image
2.operate image
3.output image
4.destroy image
*/

//1.
$image_path="./image/a.jpg";
$image_info=getimagesize($image_path);
//print_r($image_info);
$image_type=image_type_to_extension($image_info['2'],false);
$image_func='imagecreatefrom'.$image_type;
$image=$image_func($image_path);
//2.
$font='./arial.ttf';//note here must add './' in front of font file
$content='HELLO WOLRD';
$text_color=imagecolorallocate($image, 66, 123, 231);
imagettftext($image,20,0, 30, 50, $text_color,$font, $content);
//3
//header("Content-type:".$image_info['mime']);
if(imagejpeg($image,'watermark.'.$image_type)){
	echo 'save image successfully!';
}
//4
imagedestroy($image);



?>