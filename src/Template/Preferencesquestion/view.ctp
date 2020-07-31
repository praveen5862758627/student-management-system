<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preferencesquestion $preferencesquestion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Preferencesquestion'), ['action' => 'edit', $preferencesquestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Preferencesquestion'), ['action' => 'delete', $preferencesquestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preferencesquestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Preferencesquestion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Preferencesquestion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="preferencesquestion view large-9 medium-8 columns content">
    <h3><?= h($preferencesquestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Question1') ?></th>
            <td><?= h($preferencesquestion->question1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question2') ?></th>
            <td><?= h($preferencesquestion->question2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question3') ?></th>
            <td><?= h($preferencesquestion->question3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question4') ?></th>
            <td><?= h($preferencesquestion->question4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question5') ?></th>
            <td><?= h($preferencesquestion->question5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question6') ?></th>
            <td><?= h($preferencesquestion->question6) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question7') ?></th>
            <td><?= h($preferencesquestion->question7) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question8') ?></th>
            <td><?= h($preferencesquestion->question8) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question9') ?></th>
            <td><?= h($preferencesquestion->question9) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question10') ?></th>
            <td><?= h($preferencesquestion->question10) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question11') ?></th>
            <td><?= h($preferencesquestion->question11) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question12') ?></th>
            <td><?= h($preferencesquestion->question12) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Question13') ?></th>
            <td><?= h($preferencesquestion->question13) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= h($preferencesquestion->answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($preferencesquestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Userid') ?></th>
            <td><?= $this->Number->format($preferencesquestion->userid) ?></td>
        </tr>
    </table>
</div>
