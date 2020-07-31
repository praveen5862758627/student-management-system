<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usersession $usersession
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usersession'), ['action' => 'edit', $usersession->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usersession'), ['action' => 'delete', $usersession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersession->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usersession'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usersession'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersession view large-9 medium-8 columns content">
    <h3><?= h($usersession->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersession->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uid') ?></th>
            <td><?= $this->Number->format($usersession->uid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime') ?></th>
            <td><?= h($usersession->datetime) ?></td>
        </tr>
    </table>
</div>
