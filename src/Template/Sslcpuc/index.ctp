<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sslcpuc[]|\Cake\Collection\CollectionInterface $sslcpuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sslcpuc'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sslcpuc index large-9 medium-8 columns content">
    <h3><?= __('Sslcpuc') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('collegename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('board') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('joining') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passout') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sslcpuc as $sslcpuc): ?>
            <tr>
                <td><?= $this->Number->format($sslcpuc->id) ?></td>
                <td><?= h($sslcpuc->collegename) ?></td>
                <td><?= h($sslcpuc->board) ?></td>
                <td><?= h($sslcpuc->percentage) ?></td>
                <td><?= h($sslcpuc->regno) ?></td>
                <td><?= h($sslcpuc->joining) ?></td>
                <td><?= h($sslcpuc->passout) ?></td>
                <td><?= h($sslcpuc->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sslcpuc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sslcpuc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sslcpuc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sslcpuc->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
