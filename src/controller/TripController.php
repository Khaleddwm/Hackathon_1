<?php

$documentaireTv = [42989, 101836, 77314, 98546, 86629, 98404, 100279];
const picPath = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2';
for ($i = 0; $i < count($documentaireTv); $i++){
    $url = 'https://api.themoviedb.org/3/tv/';
    $key = '?api_key=b0d82ea299ca78abff5d31babb3ae18d';
    $urlKey = $url . $documentaireTv[$i] . $key;
    $curl = curl_init($urlKey);
    curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
    $data = curl_exec($curl);
    if ($data === false || isset($data[poster_path])) {
    var_dump(curl_error($curl));   
    } else {
    $data = json_decode($data, true);
    }
    echo '<img src="' . picPath . $data[poster_path] . '" />';
}
curl_close($curl);

$documentaireMovie = [27187, 604783, 244481, 600999, 331112, 600993, 473976, 665509, 408550, 158999, 359364, 265297];
for ($i = 0; $i < count($documentaireMovie); $i++){
    $url = 'https://api.themoviedb.org/3/movie/';
    $key = '?api_key=b0d82ea299ca78abff5d31babb3ae18d';
    $urlKey = $url . $documentaireMovie[$i] . $key;
    $curl = curl_init($urlKey);
    curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
    $data = curl_exec($curl);
    if ($data === false || isset($data[poster_path])) {
    var_dump(curl_error($curl));   
    } else {
    $data = json_decode($data, true);
    }
    echo '<img class="col-3" src="' . picPath . $data[poster_path] . '" />';
}
curl_close($curl);

/*$url = 'https://api.themoviedb.org/3/tv/';
$key = '?api_key=b0d82ea299ca78abff5d31babb3ae18d';
$urlKey = $url . 42989 . $key;
$curl = curl_init($urlKey);
curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl));   
    } else {
    $data = json_decode($data,true);
    var_dump($data);
    }
if (in_array('Documentary', $data) && !empty($data[poster_path])) {
    echo '<img src="' . picPath . $data[poster_path] . '" />';
}
curl_close($curl);*/