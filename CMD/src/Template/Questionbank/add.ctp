<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionbank $questionbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questionbank'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionbank form large-9 medium-8 columns content">
    <?= $this->Form->create($questionbank) ?>
    <fieldset>
        <legend><?= __('Add Questionbank') ?></legend>
        <?php
            echo $this->Form->control('topic_id', ['options' => $topic]);
            echo $this->Form->control('level_id', ['options' => $level]);
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('author');
            echo $this->Form->control('targettype_id', ['options' => $targettype]);
            echo $this->Form->control('status_id', ['options' => $status]);
            echo $this->Form->control('program');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
