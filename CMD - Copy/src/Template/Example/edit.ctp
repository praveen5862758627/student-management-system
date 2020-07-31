<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example $example
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $example->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Example'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="example form large-9 medium-8 columns content">
    <?= $this->Form->create($example) ?>
    <fieldset>
        <legend><?= __('Edit Example') ?></legend>
        <?php
            echo $this->Form->control('lesson_id', ['options' => $lesson]);
            echo $this->Form->control('code');
            echo $this->Form->control('mcode');
            echo $this->Form->control('name');
            echo $this->Form->control('level_id', ['options' => $level]);
            echo $this->Form->control('author');
			  echo $this->Form->control('studyduration');
            echo $this->Form->control('targettype_id', ['options' => $targettype]);
			 echo $this->Form->control('courseid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
