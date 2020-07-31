<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketDepartment $ticketDepartment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket Department'), ['action' => 'edit', $ticketDepartment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket Department'), ['action' => 'delete', $ticketDepartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketDepartment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Department'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticketDepartments view large-9 medium-8 columns content">
    <h3><?= h($ticketDepartment->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($ticketDepartment->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticketDepartment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $ticketDepartment->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
