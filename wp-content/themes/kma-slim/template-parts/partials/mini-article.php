<?php


$headline = ($post->post_name == 'home' ? 'News' : '');
$content  = $result->message;
$photoUrl = $feed->photo($result);
?>
<div class="card mini-article">
    <div class="card-image">
        <figure class="image is-16by3">
        <img src="<?= $photoUrl ?>">
        </figure>
    </div>
    <div class="card-content">
        <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?>
        <?= wp_trim_words( $content, $num_words = 22, ' <a href="#">Read more</a>...' ); ?>
    </div>
</div>
