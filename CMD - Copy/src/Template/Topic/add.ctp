<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Topic $topic
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Topic'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="topic form large-9 medium-8 columns content">
    <?= $this->Form->create($topic) ?>
    <fieldset>
        <legend><?= __('Add Topic') ?></legend>
        <?php
            echo $this->Form->control('comparea_id');
            echo $this->Form->control('code');
            echo $this->Form->control('mcode');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
