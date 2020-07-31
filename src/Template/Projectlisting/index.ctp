<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projectlisting[]|\Cake\Collection\CollectionInterface $projectlisting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Projectlisting'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectlisting index large-9 medium-8 columns content">
    <h3><?= __('Projectlisting') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criteria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teamsize') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimatedduration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estimatedcost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('patents') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projectdesign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectlisting as $projectlisting): ?>
            <tr>
                <td><?= $this->Number->format($projectlisting->id) ?></td>
                <td><?= h($projectlisting->criteria) ?></td>
                <td><?= h($projectlisting->teamsize) ?></td>
                <td><?= h($projectlisting->estimatedduration) ?></td>
                <td><?= h($projectlisting->estimatedcost) ?></td>
                <td><?= h($projectlisting->type) ?></td>
                <td><?= h($projectlisting->patents) ?></td>
                <td><?= h($projectlisting->projectdesign) ?></td>
                <td><?= $this->Number->format($projectlisting->userid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectlisting->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectlisting->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectlisting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectlisting->id)]) ?>
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
