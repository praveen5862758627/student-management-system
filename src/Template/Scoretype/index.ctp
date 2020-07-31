<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scoretype[]|\Cake\Collection\CollectionInterface $scoretype
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scoretype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scorecard'), ['controller' => 'Scorecard', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scorecard'), ['controller' => 'Scorecard', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scoretype index large-9 medium-8 columns content">
    <h3><?= __('Scoretype') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scoretype as $scoretype): ?>
            <tr>
                <td><?= $this->Number->format($scoretype->id) ?></td>
                <td><?= h($scoretype->code) ?></td>
                <td><?= h($scoretype->name) ?></td>
                <td><?= h($scoretype->created) ?></td>
                <td><?= h($scoretype->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scoretype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scoretype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scoretype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scoretype->id)]) ?>
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
