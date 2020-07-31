<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modulecomp $modulecomp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modulecomps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="modulecomps form large-9 medium-8 columns content">
    <?= $this->Form->create($modulecomp) ?>
    <fieldset>
        <legend><?= __('Add Modulecomp') ?></legend>
        <?php
            echo $this->Form->control('target_id');
            echo $this->Form->control('topiccode');
            echo $this->Form->control('level');
            echo $this->Form->control('lesson');
            echo $this->Form->control('score');
            echo $this->Form->control('status');
            echo $this->Form->control('skip');
            echo $this->Form->control('targetname');
            echo $this->Form->control('levelname');
            echo $this->Form->control('studyduration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
