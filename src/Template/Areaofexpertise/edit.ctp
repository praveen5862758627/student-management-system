<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Areaofexpertise $areaofexpertise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $areaofexpertise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $areaofexpertise->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Areaofexpertise'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="areaofexpertise form large-9 medium-8 columns content">
    <?= $this->Form->create($areaofexpertise) ?>
    <fieldset>
        <legend><?= __('Edit Areaofexpertise') ?></legend>
        <?php
            echo $this->Form->control('industry');
            echo $this->Form->control('functionalexpertise');
            echo $this->Form->control('liketobe');
            echo $this->Form->control('expertise');
            echo $this->Form->control('userid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
