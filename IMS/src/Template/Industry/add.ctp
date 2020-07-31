<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Industry $industry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Company'), ['controller' => 'Company', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Company', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="industry form large-9 medium-8 columns content">
    <?= $this->Form->create($industry) ?>
    <fieldset>
        <legend><?= __('Add Industry') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('numpeopleglobal');
            echo $this->Form->control('numpeopleindia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
