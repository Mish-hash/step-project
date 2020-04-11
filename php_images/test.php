<?php
header('Content-Type: image/jpg');
$image = imagecreatetruecolor(100, 100);
$bg = imagecolorallocate($image, $_GET['red'],  $_GET['green'],  $_GET['blue']);

imagefill($image, 0, 0, $bg);

imageellipse($image, 50, 50, 80, 80, 0xffffff);

imagefilledellipse($image, 30, 40, 10, 10, 0xffffff);
imagefilledellipse($image, 70, 40, 10, 10, 0xffffff);

imagearc($image, 50, 50, 60, 60, 30, 150, 0xffffff);

imagejpeg($image);
