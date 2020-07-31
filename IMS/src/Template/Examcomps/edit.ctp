<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Examcomp $examcomp
 */
?>


<script>

function leaveChangelevel(a)
{
	//alert(a);
	   var url             =   urlmainsite+'cmd/level.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       cat_val : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
  var selOpts = "<option value='7'>Level 0</option>";
  
  	if(data.length > 0){
		
	//selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.level_id+"'>"+getlevels(element.level_id)+"</option>";
							
							
							 
				
                    });
						
					} else {
						
						//selOpts += "<option value='7'>Level 0</option>";
					}
						
                       $('#level_code').html(selOpts);
                    }
                });
}

function leaveChange(a)
{

    var url             =   urlmainsite+'cmd/lesson.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       cat_val : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.id+"'>"+element.tcodelesson+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
						
                       $('#lesson_code').html(selOpts);
                    }
                });
}

function getlevels(a){
	if(a == 2 )
		name = 'Level 1';
		else if(a == 3 )
			name = 'Level 2';
			else if(a == 4 )
				name = 'Level 3';
				else if(a == 5 )
					name = 'Level 4';
					else if(a == 6 )
						name = 'Level 5';
						else if(a == 7 )
							name = 'Level 0';
						
						return name;
							
	
}

</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $examcomp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $examcomp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Examcomps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Examschedule'), ['controller' => 'Examschedule', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Examschedule'), ['controller' => 'Examschedule', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="examcomps form large-9 medium-8 columns content">
    <?= $this->Form->create($examcomp) ?>
    <fieldset>
        <legend><?= __('Edit Examcomp') ?></legend>
        <?php
            echo $this->Form->control('examschdeule_id', ['options' => $examschedule]);
          
		   ?>
		   
		    <label >Topic code :*</label>
			<select name="topic_code" id="topic_code-id" onchange="leaveChange(this.value)">
		<?php
		
		foreach ($topiccodes as $k => $v) { ?>
			
			<option value="<?php  echo $v['id']; ?>" <?php if ($v['id'] == $gettid ) echo 'selected' ; ?>  ><?php  echo $v['tcode']; ?></option>
			<?php
 
}
		?>
		</select>
		
		
	<label >Lesson code:*</label>
		
		<select id='lesson_code' name='lesson_code' required onchange="leaveChangelevel(this.value)">
			
		</select>
		
		 <label >Level code:*</label>
		<select name="level_code" id="level_code" required  >
			
		</select>
			<?php
			//echo $this->Form->input('topic_code', array('label' => 'Topic Code', 'type' => 'select', 'options' => $topiccodes, 'empty' => 'Select the topic code', 'showParents' => false));

            echo $this->Form->control('level');
            echo $this->Form->control('score');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
