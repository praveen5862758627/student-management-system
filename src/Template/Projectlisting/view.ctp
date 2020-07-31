<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projectlisting $projectlisting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Projectlisting'), ['action' => 'edit', $projectlisting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projectlisting'), ['action' => 'delete', $projectlisting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectlisting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projectlisting'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projectlisting'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectlisting view large-9 medium-8 columns content">
    <h3><?= h($projectlisting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Criteria') ?></th>
            <td><?= h($projectlisting->criteria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teamsize') ?></th>
            <td><?= h($projectlisting->teamsize) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimatedduration') ?></th>
            <td><?= h($projectlisting->estimatedduration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estimatedcost') ?></th>
            <td><?= h($projectlisting->estimatedcost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($projectlisting->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patents') ?></th>
            <td><?= h($projectlisting->patents) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Projectdesign') ?></th>
            <td><?= h($projectlisting->projectdesign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectlisting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($projectlisting->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Definition') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->definition)); ?>
    </div>
    <div class="row">
        <h4><?= __('Milestones') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->milestones)); ?>
    </div>
    <div class="row">
        <h4><?= __('Materialsneeded') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->materialsneeded)); ?>
    </div>
    <div class="row">
        <h4><?= __('Testingspecification') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->testingspecification)); ?>
    </div>
    <div class="row">
        <h4><?= __('Evaluationcriteria') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->evaluationcriteria)); ?>
    </div>
    <div class="row">
        <h4><?= __('Termsandconditions') ?></h4>
        <?= $this->Text->autoParagraph(h($projectlisting->termsandconditions)); ?>
    </div>
</div>
