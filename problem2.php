<?php
// A polygon that kinda resembels fire
$values = array(
    50, 50,
    125, 100,
    150, 50,
    175, 100,
    200, 50,
    200, 150,
    200, 200,
    50, 200,
    50, 150,
    50, 50,
);

// create image
$image = imagecreatetruecolor(250, 250);

// set the colours of the background and polygon
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

// create background
imagefilledrectangle($image, 0, 0, 249, 249, $black);

// create the fire polygon
imagefilledpolygon($image, $values, COUNT($values) / 2, $red);

// flush image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
