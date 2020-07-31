<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketUser $ticketUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ticketUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ticketUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ticket User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketUser form large-9 medium-8 columns content">
    <?= $this->Form->create($ticketUser) ?>
    <fieldset>
        <legend><?= __('Edit Ticket User') ?></legend>
        <?php
            echo $this->Form->control('ticket_number');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('sub_ticket_number');
            echo $this->Form->control('content');
            echo $this->Form->control('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
