<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="blocks form large-9 medium-8 columns content">
    <?= $this->Form->create($block) ?>
    <fieldset>
        <legend><?= __('Add Block') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('optional_mandatory_flag');
            echo $this->Form->control('drag_position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
