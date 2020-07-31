<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
  include('cssjs.ctp');
?>
		<script>


function showpassword(a) {
if(a ==1 )
  var x = document.getElementById("mypassowrdprofile");
  else 
   var x = document.getElementById("passwordprofile");
  
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

$(document).ready(function() {
	
	 $("#captchaOperationvalue2").submit(function(event) {
					 
					  var recaptcha = $("#g-recaptcha-response").val();
   if (recaptcha === "") {
   event.preventDefault();
      alert('Please check the recaptcha');
   }

   
});
	
	 });


</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
			<li><?= $this->Html->link(__('Dashboard'), ['action' => '../users']) ?></li>
       <li><?= $this->Html->link(__('New Institute/Group/Ticket Admin'), ['action' => 'add']) ?></li>
		 <li><?= $this->Html->link(__('Institution'), ['action' => '../Institution']) ?></li>
		  <li><?= $this->Html->link(__('learningplan'), ['action' => '../learningplan']) ?></li>
		 <!--  <li><?= $this->Html->link(__('scorecard'), ['action' => '../scorecard']) ?></li>-->
		    <li><?= $this->Html->link(__('scoretype'), ['action' => '../scoretype']) ?></li>
			 <li><?= $this->Html->link(__('target'), ['action' => '../target']) ?></li>
			  <li><?= $this->Html->link(__('targetcomps'), ['action' => '../targetcomps']) ?></li>
			  			  <li><?= $this->Html->link(__('Studentgroup'), ['action' => '../Studentgroup']) ?></li>
						    <!--<li><?= $this->Html->link(__('Groupadmin'), ['action' => '../Groupadmin']) ?></li>-->
			  
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
   
    
  
    
	
	<?= $this->Form->create($user, ['type' => 'file','id'=>'captchaOperationvalue2']); ?>
	<fieldset>
        <legend><?= __('Add Users') ?></legend>
        
    </fieldset>
	
	  <?= $this->Form->control('userroles_id', array('options' => $usertypes)); ?>
			<?= $this->Form->input('fname' ,array('label' => 'First Name')); ?>
			<?= $this->Form->input('lname' ,array('label' => 'Last Name')); ?>
			<?= $this->Form->input('email'); ?>
			<?= $this->Form->input('username',array('style'=>'margin-bottom: 1px !important;')); ?>
			<em style="font-size: 12px;line-height: 1.0 !important;">Username should be in lowercase.</em><br />
			<!--<?= $this->Form->input('userroles_id', ['type' => 'hidden','value' => '2']);  ?>-->
			<?= $this->Form->input('password', array('type' => 'password','id' => 'passwordprofile','style'=>'margin-bottom: 1px !important;','label' => __('Password'))); ?>
			<em style="font-size: 12px;line-height: 1.0 !important;">Password must contain at least 8 characters,1 number, 1 capital & 1 lowercase letters.</em><br />
				<input type="checkbox" onclick="showpassword(2)">Show Password
			
				<?=	
				 $this->Form->input('gender', array(
    'options' => $options,
    'type' => 'select',
    'empty' => 'Select the gender',
    'label' => 'Gender'
   )
); ?>
				
					<?= $this->Form->control('address',array('label' => 'Address1','type'=>'text','required'=>'required')); ?>
					<?= $this->Form->control('address2',array('label' => 'Address2','type'=>'text','required'=>'required')); ?>
					<?= $this->Form->control('city',array('label' => 'City','type'=>'text','required'=>'required')); ?>
					<?= $this->Form->control('pincode',array('label' => 'Pincode','type'=>'text','required'=>'required')); ?>
					
					
					<?=	
				 $this->Form->input('state', array(
    'options' => $indianStates,
    'type' => 'select',
    'empty' => 'Select the State',
    'label' => 'Select the State',
	'id' => 'addressprofile4',
	'required'=>'required'
)); ?>
						<?= $this->Form->input('phonenumber'); ?>
						
						 <div class="form-group">
<div class="g-recaptcha" data-sitekey="6LeK-KEUAAAAANdsa_t-uBMPhI8YSKlQXBLKd_Ei"></div>
 </div>
						
			<!--<?= $this->Form->input('photo', ['type' => 'file','name' => 'upload']); ?>-->
			<?= $this->Form->submit('Register', array('class' => 'button')); ?>
			
		<?= $this->Form->end(); ?>
	
</div>
