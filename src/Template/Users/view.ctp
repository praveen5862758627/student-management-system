<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Userrole $userrole
 */
  include('cssjs.ctp');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Userrole'), ['action' => 'edit', $userrole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Userrole'), ['action' => 'delete', $userrole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userrole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Userroles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userrole'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userroles view large-9 medium-8 columns content">
    <h3><?= h($userrole->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($userrole->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($userrole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($userrole->role) ?></td>
        </tr>
    </table>
</div>
