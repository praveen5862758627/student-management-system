<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personaldetail $personaldetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Personaldetails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personaldetails form large-9 medium-8 columns content">
    <?= $this->Form->create($personaldetail) ?>
    <fieldset>
        <legend><?= __('Add Personaldetail') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
