<?php

use Includes\Modules\Slider\BulmaSlider;
use KeriganSolutions\FacebookFeed\FacebookFeed;
use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');
$gallery  = new FacebookPhotoGallery();
$albums   = $gallery->albums(9);

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section home-header" >

            <div class="container">

                <div class="columns is-multiline">
                    <div class="column is-8-desktop">
                        <div class="slider-container">
                            <bulma-slider>
                                <?php
                                $slider = new BulmaSlider();
                                echo $slider->getSlider('home-page-slider');
                                ?>
                            </bulma-slider>
                        </div>
                    </div>
                    <div class="column is-12 is-4-desktop">
                        <div class="columns is-multiline">
                            <div class="column is-6 is-12-desktop">
                                <a href="/online-sermons/">
                                    <img class="photo-button" src="<?= get_template_directory_uri() . '/img/Online sermons@2x.png'; ?>" alt="ways to give to <?= get_bloginfo(); ?>" >
                                </a>
                            </div>
                            <div class="column is-6 is-12-desktop">
                                <a href="/salt-life-newsletter/">
                                    <img class="photo-button" src="<?= get_template_directory_uri() . '/img/Newsletter@2x.png'; ?>" alt="ways to give to <?= get_bloginfo(); ?>" >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
                        $feed    = new FacebookFeed();
                        $results = $feed->fetch(1);

                        foreach ($results as $result) {
                            include(locate_template('template-parts/partials/mini-article.php'));
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section subscribe">
            <div class="container">
                <div class="section-title">
                    <h2 class="title">Subscribe</h2>
                </div>
                <div class="section-content is-narrow">
                    <p>Sign up to receive our <span class="fancy" >Salt Life</span> Newsletter:</p>
                    <form class="form">
                        <input type="text" class="input" placeholder="email address">
                        <button type="submit" class="button is-light">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
