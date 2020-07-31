<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institutecalendar $institutecalendar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Institutecalendar'), ['action' => 'edit', $institutecalendar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Institutecalendar'), ['action' => 'delete', $institutecalendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $institutecalendar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Institutecalendar'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Institutecalendar'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="institutecalendar view large-9 medium-8 columns content">
    <h3><?= h($institutecalendar->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($institutecalendar->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($institutecalendar->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($institutecalendar->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($institutecalendar->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ttype') ?></th>
            <td><?= h($institutecalendar->ttype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($institutecalendar->id) ?></td>
        </tr>
    </table>
</div>
