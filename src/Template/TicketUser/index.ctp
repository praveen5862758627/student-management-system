<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TicketUser[]|\Cake\Collection\CollectionInterface $ticketUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketUser index large-9 medium-8 columns content">
    <h3><?= __('Ticket User') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_ticket_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticketUser as $ticketUser): ?>
            <tr>
                <td><?= $this->Number->format($ticketUser->id) ?></td>
                <td><?= $this->Number->format($ticketUser->ticket_number) ?></td>
                <td><?= $ticketUser->has('user') ? $this->Html->link($ticketUser->user->fname, ['controller' => 'Users', 'action' => 'view', $ticketUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($ticketUser->sub_ticket_number) ?></td>
                <td><?= h($ticketUser->content) ?></td>
                <td><?= h($ticketUser->file) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticketUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
