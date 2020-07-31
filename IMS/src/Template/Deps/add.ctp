<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dep $dep
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Deps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Industry'), ['controller' => 'Industry', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Industry'), ['controller' => 'Industry', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Depcomps'), ['controller' => 'Depcomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Depcomp'), ['controller' => 'Depcomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deps form large-9 medium-8 columns content">
    <?= $this->Form->create($dep) ?>
    <fieldset>
        <legend><?= __('Add Dep') ?></legend>
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
