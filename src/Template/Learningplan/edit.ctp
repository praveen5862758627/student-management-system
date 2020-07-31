<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningplan $learningplan
 */
  include('cssjs.ctp');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $learningplan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $learningplan->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Learningplan'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="learningplan form large-9 medium-8 columns content">
    <?= $this->Form->create($learningplan) ?>
    <fieldset>
        <legend><?= __('Edit Learningplan') ?></legend>
        <?php
            echo $this->Form->control('targetcomps_id', ['options' => $targetcomps]);
            echo $this->Form->control('status');
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
