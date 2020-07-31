<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comparea $comparea
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comparea->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comparea->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comparea'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comparea form large-9 medium-8 columns content">
    <?= $this->Form->create($comparea) ?>
    <fieldset>
        <legend><?= __('Edit Comparea') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('subject');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
