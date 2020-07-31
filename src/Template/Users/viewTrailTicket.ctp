<div id="viewtrailticketsmodal" class="modal fade right" role="dialog">
 <div class="modal-dialog" id="viewticledagtdopi">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title" > Details of <b>#<span id="ticketNumber"></span> <span id="ticketTitle"></span></b> </h4>
       </div>
       <div class="modal-body">
         <div class="form-group" id="previousComments" >

                 </div>
                     <hr>
                    <?= $this->Form->create('Post', array('url' => '/ticketUser/replyTicket' , 'enctype' => 'multipart/form-data')) ?>
                     <input type="hidden" id="ticketNo" name="ticket_number" >
                       <div class="form-group">
                            <label for="exampleInputPassword1">Content <span style="color:red;">*</span></label>
                                 <textarea type="text" class="form-control"
                                           id="contentfortrailticket" name="content" placeholder="Enter the message" required></textarea>
                       </div>
                        <div class="form-group">
                           <?= $this->Form->control('fileToUpload', array('type' => 'file' , 'class' =>  "form-control")); ?>
                        </div>
                        <div class="form-group">
                          <?= $this->Form->submit('Reply', array('class' => 'btn ')); ?>
                        </div>
                    <?= $this->Form->end(); ?>
                   <?php if($usersrole == 6) {?>  <button id="closeButton" type="button" class="btn " onclick="closeTicket()">Close Ticket</button> <?php } ?>




  </div>
       <div class="modal-footer">
         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
</div>
