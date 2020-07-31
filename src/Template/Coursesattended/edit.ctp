<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coursesattended $coursesattended
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesattended->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesattended->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Coursesattended'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="coursesattended form large-9 medium-8 columns content">
    <?= $this->Form->create($coursesattended) ?>
    <fieldset>
        <legend><?= __('Edit Coursesattended') ?></legend>
        <?php
            echo $this->Form->control('userid');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
