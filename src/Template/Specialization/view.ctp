<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Specialization $specialization
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specialization'), ['action' => 'edit', $specialization->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specialization'), ['action' => 'delete', $specialization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialization->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Specialization'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specialization'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specialization view large-9 medium-8 columns content">
    <h3><?= h($specialization->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($specialization->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($specialization->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courseid') ?></th>
            <td><?= $this->Number->format($specialization->courseid) ?></td>
        </tr>
    </table>
</div>
