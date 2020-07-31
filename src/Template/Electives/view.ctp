<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Elective $elective
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Elective'), ['action' => 'edit', $elective->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Elective'), ['action' => 'delete', $elective->id], ['confirm' => __('Are you sure you want to delete # {0}?', $elective->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Electives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Elective'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="electives view large-9 medium-8 columns content">
    <h3><?= h($elective->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($elective->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($elective->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($elective->userid) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($elective->description)); ?>
    </div>
</div>
