<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket[]|\Cake\Collection\CollectionInterface $ticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticket index large-9 medium-8 columns content">
    <h3><?= __('Ticket') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unread') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unread_staff') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticket as $ticket): ?>
            <tr>
                <td><?= $this->Number->format($ticket->id) ?></td>
                <td><?= $this->Number->format($ticket->ticket_number) ?></td>
                <td><?= h($ticket->unread) ?></td>
                <td><?= h($ticket->priority) ?></td>
                <td><?= h($ticket->unread_staff) ?></td>
                <td><?= h($ticket->title) ?></td>
                <td><?= h($ticket->content) ?></td>
                <td><?= h($ticket->language) ?></td>
                <td><?= h($ticket->file) ?></td>
                <td><?= h($ticket->date) ?></td>
                <td><?= h($ticket->status) ?></td>
                <td><?= h($ticket->user_email) ?></td>
                <td><?= h($ticket->user_name) ?></td>
                <td><?= $ticket->has('user') ? $this->Html->link($ticket->user->fname, ['controller' => 'Users', 'action' => 'view', $ticket->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?>
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
