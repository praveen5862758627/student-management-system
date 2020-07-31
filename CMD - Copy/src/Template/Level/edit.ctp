<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $level->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Level'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="level form large-9 medium-8 columns content">
    <?= $this->Form->create($level) ?>
    <fieldset>
        <legend><?= __('Edit Level') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
