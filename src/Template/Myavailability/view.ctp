<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Myavailability $myavailability
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Myavailability'), ['action' => 'edit', $myavailability->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Myavailability'), ['action' => 'delete', $myavailability->id], ['confirm' => __('Are you sure you want to delete # {0}?', $myavailability->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Myavailability'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Myavailability'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="myavailability view large-9 medium-8 columns content">
    <h3><?= h($myavailability->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Availability') ?></th>
            <td><?= h($myavailability->availability) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available As') ?></th>
            <td><?= h($myavailability->available_as) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fromdate') ?></th>
            <td><?= h($myavailability->fromdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Todate') ?></th>
            <td><?= h($myavailability->todate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($myavailability->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($myavailability->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($myavailability->userid) ?></td>
        </tr>
    </table>
</div>
