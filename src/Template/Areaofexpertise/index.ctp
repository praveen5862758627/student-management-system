<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Areaofexpertise[]|\Cake\Collection\CollectionInterface $areaofexpertise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Areaofexpertise'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="areaofexpertise index large-9 medium-8 columns content">
    <h3><?= __('Areaofexpertise') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areaofexpertise as $areaofexpertise): ?>
            <tr>
                <td><?= $this->Number->format($areaofexpertise->id) ?></td>
                <td><?= $this->Number->format($areaofexpertise->userid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $areaofexpertise->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $areaofexpertise->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $areaofexpertise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areaofexpertise->id)]) ?>
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
