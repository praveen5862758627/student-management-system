<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exam->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exam'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examschedule'), ['controller' => 'Examschedule', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examschedule'), ['controller' => 'Examschedule', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exam form large-9 medium-8 columns content">
    <?= $this->Form->create($exam) ?>
    <fieldset>
        <legend><?= __('Edit Exam') ?></legend>
        <?php
            echo $this->Form->control('company_id');
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
