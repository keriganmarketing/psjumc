<?php

use Includes\Modules\Vimeo\KmaVimeo;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.3
 */
get_header();

$page    = $_GET['pg'] ?? 1;
$perPage = $_GET['perPage'] ?? 4;
//pagination example
echo '<a href="test-vimeo/?pg='.($page + 1).'" class="button is-primary">Next</a>';
$vimeo   = new KmaVimeo();
$videos = $vimeo->videos($page, $perPage);

echo '<pre>',print_r($videos),'</pre>';
get_footer();
