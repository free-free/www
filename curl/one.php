<?php
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'htpp://www.baidu.com');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$content=curl_exec($ch);
curl_close($ch);

echo str_replace("baidu", "diaosi", $content);
?>