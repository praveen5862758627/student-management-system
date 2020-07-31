<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Apprentice $apprentice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Apprentice'), ['action' => 'edit', $apprentice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Apprentice'), ['action' => 'delete', $apprentice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $apprentice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apprentice'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Apprentice'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apprentice view large-9 medium-8 columns content">
    <h3><?= h($apprentice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Criteria') ?></th>
            <td><?= h($apprentice->criteria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teamsize') ?></th>
            <td><?= h($apprentice->teamsize) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimatedduration') ?></th>
            <td><?= h($apprentice->estimatedduration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimatedcost') ?></th>
            <td><?= h($apprentice->estimatedcost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($apprentice->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patents') ?></th>
            <td><?= h($apprentice->patents) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projectdesign') ?></th>
            <td><?= h($apprentice->projectdesign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($apprentice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($apprentice->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Definition') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->definition)); ?>
    </div>
    <div class="row">
        <h4><?= __('Milestones') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->milestones)); ?>
    </div>
    <div class="row">
        <h4><?= __('Materialsneeded') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->materialsneeded)); ?>
    </div>
    <div class="row">
        <h4><?= __('Testingspecification') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->testingspecification)); ?>
    </div>
    <div class="row">
        <h4><?= __('Evaluationcriteria') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->evaluationcriteria)); ?>
    </div>
    <div class="row">
        <h4><?= __('Termsandconditions') ?></h4>
        <?= $this->Text->autoParagraph(h($apprentice->termsandconditions)); ?>
    </div>
</div>
