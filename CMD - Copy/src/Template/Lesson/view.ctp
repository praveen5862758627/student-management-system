<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson $lesson
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lesson'), ['action' => 'edit', $lesson->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lesson'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lesson'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lesson view large-9 medium-8 columns content">
    <h3><?= h($lesson->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($lesson->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mcode') ?></th>
            <td><?= h($lesson->mcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($lesson->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($lesson->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lesson->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Topic Id') ?></th>
            <td><?= $this->Number->format($lesson->topic_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level Id') ?></th>
            <td><?= $this->Number->format($lesson->level_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Targettype Id') ?></th>
            <td><?= $this->Number->format($lesson->targettype_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($lesson->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($lesson->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($lesson->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Example') ?></h4>
        <?php if (!empty($lesson->example)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lesson Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Mcode') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Targettype Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modifiled') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lesson->example as $example): ?>
            <tr>
                <td><?= h($example->id) ?></td>
                <td><?= h($example->lesson_id) ?></td>
                <td><?= h($example->code) ?></td>
                <td><?= h($example->mcode) ?></td>
                <td><?= h($example->name) ?></td>
                <td><?= h($example->level_id) ?></td>
                <td><?= h($example->author) ?></td>
                <td><?= h($example->targettype_id) ?></td>
                <td><?= h($example->created) ?></td>
                <td><?= h($example->modifiled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Example', 'action' => 'view', $example->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Example', 'action' => 'edit', $example->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Example', 'action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quiz') ?></h4>
        <?php if (!empty($lesson->quiz)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Lesson Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Mcode') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Targettype Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modifiled') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($lesson->quiz as $quiz): ?>
            <tr>
                <td><?= h($quiz->id) ?></td>
                <td><?= h($quiz->lesson_id) ?></td>
                <td><?= h($quiz->code) ?></td>
                <td><?= h($quiz->mcode) ?></td>
                <td><?= h($quiz->name) ?></td>
                <td><?= h($quiz->level_id) ?></td>
                <td><?= h($quiz->author) ?></td>
                <td><?= h($quiz->targettype_id) ?></td>
                <td><?= h($quiz->created) ?></td>
                <td><?= h($quiz->modifiled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Quiz', 'action' => 'view', $quiz->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Quiz', 'action' => 'edit', $quiz->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quiz', 'action' => 'delete', $quiz->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quiz->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
