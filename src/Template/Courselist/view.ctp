<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Courselist $courselist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Courselist'), ['action' => 'edit', $courselist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Courselist'), ['action' => 'delete', $courselist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courselist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courselist'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Courselist'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courselist view large-9 medium-8 columns content">
    <h3><?= h($courselist->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($courselist->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($courselist->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($courselist->id) ?></td>
        </tr>
    </table>
</div>
