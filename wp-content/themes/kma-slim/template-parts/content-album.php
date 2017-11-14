<?php

use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

// Cursor before the returned data set
$before  = $_GET['before'] ?? null;
// Cursor after the returned data set
$after   = $_GET['after'] ?? null;

$albumId = $_GET['albumId'] ?? null;

$gallery = new FacebookPhotoGallery();
$photos  = $gallery->albumPhotos($albumId, 18, $before, $after);

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section support-header" >
        </div>
        <div id="content" class="section support vimeo-archive">
            <div class="container">

                <div class="entry-content">
                    <h1 class="title"><?php echo $headline; ?></h1>
                    <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                    <?php the_content(); ?>
                </div>

                <div class="columns is-multiline">
                    <?php
                    foreach ($photos->data as $photo) { ?>
                        <div class="column is-4">
                            <img src="<?= $photo->images[0]->source ?>" alt="" class="img">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php include(locate_template('template-parts/partials/facebook-photo-pagination.php')); ?>
            </div>
        </div>
    </article>
    <div class="section connect">
        <div class="container">
            <?php include(locate_template('template-parts/sections/connect.php')); ?>
        </div>
    </div>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
