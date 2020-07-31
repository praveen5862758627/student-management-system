<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersession $usersession
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usersession'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="usersession form large-9 medium-8 columns content">
    <?= $this->Form->create($usersession) ?>
    <fieldset>
        <legend><?= __('Add Usersession') ?></legend>
        <?php
            echo $this->Form->control('uid');
            echo $this->Form->control('datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
