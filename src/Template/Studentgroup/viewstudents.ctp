<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
   <?= $this->Html->css('base.css') ?>
   <?= $this->Html->css('style.css') ?>
   
  

<div class="users index large-9 medium-8 columns content" style="width: 100%;">


    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>

                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($usersnn['data'] as $user) { ?>
            <tr>
                <?php $usedid = $user['id']; ?>
              <td><?= h($user['id']) ?></td>
                 <td><?= h($user['fname']." ".$user['lname']) ?></td>
                <td><?= h($user['email']) ?></td>
                <td class="actions">
         
                    
                       <?= $this->Form->postLink(__('Remove from the group'), ['action' => 'deletegroupuser', $usedid,$this->request->pass[0]], ['confirm' => __('Are you sure you want to remove from this group # {0}?', $usedid)]) ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
  
	
	 <button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>
