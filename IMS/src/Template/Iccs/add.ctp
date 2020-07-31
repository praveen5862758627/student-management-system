<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Icc $icc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Iccs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Icccomps'), ['controller' => 'Icccomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Icccomp'), ['controller' => 'Icccomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="iccs form large-9 medium-8 columns content">
    <?= $this->Form->create($icc) ?>
    <fieldset>
        <legend><?= __('Add Icc') ?></legend>
        <?php
            echo $this->Form->control('industry_id', ['options' => $industry]);
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
