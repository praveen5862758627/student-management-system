<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
      
        <li><?= $this->Html->link(__('User Profile'), ['action' => 'profile']) ?></li>
       
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
   <h1>Welcome <?php echo  $name; ?>  </h1>
</div>
