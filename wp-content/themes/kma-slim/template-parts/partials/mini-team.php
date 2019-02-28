<?php
$person = (isset($person) ? $person : null);
?>
<article class="person">
    <?php if(isset($person['photo']['thumbnail']['relative_path'])){ ?>
    <figure class="image is-128x128 person-photo">
        <img src="<?= $person['photo']['thumbnail']['relative_path']; ?>">
    </figure>
    <?php } ?>
    <h2 class="title"><?= $person['name']; ?></h2>
    <h3 class="subtitle"><?= $person['title']; ?></h3>
    <?= $person['bio']; ?>
    <hr>
</article>
