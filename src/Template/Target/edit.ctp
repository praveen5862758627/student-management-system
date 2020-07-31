<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Target $target
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $target->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $target->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Target'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="target form large-9 medium-8 columns content">
    <?= $this->Form->create($target) ?>
    <fieldset>
        <legend><?= __('Edit Target') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('examcode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
