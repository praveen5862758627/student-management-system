<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhpSession $phpSession
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Php Session'), ['action' => 'edit', $phpSession->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Php Session'), ['action' => 'delete', $phpSession->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phpSession->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Php Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Php Session'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phpSessions view large-9 medium-8 columns content">
    <h3><?= h($phpSession->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Svalue') ?></th>
            <td><?= h($phpSession->svalue) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phpSession->id) ?></td>
        </tr>
    </table>
</div>
