<?php
use Includes\Modules\KMAFacebook\FacebookController;
?>
<div class="section-title">
    <h2 class="title">Connect</h2>
</div>
<div class="columns is-multiline">
    <div class="column is-4 level-item">
        <?php include(locate_template('template-parts/partials/mini-worship-times.php')); ?>
    </div>
    <!--<div class="column is-4 level-item">
        <?php //include(locate_template('template-parts/partials/mini-photo-gallery.php')); ?>
    </div>-->
    <div class="column is-4 level-item">
        <?php
        //do Facebook thingy for 1 article here.
        $facebook = new FacebookController();
        $feed = $facebook->getFbPosts(1);
		if(count($feed) > 0){
			foreach ($feed as $result) {
				include(locate_template('template-parts/partials/mini-article.php'));
			}	
		}
        ?>
    </div>
</div>

