<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scorecard $scorecard
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Scorecard'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="scorecard form large-9 medium-8 columns content">
    <?= $this->Form->create($scorecard) ?>
    <fieldset>
        <legend><?= __('Add Scorecard') ?></legend>
        <?php
            echo $this->Form->control('scoretype_id');
           
            echo $this->Form->control('date');
            echo $this->Form->control('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
