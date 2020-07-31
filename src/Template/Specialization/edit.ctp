<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialization $specialization
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialization->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialization->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Specialization'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="specialization form large-9 medium-8 columns content">
    <?= $this->Form->create($specialization) ?>
    <fieldset>
        <legend><?= __('Edit Specialization') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('courseid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
