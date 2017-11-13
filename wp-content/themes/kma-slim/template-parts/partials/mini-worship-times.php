<?php
use Includes\Modules\Helpers\PageField;
$field = new PageField();
?>
<div class="card mini-worship-times">
    <div class="card-image">
        <figure class="image is-16by9">
            <img src="<?= $field->getField('worship_times_photo',5); ?>" alt="Worship times">
        </figure>
    </div>
    <div class="card-content">
        <h3 class="title">Worship With Us</h3>
        <?= apply_filters('content', nl2br($field->getField('worship_times_html',5))); ?>
    </div>
</div>
