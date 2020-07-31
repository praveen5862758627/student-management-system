<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketDepartment $ticketDepartment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ticket Departments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ticketDepartments form large-9 medium-8 columns content">
    <?= $this->Form->create($ticketDepartment) ?>
    <fieldset>
        <legend><?= __('Add Ticket Department') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
