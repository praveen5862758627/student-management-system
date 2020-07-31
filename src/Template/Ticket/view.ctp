<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket'), ['action' => 'edit', $ticket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticket view large-9 medium-8 columns content">
    <h3><?= h($ticket->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= h($ticket->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($ticket->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($ticket->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= h($ticket->language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($ticket->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Email') ?></th>
            <td><?= h($ticket->user_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= h($ticket->user_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $ticket->has('user') ? $this->Html->link($ticket->user->fname, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ticket Number') ?></th>
            <td><?= $this->Number->format($ticket->ticket_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($ticket->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unread') ?></th>
            <td><?= $ticket->unread ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unread Staff') ?></th>
            <td><?= $ticket->unread_staff ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $ticket->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
