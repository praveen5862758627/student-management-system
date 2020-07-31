<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studentgroup[]|\Cake\Collection\CollectionInterface $studentgroup
 */
   include('cssjs.ctp');
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Dashboard'), ['action' => '../users']) ?></li>
        <li><?= $this->Html->link(__('New Studentgroup'), ['action' => 'add']) ?></li>
		
    </ul>
</nav>-->
<div class="studentgroup index large-9 medium-8 columns content" style="width: 100%;">
   
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentgroup as $studentgroup): ?>
            <tr>
                <td><?= $this->Number->format($studentgroup->id) ?></td>
                <td><?= h($studentgroup->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View Students'), ['action' => 'viewstudents', $studentgroup->id]) ?> |
					
					 <!-- <?= $this->Html->link(__('View Group Admins'), ['action' => 'viewgroupadmins', $studentgroup->id]) ?> |-->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentgroup->id]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentgroup->id)]) ?>
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
