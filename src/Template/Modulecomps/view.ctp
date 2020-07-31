<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modulecomp $modulecomp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modulecomp'), ['action' => 'edit', $modulecomp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modulecomp'), ['action' => 'delete', $modulecomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulecomp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modulecomps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modulecomp'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modulecomps view large-9 medium-8 columns content">
    <h3><?= h($modulecomp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Topiccode') ?></th>
            <td><?= h($modulecomp->topiccode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($modulecomp->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lesson') ?></th>
            <td><?= h($modulecomp->lesson) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($modulecomp->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($modulecomp->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skip') ?></th>
            <td><?= h($modulecomp->skip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targetname') ?></th>
            <td><?= h($modulecomp->targetname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Levelname') ?></th>
            <td><?= h($modulecomp->levelname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Studyduration') ?></th>
            <td><?= h($modulecomp->studyduration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modulecomp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Target Id') ?></th>
            <td><?= $this->Number->format($modulecomp->target_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($modulecomp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($modulecomp->modified) ?></td>
        </tr>
    </table>
</div>
