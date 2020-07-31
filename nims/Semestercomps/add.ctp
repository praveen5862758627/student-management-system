<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Semestercomp $semestercomp
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
  var selOpts = "";
  
  	if(data.length > 0){
		
	selOpts += "<option value=''>Select the option</option>";
	selOpts += "<option value='7'>Basic</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.level_id+"'>"+getlevels(element.level_id)+"</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value='7'>Basic</option>";
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
	if(a == 1 )
		name = 'Level 1';
		else if(a == 2 )
			name = 'Level 2';
			else if(a == 3 )
				name = 'Level 3';
				else if(a == 4 )
					name = 'Level 4';
					else if(a == 5 )
						name = 'Level 5';
						else if(a == 7 )
							name = 'Level 0';
						
						return name;
							
	
}

</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semestercomps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semesters'), ['controller' => 'Semesters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semester'), ['controller' => 'Semesters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semestercomps form large-9 medium-8 columns content">
    <?= $this->Form->create($semestercomp) ?>
    <fieldset>
        <legend><?= __('Add Semestercomp') ?></legend>
        <?php
            echo $this->Form->control('semester_id', ['options' => $semesters]);
          //  echo $this->Form->control('topic_code');
           // echo $this->Form->control('lesson_code');
           // echo $this->Form->control('level_code');
            echo $this->Form->control('score');
        ?>
		
		 <label >Topic code :*</label>
			<select name="topic_code"  id="topic_code-id" required onchange="leaveChange(this.value)">
			<option value="">Select the option</option>
		<?php
		
		foreach ($topiccodes as $k => $v) { ?>
			
			<option value="<?php  echo $v['id']; ?>"><?php  echo $v['name']; ?> / <?php  echo $v['tcode']; ?></option>
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
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
