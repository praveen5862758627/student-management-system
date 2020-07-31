<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courselist[]|\Cake\Collection\CollectionInterface $courselist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Courselist'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="courselist index large-9 medium-8 columns content">
    <h3><?= __('Courselist') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courselist as $courselist): ?>
            <tr>
                <td><?= $this->Number->format($courselist->id) ?></td>
                <td><?= h($courselist->name) ?></td>
                <td><?= h($courselist->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $courselist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $courselist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $courselist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courselist->id)]) ?>
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
