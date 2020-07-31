<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examschedule $examschedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examschedule'), ['action' => 'edit', $examschedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examschedule'), ['action' => 'delete', $examschedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examschedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examschedule'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examschedule'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examschedule view large-9 medium-8 columns content">
    <h3><?= h($examschedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($examschedule->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($examschedule->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examschedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Exam Id') ?></th>
            <td><?= $this->Number->format($examschedule->exam_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examschedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($examschedule->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Eligibility') ?></h4>
        <?= $this->Text->autoParagraph(h($examschedule->eligibility)); ?>
    </div>
    <div class="row">
        <h4><?= __('Selectionstages') ?></h4>
        <?= $this->Text->autoParagraph(h($examschedule->Selectionstages)); ?>
    </div>
</div>
