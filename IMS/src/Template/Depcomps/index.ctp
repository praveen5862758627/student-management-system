<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Depcomp[]|\Cake\Collection\CollectionInterface $depcomps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Depcomp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Deps'), ['controller' => 'Deps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dep'), ['controller' => 'Deps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="depcomps index large-9 medium-8 columns content">
    <h3><?= __('Depcomps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dep_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topic_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lesson_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depcomps as $depcomp): ?>
            <tr>
                <td><?= $this->Number->format($depcomp->id) ?></td>
                <td><?= $depcomp->has('dep') ? $this->Html->link($depcomp->dep->name, ['controller' => 'Deps', 'action' => 'view', $depcomp->dep->id]) : '' ?></td>
                <td><?= h($this->Custom->gettopic($depcomp->topic_code)) ?></td>
               
				<td><?= h($this->Custom->getlesson($depcomp->lesson_code)) ?></td>
				<td><?= h($this->Custom->getlevel($depcomp->level_code)) ?></td>
				
                <td><?= h($depcomp->score) ?></td>
                <td><?= h($depcomp->created) ?></td>
                <td><?= h($depcomp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $depcomp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $depcomp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $depcomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $depcomp->id)]) ?>
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
