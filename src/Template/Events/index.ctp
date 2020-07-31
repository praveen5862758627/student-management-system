<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studentgroup[]|\Cake\Collection\CollectionInterface $studentgroup
 */
   include('cssjs.ctp');
?>

<div class="events index large-9 medium-8 columns content" style="width: 100%;">
   
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
              
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
               
                <th scope="col"><?= $this->Paginator->sort('Date') ?>(y-m-d)</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
               
                <td><?= h($event->title) ?></td>
              
                <td><?= h($event->start) ?></td>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
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
