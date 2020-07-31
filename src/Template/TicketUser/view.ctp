<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketUser $ticketUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket User'), ['action' => 'edit', $ticketUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket User'), ['action' => 'delete', $ticketUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticketUser view large-9 medium-8 columns content">
    <h3><?= h($ticketUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ticketUser->has('user') ? $this->Html->link($ticketUser->user->fname, ['controller' => 'Users', 'action' => 'view', $ticketUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($ticketUser->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($ticketUser->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticketUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ticket Number') ?></th>
            <td><?= $this->Number->format($ticketUser->ticket_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Ticket Number') ?></th>
            <td><?= $this->Number->format($ticketUser->sub_ticket_number) ?></td>
        </tr>
    </table>
</div>
