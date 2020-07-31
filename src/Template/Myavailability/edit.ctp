<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Myavailability $myavailability
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $myavailability->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $myavailability->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Myavailability'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="myavailability form large-9 medium-8 columns content">
    <?= $this->Form->create($myavailability) ?>
    <fieldset>
        <legend><?= __('Edit Myavailability') ?></legend>
        <?php
            echo $this->Form->control('availability');
            echo $this->Form->control('available_as');
            echo $this->Form->control('fromdate');
            echo $this->Form->control('todate');
            echo $this->Form->control('location');
            echo $this->Form->control('userid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
