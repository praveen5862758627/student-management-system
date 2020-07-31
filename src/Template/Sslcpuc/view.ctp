<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sslcpuc $sslcpuc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sslcpuc'), ['action' => 'edit', $sslcpuc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sslcpuc'), ['action' => 'delete', $sslcpuc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sslcpuc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sslcpuc'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sslcpuc'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sslcpuc view large-9 medium-8 columns content">
    <h3><?= h($sslcpuc->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Collegename') ?></th>
            <td><?= h($sslcpuc->collegename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Board') ?></th>
            <td><?= h($sslcpuc->board) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage') ?></th>
            <td><?= h($sslcpuc->percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regno') ?></th>
            <td><?= h($sslcpuc->regno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Joining') ?></th>
            <td><?= h($sslcpuc->joining) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passout') ?></th>
            <td><?= h($sslcpuc->passout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($sslcpuc->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sslcpuc->id) ?></td>
        </tr>
    </table>
</div>
