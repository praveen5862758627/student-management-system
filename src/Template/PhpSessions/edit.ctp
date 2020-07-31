<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhpSession $phpSession
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $phpSession->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $phpSession->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Php Sessions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="phpSessions form large-9 medium-8 columns content">
    <?= $this->Form->create($phpSession) ?>
    <fieldset>
        <legend><?= __('Edit Php Session') ?></legend>
        <?php
            echo $this->Form->control('svalue');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
