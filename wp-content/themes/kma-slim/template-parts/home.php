<?php

use Includes\Modules\Slider\BulmaSlider;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section home-header" >
		</div>
        <div class="section entry-content <?= $post->post_name; ?>">
            <div class="container" >
                <div class="content">
                    <h1 class="title"><?= $headline; ?></h1>
                    <?= ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
		<div class="section connect">
            <div class="container">
                <?php include(locate_template('template-parts/sections/connect.php')); ?>
            </div>
		</div>
      
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
