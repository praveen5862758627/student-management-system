<div id="importCsvmodal" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width: 75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" >Import Students</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"><label>Choose the Import file : </label></div>
						<div class="col-md-3"><input id="avatar" type="file" name="avatar"/></div>
						<div class="col-md-3"><button type="button" value="Validate" class="btn btn-info" onClick="validateImportFile()">Validate</button></div>
						<div class="col-md-3"><a href="https://sms.odinlearning.in/uploads/sample_excel_import.xls" download style="color:blue;"><u>Click here for sample format</u></a></div>
					</div>
				</div>
			</div>
			</div>
			<div id="errorblock" style="color:red;display:none;"></div>
			<div id="messageBlock" style="display:none;" class="alert alert-success" onclick="this.classList.add('hidden')" style="text-align: center;"></div>
			<hr>
		 <table class="table table-striped table-bordered table-hover" id="importStudentsBook"  data-order="[]"  style="display:none;">
            <thead>
                <tr>
                    <th id="a1">Sl No</th>
                    <th id="a1">First Name</th>
                    <th id="a1">Last name</th>
                    <th id="a1">Email</th>	
                    <th id="a1">Username</th>
                    <th id="a1">Gender</th>
                    <th id="a1">Address 1</th>
                    <th id="a1">Address 2</th>
                    <th id="a1">City</th>
                    <th id="a1">Pincode</th>
                    <th id="a1">State</th>
					 <th id="a1">Category</th>
					  <th id="a1">Date of Birth</th>
					   <th id="a1">Date of Admission</th>
					    <th id="a1">Phone No</th>
						 <th id="a1">College Regn No</th>
						  <th id="a1">University Regn No</th>
					
                </tr>
            </thead>
        </table>
		
		<div class="form-group">
			<button type="button" id="importStudentsButton" class="btn btn-Primary" onClick="registerByImportCsv()" style="display:block;">Import</button>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>