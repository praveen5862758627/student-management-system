<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apprentice $apprentice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Apprentice'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="apprentice form large-9 medium-8 columns content">
    <?= $this->Form->create($apprentice) ?>
    <fieldset>
        <legend><?= __('Add Apprentice') ?></legend>
        <?php
            echo $this->Form->control('description');
            echo $this->Form->control('definition');
            echo $this->Form->control('criteria');
            echo $this->Form->control('teamsize');
            echo $this->Form->control('estimatedduration');
            echo $this->Form->control('estimatedcost');
            echo $this->Form->control('type');
            echo $this->Form->control('patents');
            echo $this->Form->control('projectdesign');
            echo $this->Form->control('milestones');
            echo $this->Form->control('materialsneeded');
            echo $this->Form->control('testingspecification');
            echo $this->Form->control('evaluationcriteria');
            echo $this->Form->control('termsandconditions');
            echo $this->Form->control('userid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
