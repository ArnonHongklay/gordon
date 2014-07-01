<?php


session_start();

header("Content-Type: image/gif");

$_SESSION['captcha'] = $text = substr(md5(time()), 0,5);

$img = imagecreate(60, 20);

$fill = imagecolorallocate($img, 255, 255, 255);
$str = imagecolorallocate($img, 255, 0, 0);
$line = imagecolorallocate($img, 0, 255, 0);

imagefill($img, 0, 0, $fill);
imagestring($img, 15, 5, 5, $text, $str);
imageline($img, 0, 13, 60, 13, $line);

imagegif($img);
imagedestroy($img);


