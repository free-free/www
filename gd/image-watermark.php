<?php

/*origin image operation*/
$image_path="./image/a.jpg";
$image_info=getimagesize($image_path);
$image_type=image_type_to_extension($image_info[2],false);
$image_create_func='imagecreatefrom'.$image_type;
$image=$image_create_func($image_path);
/*watermark image operation*/
$water_image_path="./image.b.jpg";
$water_image_info=getimagesize($water_image_path);
$water_image_type=image_type_to_extension($water_image_info[2],false);
$water_image_create_func='imagecreatefrom'.$water_image_type;
$water_image=$water_image_create_func($water_image_path);


/*merge image*/
imagecopymerge($image,$water_image, 0, 0, 0, 0, $water_image_info[0],$water_image_info[1], 70);
imagedestroy($water_image);
header("content-type:".$image_info['mime']);
$image_save_func='image'.$image_type;
$image_save_func($image,'image-watermark.'.$image_type);
imagedestroy($image);


?>