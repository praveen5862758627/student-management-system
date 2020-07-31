<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Industry[]|\Cake\Collection\CollectionInterface $industry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Company'), ['controller' => 'Company', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Company', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="industry index large-9 medium-8 columns content">
    <h3><?= __('Industry') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numpeopleglobal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numpeopleindia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($industry as $industry): ?>
            <tr>
                <td><?= $this->Number->format($industry->id) ?></td>
                <td><?= h($industry->code) ?></td>
                <td><?= h($industry->name) ?></td>
                <td><?= $this->Number->format($industry->numpeopleglobal) ?></td>
                <td><?= $this->Number->format($industry->numpeopleindia) ?></td>
                <td><?= h($industry->created) ?></td>
                <td><?= h($industry->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $industry->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $industry->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $industry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id)]) ?>
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
