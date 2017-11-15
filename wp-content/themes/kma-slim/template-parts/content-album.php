<?php

use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = isset($_GET['albumName']) ? $_GET['albumName'] : 'Album';

// Cursor before the returned data set
$before  = $_GET['before'] ?? null;
// Cursor after the returned data set
$after   = $_GET['after'] ?? null;

$albumId = $_GET['albumId'] ?? null;

$gallery = new FacebookPhotoGallery();
$photos  = $gallery->albumPhotos($albumId, 16, $before, $after);

//echo '<pre>',print_r($photos),'</pre>';

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
                </div>

                <div class="columns is-multiline photo-gallery">
                    <?php
                    foreach ($photos->data as $photo) { ?>
                        <div class="column is-3">
                            <figure class="image is-4by3">
                                <a @click="$emit('toggleModal', 'imageViewer', '<?= $photo->images[0]->source ?>')" >
                                    <img src="<?= $photo->images[4]->source ?>" alt="<?= $photo->images[0]->name ?>" class="img">
                                </a>
                            </figure>
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
