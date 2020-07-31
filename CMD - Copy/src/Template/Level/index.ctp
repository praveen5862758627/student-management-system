<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level[]|\Cake\Collection\CollectionInterface $level
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Level'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="level index large-9 medium-8 columns content">
    <h3><?= __('Level') ?></h3>
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
            <?php foreach ($level as $level): ?>
            <tr>
                <td><?= $this->Number->format($level->id) ?></td>
                <td><?= h($level->code) ?></td>
                <td><?= h($level->name) ?></td>
                <td><?= h($level->created) ?></td>
                <td><?= h($level->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $level->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $level->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]) ?>
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
