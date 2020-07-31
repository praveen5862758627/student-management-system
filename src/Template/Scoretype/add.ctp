<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scoretype $scoretype
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Scoretype'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Scorecard'), ['controller' => 'Scorecard', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scorecard'), ['controller' => 'Scorecard', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scoretype form large-9 medium-8 columns content">
    <?= $this->Form->create($scoretype) ?>
    <fieldset>
        <legend><?= __('Add Scoretype') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
