<?php
use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

$gallery  = new FacebookPhotoGallery();
$albums   = $gallery->albums(9);
?>
<div class="card mini-photo-gallery">
    <div class="card-content">
        <h3 class="title">Photo Gallery</h3>
        <div class="columns is-multiline photos">
            <?php foreach ($albums->data as $album) { ?>
                <div class="column is-4">
                    <figure class="image is-1by1">
                        <img src="<?= $album->cover_photo->picture ?>" alt="Placeholder image">
                    </figure>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

