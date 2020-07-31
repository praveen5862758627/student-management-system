<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semestercomp[]|\Cake\Collection\CollectionInterface $semestercomps
 */
?>

<script>
function saveorderfoesemcomps(a){
	
	
	predr = document.getElementById("orderbyid"+a).value;
				
				
				//alert(predr);
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:'https://nims.odinlearning.in/semestercomps/updateordeforsemcomps',
                   data:{
                      cat_val : a , getoder : predr
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
 
  
alert(data);
					
					
                    }
                });
}
</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semestercomp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semesters'), ['controller' => 'Semesters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semester'), ['controller' => 'Semesters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semestercomps index large-9 medium-8 columns content">
    <h3><?= __('Semestercomps') ?></h3>
	
	<?= $this->Form->create('search', array('action' => '?search=1')) ?>

    <?php
        echo $this->Form->input('Search');
    ?>

<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
	
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
				 <th scope="col"><?= $this->Paginator->sort('order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semester_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('topic_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lesson_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semestercomps as $semestercomp): ?>
            <tr>
                <td><?= $this->Number->format($semestercomp->id) ?></td>
				
				
				
				<td> <input type="text" value="<?php echo $semestercomp->orderlesson; ?>"  id="orderbyid<?= $this->Number->format($semestercomp->id) ?>" name="order" placeholder="Order" ><button  onclick="saveorderfoesemcomps(<?= $this->Number->format($semestercomp->id) ?>)" class="btn success">Save</button></td>
				
				
                <td><?= $semestercomp->has('semester') ? $this->Html->link($semestercomp->semester->name, ['controller' => 'Semesters', 'action' => 'view', $semestercomp->semester->id]) : '' ?></td>
               <td><?= h($this->Custom->gettopic($semestercomp->topic_code)) ?></td>
               
				<td><?= h($this->Custom->getlesson($semestercomp->lesson_code)) ?></td>
				<td><?= h($this->Custom->getlevel($semestercomp->level_code)) ?></td>
				
                <td><?= h($semestercomp->score) ?></td>
                <td><?= h($semestercomp->created) ?></td>
                <td><?= h($semestercomp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semestercomp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semestercomp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semestercomp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semestercomp->id)]) ?>
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
