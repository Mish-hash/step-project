<?php
session_start();
require_once('../libs/session.php');
header('Content-Type: image/png');
$image = imagecreatetruecolor(200, 60);
imagefill($image, 0, 0, 0xdddddd);

for($i = 0; $i < 1000; $i++){
    imagesetpixel($image, rand(0, 200), rand(0, 60), 0x999999);
}

for($i = 0; $i < 8; $i++){
    imageline($image, rand(0, 200), rand(0, 60), rand(0, 200), rand(0, 60), 0x999999);
}

$letters = 'dsvjkhnzmxkcvicxrnhmxlzkxcjhnr';
$font =  __DIR__ . '/../libs/arial.ttf';

$word = '';

for($i = 0; $i < 4; $i++) {
    $letter = $letters[rand(0, strlen($letters)-1)];
    //imagestring($image, 7, 30 + $i * 20, 30, $letter, 0x000000);
    imagettftext($image, 24, rand(-3, 3), 30 + $i * 20, 30, 0x000000, $font, $letter);
    $word.=$letter;
}

setSession('captcha', $word);

imagepng($image);