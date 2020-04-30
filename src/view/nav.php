<!-- header -->
<header>
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="index.php">MovieTrip</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="trip.php">Trip</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2"  type="text" name="search" placeholder="Type Title Here" required>
      <select name="channel" required>
        <option value="movie" selected="selected">Movie
        </option>
        <option value="tv">TV Show
        </option>
      </select>
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"> rechercher</button>
    </form>
  </div>
</nav>
</header>
<!-- fin header -->
<?php
$input=!empty($_GET['search']) ? $_GET['search'] : '';
$channel=!empty($_GET['channel']) ? $_GET['channel'] : '';
$search=$input;
$apikey = "d1ef408bd1f0bcbea188be92af01fcf8";
$sitename = "Movie trip";
$tagline = "a tirp into the world of films and series ";
$email = "Your-email@gmail.com";
$url = "http://juniordev.net";
$imgurl_1 = "http://image.tmdb.org/t/p/w500";
$imgurl_2 = "http://image.tmdb.org/t/p/w300";
$title = 'Result Search | '.$input;
// a request for film and serie search
$cs = curl_init();
curl_setopt($cs, CURLOPT_URL, "http://api.themoviedb.org/3/search/".$channel."?api_key=".$apikey."&query=".$search);
curl_setopt($cs, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($cs, CURLOPT_HEADER, FALSE);
curl_setopt($cs, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response17 = curl_exec($cs);
curl_close($cs);
$search = json_decode($response17);
 ?>

<h3>Result Search: <em><?php echo $input?></em></h3>
    <hr>
    <ul>
<?php
	if($channel=="movie"){	
                foreach($search->results as $results){
			$title 		= $results->title;
			$id 		= $results->id;
			$release	= $results->release_date;
			if (!empty($release) && !is_null($release)){
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)){
					$title = $title.' ('.$year.')';
				}
			}
			$backdrop 	= $results->backdrop_path;
			if (empty($backdrop) && is_null($backdrop)){
				$backdrop =  dirname($_SERVER['PHP_SELF']).'/image/no-gambar.jpg';
			} else {
				$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
			}
			echo '<li><a href="movie.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
		}
        }elseif($channel=="tv"){
            foreach($search->results as $results){
			$title 		= $results->original_name;
			$id 		= $results->id;
			$release	= $results->first_air_date;
			if (!empty($release) && !is_null($release)){
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)){
					$title = $title.' ('.$year.')';
				}
			}
			$backdrop 	= $results->backdrop_path;
			if (empty($backdrop) && is_null($backdrop)){
				$backdrop = $pathloc.'image/no-backdrop.png';
			} else {
				$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
			}
			echo '<li><a href="tvshow.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
		}
        }
        ?>
    </ul>