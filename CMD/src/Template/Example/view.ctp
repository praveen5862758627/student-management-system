<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example $example
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Example'), ['action' => 'edit', $example->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Example'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Example'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Example'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="example view large-9 medium-8 columns content">
    <h3><?= h($example->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lesson') ?></th>
            <td><?= $example->has('lesson') ? $this->Html->link($example->lesson->name, ['controller' => 'Lesson', 'action' => 'view', $example->lesson->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($example->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mcode') ?></th>
            <td><?= h($example->mcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($example->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $example->has('level') ? $this->Html->link($example->level->name, ['controller' => 'Level', 'action' => 'view', $example->level->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($example->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targettype') ?></th>
            <td><?= $example->has('targettype') ? $this->Html->link($example->targettype->name, ['controller' => 'Targettype', 'action' => 'view', $example->targettype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($example->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($example->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($example->modified) ?></td>
        </tr>
    </table>
</div>
