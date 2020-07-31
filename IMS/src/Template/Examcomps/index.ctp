<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examcomp[]|\Cake\Collection\CollectionInterface $examcomps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Examcomp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Examschedule'), ['controller' => 'Examschedule', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examschedule'), ['controller' => 'Examschedule', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examcomps index large-9 medium-8 columns content">
    <h3><?= __('Examcomps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('examschedule_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topic_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('Lesson ') ?></th>
				  <th scope="col"><?= $this->Paginator->sort('Level ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
		
		<?php 
		
		//echo $getresponse = $this->Custom->yourhelperfunction();
	//	exit;

		?>
		
		
            <?php foreach ($examcomps as $examcomp): ?>
            <tr>
                <td><?= $this->Number->format($examcomp->id) ?></td>
			
				
				<td><?= h($this->Custom->yourhelperfunction($examcomp->examschedule_id)); ?></td>
       
                <td><?= h($this->Custom->gettopic($examcomp->topic_code)) ?></td>
                <td><?= h($examcomp->level) ?></td>
				<td><?= h($this->Custom->getlesson($examcomp->lesson_code)) ?></td>
				<td><?= h($this->Custom->getlevel($examcomp->level_code)) ?></td>
				
				
				
                <td><?= h($examcomp->score) ?></td>
                <td><?= h($examcomp->created) ?></td>
                <td><?= h($examcomp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $examcomp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $examcomp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $examcomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examcomp->id)]) ?>
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
