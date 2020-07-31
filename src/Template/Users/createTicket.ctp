<div id="createticketsmodal" class="modal fade right" role="dialog">
  <div class="modal-dialog" id="loadcreatedmodal">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Create new Ticket</h4>
      </div>
      <div class="modal-body">
         <?= $this->Form->create('Post', array('url' => '/ticket/add' , 'enctype' => 'multipart/form-data')) ?>
                          <div class="form-group">
                                <label for="exampleInputEmail1">Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control"
                                       id="titleforcreateticket" name="title" placeholder="Enter Title of Ticket" required/>
                            </div>
          
           <div class="form-group">
                                <label for="exampleInputEmail1">Lesson Slide Number</label>
                                <input type="text" class="form-control"
                                       id="titleforcreateticket" name="slidenumber" placeholder="Enter Lesson Slide Number" />
                            </div>
           <div class="form-group">
                                <label for="exampleInputEmail1">Lesson Name</label>
                                <input type="text" class="form-control"
                                       id="titleforcreateticket" name="lessonname" placeholder="Enter Lesson Name" />
                            </div>
           <div class="form-group">
                                <label for="exampleInputEmail1">Lesson ID </label>
                                <input type="text" class="form-control"
                                       id="titleforcreateticket" name="lessonid" placeholder="Enter Lesson ID" />
                            </div>
          
          
          
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content <span style="color:red;">*</span></label>
                                <textarea type="text" class="form-control"
                                          id="contentforcreateticket" name="content" placeholder="Enter the message" required></textarea>
                            </div>
                            <div class="form-group">
                                <?=
                                 $this->Form->control('priority', array(
                                    'options' => array('Low','Medium','Critical'),
                                    'type' => 'select',
                                    'empty' => 'Select the Priority',
                                    'label' => 'Priority  :',
                                    'class' => 'form-control',
                                    'id' => 'priorityforcreateticket',
                                    'required' => 'required',
									'style'=>'display:block !important'
                                   )
                                ); ?>
                            </div>
							<div class="form-group">
                                <label for="exampleInputPassword1">Category  : </label>
                                <select name="department" class="form-control" style="display:block !important">
                                    <option value="1" >Select the Category</option>
                                    <?php foreach ($ticketDepts as $ticketDept) { ?>
                                          <option value=<?php echo $ticketDept->id; ?>><?php echo $ticketDept->name; ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->control('fileToUpload', array('type' => 'file' , 'class' =>  "form-control")); ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->submit('Submit', array('class' => 'btn ')); ?>
                            </div>
         <?= $this->Form->end(); ?>






         </div>
    
    </div>

  </div>
</div>