<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ugpg[]|\Cake\Collection\CollectionInterface $ugpg
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ugpg'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ugpg index large-9 medium-8 columns content">
    <h3><?= __('Ugpg') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('universityname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stream') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specialization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('courseduration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yearjoining') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yearpassout') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem6') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem7') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sem8') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ugpg as $ugpg): ?>
            <tr>
                <td><?= $this->Number->format($ugpg->id) ?></td>
                <td><?= h($ugpg->universityname) ?></td>
                <td><?= h($ugpg->stream) ?></td>
                <td><?= h($ugpg->specialization) ?></td>
                <td><?= h($ugpg->courseduration) ?></td>
                <td><?= h($ugpg->regno) ?></td>
                <td><?= h($ugpg->yearjoining) ?></td>
                <td><?= h($ugpg->yearpassout) ?></td>
                <td><?= h($ugpg->sem1) ?></td>
                <td><?= h($ugpg->sem2) ?></td>
                <td><?= h($ugpg->sem3) ?></td>
                <td><?= h($ugpg->sem4) ?></td>
                <td><?= h($ugpg->sem5) ?></td>
                <td><?= h($ugpg->sem6) ?></td>
                <td><?= h($ugpg->sem7) ?></td>
                <td><?= h($ugpg->sem8) ?></td>
                <td><?= h($ugpg->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ugpg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ugpg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ugpg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ugpg->id)]) ?>
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
