<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example[]|\Cake\Collection\CollectionInterface $example
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Example'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Level'), ['controller' => 'Level', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Level'), ['controller' => 'Level', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Targettype'), ['controller' => 'Targettype', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Targettype'), ['controller' => 'Targettype', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="example index large-9 medium-8 columns content">
    <h3><?= __('Example') ?></h3>
	<?= $this->Form->create('search') ?>

    <?php
        echo $this->Form->input('Search');
    ?>

<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lesson_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targettype_id') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('courseid') ?></th>
				   <th scope="col"><?= $this->Paginator->sort('Duration (Minutes)') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Open in CMS') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($example as $example): ?>
            <tr>
                <td><?= $this->Number->format($example->id) ?></td>
                <td><?= $example->has('lesson') ? $this->Html->link($example->lesson->name, ['controller' => 'Lesson', 'action' => 'view', $example->lesson->id]) : '' ?></td>
                <td><?= h($example->code) ?></td>
                <td><?= h($example->mcode) ?></td>
                <td><?= h($example->name) ?></td>
                <td><?= $example->has('level') ? $this->Html->link($example->level->name, ['controller' => 'Level', 'action' => 'view', $example->level->id]) : '' ?></td>
                <td><?= h($example->author) ?></td>
                <td><?= $example->has('targettype') ? $this->Html->link($example->targettype->name, ['controller' => 'Targettype', 'action' => 'view', $example->targettype->id]) : '' ?></td>
                 <td><?= h($example->courseid) ?></td>    
<td><?= h($example->studyduration) ?></td>    				 
			  <td><?= h($example->created) ?></td>
                <td><?= h($example->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $example->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $example->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?>
                </td>
				
				<td> 
				
				<a href="https://sms.odinlearning.in/cms/displayquiz/<?php echo $example->courseid; ?>" class="button" style="font-size: 12px;" target="_blank">Link</a>
				
				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
