<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/style.css">
    <title>Movie Trip</title>
</head>
<body>

<?php include_once 'nav.php'; ?>

<?php include_once 'TripMovie.php' ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container-fluid">
        <h1 class="display-4">Vos envies de voyages sont mis à mal durant cette période de confinement ?</h1>
        <p class="lead">Voyagez tranquillement depuis votre salon grace à Movie Trip. Profitez d'une séléction de reportage et de documentaire pour vous faire voyager et rêver.</p>
        <?php
        for ($i = 0; $i < count($documentaireMovie); $i++){
            $urlKey = $url . $documentaireMovie[$i] . $key;
            $curl = curl_init($urlKey);
            curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
            curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
            $data = curl_exec($curl);
            if ($data === false) {
            var_dump(curl_error($curl));   
            } else {
            $data = json_decode($data, true);
            }
        ?>
        
        <a class="" target="_blank "href="<?= $urlMovie . $documentaireMovie[$i] ?>"><img src="<?= picPath . $data['poster_path'] ?>" class="col-2" alt="..." style="  padding-bottom: 20px;padding-top: 20px;"></a>
        <?php } ?>
        
        <?php include_once 'TripTv.php' ?>
        <?php
            for ($i = 0; $i < count($documentaireTv); $i++){
                $urlKey = $url . $documentaireTv[$i] . $key;
                $curl = curl_init($urlKey);
                curl_setopt($curl, CURLOPT_CAINFO,__DIR__.DIRECTORY_SEPARATOR . 'cert.cer');
                curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE );
                $data = curl_exec($curl);
                if ($data === false) {
                var_dump(curl_error($curl));   
                } else {
                $data = json_decode($data, true);
                }
                ?>
              
                <a target="_blank" href="<?= $urlTv . $documentaireTv[$i] ?>"><img  src="<?= picPath . $data['poster_path'] ?>" class="col-2" alt="..." style="padding-bottom: 20px; padding-top: 20px;"></a>
            <?php } ?>
    </div>
</div>

<?php include_once 'footer.php'; ?>
<?php curl_close($curl); ?>
</body>
</html>