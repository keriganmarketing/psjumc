<?php

use Includes\Modules\Vimeo\KmaVimeo;
get_header();

$page    = $_GET['pg'] ?? 1;
$perPage = $_GET['perPage'] ?? 4;

$vimeo   = new KmaVimeo();
$videos = $vimeo->videos($page, $perPage);

// data
echo '<pre>',print_r($videos),'</pre>';
// pagination example
echo '<a href="test-vimeo/?pg='.($page + 1).'" class="button is-primary">Next</a>';
get_footer();
