<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courselist $courselist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Courselist'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="courselist form large-9 medium-8 columns content">
    <?= $this->Form->create($courselist) ?>
    <fieldset>
        <legend><?= __('Add Courselist') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
