<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Level $level
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Level'), ['action' => 'edit', $level->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Level'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Level'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Level'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="level view large-9 medium-8 columns content">
    <h3><?= h($level->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($level->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($level->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($level->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($level->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($level->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($level->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Example') ?></h4>
        <?php if (!empty($level->example)): ?>
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
            <?php foreach ($level->example as $example): ?>
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
        <h4><?= __('Related Lesson') ?></h4>
        <?php if (!empty($level->lesson)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Topic Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Mcode') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Targettype Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($level->lesson as $lesson): ?>
            <tr>
                <td><?= h($lesson->id) ?></td>
                <td><?= h($lesson->topic_id) ?></td>
                <td><?= h($lesson->code) ?></td>
                <td><?= h($lesson->mcode) ?></td>
                <td><?= h($lesson->name) ?></td>
                <td><?= h($lesson->level_id) ?></td>
                <td><?= h($lesson->targettype_id) ?></td>
                <td><?= h($lesson->description) ?></td>
                <td><?= h($lesson->author) ?></td>
                <td><?= h($lesson->created) ?></td>
                <td><?= h($lesson->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Lesson', 'action' => 'view', $lesson->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Lesson', 'action' => 'edit', $lesson->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lesson', 'action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Questionbank') ?></h4>
        <?php if (!empty($level->questionbank)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Topic Id') ?></th>
                <th scope="col"><?= __('Level Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Targettype Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Program') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($level->questionbank as $questionbank): ?>
            <tr>
                <td><?= h($questionbank->id) ?></td>
                <td><?= h($questionbank->topic_id) ?></td>
                <td><?= h($questionbank->level_id) ?></td>
                <td><?= h($questionbank->code) ?></td>
                <td><?= h($questionbank->name) ?></td>
                <td><?= h($questionbank->author) ?></td>
                <td><?= h($questionbank->targettype_id) ?></td>
                <td><?= h($questionbank->status_id) ?></td>
                <td><?= h($questionbank->program) ?></td>
                <td><?= h($questionbank->created) ?></td>
                <td><?= h($questionbank->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questionbank', 'action' => 'view', $questionbank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questionbank', 'action' => 'edit', $questionbank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questionbank', 'action' => 'delete', $questionbank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionbank->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Quiz') ?></h4>
        <?php if (!empty($level->quiz)): ?>
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
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($level->quiz as $quiz): ?>
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
                <td><?= h($quiz->modified) ?></td>
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
