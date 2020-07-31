<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mandatoryblock $mandatoryblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mandatoryblock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mandatoryblock->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mandatoryblock'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mandatoryblock form large-9 medium-8 columns content">
    <?= $this->Form->create($mandatoryblock) ?>
    <fieldset>
        <legend><?= __('Edit Mandatoryblock') ?></legend>
        <?php
            echo $this->Form->control('userroles_role');
            echo $this->Form->control('blocks_id', ['options' => $blocks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
