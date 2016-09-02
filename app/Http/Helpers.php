<?php

function blabla() {
    echo "BLA BLA";
}

function processImage($image_path) {
    if ($image_path) {
        $image_path = substr($image_path,0,3).'/'.substr($image_path,3,3).'/'.substr($image_path,6);
    }
    return $image_path;
}

function generateCategoryTitle($string) {
    $string = explode("/", $string);
    $string = end($string);
    return ucfirst(str_replace("-", " ", $string));
}