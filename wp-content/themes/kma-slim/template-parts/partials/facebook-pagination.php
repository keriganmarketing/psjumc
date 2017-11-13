<?php
    $disabledPrevious = isset($albums->paging->previous) ? '' : ' disabled';
    $disabledNext = isset($albums->paging->next) ? '' : ' disabled';
?>
<nav class="pagination has-text-centered" role="navigation" aria-label="pagination">
    <a
        class="pagination-previous"
        href="/photo-gallery/?before=<?= $albums->paging->cursors->before ?>"
        <?= $disabledPrevious ?>
    >
        Previous
    </a>
    <a
        class="pagination-next"
        href="/photo-gallery/?after=<?= $albums->paging->cursors->after ?>"
        <?= $disabledNext ?>
    >
        Next page
    </a>
</nav>
