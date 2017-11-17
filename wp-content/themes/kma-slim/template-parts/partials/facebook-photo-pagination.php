<?php
    $disabledPrevious = isset($photos->paging->previous) ? false: true;
    $disabledNext     = isset($photos->paging->next) ? false: true;
    $albumName        = $_GET['albumName'];
?>
<nav class="pagination has-text-centered" role="navigation" aria-label="pagination">
    <a
        class="pagination-previous"
        <?= ($disabledPrevious == false ? 'href="/album/?albumId='. $albumId . '&albumName='. $albumName .  '&before=' . $photos->paging->cursors->before . '"' : ' disabled' ) ?>
    >
        Previous
    </a>
    <a
        class="pagination-next"
        <?= ($disabledNext == false ? 'href="/album/?albumId='. $albumId . '&albumName='. $albumName . '&after=' . $photos->paging->cursors->after . '"' : ' disabled' ) ?>
    >
        Next page
    </a>
</nav>
