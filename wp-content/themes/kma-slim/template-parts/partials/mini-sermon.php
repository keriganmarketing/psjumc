<?php
?>
<div class="card mini-video">
    <div class="card-image link" @click="$emit('toggleModal', 'videoViewer', <?= str_replace('/videos/','', $video['uri']); ?>)" >
        <img src="<?= $photo['link_with_play_button']; ?>" >
    </div>
    <div class="card-content has-text-centered">
        <h3 class="title"><?= $video['name']; ?></h3>
        <p class="subtitle"><?= $video['description']; ?></p>
    </div>
    <div class="card-footer">
        <a @click="$emit('toggleModal', 'videoViewer', <?= str_replace('/videos/','', $video['uri']); ?>)"
                class="card-footer-item is-primary">watch online
        </a>
    </div>
</div>
