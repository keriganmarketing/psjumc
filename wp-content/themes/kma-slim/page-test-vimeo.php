<?php

use Includes\Modules\Vimeo\KmaVimeo;
use KeriganSolutions\FacebookFeed\FacebookFeed;

get_header();

$page    = $_GET['pg'] ?? 1;
$perPage = $_GET['perPage'] ?? 4;

$vimeo   = new KmaVimeo();
$videos = $vimeo->videos($page, $perPage);

// data
echo '<pre>',print_r($videos),'</pre>';
// pagination example
echo '<a href="test-vimeo/?pg='.($page + 1).'" class="button is-primary">Next</a>';

$feed    = new FacebookFeed();
$results = $feed->fetch(5);

echo '<pre>',print_r($results),'</pre>';


foreach ($results->data as $result) {
    $badPhotoUrl  = $result->picture;
    $goodPhotoUrl = $feed->photo($result);

    echo "<h3>Bad Photo:</h3> <img src='{$badPhotoUrl}' /><br>";
    echo "<h3>Good Photo:</h3> <img src='{$goodPhotoUrl}' /><br>";
    echo "<br><hr>";
}


get_footer();
