<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personaldetail $personaldetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $personaldetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personaldetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Personaldetails'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="personaldetails form large-9 medium-8 columns content">
    <?= $this->Form->create($personaldetail) ?>
    <fieldset>
        <legend><?= __('Edit Personaldetail') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
