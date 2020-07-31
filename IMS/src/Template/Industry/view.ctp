<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Industry $industry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Industry'), ['action' => 'edit', $industry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Industry'), ['action' => 'delete', $industry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $industry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Industry'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Industry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Company'), ['controller' => 'Company', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Company', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="industry view large-9 medium-8 columns content">
    <h3><?= h($industry->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($industry->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($industry->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($industry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numpeopleglobal') ?></th>
            <td><?= $this->Number->format($industry->numpeopleglobal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numpeopleindia') ?></th>
            <td><?= $this->Number->format($industry->numpeopleindia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($industry->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($industry->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($industry->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Company') ?></h4>
        <?php if (!empty($industry->company)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Industry Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Yearofincorporation') ?></th>
                <th scope="col"><?= __('Noofemployees') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Headoffice') ?></th>
                <th scope="col"><?= __('Locations') ?></th>
                <th scope="col"><?= __('Turnover') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($industry->company as $company): ?>
            <tr>
                <td><?= h($company->id) ?></td>
                <td><?= h($company->industry_id) ?></td>
                <td><?= h($company->code) ?></td>
                <td><?= h($company->name) ?></td>
                <td><?= h($company->description) ?></td>
                <td><?= h($company->yearofincorporation) ?></td>
                <td><?= h($company->noofemployees) ?></td>
                <td><?= h($company->type) ?></td>
                <td><?= h($company->headoffice) ?></td>
                <td><?= h($company->locations) ?></td>
                <td><?= h($company->turnover) ?></td>
                <td><?= h($company->created) ?></td>
                <td><?= h($company->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Company', 'action' => 'view', $company->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Company', 'action' => 'edit', $company->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Company', 'action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
