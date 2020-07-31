<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Targetcomp[]|\Cake\Collection\CollectionInterface $targetcomps
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="targetcomps index large-9 medium-8 columns content">
    <h3><?= __('Targetcomps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('target_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topiccode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($targetcomps as $targetcomp): ?>
            <tr>
                <td><?= $this->Number->format($targetcomp->id) ?></td>
                <td><?= $this->Number->format($targetcomp->target_id) ?></td>
                <td><?= h($targetcomp->topiccode) ?></td>
                <td><?= h($targetcomp->level) ?></td>
                <td><?= h($targetcomp->score) ?></td>
                <td><?= h($targetcomp->created) ?></td>
                <td><?= h($targetcomp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $targetcomp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $targetcomp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $targetcomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $targetcomp->id)]) ?>
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
