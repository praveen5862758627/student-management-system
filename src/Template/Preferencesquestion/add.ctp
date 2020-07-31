<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preferencesquestion $preferencesquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Preferencesquestion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="preferencesquestion form large-9 medium-8 columns content">
    <?= $this->Form->create($preferencesquestion) ?>
    <fieldset>
        <legend><?= __('Add Preferencesquestion') ?></legend>
        <?php
            echo $this->Form->control('question1');
            echo $this->Form->control('question2');
            echo $this->Form->control('question3');
            echo $this->Form->control('question4');
            echo $this->Form->control('question5');
            echo $this->Form->control('question6');
            echo $this->Form->control('question7');
            echo $this->Form->control('question8');
            echo $this->Form->control('question9');
            echo $this->Form->control('question10');
            echo $this->Form->control('question11');
            echo $this->Form->control('question12');
            echo $this->Form->control('question13');
            echo $this->Form->control('answer');
            echo $this->Form->control('userid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
