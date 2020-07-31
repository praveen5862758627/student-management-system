<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examschedule $examschedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Examschedule'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="examschedule form large-9 medium-8 columns content">
    <?= $this->Form->create($examschedule) ?>
    <fieldset>
        <legend><?= __('Add Examschedule') ?></legend>
        <?php
            echo $this->Form->control('exam_id');
            echo $this->Form->control('date',array('id' => 'datepicker','autocomplete' => 'off'));
            echo $this->Form->control('location');
            echo $this->Form->control('eligibility');
            echo $this->Form->control('Selectionstages');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
