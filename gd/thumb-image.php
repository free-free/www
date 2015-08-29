<?php
/*$image=imagecreatetruecolor(400, 400);
$color_red=imagecolorallocate($image, 255, 0, 0);
$color_green=imagecolorallocate($image, 0, 255, 0);
$color_blue=imagecolorallocate($image, 0, 0, 255);
imagefilledrectangle($image, 0, 0, 400, 100, $color_red);
imagefilledrectangle($image, 0, 100, 400, 250, $color_green);
imagefilledrectangle($image, 0,250, 400, 400, $color_blue);
header("Content-type:image/jpeg");
imagejpeg($image);*/



$image_path='./image/a.jpg';
$image_info=getimagesize($image_path);
print_r($image_info);
die();
$image_type=image_type_to_extension($image_info[2],false);
$image_create_func='imagecreatefrom'.$image_type;
$image=$image_create_func($image_path);


$thumb_image=imagecreatetruecolor(100,100);
imagecopyresampled($thumb_image,$image,0, 0, 0, 0, 100, 100, $image_info[0],$image_info[1]);

if(imagejpeg($thumb_image,'./image/thumg-image.jpg')){
	echo 'thumb image creatation succeed';
}
imagedestroy($image);
imagedestroy($thumb_image);
?>
