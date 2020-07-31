<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Icc $icc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $icc->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $icc->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Icc'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Icccomps'), ['controller' => 'Icccomps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Icccomp'), ['controller' => 'Icccomps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="icc form large-9 medium-8 columns content">
    <?= $this->Form->create($icc) ?>
    <fieldset>
        <legend><?= __('Edit Icc') ?></legend>
        <?php
            echo $this->Form->control('industry_id');
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('position');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
