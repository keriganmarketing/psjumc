<?php

use Includes\Modules\Social\SocialSettingsPage;

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
        <div class="section top-section support-header" >
        </div>
        <section id="content" class="section support">
            <div class="container">
                <h1 class="title"><?php echo $headline; ?></h1>
                <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                <div class="columns is-multiline">
                    <div class="column is-3">
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <div class="social in-line">
                                <strong>Connect: </strong> &nbsp;
                                <?php
                                $socialLinks = new SocialSettingsPage();
                                $socialIcons = $socialLinks->getSocialLinks('svg', 'circle');
                                if (is_array($socialIcons)) {
                                    foreach ($socialIcons as $socialId => $socialLink) {
                                        echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column is-9">
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSse2ehed8wP4EA6ob3aZNiebR_Nwx8mM" ></script>
                        <google-map :latitude="29.8057935" :longitude="-85.3017811" :zoom="11" name="location" >
                            <pin :latitude="29.8057935" :longitude="-85.3017811" title="First United Methodist Church">
                                <p><strong>First United Methodist Church</strong></p>
                                <p class="address">1001 Constitution Dr.<br>Port St Joe, FL 32456</p>
                                <p class="phone"><em>tel:</em> <a href="tel:850-227-1724">850-227-1724</a></p>
                                <p class="phone"><em>fax:</em> <a href="tel:850-227-3119">850-227-3119</a></p>
                                <p class="appt-button"><a class="button is-info" target="_blank" href="https://www.google.com/maps/dir//First+United+Methodist+Church,+1001+Constitution+Dr,+Port+St+Joe,+FL+32456/@29.8058585,-85.3364853,13z/">Get Directions</a></p>
                            </pin>
                        </google-map>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <div class="section connect">
        <div class="container">
            <?php include(locate_template('template-parts/sections/connect.php')); ?>
        </div>
    </div>

    <div class="section subscribe">
        <div class="container">
            <?php include(locate_template('template-parts/partials/subscribe.php')); ?>
        </div>
    </div>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>