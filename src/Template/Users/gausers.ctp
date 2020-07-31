<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
   <?= $this->Html->css('base.css') ?>
   <?= $this->Html->css('style.css') ?>

<div class="users index large-9 medium-8 columns content" style="width: 100%;">

  
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Username') ?></th>
               
              
              
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
               
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><a><?= __('Actions') ?></a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
             
                <td><?= h($user->fname .' '.$user->lname) ?></td>
                <td><?= h($user->email) ?></td>
				 <td><?= h($user->username) ?></td>
               
                
              
                <td><?= h($user->gender) ?></td>
              
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td >
                    <?= $this->Html->link(__('View Groups'), ['action' => 'studentsgroup', $user->id]) ?> | 
                    <?= $this->Html->link(__('Edit'), ['action' => 'editga', $user->id]) ?>
                 <!--   <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>-->
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
