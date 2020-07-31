<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Company'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exam'), ['controller' => 'Exam', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exam', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="company form large-9 medium-8 columns content">
    <?= $this->Form->create($company) ?>
    <fieldset>
        <legend><?= __('Add Company') ?></legend>
        <?php
            echo $this->Form->control('industry_id', ['options' => $industries]);
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('yearofincorporation');
            echo $this->Form->control('noofemployees');
            echo $this->Form->control('type');
            echo $this->Form->control('headoffice');
            echo $this->Form->control('locations');
            echo $this->Form->control('turnover');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
