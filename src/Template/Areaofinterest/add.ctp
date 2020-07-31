<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Areaofinterest $areaofinterest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Areaofinterest'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="areaofinterest form large-9 medium-8 columns content">
    <?= $this->Form->create($areaofinterest) ?>
    <fieldset>
        <legend><?= __('Add Areaofinterest') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
