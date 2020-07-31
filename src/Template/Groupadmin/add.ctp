<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Groupadmin $groupadmin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Groupadmin'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="groupadmin form large-9 medium-8 columns content">
    <?= $this->Form->create($groupadmin) ?>
    <fieldset>
        <legend><?= __('Add Groupadmin') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('studentgroup');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
