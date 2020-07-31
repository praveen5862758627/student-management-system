<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionbank[]|\Cake\Collection\CollectionInterface $questionbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Questionbank'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionbank index large-9 medium-8 columns content">
    <h3><?= __('Questionbank') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topic_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targettype_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('program') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionbank as $questionbank): ?>
            <tr>
                <td><?= $this->Number->format($questionbank->id) ?></td>
                <td><?= $questionbank->has('topic') ? $this->Html->link($questionbank->topic->name, ['controller' => 'Topic', 'action' => 'view', $questionbank->topic->id]) : '' ?></td>
                <td><?= $questionbank->has('level') ? $this->Html->link($questionbank->level->name, ['controller' => 'Level', 'action' => 'view', $questionbank->level->id]) : '' ?></td>
                <td><?= h($questionbank->code) ?></td>
                <td><?= h($questionbank->name) ?></td>
                <td><?= h($questionbank->author) ?></td>
                <td><?= $questionbank->has('targettype') ? $this->Html->link($questionbank->targettype->name, ['controller' => 'Targettype', 'action' => 'view', $questionbank->targettype->id]) : '' ?></td>
                <td><?= $questionbank->has('status') ? $this->Html->link($questionbank->status->name, ['controller' => 'Status', 'action' => 'view', $questionbank->status->id]) : '' ?></td>
                <td><?= h($questionbank->program) ?></td>
                <td><?= h($questionbank->created) ?></td>
                <td><?= h($questionbank->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $questionbank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionbank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionbank->id)]) ?>
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
