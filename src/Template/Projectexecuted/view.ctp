<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Projectexecuted $projectexecuted
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Projectexecuted'), ['action' => 'edit', $projectexecuted->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projectexecuted'), ['action' => 'delete', $projectexecuted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectexecuted->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projectexecuted'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projectexecuted'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectexecuted view large-9 medium-8 columns content">
    <h3><?= h($projectexecuted->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($projectexecuted->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectexecuted->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($projectexecuted->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($projectexecuted->description)); ?>
    </div>
</div>
