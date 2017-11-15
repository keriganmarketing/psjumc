<?php

use KeriganSolutions\FacebookFeed\FacebookFeed;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

include(locate_template('template-parts/sections/top.php'));
$feed    = new FacebookFeed();
$results = $feed->fetch(9);
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section support-header" >
        </div>
        <div id="content" class="section support news">
            <div class="container">

                <div class="entry-content">
                    <h1 class="title">News</h1>
                    <?php the_content(); ?>
                </div>

                <div class="columns is-multiline">
                <?php foreach ($results->posts as $result) { ?>
                    <div class="column is-4">
                        <?php include(locate_template('template-parts/partials/mini-article.php')); ?>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
