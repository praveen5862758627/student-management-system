<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exam'), ['controller' => 'Exam', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exam', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="company index large-9 medium-8 columns content">
    <h3><?= __('Company') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('industry_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Corporation Year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('No.Employees') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('headoffice') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('turnover') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($company as $company): ?>
            <tr>
                <td><?= $this->Number->format($company->id) ?></td>
                <td><!--<?= $this->Number->format($company->industry_id) ?> --> <?= $this->Custom->industryname($company->industry_id); ?> </td>
                <td><?= h($company->code) ?></td>
                <td><?= h($company->name) ?></td>
                <td><?= h($company->yearofincorporation) ?></td>
                <td><?= $this->Number->format($company->noofemployees) ?></td>
                <td><?= h($company->type) ?></td>
                <td><?= h($company->headoffice) ?></td>
                <td><?= h($company->locations) ?></td>
                <td><?= h($company->turnover) ?></td>
                <td><?= h($company->created) ?></td>
                <td><?= h($company->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
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
