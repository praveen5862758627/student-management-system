<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Icc[]|\Cake\Collection\CollectionInterface $icc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Icc'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Icccomps'), ['controller' => 'Icccomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Icccomp'), ['controller' => 'Icccomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="icc index large-9 medium-8 columns content">
    <h3><?= __('Icc') ?></h3>
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
            <?php foreach ($icc as $icc): ?>
            <tr>
                <td><?= $this->Number->format($icc->id) ?></td>
                <td><?= $this->Number->format($icc->industry_id) ?></td>
                <td><?= h($icc->code) ?></td>
                <td><?= h($icc->name) ?></td>
                <td><?= h($icc->position) ?></td>
                <td><?= h($icc->created) ?></td>
                <td><?= h($icc->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $icc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $icc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $icc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icc->id)]) ?>
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
