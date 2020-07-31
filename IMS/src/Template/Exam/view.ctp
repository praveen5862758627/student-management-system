<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exam $exam
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Exam'), ['action' => 'edit', $exam->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Exam'), ['action' => 'delete', $exam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exam->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Exam'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exam'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examschedule'), ['controller' => 'Examschedule', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examschedule'), ['controller' => 'Examschedule', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="exam view large-9 medium-8 columns content">
    <h3><?= h($exam->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($exam->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($exam->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($exam->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($exam->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company Id') ?></th>
            <td><?= $this->Number->format($exam->company_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($exam->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($exam->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($exam->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Examschedule') ?></h4>
        <?php if (!empty($exam->examschedule)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Exam Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Eligibility') ?></th>
                <th scope="col"><?= __('Selectionstages') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($exam->examschedule as $examschedule): ?>
            <tr>
                <td><?= h($examschedule->id) ?></td>
                <td><?= h($examschedule->exam_id) ?></td>
                <td><?= h($examschedule->date) ?></td>
                <td><?= h($examschedule->location) ?></td>
                <td><?= h($examschedule->eligibility) ?></td>
                <td><?= h($examschedule->Selectionstages) ?></td>
                <td><?= h($examschedule->created) ?></td>
                <td><?= h($examschedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Examschedule', 'action' => 'view', $examschedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Examschedule', 'action' => 'edit', $examschedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Examschedule', 'action' => 'delete', $examschedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examschedule->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
