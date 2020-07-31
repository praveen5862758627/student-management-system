<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mandatoryblock $mandatoryblock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mandatoryblock'), ['action' => 'edit', $mandatoryblock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mandatoryblock'), ['action' => 'delete', $mandatoryblock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mandatoryblock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mandatoryblock'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mandatoryblock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mandatoryblock view large-9 medium-8 columns content">
    <h3><?= h($mandatoryblock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Block') ?></th>
            <td><?= $mandatoryblock->has('block') ? $this->Html->link($mandatoryblock->block->name, ['controller' => 'Blocks', 'action' => 'view', $mandatoryblock->block->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mandatoryblock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userroles Role') ?></th>
            <td><?= $this->Number->format($mandatoryblock->userroles_role) ?></td>
        </tr>
    </table>
</div>
