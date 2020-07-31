<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Optionalblock[]|\Cake\Collection\CollectionInterface $optionalblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Optionalblock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="optionalblock index large-9 medium-8 columns content">
    <h3><?= __('Optionalblock') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blocks_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deletedblock') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($optionalblock as $optionalblock): ?>
            <tr>
                <td><?= $this->Number->format($optionalblock->id) ?></td>
                <td><?= $optionalblock->has('user') ? $this->Html->link($optionalblock->user->name, ['controller' => 'Users', 'action' => 'view', $optionalblock->user->id]) : '' ?></td>
                <td><?= $optionalblock->has('block') ? $this->Html->link($optionalblock->block->name, ['controller' => 'Blocks', 'action' => 'view', $optionalblock->block->id]) : '' ?></td>
                <td><?= $this->Number->format($optionalblock->deletedblock) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $optionalblock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $optionalblock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $optionalblock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $optionalblock->id)]) ?>
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
