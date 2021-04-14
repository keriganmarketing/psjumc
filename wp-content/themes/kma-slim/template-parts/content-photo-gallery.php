<?php

// use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;
use Includes\Modules\KMAFacebook\FacebookController;


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

$facebook = new FacebookController();
$albums   = $facebook->getFbAlbums();

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

                <div class="columns is-multiline photo-gallery">
                    <?php
                    if(count($albums) > 0){
                        foreach ($albums as $album) { ?>
                            <div class="column is-3">
                                <figure class="image is-4by3">
                                    <a href="/album/?albumName=<?= $album->name ?>&albumId=<?= $album->id ?>">
                                        <img src="<?= $album->cover_photo->images[4]->source ?>" alt="<?= $album->name ?>" class="img">
                                    </a>
                                </figure>
                                <p class="has-text-centered"><?= $album->name ?></p>
                            </div>
                        <?php
                        }
                    } else { ?>
                        <p style="padding: 1rem;">Our online photo albums are undergoing maintenance. Please <a href="https://www.facebook.com/pg/FUMC.PSJFL/photos/?tab=albums" target="_blank" rel="noopener" >visit our Facebook page</a> to view photos.</p>
                    <?php } ?>
                </div>
                <?php include(locate_template('template-parts/partials/facebook-album-pagination.php')); ?>
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
