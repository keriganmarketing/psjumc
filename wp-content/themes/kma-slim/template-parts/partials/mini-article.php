<?php
/**
 * Created by PhpStorm.
 * User: Bryan
 * Date: 7/13/2017
 * Time: 12:02 PM
 */

$headline = ($post->post_name == 'home' ? 'News' : '');

?>
<div class="card mini-article">
    <div class="card-image">
        <figure class="image is-16by3">
        <img src="http://bulma.io/images/placeholders/640x360.png">
        </figure>
    </div>
    <div class="card-content">
        <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?>
        <?php $trimmed = wp_trim_words( $post->post_content, $num_words = 20, '...' ); ?>
    </div>
</div>
