<?php
/**
 * Created by PhpStorm.
 * User: Bryan
 * Date: 7/13/2017
 * Time: 12:02 PM
 */

$headline = ($post->post_name == 'home' ? 'News' : '');
$content = 'Lorem ipsum dolor sit amet, eam natum utroque in. Ut clita patrioque est, usu ne putant virtute, novum molestie pertinacia sea ea. Persius fabellas no quo. Iisque persequeris vix te.';
?>
<div class="card mini-article">
    <div class="card-image">
        <figure class="image is-16by3">
        <img src="http://bulma.io/images/placeholders/640x360.png">
        </figure>
    </div>
    <div class="card-content">
        <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?>
        <?= wp_trim_words( $content, $num_words = 22, ' <a href="#">Read more</a>...' ); ?>
    </div>
</div>
