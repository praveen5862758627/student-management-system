<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Coursesattended $coursesattended
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Coursesattended'), ['action' => 'edit', $coursesattended->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Coursesattended'), ['action' => 'delete', $coursesattended->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesattended->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Coursesattended'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coursesattended'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="coursesattended view large-9 medium-8 columns content">
    <h3><?= h($coursesattended->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($coursesattended->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coursesattended->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($coursesattended->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($coursesattended->description)); ?>
    </div>
</div>
