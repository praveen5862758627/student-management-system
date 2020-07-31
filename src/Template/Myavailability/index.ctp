<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Myavailability[]|\Cake\Collection\CollectionInterface $myavailability
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Myavailability'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="myavailability index large-9 medium-8 columns content">
    <h3><?= __('Myavailability') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('availability') ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_as') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fromdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('todate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($myavailability as $myavailability): ?>
            <tr>
                <td><?= $this->Number->format($myavailability->id) ?></td>
                <td><?= h($myavailability->availability) ?></td>
                <td><?= h($myavailability->available_as) ?></td>
                <td><?= h($myavailability->fromdate) ?></td>
                <td><?= h($myavailability->todate) ?></td>
                <td><?= h($myavailability->location) ?></td>
                <td><?= $this->Number->format($myavailability->userid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $myavailability->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $myavailability->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $myavailability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myavailability->id)]) ?>
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
