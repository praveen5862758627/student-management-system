<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Groupadmin $groupadmin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Groupadmin'), ['action' => 'edit', $groupadmin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Groupadmin'), ['action' => 'delete', $groupadmin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groupadmin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groupadmin'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Groupadmin'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groupadmin view large-9 medium-8 columns content">
    <h3><?= h($groupadmin->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($groupadmin->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Studentgroup') ?></th>
            <td><?= h($groupadmin->studentgroup) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($groupadmin->id) ?></td>
        </tr>
    </table>
</div>
