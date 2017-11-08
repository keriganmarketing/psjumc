<?php

?>
<div class="card mini-photo-gallery">
    <div class="card-content">
        <h3 class="title">Photo Gallery</h3>
        <div class="columns is-multiline photos">
            <?php for($i=1;$i<=9;$i++){ ?>
                <div class="column is-4">
                    <figure class="image is-1by1">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

