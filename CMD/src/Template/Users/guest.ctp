<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Score Card'), ['action' => '../Scorecard']) ?></li>
		  <li><?= $this->Html->link(__('Target'), ['action' => '../Target']) ?></li>
		    <li><?= $this->Html->link(__('Learning Plan'), ['action' => '../Learningplans']) ?></li>
			  <li><?= $this->Html->link(__('Display Blocks'), ['action' => '../Displayblocks']) ?></li>
     
    </ul>
</nav>


<div class="users index large-9 medium-8 columns content">
   
  <h1>Welcome <?php echo  $name; ?>  </h1>
    
</div>
