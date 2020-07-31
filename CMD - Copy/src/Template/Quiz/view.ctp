<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quiz $quiz
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Quiz'), ['action' => 'edit', $quiz->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quiz'), ['action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quiz'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quiz view large-9 medium-8 columns content">
    <h3><?= h($quiz->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lesson') ?></th>
            <td><?= $quiz->has('lesson') ? $this->Html->link($quiz->lesson->name, ['controller' => 'Lesson', 'action' => 'view', $quiz->lesson->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($quiz->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mcode') ?></th>
            <td><?= h($quiz->mcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($quiz->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $quiz->has('level') ? $this->Html->link($quiz->level->name, ['controller' => 'Level', 'action' => 'view', $quiz->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($quiz->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targettype') ?></th>
            <td><?= $quiz->has('targettype') ? $this->Html->link($quiz->targettype->name, ['controller' => 'Targettype', 'action' => 'view', $quiz->targettype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($quiz->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($quiz->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($quiz->modified) ?></td>
        </tr>
    </table>
</div>
