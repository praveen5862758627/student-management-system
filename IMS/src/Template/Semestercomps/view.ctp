<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semestercomp $semestercomp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semestercomp'), ['action' => 'edit', $semestercomp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semestercomp'), ['action' => 'delete', $semestercomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semestercomp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semestercomps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semestercomp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semesters'), ['controller' => 'Semesters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semester'), ['controller' => 'Semesters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semestercomps view large-9 medium-8 columns content">
    <h3><?= h($semestercomp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Semester') ?></th>
            <td><?= $semestercomp->has('semester') ? $this->Html->link($semestercomp->semester->name, ['controller' => 'Semesters', 'action' => 'view', $semestercomp->semester->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Topic Code') ?></th>
            <td><?= h($semestercomp->topic_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lesson Code') ?></th>
            <td><?= h($semestercomp->lesson_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level Code') ?></th>
            <td><?= h($semestercomp->level_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($semestercomp->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($semestercomp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semestercomp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($semestercomp->modified) ?></td>
        </tr>
    </table>
</div>
