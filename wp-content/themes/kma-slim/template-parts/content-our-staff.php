<?php

use Includes\Modules\Team\Team;
use Includes\Modules\Layouts\Layouts;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

$layouts     = new Layouts();
$hasSidebars = $layouts->hasSidebars($post);
$team        = new Team();
$allTeam     = $team->getTeam();

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
                <?php if($hasSidebars){ ?>
                    <div class="columns is-multiline">
                        <div class="column is-12 is-8-desktop">
                <?php } ?>
                            <div class="entry-content <?= $hasSidebars ? 'has-sidebar' : ''; ?>">
                                <?php the_content(); ?>
                                <?php foreach ($allTeam as $person){ ?>
                                    <article class="person">
                                        <?php if(isset($person['photo'])){ ?>
                                        <figure class="image is-128x128 person-photo">
                                            <img src="<?= $person['photo']['thumbnail']['relative_path']; ?>">
                                        </figure>
                                        <?php } ?>
                                        <h2 class="title"><?= $person['name']; ?></h2>
                                        <h3 class="subtitle"><?= $person['title']; ?></h3>
                                        <?= $person['bio']; ?>
                                        <hr>
                                    </article>
                                <?php } ?>
                            </div>
                <?php if($hasSidebars){ ?>
                        </div>
                        <div class="column is-12 is-4-desktop">
                            <?php include(locate_template('template-parts/sections/sidebar.php')); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </article>
    <div class="section connect">
        <div class="container">
            <?php include(locate_template('template-parts/sections/connect.php')); ?>
        </div>
    </div>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>