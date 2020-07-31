<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersession[]|\Cake\Collection\CollectionInterface $usersession
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usersession'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersession index large-9 medium-8 columns content">
    <h3><?= __('Usersession') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('uid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersession as $usersession): ?>
            <tr>
                <td><?= $this->Number->format($usersession->id) ?></td>
                <td><?= $this->Number->format($usersession->uid) ?></td>
                <td><?= h($usersession->datetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersession->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersession->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersession->id)]) ?>
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
