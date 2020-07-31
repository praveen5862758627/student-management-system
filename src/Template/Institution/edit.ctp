<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institution->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Institution'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="institution form large-9 medium-8 columns content">
    <?= $this->Form->create($institution) ?>
    <fieldset>
        <legend><?= __('Edit Institution') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('address');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
