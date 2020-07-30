<?php
$headline = ($post->post_name == 'home' ? 'News' : '');
$dateposted = human_time_diff(time(),strtotime($result->post_date)) . ' ago';
$content  = $result->post_content != 'Click here to read more on Facebook' ? $result->post_content : '';
$photoUrl = $result->full_image_url != null ? $result->full_image_url : 'http://psjumc.org/wp-content/uploads/18118987_1726122984071630_5737930412887748488_n.jpg';
?>
<div class="card mini-article" style="display: flex; flex-direction: column;">
    <div class="card-image" style="display: flex; flex-direction: column; flex-grow: 1;">
        <?php if($result->status_type != 'added_video') { ?>
            <figure class="image is-16by9">
                <a target="_blank" href="<?php echo $result->post_link; ?>" target="_blank">
                    <img src="<?php echo $photoUrl; ?>" alt="<?php echo $content; ?>" >
                </a>
            </figure>
        <?php } else { ?>
            <figure class="image video" style="flex-grow:1;" >
                <iframe
                    src="https://www.facebook.com/plugins/video.php?href=<?= $result->post_link; ?>"
                    style="border:none;overflow:hidden"
                    scrolling="no"
                    frameborder="0"
                    allowTransparency="true"
                    allowFullScreen="true"
                    class="article-image"
                    width="100%"
                    height="100%" >
                </iframe>
            </figure>
        <?php } ?>
    </div>
    <div class="card-content">
        <!-- <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?> -->
        <?= ($dateposted!='' ? '<p class="time-posted">Posted '.$dateposted.'</p>' : null); ?>
        <?= wp_trim_words( $content, $num_words = 22, '...' ); ?>
        <?php if($result->status_type != 'added_video'){ ?>
            <a target="_blank" href="<?= $result->post_link; ?>">Read&nbsp;on&nbsp;facebook</a>
        <?php }else{ ?>
            <a @click="$emit('toggleModal', 'embedViewer', '<?= $result->video_url; ?>')" >Watch&nbsp;the&nbsp;video</a>
        <?php } ?>
    </div>
</div>
