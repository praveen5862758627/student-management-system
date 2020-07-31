<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
    include('cssjs.ctp');
	
	
?>
 
<div class="events form large-9 medium-8 columns content" style="width: 100%;">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Edit Event') ?></legend>
        <?php
          
            echo $this->Form->control('title');
          
            echo $this->Form->control('start' , array('id' => 'datepicker55555','autocomplete' => 'off','label' => 'Date of the Event :' ,'required' => 'required' ));
        ?>
		
		
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
	<button onclick="goBack()">Go Back</button>

<script>

 $( function() {
    $( "#datepicker55555" ).datepicker({dateFormat: 'yy-mm-dd',    minDate: 0});
  } );
 
function goBack() {
  window.history.back();
}
</script>
</div>
