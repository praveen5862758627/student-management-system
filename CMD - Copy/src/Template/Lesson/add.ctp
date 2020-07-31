<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson $lesson
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lesson form large-9 medium-8 columns content">
    <?= $this->Form->create($lesson) ?>
    <fieldset>
        <legend><?= __('Add Lesson') ?></legend>
        <?php
            echo $this->Form->control('topic_id');
            echo $this->Form->control('code');
            echo $this->Form->control('mcode');
            echo $this->Form->control('name');
            echo $this->Form->control('level_id');
            echo $this->Form->control('targettype_id');
			 echo $this->Form->control('courseid');
			  echo $this->Form->control('studyduration');
            echo $this->Form->control('description');
            echo $this->Form->control('author');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
