<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Learningplan $learningplan
 */
  include('cssjs.ctp');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Learningplan'), ['action' => 'edit', $learningplan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Learningplan'), ['action' => 'delete', $learningplan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $learningplan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Learningplan'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Learningplan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Targetcomps'), ['controller' => 'Targetcomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Targetcomp'), ['controller' => 'Targetcomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="learningplan view large-9 medium-8 columns content">
    <h3><?= h($learningplan->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Targetcomp') ?></th>
            <td><?= $learningplan->has('targetcomp') ? $this->Html->link($learningplan->targetcomp->id, ['controller' => 'Targetcomps', 'action' => 'view', $learningplan->targetcomp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($learningplan->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($learningplan->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($learningplan->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($learningplan->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($learningplan->modified) ?></td>
        </tr>
    </table>
</div>
