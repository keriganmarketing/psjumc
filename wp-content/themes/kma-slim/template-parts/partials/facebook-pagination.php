<?php
    $disabledPrevious = isset($albums->paging->previous) ? false : true;
    $disabledNext = isset($albums->paging->next) ? false : true;
?>
<nav class="pagination has-text-centered" role="navigation" aria-label="pagination">
    <a
        class="pagination-previous"
        <?= ($disabledPrevious == false ? 'href="/photo-gallery/?before=' . $albums->paging->cursors->before . '"' : ' disabled' ) ?>
    >
        Previous
    </a>
    <a
        class="pagination-next"
        <?= ($disabledNext == false ? 'href="/photo-gallery/?after=' . $albums->paging->cursors->after . '"' : ' disabled' ) ?>
    >
        Next page
    </a>
</nav>
