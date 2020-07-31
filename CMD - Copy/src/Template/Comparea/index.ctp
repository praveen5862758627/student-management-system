<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comparea[]|\Cake\Collection\CollectionInterface $comparea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comparea'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comparea index large-9 medium-8 columns content">
    <h3><?= __('Comparea') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Add Topic') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comparea as $comparea): ?>
            <tr>
                <td><?= $this->Number->format($comparea->id) ?></td>
                <td><?= h($comparea->code) ?></td>
                <td><?= h($comparea->name) ?></td>
                <td><?= h($comparea->subject) ?></td>
                <td><?= h($comparea->created) ?></td>
                <td><?= h($comparea->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comparea->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comparea->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comparea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comparea->id)]) ?>
					 
					
                </td>
				<td> <?= $this->Html->link(__('Add Topic'), ['action' => '../topic/add', $comparea->id],['class'=>'button']) ?></td>
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
