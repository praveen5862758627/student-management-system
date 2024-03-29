<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Optionalblock $optionalblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $optionalblock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $optionalblock->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Optionalblock'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="optionalblock form large-9 medium-8 columns content">
    <?= $this->Form->create($optionalblock) ?>
    <fieldset>
        <legend><?= __('Edit Optionalblock') ?></legend>
        <?php
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('blocks_id', ['options' => $blocks]);
            echo $this->Form->control('deletedblock');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
