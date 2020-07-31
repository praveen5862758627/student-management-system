<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
		  <li><?= $this->Html->link(__('User/Role Management'), ['action' => 'displayrole']) ?></li>
     
    </ul>
</nav>


<div class="users index large-9 medium-8 columns content">
    <h3><?= __('User/Role Management') ?></h3>

<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Change Role') ?></legend>
           <select required name="usersname">
<option value="">Select User</option>
  <?php foreach ($options as $option): ?>
    <option value="<?= h($option->id) ; ?>"><?= h($option->name) ;  ?></option>
	<?php endforeach; ?>
</select>

 <select name="userrole" required>
 <option value="">Select Role</option>
  <?php foreach ($optionsro as $optionu): ?>
    <option value="<?= h($optionu->role) ; ?>"><?= h($optionu->username) ;  ?></option>
	<?php endforeach; ?>
</select>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	
	

</div>
