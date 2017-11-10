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

$numPages = ceil($videos['total'] / $perPage) + 1;

include(locate_template('template-parts/sections/top.php'));
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section top-section support-header" >
            <div class="hero-body">
                <div class="container">
                    <h1 class="title"><?php echo $headline; ?></h1>
                    <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                </div>
            </div>
        </div>
        <div class="section vimeo-archive">
            <div class="container">
                <div class="columns is-multiline">
                <?php foreach($videos['data'] as $video){
                    $photo = $video['pictures']['sizes'][3]
                    ?>
                    <div class="column is-6">
                        <div class="card mini-video">
                            <div class="card-image link" @click="$emit('toggleModal', 'videoViewer', <?= str_replace('/videos/','', $video['uri']); ?>)" >
                                <img src="<?= $photo['link_with_play_button']; ?>" >
                            </div>
                            <div class="card-content has-text-centered">
                                <h3 class="title"><?= $video['name']; ?></h3>
                                <p class="subtitle"><?= $video['description']; ?></p>
                                <p>
                                    <button @click="$emit('toggleModal', 'videoViewer', <?= str_replace('/videos/','', $video['uri']); ?>)"
                                            class="button is-primary">watch online
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <nav class="pagination has-text-centered" role="navigation" aria-label="pagination">
                    <a class="pagination-previous" href="/online-sermons/?pg=<?= $page - 1; ?>" <?= $page==1 ? 'disabled' : ''; ?> >Previous</a>
                    <a class="pagination-next" href="/online-sermons/?pg=<?= $page + 1; ?>" <?= $page==$numPages-1 ? 'disabled' : ''; ?> >Next page</a>
                    <ul class="pagination-list">
                        <?php if($page > 1){ ?>
                            <li><a class="pagination-link" href="/online-sermons/?pg=1" >1</a></li>
                            <li><span class="pagination-ellipsis">&hellip;</span></li>
                        <?php } ?>
                        <?php for($i = ( $page < $numPages-2 ? $page : $numPages - 3 ); $i < ( $page < $numPages-2 ? $page+3 : $numPages ); $i++){ ?>
                            <li>
                                <a
                                    href="/online-sermons/?pg=<?= $i; ?>"
                                    class="pagination-link <?= ($i == $page ? 'is-current' : ''); ?>"
                                    aria-label="<?= ($i == $page ? 'Page ' . $i : 'Go to ' . $i); ?>"
                                    <?= ($i == $page ? 'aria-current="page"' : ''); ?>
                                ><?= $i; ?></a>
                            </li>
                        <?php } ?>
                        <?php if($page < $numPages - 2){ ?>
                            <li><span class="pagination-ellipsis">&hellip;</span></li>
                            <li><a class="pagination-link" href="/online-sermons/?pg=<?= $numPages; ?>" ><?php echo $numPages; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </article>
</div>
<?php include(locate_template('template-parts/sections/bot.php')); ?>