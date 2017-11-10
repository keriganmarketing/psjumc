<?php

use KeriganSolutions\FacebookFeed\FacebookFeed;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : get_the_archive_title());
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : get_the_archive_description());

include(locate_template('template-parts/sections/top.php'));
$feed    = new FacebookFeed();
$results = $feed->fetch(9);
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section support-header" >
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">News</h1>
                    <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                </div>
            </div>
        </div>
        <section id="content" class="section news">
            <div class="container">
                <div class="columns is-multiline">
                <?php foreach ($results as $result) { ?>
                    <div class="column is-4">
                        <?php include(locate_template('template-parts/partials/mini-article.php')); ?>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
