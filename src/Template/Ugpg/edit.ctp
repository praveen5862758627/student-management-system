<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ugpg $ugpg
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ugpg->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ugpg->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ugpg'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ugpg form large-9 medium-8 columns content">
    <?= $this->Form->create($ugpg) ?>
    <fieldset>
        <legend><?= __('Edit Ugpg') ?></legend>
        <?php
            echo $this->Form->control('universityname');
            echo $this->Form->control('stream');
            echo $this->Form->control('specialization');
            echo $this->Form->control('courseduration');
            echo $this->Form->control('regno');
            echo $this->Form->control('yearjoining');
            echo $this->Form->control('yearpassout');
            echo $this->Form->control('sem1');
            echo $this->Form->control('sem2');
            echo $this->Form->control('sem3');
            echo $this->Form->control('sem4');
            echo $this->Form->control('sem5');
            echo $this->Form->control('sem6');
            echo $this->Form->control('sem7');
            echo $this->Form->control('sem8');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
