<?php
use KeriganSolutions\FacebookFeed\FacebookFeed;
?>
<div class="section-title">
    <h2 class="title">Connect</h2>
</div>
<div class="columns is-multiline">
    <div class="column is-4 level-item">
        <?php include(locate_template('template-parts/partials/mini-worship-times.php')); ?>
    </div>
    <div class="column is-4 level-item">
        <?php include(locate_template('template-parts/partials/mini-photo-gallery.php')); ?>
    </div>
    <div class="column is-4 level-item">
        <?php
        //do Facebook thingy for 1 article here.
        $feed    = new FacebookFeed();
        $results = $feed->fetch(1);

        foreach ($results->posts as $result) {
            include(locate_template('template-parts/partials/mini-article.php'));
        }
        ?>
    </div>
</div>

