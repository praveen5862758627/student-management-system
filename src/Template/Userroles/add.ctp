<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userrole $userrole
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Userroles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userroles form large-9 medium-8 columns content">
    <?= $this->Form->create($userrole) ?>
    <fieldset>
        <legend><?= __('Add Userrole') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
