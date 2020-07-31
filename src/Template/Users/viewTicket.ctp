<div id="viewticketsmodal" class="modal fade right" role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
	  <a style="margin-top: 7px;position: absolute;left: 250px;" href="https://sites.google.com/xlanz.com/odin-help" target="_blank" class="collapsible-header waves-effect" data-toggle="tooltip" data-placement="bottom"
  title="View Documentation" ><i class="w-fa fas fa-question-circle" style="font-size: 25px;"></i></a>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Ticket History</h4>
      </div>
      <div class="modal-body">
	  <br />
	
	   <?php if($usersrole == 2) { ?>
	    <button type="button" class="btn  pull-right" onclick="openmodalboxcreateticket()" style="float:right">New Tickets</button>
	  <br />
	  <?php } ?>
	  
	  <div class="table-responsive">
	  
        <table class="table table-striped table-bordered table-hover" id="ticketBook"  data-order="[]"  width="100%" >
          <thead style="background-color:#D3D3D3">
                <tr>
                    <th id="a1">Ticket No</th>
                    <th id="a1">Date</th>
                    <th id="a1">Title</th>
                     <th id="a1">Lesson Slide Number</th>
                     <th id="a1">Lesson Name</th>
                     <th id="a1">Lesson ID</th>
                    <th id="a1">Content</th>
					<th>Category</th>
                    <th>Priority</th>
                    <th>Status</th>
					
                </tr>
            </thead>
        </table>
		</div>
 </div>
   
    </div>

  </div>
</div>