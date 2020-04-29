<?php
// Api Key
$ApiKey = b0d82ea299ca78abff5d31babb3ae18d;

$curl = curl_init('https://api.themoviedb.org/3/tv/139?api_key=b0d82ea299ca78abff5d31babb3ae18d');
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
echo '<img src="' . picPath . $data[backdrop_path] . '" />';

curl_close($curl);