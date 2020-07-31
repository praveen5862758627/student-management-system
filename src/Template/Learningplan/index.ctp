<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningplan[]|\Cake\Collection\CollectionInterface $learningplan
 */
  include('cssjs.ctp');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Learningplan'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="learningplan index large-9 medium-8 columns content">
    <h3><?= __('Learningplan') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targetcomps_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($learningplan as $learningplan): ?>
            <tr>
                <td><?= $this->Number->format($learningplan->id) ?></td>
                <td><?= $learningplan->has('targetcomp') ? $this->Html->link($learningplan->targetcomp->id, ['controller' => 'Targetcomps', 'action' => 'view', $learningplan->targetcomp->id]) : '' ?></td>
                <td><?= h($learningplan->status) ?></td>
                <td><?= h($learningplan->date) ?></td>
                <td><?= h($learningplan->created) ?></td>
                <td><?= h($learningplan->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $learningplan->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $learningplan->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $learningplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learningplan->id)]) ?>
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
