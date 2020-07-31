<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ugpg $ugpg
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ugpg'), ['action' => 'edit', $ugpg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ugpg'), ['action' => 'delete', $ugpg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ugpg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ugpg'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ugpg'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ugpg view large-9 medium-8 columns content">
    <h3><?= h($ugpg->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Universityname') ?></th>
            <td><?= h($ugpg->universityname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stream') ?></th>
            <td><?= h($ugpg->stream) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specialization') ?></th>
            <td><?= h($ugpg->specialization) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Courseduration') ?></th>
            <td><?= h($ugpg->courseduration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regno') ?></th>
            <td><?= h($ugpg->regno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yearjoining') ?></th>
            <td><?= h($ugpg->yearjoining) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yearpassout') ?></th>
            <td><?= h($ugpg->yearpassout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem1') ?></th>
            <td><?= h($ugpg->sem1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem2') ?></th>
            <td><?= h($ugpg->sem2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem3') ?></th>
            <td><?= h($ugpg->sem3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem4') ?></th>
            <td><?= h($ugpg->sem4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem5') ?></th>
            <td><?= h($ugpg->sem5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem6') ?></th>
            <td><?= h($ugpg->sem6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem7') ?></th>
            <td><?= h($ugpg->sem7) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sem8') ?></th>
            <td><?= h($ugpg->sem8) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($ugpg->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ugpg->id) ?></td>
        </tr>
    </table>
</div>
