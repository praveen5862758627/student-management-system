<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apprentice[]|\Cake\Collection\CollectionInterface $apprentice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Apprentice'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="apprentice index large-9 medium-8 columns content">
    <h3><?= __('Apprentice') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criteria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teamsize') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimatedduration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimatedcost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projectdesign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($apprentice as $apprentice): ?>
            <tr>
                <td><?= $this->Number->format($apprentice->id) ?></td>
                <td><?= h($apprentice->criteria) ?></td>
                <td><?= h($apprentice->teamsize) ?></td>
                <td><?= h($apprentice->estimatedduration) ?></td>
                <td><?= h($apprentice->estimatedcost) ?></td>
                <td><?= h($apprentice->type) ?></td>
                <td><?= h($apprentice->patents) ?></td>
                <td><?= h($apprentice->projectdesign) ?></td>
                <td><?= $this->Number->format($apprentice->userid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $apprentice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $apprentice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $apprentice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apprentice->id)]) ?>
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
