  <?= $this->Html->css('mdb.css') ?>
  <?= $this->Form->create($targetexamslist, array('action' => '/sendmailusers/')) ?>
	  
      <div class="form-group">
				
				<label>User:</label> 
                                                   
                    <select name="usertype"  class="form-control" id="colorid" required style="display:block !important">
					<option value="1">Speaker</option>
					<option value="2">Project Mentor</option>
					<option value="3">Company</option>
					
					
					
					</select>                                
													
					
													
                                                </div>
												
			 <div class="form-group">
<?= $this->Form->control('name',array('id' => 'datepickerexam','autocomplete' => off,'label' => 'Name :','class' => 'form-control' ,'required' => 'required' )); ?>
			  </div>
			  
			   <div class="form-group">
			<?= $this->Form->control('email',array('id' => 'datepickerexam','autocomplete' => off,'label' => 'Email :','class' => 'form-control' ,'required' => 'required' )); ?>
			  </div>
			  
			 
			   
			   
			   
			   
										
			  
												   <button type="submit" class="btn btn-default">Send</button>
												   
												   <?= $this->Form->end(); ?>