<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Topic[]|\Cake\Collection\CollectionInterface $topic
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lesson'), ['controller' => 'Lesson', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['controller' => 'Lesson', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questionbank'), ['controller' => 'Questionbank', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Questionbank'), ['controller' => 'Questionbank', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="topic index large-9 medium-8 columns content">
    <h3><?= __('Topic') ?></h3>
	
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
                <th scope="col"><?= $this->Paginator->sort('comparea_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Add Lesson') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topic as $topic): ?>
            <tr>
                <td><?= $this->Number->format($topic->id) ?></td>
              <!--  <td><?= $this->Number->format($topic->comparea_id) ?></td> -->
			  <td><?= $this->Custom->compereaname($topic->comparea_id); ?>
                <td><?= h($topic->code) ?></td>
                <td><?= h($topic->mcode) ?></td>
                <td><?= h($topic->name) ?></td>
                <td><?= h($topic->created) ?></td>
                <td><?= h($topic->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $topic->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $topic->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $topic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topic->id)]) ?>
                </td>
				<td> <?= $this->Html->link(__('Add Lesson'), ['action' => '../lesson/add', $topic->id],['class'=>'button']) ?></td>
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
