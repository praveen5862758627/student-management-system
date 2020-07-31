<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mandatoryblock[]|\Cake\Collection\CollectionInterface $mandatoryblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mandatoryblock'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mandatoryblock index large-9 medium-8 columns content">
    <h3><?= __('Mandatoryblock') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userroles_role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blocks_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mandatoryblock as $mandatoryblock): ?>
            <tr>
                <td><?= $this->Number->format($mandatoryblock->id) ?></td>
                <td><?= $this->Number->format($mandatoryblock->userroles_role) ?></td>
                <td><?= $mandatoryblock->has('block') ? $this->Html->link($mandatoryblock->block->name, ['controller' => 'Blocks', 'action' => 'view', $mandatoryblock->block->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mandatoryblock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mandatoryblock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mandatoryblock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mandatoryblock->id)]) ?>
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
