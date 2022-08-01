<?php $pager->setSurroundCount(2) ?>

<nav class="foot-nav" aria-label="Page navigation example" aria-label="Page navigation">
    <ul  class="pagination justify-content-center">
    
    <?php if ($pager->hasPreviousPage()) : ?>
        
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-backward-step"></i></span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-caret-left"></i></span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <li class="page-item   ">
            <a class="page-link <?= $link['active'] ? 'activo' : '' ?>" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-caret-right"></i></span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-forward-step"></i></span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>