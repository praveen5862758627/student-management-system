<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semester $semester
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semester'), ['action' => 'edit', $semester->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semester'), ['action' => 'delete', $semester->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semester->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semester'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semester'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semester view large-9 medium-8 columns content">
    <h3><?= h($semester->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($semester->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($semester->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($semester->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semester->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($semester->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($semester->description)); ?>
    </div>
</div>
