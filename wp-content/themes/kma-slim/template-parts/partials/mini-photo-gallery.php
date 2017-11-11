<div class="card mini-photo-gallery">
    <div class="card-content">
        <h3 class="title">Photo Gallery</h3>
        <div class="columns is-multiline photos">
            <?php foreach ($albums as $album) { ?>
                <div class="column is-4">
                    <figure class="image is-1by1">
                        <img src="<?= $album->cover_photo->picture ?>" alt="Placeholder image">
                    </figure>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

