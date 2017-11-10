<?php
?>
<nav class="pagination has-text-centered" role="navigation" aria-label="pagination">
    <a class="pagination-previous" href="/online-sermons/?pg=<?= $page - 1; ?>" <?= $page==1 ? 'disabled' : ''; ?> >Previous</a>
    <a class="pagination-next" href="/online-sermons/?pg=<?= $page + 1; ?>" <?= $page==$numPages-1 ? 'disabled' : ''; ?> >Next page</a>
    <ul class="pagination-list">
        <?php if($page > 1){ ?>
            <li><a class="pagination-link" href="/online-sermons/?pg=1" >1</a></li>
            <li><span class="pagination-ellipsis">&hellip;</span></li>
        <?php } ?>
        <?php for($i = ( $page < $numPages-2 ? $page : $numPages - 3 ); $i < ( $page < $numPages-2 ? $page+3 : $numPages ); $i++){ ?>
            <li>
                <a
                    href="/online-sermons/?pg=<?= $i; ?>"
                    class="pagination-link <?= ($i == $page ? 'is-current' : ''); ?>"
                    aria-label="<?= ($i == $page ? 'Page ' . $i : 'Go to ' . $i); ?>"
                    <?= ($i == $page ? 'aria-current="page"' : ''); ?>
                ><?= $i; ?></a>
            </li>
        <?php } ?>
        <?php if($page < $numPages - 2){ ?>
            <li><span class="pagination-ellipsis">&hellip;</span></li>
            <li><a class="pagination-link" href="/online-sermons/?pg=<?= $numPages; ?>" ><?php echo $numPages; ?></a></li>
        <?php } ?>
    </ul>
</nav>
