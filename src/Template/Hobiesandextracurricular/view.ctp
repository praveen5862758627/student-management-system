<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hobiesandextracurricular $hobiesandextracurricular
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hobiesandextracurricular'), ['action' => 'edit', $hobiesandextracurricular->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hobiesandextracurricular'), ['action' => 'delete', $hobiesandextracurricular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hobiesandextracurricular->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hobiesandextracurricular'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hobiesandextracurricular'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hobiesandextracurricular view large-9 medium-8 columns content">
    <h3><?= h($hobiesandextracurricular->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($hobiesandextracurricular->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hobiesandextracurricular->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($hobiesandextracurricular->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($hobiesandextracurricular->description)); ?>
    </div>
</div>
