<div class="modal-dialog" style="width: 75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" >Create New Ticket</h4>
      </div>
      <div class="modal-body">
         <?= $this->Form->create('Post', array('url' => '/ticket/add' , 'enctype' => 'multipart/form-data')) ?>
                          <div class="form-group">
                                <label for="exampleInputEmail1">Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control"
                                       id="titleforcreateticket" name="title" placeholder="Enter Title of Ticket" required value="<?php echo $_GET['cat']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content <span style="color:red;">*</span></label>
                                <textarea type="text" class="form-control"
                                          id="contentforcreateticket" name="content" placeholder="Enter the message" required></textarea>
                            </div>
							
							<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['REQUEST_URI']}";
$actual_link1 = substr($actual_link,28);

  							?>
							
							<input type="hidden" value="<?php echo $actual_link1; ?>" name="url"  id="geturlforuser"/>
							
                            <div class="form-group">
                                <?=
                                 $this->Form->control('priority', array(
                                    'options' => array('Low','Medium','Critical'),
                                    'type' => 'select',
                                    'empty' => 'Select the Priority',
                                    'label' => 'Priority  :',
                                    'class' => 'form-control',
                                    'id' => 'priorityforcreateticket',
                                    'required' => 'required'
                                   )
                                ); ?>
                            </div>
							<div class="form-group">
                                <label for="exampleInputPassword1">Category  : </label>
                                <select name="department" class="form-control">
                                    <option value="1" >Select the Category</option>
									<option value="1">Help and Support</option>
									<option value="2">Technical Issues</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('fileToUpload', array('type' => 'file' , 'class' =>  "form-control")); ?>
                            </div>
                           
							
							
                                                   
                            <!--    <?= $this->Form->submit('Submit', array('class' => 'btn btn-default')); ?>-->
								
								 <button type="submit" class="btn btn-default">Create</button>
								 
								 <button class="btn btn-default" onclick='redirectticketusers1()' >Cancel</button>
								
                         
			 <script>
function redirectticketusers1()
{



	var url1 = document.getElementById("geturlforuser").value;
	


window.location = url1;




}
</script>
							
							
         <?= $this->Form->end(); ?>






         </div>
    </div>

  </div>