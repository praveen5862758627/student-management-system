<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dep[]|\Cake\Collection\CollectionInterface $deps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dep'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Depcomps'), ['controller' => 'Depcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Depcomp'), ['controller' => 'Depcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deps index large-9 medium-8 columns content">
    <h3><?= __('Deps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('industry_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deps as $dep): ?>
            <tr>
                <td><?= $this->Number->format($dep->id) ?></td>
                <td><?= $dep->has('industry') ? $this->Html->link($dep->industry->name, ['controller' => 'Industry', 'action' => 'view', $dep->industry->id]) : '' ?></td>
                <td><?= h($dep->code) ?></td>
                <td><?= h($dep->name) ?></td>
                <td><?= h($dep->position) ?></td>
                <td><?= h($dep->created) ?></td>
                <td><?= h($dep->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dep->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dep->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dep->id)]) ?>
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
