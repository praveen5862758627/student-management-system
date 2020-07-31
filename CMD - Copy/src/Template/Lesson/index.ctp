<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lesson[]|\Cake\Collection\CollectionInterface $lesson
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lesson'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Example'), ['controller' => 'Example', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Example'), ['controller' => 'Example', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quiz'), ['controller' => 'Quiz', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quiz'), ['controller' => 'Quiz', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lesson index large-9 medium-8 columns content">
    <h3><?= __('Lesson') ?></h3>
	
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
                <th scope="col"><?= $this->Paginator->sort('topic_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('targettype_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('courseid') ?></th>
				 
				  
				     <th scope="col"><?= $this->Paginator->sort('Duration (Minutes)') ?></th>
				 
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				
				<th scope="col"><?= $this->Paginator->sort('Add Example') ?></th>
				<th scope="col"><?= $this->Paginator->sort('Add Quiz') ?></th>
				
				<th scope="col"><?= $this->Paginator->sort('Open in CMS') ?></th>
				
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesson as $lesson): ?>
            <tr>
                <td><?= $this->Number->format($lesson->id) ?></td>
              <!--  <td><?= $this->Number->format($lesson->topic_id) ?></td>-->
				<td><?= $this->Custom->gettopic($lesson->topic_id); ?></td>
				
                <td><?= h($lesson->code) ?></td>
                <td><?= h($lesson->mcode) ?></td>
                <td><?= h($lesson->name) ?></td>
                <td><?= $this->Number->format($lesson->level_id) ?></td>
                <td><?= $this->Number->format($lesson->targettype_id) ?></td>
                <td><?= h($lesson->author) ?></td>
				    <td><?= h($lesson->courseid) ?></td>    
					<td><?= h($lesson->studyduration) ?></td> 
					
                <td><?= h($lesson->created) ?></td>
                <td><?= h($lesson->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lesson->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lesson->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lesson->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lesson->id)]) ?>
                </td>
				
				<td> <?= $this->Html->link(__('Add Example'), ['action' => '../example/add', $lesson->id],['class'=>'button' ,'style' => 'font-size: 12px;']) ?></td>
				<td> <?= $this->Html->link(__('Add Quiz'), ['action' => '../quiz/add', $lesson->id],['class'=>'button','style' => 'font-size: 12px;']) ?></td>
				
				<td> 
				
				<a href="http://sms.odinlearning.in/cms/displayquiz/<?php echo $lesson->courseid; ?>" class="button" style="font-size: 12px;" target="_blank">Link</a>
				
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
