<?php

use Includes\Modules\Slider\BulmaSlider;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section home-header" >

            <div class="container">

                <div class="columns is-multiline">
                    <div class="column is-8-desktop">
                        <bulma-slider>
                            <?php
                            $slider = new BulmaSlider();
                            echo $slider->getSlider('home-page-slider');
                            ?>
                        </bulma-slider>
                    </div>
                    <div class="column is-12 is-4-desktop">
                        <div class="columns is-multiline">
                            <div class="column is-6 is-12-desktop">
                                <img src="https://bulma.io/images/placeholders/480x320.png" style="display: block; width: 100%;">
                            </div>
                            <div class="column is-6 is-12-desktop">
                                <img src="https://bulma.io/images/placeholders/480x320.png" style="display: block; width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="section content <?= $post->post_name; ?>">

        </div>
        <div class="section connect">

        </div>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>
