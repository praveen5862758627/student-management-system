<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Optionalblock $optionalblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Optionalblock'), ['action' => 'edit', $optionalblock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Optionalblock'), ['action' => 'delete', $optionalblock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $optionalblock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Optionalblock'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Optionalblock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="optionalblock view large-9 medium-8 columns content">
    <h3><?= h($optionalblock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $optionalblock->has('user') ? $this->Html->link($optionalblock->user->name, ['controller' => 'Users', 'action' => 'view', $optionalblock->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Block') ?></th>
            <td><?= $optionalblock->has('block') ? $this->Html->link($optionalblock->block->name, ['controller' => 'Blocks', 'action' => 'view', $optionalblock->block->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($optionalblock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deletedblock') ?></th>
            <td><?= $this->Number->format($optionalblock->deletedblock) ?></td>
        </tr>
    </table>
</div>
