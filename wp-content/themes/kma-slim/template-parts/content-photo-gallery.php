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

$page    = $_GET['pg'] ?? 1;
$perPage = $_GET['perPage'] ?? 6;

$gallery = new FacebookPhotoGallery();
$albums  = $gallery->albums();

$numPages = ceil($videos['total'] / $perPage) + 1;

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
                    foreach ($albums as $album) { ?>
                        <div class="column is-4">
                            <a href="<?= $album->link ?>">
                                <img src="<?= $album->cover_photo->images[0]->source ?>" alt="" class="img">
                                <p class="has-text-centered"><?= $album->name ?></p>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php include(locate_template('template-parts/partials/pagination.php')); ?>
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
