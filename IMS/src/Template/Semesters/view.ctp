<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semester $semester
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semester'), ['action' => 'edit', $semester->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semester'), ['action' => 'delete', $semester->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semester->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semesters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semester'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semestercomps'), ['controller' => 'Semestercomps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semestercomp'), ['controller' => 'Semestercomps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semesters view large-9 medium-8 columns content">
    <h3><?= h($semester->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($semester->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($semester->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($semester->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semester->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($semester->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($semester->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Semestercomps') ?></h4>
        <?php if (!empty($semester->semestercomps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Semester Id') ?></th>
                <th scope="col"><?= __('Topic Code') ?></th>
                <th scope="col"><?= __('Lesson Code') ?></th>
                <th scope="col"><?= __('Level Code') ?></th>
                <th scope="col"><?= __('Score') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($semester->semestercomps as $semestercomps): ?>
            <tr>
                <td><?= h($semestercomps->id) ?></td>
                <td><?= h($semestercomps->semester_id) ?></td>
                <td><?= h($semestercomps->topic_code) ?></td>
                <td><?= h($semestercomps->lesson_code) ?></td>
                <td><?= h($semestercomps->level_code) ?></td>
                <td><?= h($semestercomps->score) ?></td>
                <td><?= h($semestercomps->created) ?></td>
                <td><?= h($semestercomps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Semestercomps', 'action' => 'view', $semestercomps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Semestercomps', 'action' => 'edit', $semestercomps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Semestercomps', 'action' => 'delete', $semestercomps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semestercomps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
