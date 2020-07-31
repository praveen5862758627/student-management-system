<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Targetcomp $targetcomp
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $targetcomp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $targetcomp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="targetcomps form large-9 medium-8 columns content">
    <?= $this->Form->create($targetcomp) ?>
    <fieldset>
        <legend><?= __('Edit Targetcomp') ?></legend>
        <?php
            echo $this->Form->control('target_id');
            echo $this->Form->control('topiccode');
            echo $this->Form->control('level');
            echo $this->Form->control('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
