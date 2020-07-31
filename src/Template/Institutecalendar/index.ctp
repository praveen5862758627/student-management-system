<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institutecalendar[]|\Cake\Collection\CollectionInterface $institutecalendar
 */
   include('cssjs.ctp');
?>

<div class="institutecalendar index large-9 medium-8 columns content" style="width: 100%;">
    <h3><?= __('Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                
               
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($institutecalendar as $institutecalendar): ?>
            <tr>
                <td><?= $this->Number->format($institutecalendar->id) ?></td>
                <td><?= h($institutecalendar->title) ?></td>
              <?php 		  		  $stdate = date('d-m-Y H:i:s', strtotime($institutecalendar->start)); ?>
                <td><?= h($stdate) ?></td>
              
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $institutecalendar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $institutecalendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutecalendar->id)]) ?>
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
