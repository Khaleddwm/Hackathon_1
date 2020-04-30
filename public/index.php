<?php

// Api Key
require_once __DIR__ . '/../vendor/autoload.php';

require_once 'key.php';
$url = 'https://api.themoviedb.org/3/tv/';
$key = '?api_key=b0d82ea299ca78abff5d31babb3ae18d';
$urlKey = $url . 35 . $key;
$curl = curl_init($urlKey);
curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
$data = curl_exec($curl);
if ($data === false){
    var_dump(curl_error($curl));   
}else {
    $data = json_decode($data,true);
    echo '<pre>';
    var_dump($data);
    echo '</pre>';    
}

const picPath = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2';
echo '<img src="' . picPath . $data[poster_path] . '" />';

curl_close($curl);
