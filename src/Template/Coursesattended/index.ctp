<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coursesattended[]|\Cake\Collection\CollectionInterface $coursesattended
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Coursesattended'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coursesattended index large-9 medium-8 columns content">
    <h3><?= __('Coursesattended') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coursesattended as $coursesattended): ?>
            <tr>
                <td><?= $this->Number->format($coursesattended->id) ?></td>
                <td><?= $this->Number->format($coursesattended->userid) ?></td>
                <td><?= h($coursesattended->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coursesattended->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesattended->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesattended->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesattended->id)]) ?>
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
