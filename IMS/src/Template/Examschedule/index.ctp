<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examschedule[]|\Cake\Collection\CollectionInterface $examschedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examschedule'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examschedule index large-9 medium-8 columns content">
    <h3><?= __('Examschedule') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Exam') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
					<th scope="col"><?= $this->Paginator->sort('Examcomps') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examschedule as $examschedule): ?>
            <tr>
                <td><?= $this->Number->format($examschedule->id) ?></td>
                <td><?= h($this->Custom->yourhelperfunction1($examschedule->exam_id)); ?></td>
                <td><?= h($examschedule->date) ?></td>
                <td><?= h($examschedule->location) ?></td>
                <td><?= h($examschedule->created) ?></td>
                <td><?= h($examschedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examschedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examschedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examschedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examschedule->id)]) ?>
                </td>
				<td> <?= $this->Html->link(__('Add'), ['action' => '../examcomps/add', $examschedule->id],['class'=>'button']) ?></td>
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
