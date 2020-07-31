<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionbank $questionbank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Questionbank'), ['action' => 'edit', $questionbank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questionbank'), ['action' => 'delete', $questionbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionbank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questionbank'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questionbank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Topic'), ['controller' => 'Topic', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topic', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Status'), ['controller' => 'Status', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Status', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questionbank view large-9 medium-8 columns content">
    <h3><?= h($questionbank->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Topic') ?></th>
            <td><?= $questionbank->has('topic') ? $this->Html->link($questionbank->topic->name, ['controller' => 'Topic', 'action' => 'view', $questionbank->topic->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $questionbank->has('level') ? $this->Html->link($questionbank->level->name, ['controller' => 'Level', 'action' => 'view', $questionbank->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($questionbank->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($questionbank->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($questionbank->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targettype') ?></th>
            <td><?= $questionbank->has('targettype') ? $this->Html->link($questionbank->targettype->name, ['controller' => 'Targettype', 'action' => 'view', $questionbank->targettype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $questionbank->has('status') ? $this->Html->link($questionbank->status->name, ['controller' => 'Status', 'action' => 'view', $questionbank->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Program') ?></th>
            <td><?= h($questionbank->program) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionbank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($questionbank->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($questionbank->modified) ?></td>
        </tr>
    </table>
</div>
