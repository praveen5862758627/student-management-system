<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chapter $chapter
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chapter'), ['action' => 'edit', $chapter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chapter'), ['action' => 'delete', $chapter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chapters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chapter'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chapters view large-9 medium-8 columns content">
    <h3><?= h($chapter->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($chapter->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chapter->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($chapter->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chapter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lesson Id') ?></th>
            <td><?= $this->Number->format($chapter->lesson_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chapterorder') ?></th>
            <td><?= $this->Number->format($chapter->chapterorder) ?></td>
        </tr>
    </table>
</div>
