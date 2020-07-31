
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Examcomp'), ['action' => 'edit', $examcomp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Examcomp'), ['action' => 'delete', $examcomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examcomp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Examcomps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examcomp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examschedule'), ['controller' => 'Examschedule', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examschedule'), ['controller' => 'Examschedule', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="examcomps view large-9 medium-8 columns content">
    <h3><?= h($examcomp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Examschedule') ?></th>
			<td><?= h($examcomp->examschedule_id) ?></td>
            <!--<td><?= $examcomp->has('examschedule') ? $this->Html->link($examcomp->examschedule_id, ['controller' => 'Examschedule', 'action' => 'view', $examcomp->examschedule_id]) : '' ?></td>-->
        </tr>
        <tr>
            <th scope="row"><?= __('Topic Code') ?></th>
            <td><?= h($examcomp->topic_code) ?></td>
        </tr>
		
		 <tr>
            <th scope="row"><?= __('Lesson Code') ?></th>
            <td><?= h($examcomp->lesson_code) ?></td>
        </tr>
		 <tr>
            <th scope="row"><?= __('Level Code') ?></th>
            <td><?= h($examcomp->level_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($examcomp->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Score') ?></th>
            <td><?= h($examcomp->score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($examcomp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($examcomp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($examcomp->modified) ?></td>
        </tr>
    </table>
</div>
