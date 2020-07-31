<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scorecard[]|\Cake\Collection\CollectionInterface $scorecard
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Scorecard'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scorecard index large-9 medium-8 columns content">
    <h3><?= __('Scorecard') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scoretype_id') ?></th>
              
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scorecard as $scorecard): ?>
            <tr>
                <td><?= $this->Number->format($scorecard->id) ?></td>
                <td><?= $scorecard->scoretype['name'];  ?></td>
              
                <td><?= h($scorecard->date) ?></td>
                <td><?= h($scorecard->score) ?></td>
                <td><?= h($scorecard->created) ?></td>
                <td><?= h($scorecard->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scorecard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scorecard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scorecard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scorecard->id)]) ?>
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
