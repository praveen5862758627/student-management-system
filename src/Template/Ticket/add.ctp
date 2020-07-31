<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ticket'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticket form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Add Ticket') ?></legend>
        <?php
            echo $this->Form->control('ticket_number');
            echo $this->Form->control('unread');
            echo $this->Form->control('priority');
            echo $this->Form->control('unread_staff');
            echo $this->Form->control('title');
            echo $this->Form->control('content');
            echo $this->Form->control('language');
            echo $this->Form->control('file');
            echo $this->Form->control('date');
            echo $this->Form->control('status');
            echo $this->Form->control('user_email');
            echo $this->Form->control('user_name');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
