<?php

use Includes\Modules\Vimeo\KmaVimeo;

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

$vimeo    = new KmaVimeo();
$videos   = $vimeo->videos($page, $perPage);

if(isset($videos['total'])){
$numPages = ceil($videos['total'] / $perPage) + 1;
}

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
                        if(isset($videos['data'])){
                        foreach($videos['data'] as $video){
                        $photo = $video['pictures']['sizes'][3]
                        ?>
                        <div class="column is-6">
                            <?php include(locate_template('template-parts/partials/mini-sermon.php')); ?>
                        </div>
                    <?php }
                    } else {
                        echo '<div class="column is-6"><p>No Online Sermons are currently available.</p></div>';
                     } 
                    ?>
                </div>
                <?php 
                    if(isset($videos['data'])){
                        include(locate_template('template-parts/partials/pagination.php')); 
                    } ?>
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
