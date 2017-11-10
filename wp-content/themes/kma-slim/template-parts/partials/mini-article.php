<?php
$headline = ($post->post_name == 'home' ? 'News' : '');
$dateposted = ($post->post_name == 'home' ? '' : human_time_diff(time(),strtotime($result->created_time)) . ' ago' );
$content  = $result->message;
$photoUrl = $feed->photo($result);
?>
<div class="card mini-article">
    <div class="card-image">
        <?php if($result->type != 'video') { ?>
            <figure class="image is-16by9">
                <a href="<?php echo $result->link; ?>" target="_blank">
                    <img src="<?php echo $photoUrl; ?>" alt="<?php echo $result->caption; ?>" >
                </a>
            </figure>
        <?php } else { ?>
            <figure class="image video is-16by9">
                <iframe
                        src="<?php echo 'https://www.facebook.com/plugins/video.php?href='.$result->link ?>"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowTransparency="true"
                        allowFullScreen="true"
                        class="article-image"
                        width="100%"
                        height="460">

                </iframe>
            </figure>
        <?php } ?>
    </div>
    <div class="card-content">
        <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?>
        <?= ($dateposted!='' ? '<p class="time-posted">'.$dateposted.'</p>' : null); ?>
        <?= wp_trim_words( $content, $num_words = 22, '...' ); ?> <a href="<?= $result->link; ?>">Read&nbsp;on&nbsp;Facebook</a>
    </div>
</div>
