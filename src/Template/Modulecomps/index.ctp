<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modulecomp[]|\Cake\Collection\CollectionInterface $modulecomps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Modulecomp'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modulecomps index large-9 medium-8 columns content">
    <h3><?= __('Modulecomps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('target_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topiccode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lesson') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targetname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('levelname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('studyduration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modulecomps as $modulecomp): ?>
            <tr>
                <td><?= $this->Number->format($modulecomp->id) ?></td>
                <td><?= $this->Number->format($modulecomp->target_id) ?></td>
                <td><?= h($modulecomp->topiccode) ?></td>
                <td><?= h($modulecomp->level) ?></td>
                <td><?= h($modulecomp->lesson) ?></td>
                <td><?= h($modulecomp->score) ?></td>
                <td><?= h($modulecomp->status) ?></td>
                <td><?= h($modulecomp->skip) ?></td>
                <td><?= h($modulecomp->targetname) ?></td>
                <td><?= h($modulecomp->levelname) ?></td>
                <td><?= h($modulecomp->studyduration) ?></td>
                <td><?= h($modulecomp->created) ?></td>
                <td><?= h($modulecomp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $modulecomp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $modulecomp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $modulecomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulecomp->id)]) ?>
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
