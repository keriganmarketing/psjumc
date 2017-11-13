<?php

use KeriganSolutions\FacebookFeed\FacebookEvents;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

$feed    = new FacebookEvents();
$results = $feed->fetch(9);

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section support-header" >
            <div class="hero-body">
                <div class="container">
                    <h1 class="title"><?php echo $headline; ?></h1>
                    <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                </div>
            </div>
        </div>
        <div class="section vimeo-archive">
            <div class="container">
                <div class="columns is-multiline">
                <?php foreach($results as $event){ ?>
                    <div class="column is-6">
                        <?php include(locate_template('template-parts/partials/mini-event.php')); ?>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
