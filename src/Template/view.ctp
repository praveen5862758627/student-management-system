<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studentgroup $studentgroup
 */
   include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Studentgroup'), ['action' => 'edit', $studentgroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Studentgroup'), ['action' => 'delete', $studentgroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentgroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Studentgroup'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Studentgroup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="studentgroup view large-9 medium-8 columns content">
    <h3><?= h($studentgroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($studentgroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($studentgroup->id) ?></td>
        </tr>
    </table>
</div>
