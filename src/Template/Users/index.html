<style>
#sidebar ul li.active > a, a[aria-expanded="true"]{
color : black !important;
}
.text-white
{
color : black !important;
}
</style>
<div id="assigntopicstogruopuys" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Assign Comparea to a group</h4>
                    </div>
                    <div class="modal-body">
                        
                        	<?php  echo $this->Form->create($user, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitassigntopictogroups()'
	
]); ?>		
                        
                        <div class="row">
                            
                            <div class="col-xl-12 col-md-12 mb-xl-0 mb-4" >
                             <select class="mdb-select md-form" searchable="Search here.." id="selectedgruoiups" required>
  <option value="" disabled selected>Select the Group</option>
                                 <?php foreach($this->Custom->studentgroupallnn() as $sopeakerlis ){ ?>
    
     <option value="<?php echo $sopeakerlis['id']; ?>"><?php echo $sopeakerlis['name']; ?></option>
      <?php } ?>
 
 
</select>
                                
                                

                                
                        
                        <select class="mdb-select md-form" id="sel_user" multiple searchable="Search here.." required>
  

</select>
<button class="btn-save btn  btn-sm">Save</button>
                            </div>
                            
                            <button class="btn " id="loadyopicstsu">Save</button>
                            
                        </div>
                        
                       
                        
                        
                        
                      	 <?= $this->Form->end(); ?>	


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
<script>
        function assigntopictogroup()
    {
         $("#assigntopicstogruopuys").modal({keyboard: false});
        loadtopicsforadmin();
    }
     function loadtopicsforadmin()
    {
                $.ajax({
            url: urlmainsite+"cmd/loadtopics.php",
            type: 'post',
           // data: {depart:deptid},
            dataType: 'json',
                    				   beforeSend: function() {
    $('#sel_user').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;

                $("#sel_user").empty('<option value="" disabled selected>Select the topics</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }
	    function loadtopicsforadminalltopic()
    {
	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopics.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#sel_useralltopc').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#sel_useralltopc").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#sel_useralltopc").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }
	
	function showallthetopicsoncomaprea(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#sel_useralltopcfffff').html(selOpts);
                    }
                });
		
	}
    
    function onsubmitassigntopictogroups()
{
    
   console.log($("#sel_user").val());
    console.log($("#selectedgruoiups").val());
    
 $.ajax({
                   type:"POST",
                     url: urlmainsite+"sms/savecompareids.php",
                   data:{
				    compareacode : $("#sel_user").val(),groupid : $("#selectedgruoiups").val()
		
                   },
                   dataType: 'text',
				   beforeSend: function() {
     
      $('#loadyopicstsu').hide();
  },
                   success:function(data)
                    {
                       // alert(data);
                        
					if(data == 1)
					{
					 toastr.success('Done.');
                          $('#loadyopicstsu').show();
	
					}
					else
					{
                       toastr.error(data);
                        $('#loadyopicstsu').show();
					   }
					    
					
                    }
                });
				 return false;
}
function onsubmitcodingtest()
{

alert("hello");
var URL = "http://jobe.odinlearning.in/jobe/index.php/restapi/runs/";
var usr = 'api';
var psw = 'hidden';
$.ajax({
  type: "POST",
  dataType: "json",
  contentType: "application/json",
  url: URL,
  crossDomain: true,
  beforeSend: function(xhr) {
    xhr.setRequestHeader("Authorization", "Basic 2AAA7A5415B4A9B394B54BF1D2E9D")
  },
  success: function(result) {
    alert('success');
  },
  error: function(req, status, err) {
    alert('Something went wrong', status, err);
  }
});
 return false;
}

 function displaycompslist()
    {
	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopics.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#lisddiffcomps').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#lisddiffcomps").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#lisddiffcomps").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }
	function getallthetopisbvnew(a)
	{
	

	
	if(a == 'Seminar')
	{
	 $("#colorfordiffebets").html("<option value='#99CCD0'>#99CCD0</option>");
	}
	else if(a == 'Webinar')
	{
	 $("#colorfordiffebets").html("<option value='#9EADD6'>#9EADD6</option>");
	}
	else if(a == 'Recordings')
	{
	 $("#colorfordiffebets").html("<option value='#817BB7'>#817BB7</option>");
	}
	else if(a == 'Assignment')
	{
	 $("#colorfordiffebets").html("<option value='#4E8896'>#4E8896</option>");
	}
	else if(a == 'Internals')
	{
	 $("#colorfordiffebets").html("<option value='#69ABB9'>#69ABB9</option>");
	}
	else if(a == 'MidtermExamination')
	{
	 $("#colorfordiffebets").html("<option value='#DAC6BD'>#DAC6BD</option>");
	}
	else if(a == 'SemesterExamination')
	{
	 $("#colorfordiffebets").html("<option value='#A8626A'>#A8626A</option>");
	}
	else if(a == 'CampusPlacement')
	{
	 $("#colorfordiffebets").html("<option value='#EECBFF'>#EECBFF</option>");
	}
	else if(a == 'OffCampusPlacement')
	{
	 $("#colorfordiffebets").html("<option value='#FEFFA3'>#FEFFA3</option>");
	}
		else if(a == 'ProjectDiscussion')
	{
	 $("#colorfordiffebets").html("<option value='#DBDCFF'>#DBDCFF</option>");
	}
	
	
	}
	function getallthetopisbv(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#lisdifftopivs').html(selOpts);
                    }
                });
		
	}
    
	function listallgroupsandcoms()
    {
        
    $('#listdofgdgc').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getallgroups.php",
    "type": "POST",
	"data":{
                     // userid : userid
                   },
				   "dataType": "json",
				   "cache": false,
				   
				   	"dataSrc": function(data){

//console.log(data.data);
if(data.data == "No data found"){
return [];
}
else {
return data.data;
}
},
				   
  },
  
   
  
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px;display:block" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					//console.log( column.data().unique());
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
		
	
		
  "columns": [
        { "data": "name" },
		 { "data": "view" }

		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
	
	$("#listallgroupsandcoms").modal({keyboard: false});
        
    }
    
    function lisallthecompreas(a,b)
    {
        
         $("#codeforassignmentbnzhH").val(b);
        $('#listdofgdgccoms').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"cmd/getallgroups.php",
    "type": "POST",
	"data":{
                     coms : a
                   },
				   "dataType": "json",
				   "cache": false,
				   
				   	"dataSrc": function(data){

//console.log(data.data);
if(data.data == "No data found"){
return [];
}
else {
return data.data;
}
},
				   
  },
  
   
  
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px;display:block" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					//console.log( column.data().unique());
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
		
	
		
  "columns": [
        { "data": "name" },
		 { "data": "view" }

		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
	
	$("#listallgroupsandcomscoms").modal({keyboard: false});
    }
    function lisallthecompreasremove(a,b)
    {
        
      var  id = $("#codeforassignmentbnzhH").val();
           // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/removegroupfromthr/',
                   data:{
                      cat_val : a , id : id
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                    toastr.success("Removed.");
					  //  $('#listdofgdgccoms').DataTable().ajax.reload();
						
					 $("#listallgroupsandcomscoms").modal('hide');
                         $("#listallgroupsandcoms").modal('hide');
					
                    }
                });
	
    }

</script>


<div id="listallgroupsandcoms" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">List of Groups</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="listdofgdgc"  data-order="[]" width="100%"   >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a11">Name</th>
									
                                    <th id="d1">Comparea</th>


                                </tr>
                            </thead>



                        </table>
						</div>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
<div id="listallgroupsandcomscoms" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">List of comparea</h4>
                    </div>
                    <div class="modal-body">
                     <div class="table-responsive">   
<table class="table table-striped table-bordered table-hover" id="listdofgdgccoms"  data-order="[]" width="100%"   >
                            <thead style="background-color:#D3D3D3">
                                <tr>
                                    <th id="a11">Name</th>
									
                                    <th id="d1">Action</th>


                                </tr>
                            </thead>



                        </table>
</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
<input type="hidden" id="codeforassignmentbnzhH" />

<div id="resetpasfromadminnmod" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="">&times;</button>
                        <h4 class="modal-title" id="">Reset Password</h4>
                    </div>
                    <div class="modal-body">
      <input type="hidden" id="useridforrownewd" name="" >
                        
                        	<?php  echo $this->Form->create($user, [
    /*'url' => [
        'controller' => 'Sslcpuc',
        'action' => 'add'
    ],*/
	'onsubmit'=>'return onsubmitchangepassword111()'
	
]); ?>			   

                                           
                                                <!-- Password -->
   	 <?= $this->Form->control('password_new', array('label' => false,'required' => 'required','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile200' , 'placeholder'=>'New Password')); ?>
                                                <span toggle="#mypassowrdprofile200" class="fa fa-fw fa-eye field-icon toggle-passwordk" style="margin-right: 10px;"></span>


                                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">

                                                </small>


	 <?= $this->Form->control('password_newconfirm', array('label' => false,'required' => 'required','type' => 'password','class' => 'form-control' ,'id' => 'mypassowrdprofile300' , 'placeholder'=>'Confirm New Password')); ?>

                                                <span toggle="#mypassowrdprofile300" class="fa fa-fw fa-eye field-icon toggle-passwordk" style="margin-right: 10px;"></span>
                                                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                                    Password must contain at least 8 characters, 1 number, 1 capital & 1 lowercase letters. Maximum length should be only 14 characters.
                                                </small>

                                                <div class="text-center">


				    <?=  $this->Form->button('Reset password', array('class' => 'btn btn-info btn-md waves-effect waves-light' ,'value' => 'Reset password'));  ?>


                                                </div>
	 <?= $this->Form->end(); ?>	


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

 <script>

                                                $('.toggle-passwordk').on('click', function () {



                                                    $(this).toggleClass('fa-eye fa-eye-slash');
                                                    let input = $($(this).attr('toggle'));
                                                    if (input.attr('type') == 'password') {
                                                        input.attr('type', 'text');
                                                    } else {
                                                        input.attr('type', 'password');
                                                    }
                                                });
     
     					function onsubmitchangepassword111()
{
 $.ajax({
                   type:"POST",
                   url:targeturl+'Users/changepassforstudentadmin/',
                   data:{
				  password_new : $("#mypassowrdprofile200").val(), password_newconfirm : $("#mypassowrdprofile300").val(),uid : $("#useridforrownewd").val()
					
		
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					if(data == 1)
					{
					 toastr.success('Password has been successfully updated.');
					 
	
					}
					else
					{
                       toastr.error(data);
					   }
					    
					
                    }
                });
				 return false;
}
function formatTime(timeInput) {

  intValidNum = timeInput.value;

  if (intValidNum < 24 && intValidNum.length == 2) {
      timeInput.value = timeInput.value + ":";
      return false;  
  }
  if (intValidNum == 24 && intValidNum.length == 2) {
      timeInput.value = timeInput.value.length - 2 + "0:";
      return false;
  }
  if (intValidNum > 24 && intValidNum.length == 2) {
      timeInput.value = "";
      return false;
  }

  if (intValidNum.length == 5 && intValidNum.slice(-2) < 60) {
    timeInput.value = timeInput.value + ":";
    return false;
  }
  if (intValidNum.length == 5 && intValidNum.slice(-2) > 60) {
    timeInput.value = timeInput.value.slice(0, 2) + ":";
    return false;
  }
  if (intValidNum.length == 5 && intValidNum.slice(-2) == 60) {
    timeInput.value = timeInput.value.slice(0, 2) + ":00:";
    return false;
  }


  if (intValidNum.length == 8 && intValidNum.slice(-2) > 60) {
    timeInput.value = timeInput.value.slice(0, 5) + ":";
    return false;
  }
  if (intValidNum.length == 8 && intValidNum.slice(-2) == 60) {
    timeInput.value = timeInput.value.slice(0, 5) + ":00";
    return false;
  }



} //end function

  function onlyNumbersWithColon(e,timeInput) {
            var charCode;
            if (e.keyCode > 0) {
                charCode = e.which || e.keyCode;
            }
            else if (typeof (e.charCode) != "undefined") {
                charCode = e.which || e.keyCode;
            }
            if (charCode == 58)
			{
			formatTime(timeInput);
                return true
				}
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
				}
				else {
				formatTime(timeInput);
            return true;
			}
			
			
        }
            
function dispalystudentattandance()
{
loadstudentsforadmattandave();
loadcomparaedfoattewndance();
$("#Attendancemodal").modal({keyboard: false});

}

                                            </script>
											
<div id="onlineclassmodalf2f" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add On Campus Class</h4>
                    </div>
                    <div class="modal-body">
	  <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return onlineclasssaveinfof()')) ?>

                       

                        <div class="form-group">
							<b>Comparea <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="sel_useralltopc" style="display:block !important" onchange="showallthetopicsoncomaprea(this.value)"  searchable="Search here.." required>
  

</select>
			

					  </div>
					  
					   <div class="form-group">
							<b>Topic <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="sel_useralltopcfffff"  style="display:block !important"  searchable="Search here.." required>
  

</select>


			

					  </div>

                       



                        <div class="form-group">

                            
							<b>Group name <span style="color:red">*</span>:</b> 

                            <select name="groupname"  class="form-control" id="studentsgroupsclassf2f" required style="display:block !important">
							<?php foreach($studentgroups as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                               <?php } ?>

                            </select>                                



                        </div>
						
						 <div class="form-group">
							<b>Start Time (In 24-hr format) <span style="color:red">*</span>:</b> 
							

			<?= $this->Form->control('start',array('id' => 'starttimeforf2f','placeholder'=>"HH:MM:SS", 'onkeypress'=>"return onlyNumbersWithColon(event,this);", 'MaxLength'=>"8",'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						<div class="form-group">
							<b>End Time (In 24-hr format) <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('start',array('id' => 'endttimeforf2f','autocomplete' => 'off','onkeypress'=>"return onlyNumbersWithColon(event,this);",'label' => false,'placeholder'=>"HH:MM:SS",  'MaxLength'=>"8",'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
					
						<div class="form-group">
		            <b>Event Start Date <span style="color:red">*</span>:</b> 
<?= $this->Form->control('startdate',array('label' => false,'class' => 'form-control startdattime11' ,'id' => 'startdattime11','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                            <script>
  
                                                                $('.startdattime11').pickadate({
                                                                    today: '',
                                                                    clear: 'Clear selection',
                                                                    close: 'Cancel',
                                                                    selectYears: 100,
                                                                    format: 'dd-mm-yyyy'
                                                                   /* min: new Date(1950, 1, 1),
                                                                    max: new Date(2004, 1, 1)*/
                                                                });
                                                            
                                                            </script>

                        </div>
						<div class="form-group">
						<b>Event End Date <span style="color:red">*</span>:</b> 
		    
  <?= $this->Form->control('enddate',array('label' => false,'class' => 'form-control enddattime11' ,'id' => 'enddattime11','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                          
                                                            <script>
                                                             $('.enddattime11').pickadate({
                                                                    today: '',
                                                                    clear: 'Clear selection',
                                                                    close: 'Cancel',
                                                                    selectYears: 100,
                                                                    format: 'dd-mm-yyyy'
                                                                   /* min: new Date(1950, 1, 1),
                                                                    max: new Date(2004, 1, 1)*/
                                                                });
                                                            
                                                            </script>

                        </div>
						
						<div class="form-group">
						
						
		

                            <b>Recurring Days <span style="color:red">*</span>:</b> 

                            <div class="form-check">
    <input type="checkbox" class="form-check-input" value="0" name="recuday[]" id="fmaterialUnchecked1">
    <label class="form-check-label" for="fmaterialUnchecked1">Sunday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="1" name="recuday[]" id="fmaterialUnchecked2">
    <label class="form-check-label" for="fmaterialUnchecked2">Monday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="2" name="recuday[]" id="fmaterialUnchecked3">
    <label class="form-check-label" for="fmaterialUnchecked3">Tuesday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="3" name="recuday[]" id="fmaterialUnchecked4">
    <label class="form-check-label" for="fmaterialUnchecked4">Wednesday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="4" name="recuday[]" id="fmaterialUnchecked5">
    <label class="form-check-label" for="fmaterialUnchecked5">Thursday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="5" name="recuday[]" id="fmaterialUnchecked6">
    <label class="form-check-label" for="fmaterialUnchecked6">Friday</label>
</div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" value="6" name="recuday[]" id="fmaterialUnchecked7">
    <label class="form-check-label" for="fmaterialUnchecked7">Saturday</label>
</div>


                        </div>

                        <div class="form-group">
						
						
		

                            <b>Description <span style="color:red">*</span>:</b> 

                            <textarea rows="4" cols="50"  name="description" class="form-control" id="onlineclassdescriptionf2f" required ></textarea>



                        </div>
								   <div class="form-group">
							<b>Event color <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="coloridf2f" required style="display:block !important">
                                <!--<option value="#5CB6B6">#5CB6B6</option>
                               
                                <option value="red">Red</option>
                                <option value="pink">Pink</option>
                                <option value="yellow">Yellow</option>-->
								 <option value="#5CB6B6">#5CB6B6</option>

                            </select>                      
			
                        </div>

                        <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
		
		      <div id="inscalendartabneaeve" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add an Event</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return moreventscreationfun()')) ?>

                       
 <div class="form-group">
							<b>Title <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'tilefordiffevents','autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
                        
             
					
						<div class="form-group">
		            <b>Date & time<span style="color:red">*</span>:</b> 
<?= $this->Form->control('starttime',array('label' => false,'class' => 'form-control startdattimeexameennnn' ,'id' => 'dateandtimefordiffebets','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                            <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.startdattimeexameennnn').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
});
                                                            </script>

                        </div>
					  
						<div class="form-group">
							<b>Event type <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="diffeebetstype" onchange="getallthetopisbvnew(this.value)" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								<option value="Recordings">Recordings</option>
								<option value="Assignment">Assignment</option>
								<option value="Internals">Internals</option>
                              <option value="MidtermExamination">Midterm Examination</option>
<option value="SemesterExamination">Semester Examination</option>
<option value="CampusPlacement">Campus Placement</option>
<option value="OffCampusPlacement">Off Campus Placement</option>
<option value="ProjectDiscussion">Project Discussion</option>
                            </select>                      
			
                        </div>
						 <div class="form-group">
							<b>Event color <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="colorfordiffebets" required style="display:block !important">
                             
                               <!-- <option value="red">Red</option> -->
                              

                            </select>                      
			
                        </div>
						
                        <div class="form-group">
							<b>Comparea :</b> 
							
							                     <select class="form-control" id="lisddiffcomps" style="display:block !important" onchange="getallthetopisbv(this.value)"  searchable="Search here.." >
  

</select>
			

					  </div>
					  
					   <div class="form-group">
							<b>Topic :</b> 
							
							                     <select class="form-control" id="lisdifftopivs"  style="display:block !important"  searchable="Search here.." >
  

</select>


			

					  </div>

                       



                        <div class="form-group">

                            
							<b>Group name <span style="color:red">*</span>:</b> 

                            <select name="groupname"  class="form-control" id="lisufofddifgrous" required style="display:block !important">
							<?php foreach($studentgroups as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                               <?php } ?>

                            </select>                                



                        </div>

                        <div class="form-group">
						
		

                            <b>Description <span style="color:red">*</span>:</b> 

                            <textarea rows="4" cols="50"  name="description" class="form-control" id="difftypedies" required ></textarea>



                        </div>

                        <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>


                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div>
		
		<script>
		 function displaycompslistnew1()
    {
	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopics.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#lisddiffcompsnew1').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#lisddiffcompsnew1").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#lisddiffcompsnew1").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }
	function getallthetopisbvf1(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#getallthetopisbvf1nnn').html(selOpts);
                    }
                });
		
	}
    
		</script>
		
		    <div id="modalforfileegt" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="filteroption">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Filter</h4>
                    </div>
                    <div class="modal-body">



            <!-- Accordion wrapper -->
            <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
			
              <div class="card">

               
                <div class="card-header grey lighten-2" role="tab" id="headingTwo1">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                    aria-expanded="false" aria-controls="collapseTwo1">
                    <h5 class="mb-0">
                      Filter by Group <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

               
                <div id="collapseTwo1" class="collapse grey lighten-2" role="tabpanel" aria-labelledby="headingTwo1"
                  data-parent="#accordionEx1">
                  <div class="card-body text-white">
				   <?php  if ( $this->request->getSession()->read('sessionname2') == 3 || $this->request->getSession()->read('sessionname2') == 4) { ?>
				                        <select name="groupname"  class="form-control" id="hhjjjkjkjkjl" onchange="calendarviewforadmin(this.value,'group')" required style="display:block !important">

				   <?php } else { ?>
				                        <select name="groupname"  class="form-control" id="hhjjjkjkjkjl" onchange="calendarfilter(this.value,'group')" required style="display:block !important">

				   
				   <?php } ?>
					 <option value="all">All</option>
							<?php foreach($studentgroups as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                               <?php } ?>

                            </select>         
                 

				 </div>
                </div>

              </div>
			
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header grey lighten-2" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" onclick="loadcompareadforaccor()" href="#collapseTwo21"
                    aria-expanded="false" aria-controls="collapseTwo21">
                    <h5 class="mb-0">
                      Filter by Topic <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo21" class="collapse grey lighten-2" role="tabpanel" aria-labelledby="headingTwo21"
                  data-parent="#accordionEx1">
                  <div class="card-body text-white">
                    
					 <div class="form-group">
							<b>Comparea :</b> 
							
							                     <select class="form-control" id="lisddiffcompsaccor" style="display:block !important" onchange="getallthetopisbvacco(this.value)"  searchable="Search here.." >
  

</select>
			

					  </div>
					  
					   <div class="form-group">
							<b>Topic :</b> 
							
							   <?php  if ($this->request->getSession()->read('sessionname2') == 3 || $this->request->getSession()->read('sessionname2') == 4) { ?>
							                     <select class="form-control" id="lisdifftopivsacco"  onchange="calendarviewforadmin(this.value,'topic')" style="display:block !important"  searchable="Search here.." >

				   <?php } else { ?>
							                     <select class="form-control" id="lisdifftopivsacco"  onchange="calendarfilter(this.value,'topic')" style="display:block !important"  searchable="Search here.." >

				   
				   <?php } ?>
							
  

</select>


			

					  </div>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header grey lighten-2" role="tab" id="headingThree31">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                    aria-expanded="false" aria-controls="collapseThree31">
                    <h5 class="mb-0">
                     Filter by Event Type  <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree31" class="collapse grey lighten-2" role="tabpanel" aria-labelledby="headingThree31"
                  data-parent="#accordionEx1">
                  <div class="card-body text-white">
				  
				    <?php  if ( $this->request->getSession()->read('sessionname2') == 3 || $this->request->getSession()->read('sessionname2') == 4 ) { ?>
                      <select name="color"  class="form-control" id="nfkvdslkfkc" onchange="calendarviewforadmin(this.value,'types')" required style="display:block !important">

				   <?php } else { ?>
				                         <select name="color"  class="form-control" id="nfkvdslkfkc" onchange="calendarfilter(this.value,'types')" required style="display:block !important">



				   
				   <?php } ?>
				   
                             <option value="">Select the option</option>
							 				    <?php  if ( $this->request->getSession()->read('sessionname2') == 3 || $this->request->getSession()->read('sessionname2') == 4 ) { ?>
<option value="ONLINECLASS">Online classes</option>
				   <?php } else { ?>
				   <option value="OC">Online classes</option>
				   				   <?php } ?>


							   
							     <option value="EE">Job Test</option>
								   <option value="SEM">On Campus Classes</option>
								   
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								<option value="Recordings">Recordings</option>
								<option value="Assignment">Assignment</option>
								<option value="Internals">Internals</option>
                              <option value="MidtermExamination">Midterm Examination</option>
<option value="SemesterExamination">Semester Examination</option>
<option value="CampusPlacement">Campus Placement</option>
<option value="OffCampusPlacement">Off Campus Placement</option>
<option value="ProjectDiscussion">Project Discussion</option>
                            </select> 
					
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->
                       









                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>
		
		<script>
		 function loadcompareadforaccor()
    {
	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopics.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#lisddiffcompsaccor').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#lisddiffcompsaccor").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#lisddiffcompsaccor").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    }
	
		function getallthetopisbvacco(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#lisdifftopivsacco').html(selOpts);
                    }
                });
		
	}
		</script>
		
					<div id="listallgroupsandcomscomsacadmin" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Marks Card <button onclick="addmarkscard()" type="button" class="btn ">Add</button>
</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        
  <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="loadtargetsforstudentssacadmin" >
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                       
                                        <th >Type	</th>
                                        <th id="levelv">Comparea</th>
                                     <th id="levelv">Topic</th>
  <th id="levelv">Score</th>
  <th id="levelv">Passing Score</th>
<th id="levelv">Max Score</th>
  <th id="levelv">Status</th>
    <th id="levelv">Remove</th>
                                    </tr>
                                </thead>

                            </table>
</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
		 <div id="inscalendartabneaevehjhjjads" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Marks</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return savemarksforadmin()')) ?>

                       <div class="form-group">
							<b>Type <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="markstype" onchange="getallthetopisbvnew(this.value)" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="Sessional 1">Sessional 1</option>
								<option value="Sessional 2">Sessional 2</option>
								<option value="Sessional 3">Sessional 3</option>
								<option value="Mid Term">Mid Term</option>
								<option value="End Semester">End Semester</option>
                              <option value="Univ Exam">Univ Exam</option>

                            </select>                      
			
                        </div>
						
 <div class="form-group">
							<b>Score <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'marksscore','onkeypress' => "return isNumberKeydlot(event)", 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						 <div class="form-group">
							<b>Passscore <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'markapssing','autocomplete' => 'off','onkeypress' => "return isNumberKeydlot(event)",'label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
							 <div class="form-group">
							<b>Maxscore <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('Maxscore',array('id' => 'markssmax','autocomplete' => 'off','onkeypress' => "return isNumberKeydlot(event)",'label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						 <div class="form-group">
							<b>Comparea <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="listofmarkscom" required style="display:block !important" onchange="getallthetopisbvmarkss(this.value)"  searchable="Search here.." >
  

</select>
			

					  </div>
					  
					   <div class="form-group">
							<b>Topic <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="listdoftopicsmarks"  required style="display:block !important"  searchable="Search here.." >
  

</select>


			

					  </div>
					  <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>
					  
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		 
		 <script language="Javascript">
       
       function isNumberKeydlot(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
      
    </script>
		
		<script>
function loadscorwcardtabcomps()
    {
	
	if( '<?php echo $this->request->getSession()->read('sessionname2'); ?>' == 4)
	{
	
	//alert('<?php echo $this->request->getSession()->read('fcomps'); ?>');

	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopicsformarkscomps.php",
            type: 'post',
			 data: {
                       compid: '<?php echo $this->request->getSession()->read('fcomps'); ?>'
                       

				  },
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#listofmarkscom').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#listofmarkscom").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#listofmarkscom").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
	}
	else {
	
	
	//alert('<?php echo $this->request->getSession()->read('fcomps'); ?>');

	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopicsformarks.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#listofmarkscom').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#listofmarkscom").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#listofmarkscom").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
		
		}
    }
	




		function getallthetopisbvmarkssattandace(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.id+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#attandancetopiocs').html(selOpts);
                    }
                });
		
	}
		function getallthetopisbvmarkss(a)
	{
	
		
		
		
		    var url             =   urlmainsite+'cmd/loadtopicsall.php';
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                       depart : a
                   },
                   dataType: 'json',
                   success:function(data)
                    {
					//console.log(data);
  var selOpts = "";
  
  	if(data.length > 0){
		selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.id+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
					
					//alert(selOpts);
					//console.log(selOpts);
						
                       $('#listdoftopicsmarks').html(selOpts);
                    }
                });
		
	}
</script>

<div id="listallgroupsandcomscomsacadminvvv" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="markscardmodalal">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Marks Card
</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        
  <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="loadthhhargetsforstudentssacadmin" >
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                       
                                        <th >Type	</th>
                                        <th id="levelv">Comparea</th>
                                     <th id="levelv">Topic</th>
  <th id="levelv">Score</th>
  <th id="levelv">Passing Score</th>
<th id="levelv">Max Score</th>
  <th id="levelv">Status</th>
                                    </tr>
                                </thead>

                            </table>
</div>

                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		<script>
function deletetargetsforstudentmark(id)
{
var r = confirm('Are you sure to delete?');
if (r == true) {



 url=  urlmainsite+'sms/deletemarkscards.php';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : id
                   },
                   dataType: 'text',
				   beforeSend: function() {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					 $('#loadtargetsforstudentssacadmin').DataTable().ajax.reload();

					     
					
                    }
                });


 
} else {
  
}
}
</script>
		<script>
		    function loadstudentsforadmattandave()
    {
	  var getg = document.getElementById("loggesingroupid").value; 
	  
	  if( '<?php echo $this->request->getSession()->read('sessionname2'); ?>' == 4)
	{
	 $.ajax({
            url: targeturl+'users/studentslistadmin',
            type: 'post',
            data: { cat_val : "", getgroups :  getg},
            dataType: 'json',
                    				   beforeSend: function(xhr) {
    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
		$("#loadstudentsforaat").html('<div id="doneloadingforstu"  class="d-flex align-items-center"><strong>Loading Student list. Please wait for a while...</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div>');

  },
            success:function(response){
			
			

                var len = response.data.length;
				
				
				
				response = response.data;

              loadhtml = '<div class="row" >';
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
					var regnumber = response[i]['regnumber'];
                   var name = response[i]['fname']+" "+response[i]['lname'];
					
				
			
             loadhtml += '<div class="col-md-3"><div class="form-check form-check-inline"><input type="checkbox" class="form-check-input"  name="attandenceforstu[]" value="'+id+'" id="kkmaterialInline1'+id+'"><label class="form-check-label" for="kkmaterialInline1'+id+'">'+name+'('+regnumber+')</label></div></div>';    
  
                 
                }
				loadhtml += '</div>';
				
				
				$("#loadstudentsforaat").html(loadhtml);
            }
        });
	}
	 else 
{
 $.ajax({
            url: targeturl+'users/studentslist',
            type: 'post',
            data: { cat_val : ""},
            dataType: 'json',
                    				   beforeSend: function(xhr) {
    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
	//$("#doneloadingforstu").show();
	
	$("#loadstudentsforaat").html('<div id="doneloadingforstu"  class="d-flex align-items-center"><strong>Loading Student list. Please wait for a while...</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div>');
	
	
	
  },
            success:function(response){
			
			

                var len = response.data.length;
				
				
				
				response = response.data;

              loadhtml = '<div class="row" >';
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
					var regnumber = response[i]['regnumber'];
                   var name = response[i]['fname']+" "+response[i]['lname'];
					
				
			
             loadhtml += '<div class="col-md-3"><div class="form-check form-check-inline"><input type="checkbox" class="form-check-input" id="kkmaterialInline1'+id+'"><label class="form-check-label" for="kkmaterialInline1'+id+'">'+name+'('+regnumber+')</label></div></div>';    
  
                 
                }
				loadhtml += '</div>';
				
				
				$("#loadstudentsforaat").html(loadhtml);
				
				//$("#doneloadingforstu").hide();
            }
        });
}	
 
	  

               
    }
		</script>
		<div id="attandacemnodalffor" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" id="chnagecloeidforticket">&times;</button>
                        <h4 class="modal-title" id="">Attendance <button onclick="dispalystudentattandance()" type="button" class="btn ">Add</button>
</h4>
                    </div>
                    <div class="modal-body">
					<div class="table-responsive">
                        
  <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" id="listofaatnedac" >
                                <thead style="background-color:#D3D3D3">
                                    <tr>
                                       
                                        <th >Type	</th>
                                        <th id="levelv">Comparea</th>
                                     <th id="levelv">Topic</th>
  <th id="levelv">Start date time</th>
  <th id="levelv">End date time</th>
    <th id="levelv">Remove</th>

                                    </tr>
                                </thead>

                            </table>

</div>
                    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 

<div id="Attendancemodal" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Attendance</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return onlineclasssaveinfofattandace()')) ?>



<div class="row">
    <div class="col-4"> <div class="form-group">
							<b>Type <span style="color:red">*</span>:</b> 
			
			    <select name="color"  class="form-control" id="attendancetype" onchange="getallthetopisbvnew(this.value)" required style="display:block !important">
                             <option value="">Select the option</option>
							 <option value="On Campus Class">On Campus Class</option>
							 <option value="Online class">Online class</option>
							 <option value="Job Test">Job Test</option>
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								<option value="Recordings">Recordings</option>
								<option value="Assignment">Assignment</option>
								<option value="Internals">Internals</option>
                              <option value="MidtermExamination">Midterm Examination</option>
<option value="SemesterExamination">Semester Examination</option>
<option value="CampusPlacement">Campus Placement</option>
<option value="OffCampusPlacement">Off Campus Placement</option>
<option value="ProjectDiscussion">Project Discussion</option>
                            </select>  
			
                        </div></div>
    <div class="col-4"> <div class="form-group">
							<b>Comparea <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="attandancecompare" required style="display:block !important" onchange="getallthetopisbvmarkssattandace(this.value)"  searchable="Search here.." >
  

</select>
			

					  </div></div>
    <div class="col-4"> <div class="form-group">
							<b>Topic <span style="color:red">*</span>:</b> 
							
							                     <select class="form-control" id="attandancetopiocs"  required style="display:block !important"  searchable="Search here.." >
  

</select>


			

					  </div></div>
  </div>

  <div class="row">
    <div class="col-sm-4">  
					  <div class="form-group">
		            <b>From Date Time <span style="color:red">*</span>:</b> 
<?= $this->Form->control('startdate',array('label' => false,'class' => 'form-control atatndnacestartdate' ,'id' => 'atatdnavcestartdate','required'=>'required','onkeydown'=>'return false')); ?>

                                              

  <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.atatndnacestartdate').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
});
                                                            </script>

                        </div></div>
    <div class="col-sm-4"><div class="form-group">
						<b>To Date Time <span style="color:red">*</span>:</b> 
		    
  <?= $this->Form->control('enddate',array('label' => false,'class' => 'form-control attndnaceenddate' ,'id' => 'attendanceendtaer','required'=>'required','onkeydown'=>'return false')); ?>

                                              

                                                          
                                                              <script>
                                                              jQuery(document).ready(function($) {
    if (window.jQuery().datetimepicker) {
        $('.attndnaceenddate').datetimepicker({
            // Formats
            // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
            format: 'DD-MM-YYYY hh:mm A',
            
            // Your Icons
            // as Bootstrap 4 is not using Glyphicons anymore
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }
});
                                                            </script>

                        </div></div>
    <div class="col-sm-4"><b>Group(s) <span style="color:red">*</span>:</b> 

                            <select name="groupname"  class="form-control" id="aastudentsgroupsclassf2f" onchange="loadinggroupwqisestdie(this.value)" required style="display:block !important">
							<option value="">Select the Group</option>
							<?php foreach($studentgroups as $st) { ?>
                                <option value="<?php echo $st['id']; ?>"><?php echo $st['name']; ?></option>
                               <?php } ?>

                            </select>   </div>
  </div>
  
    <!-- Card -->
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
            <div class="media">
			
			
				   
			<div id="loadstudentsforaat"></div>	   
				   
				   
 
    
 
          
            </div>
          </div>

        </div>
        <!-- Card -->


                   
						

						
					  
					  
					
						
					  <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>
					  
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 
		
							  <script>
function loadcomparaedfoattewndance()
    {
	
	if( '<?php echo $this->request->getSession()->read('sessionname2'); ?>' == 4)
	{
	
	//alert('<?php echo $this->request->getSession()->read('fcomps'); ?>');

	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopicsformarkscomps.php",
            type: 'post',
			 data: {
                       compid: '<?php echo $this->request->getSession()->read('fcomps'); ?>'
                       

				  },
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#attandancecompare').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#attandancecompare").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#attandancecompare").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
	}
	else {
	
	
	//alert('<?php echo $this->request->getSession()->read('fcomps'); ?>');

	
                $.ajax({
           // url: urlmainsite+"cmd/loadtopicsall.php",
		   url: urlmainsite+"cmd/loadtopicsformarks.php",
            type: 'post',
           
            dataType: 'json',
                    				   beforeSend: function() {
    $('#attandancecompare').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
  },
            success:function(response){

                var len = response.length;
				//alert(len);

                $("#attandancecompare").append('<option value="" disabled selected>Select the Comparea</option>');
                for( var i = 0; i<len; i++){
                    var id = response[i]['idrow'];
                    var name = response[i]['name'];
                  //  console.log(name);
                    $("#attandancecompare").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
		
		}
    }
	
	</script>
<script>
function loadinggroupwqisestdie(getg)
    {
	$.ajax({
            url: targeturl+'users/studentslistadmin',
            type: 'post',
            data: { cat_val : "", getgroups :  getg},
            dataType: 'json',
                    				   beforeSend: function(xhr) {
    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
		$("#loadstudentsforaat").html('<div id="doneloadingforstu"  class="d-flex align-items-center"><strong>Loading Student list. Please wait for a while...</strong><div class="spinner-border ml-auto" role="status" aria-hidden="true"></div></div>');

  },
            success:function(response){
			
			

                var len = response.data.length;
				
				
				
				response = response.data;

              loadhtml = '<div class="row" >';
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
					var regnumber = response[i]['regnumber'];
                   var name = response[i]['fname']+" "+response[i]['lname'];
					
				
			
             loadhtml += '<div class="col-md-3"><div class="form-check form-check-inline"><input type="checkbox" name="attandenceforstu[]" value="'+id+'" class="form-check-input" id="kkmaterialInline1'+id+'"><label class="form-check-label" for="kkmaterialInline1'+id+'">'+name+'('+regnumber+')</label></div></div>';    
  
                 
                }
				loadhtml += '</div>';
				
				
				$("#loadstudentsforaat").html(loadhtml);
            }
        });

               
    }
</script>
<script>

function onlineclasssaveinfofattandace()
{

var output = jQuery.map($(':checkbox[name=attandenceforstu\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');

//alert(output);


                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/saveattendancedeatils.php',
                    data: {
                       
                        attendancetype: $("#attendancetype").val(), 
						attandancecompare: $('#attandancecompare option:selected').text(),
						attandancecompareval: $("#attandancecompare").val(),
						attandancetopiocs: $('#attandancetopiocs option:selected').text(),
						attandancetopiocscal: $("#attandancetopiocs").val(),
						atatdnavcestartdate: $("#atatdnavcestartdate").val(),
                   attendanceendtaer: $("#attendanceendtaer").val(),group: $("#aastudentsgroupsclassf2f").val()
				   ,attandenceforstu: output,
				   loggeduserid : '<?php echo $this->request->session()->read('sessionname'); ?>'

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#Attendancemodal").modal('hide');


                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;
}
</script>

<script>
function deletetargetsforstudentttendcenew(id)
{
var r = confirm('Are you sure to delete?');
if (r == true) {



 url=  urlmainsite+'sms/deletevideosga.php';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : id 
                   },
                   dataType: 'text',
				   beforeSend: function() {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					displayvideogalleey();

					     
					
                    }
                });


 
} else {
  
}
}
function deletetargetsforstudentttendce(id)
{
var r = confirm('Are you sure to delete?');
if (r == true) {



 url=  urlmainsite+'sms/deleteattendace.php';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : id ,userid : $("#useridforrownewd").val()
                   },
                   dataType: 'text',
				   beforeSend: function() {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					 $('#listofaatnedac').DataTable().ajax.reload();

					     
					
                    }
                });


 
} else {
  
}
}
</script>


 <div id="modalforfileegtnew" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="eventcolorlegndl">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >EVENT COLOR LEGEND</h4>
                    </div>
                    <div class="modal-body">
					<table class="table-bordered" width="100%" style="text-align:center;    border-spacing: 2px;
">
  <thead>
    <tr>
     
      <th scope="col">Color</th>
      <th scope="col">Type</th>
      
    </tr>
  </thead>
  <tbody>
    <tr >
      <td style="background-color:#82D1D8"></td>
      <td>Online class</td>
    </tr>
    <tr>
        <td style="background-color:#61B7C8"></td>
      <td>Job Test</td>
    </tr>
    <tr>
      <td style="background-color:#5CB6B6"></td>
      <td>On Campus Class</td>
    </tr>
	 <tr>
      <td style="background-color:#99CCD0"></td>
      <td>Seminar</td>
    </tr>
	 <tr>
      <td style="background-color:#9EADD6"></td>
      <td>Webinar</td>
    </tr>
	 <tr>
      <td style="background-color:#817BB7"></td>
      <td>Recordings</td>
    </tr>
	 <tr>
      <td style="background-color:#4E8896"></td>
      <td>Assignment</td>
    </tr>
	 <tr>
      <td style="background-color:#69ABB9"></td>
      <td>Internals</td>
    </tr>
	 <tr>
      <td style="background-color:#DAC6BD"></td>
      <td>Midterm Examination</td>
    </tr>
	 <tr>
      <td style="background-color:#A8626A"></td>
      <td>Semester Examination</td>
    </tr>
	 <tr>
      <td style="background-color:#EECBFF"></td>
      <td>Campus Placement</td>
    </tr>
	 <tr>
      <td style="background-color:#FEFFA3"></td>
      <td>Off Campus Placement</td>
    </tr>
	 <tr>
      <td style="background-color:#DBDCFF"></td>
      <td>Project Discussion</td>
    </tr>
  </tbody>
</table>
					
					</div>
					
					</div>
					</div>
					</div>
					
					<script>
					
					function displayvideogalleey1111(a,b){
					if(b=='category')
					{
					$("#videocategory").val(b);
					url = urlmainsite+'sms/getvideocoitn1.php';
		$.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      filter : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
                       
  },
                   success:function(data)
                    {
					
					//alert(data);
                       $("#all").val(data);
					   
					   if(Number(data)<= 15)
					   {
					   $(".load-more").hide();
					   }
					   else
					   {
					   $(".load-more").show();
					   }
					   displayvideogalleeyneww(a,b);
					
                    }
                });
		}
					
					else if (b=='department')
					{
					$("#videocategory").val(b);
					url = urlmainsite+'sms/getvideocoitn2.php';
		$.ajax({
                   type:"POST",
                   url:url,
                   data:{
                     filter : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
                       
  },
                   success:function(data)
                    {
                       $("#all").val(data);
					    if(Number(data)<= 15)
					   {
					   $(".load-more").hide();
					   }
					   else
					   {
					   $(".load-more").show();
					   }
					  displayvideogalleeyneww(a,b);
					
                    }
                });
		}
					
					else{
		url = urlmainsite+'sms/getvideocoitn.php';
		$.ajax({
                   type:"POST",
                   url:url,
                   data:{
                     
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
                       
  },
                   success:function(data)
                    {
                       $("#all").val(data);
					    if(Number(data)<= 15)
					   {
					   $(".load-more").hide();
					   }
					   else
					   {
					   $(".load-more").show();
					   }
					   displayvideogalleeyneww();
					
                    }
                });
		}
		  
				}
					
					function displayvideogalleey(a,b)
					{
					$("#postvideos").html('');

					 if(b=='category' )
					{
					$("#showallonlineclsnewff").show();
					
					
					  $.ajax({
                url: urlmainsite+"sms/fetch1.php",
                type: 'post',
                data: {start:0 , limit:10000 ,userrole : '<?php echo $usersrole; ?>', filter : a },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
					}
					else if(b=='department')
					{
						$("#showallonlineclsnewff").show();
					  	  $.ajax({
                url: urlmainsite+"sms/fetch2.php",
                type: 'post',
                data: {start:0 , limit:10000 ,userrole : '<?php echo $usersrole; ?>', filter : a },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
					 }
					 else 
					 {
					 	$("#showallonlineclsnewff").hide();
						 $("#modalforfileegtveid").modal('hide');
						
							$("#kkkkkk").val("");
							$("#kkkkkk1").val("");
					      $.ajax({
                url: urlmainsite+"sms/fetch.php",
                type: 'post',
                data: {start:0 , limit:10000 ,userrole : '<?php echo $usersrole; ?>' },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
					 }
					 /********************************************/
					       
        

     
					 /*******************************************/
 //var start = 0;
 // Load more data
  
  $("#modalforfileegtveid").modal('hide');
  
					$("#videogallery").modal({keyboard: false});
					}
					
					function displayvideogalleeyneww(a,b)
					{
					
					$("#postvideos").html('');
					 var limit = 15;
					  var allcount = Number($('#all').val());
        row = 0;
					 if(b=='category')
					{
					
					//alert(b);
					   if(row <= allcount){
            $("#row").val(15);

            $.ajax({
                url: urlmainsite+"sms/fetch1.php",
                type: 'post',
                data: {start:row , limit:limit ,userrole : '<?php echo $usersrole; ?>', filter : a },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
        }
					}
					else if(b=='department')
					{
					   if(row <= allcount){
            $("#row").val(15);

            $.ajax({
                url: urlmainsite+"sms/fetch2.php",
                type: 'post',
                data: {start:row , limit:limit ,userrole : '<?php echo $usersrole; ?>', filter : a },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
        }
					 }
					 else 
					 {
					    if(row <= allcount){
            $("#row").val(15);

            $.ajax({
                url: urlmainsite+"sms/fetch.php",
                type: 'post',
                data: {start:row , limit:limit ,userrole : '<?php echo $usersrole; ?>' },
                beforeSend:function(){
				
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){

               
$("#postvideos").append(response);
 $('.load-more').text("Load more");

                }
            });
        }
					 }
					 /********************************************/
					       
        

     
					 /*******************************************/
 //var start = 0;
 // Load more data
  
					$("#videogallery").modal({keyboard: false});
					}
					
					</script>
					
					 <div id="videogallery" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
						<?php if($usersrole == 2) { ?>
                        <h4 class="modal-title" >Video Gallery 							<button type="button" onclick="shwoaddeventsnewfiltersvideo()" class="btn ">FILTER</button>
							
							<button type="button" onclick="displayvideogalleey()" class="btn " style="display:none" id="showallonlineclsnewff">Show All</button>
							
							</h4>
						<?php } else if($usersrole == 3) { ?>
						  <h4 class="modal-title" id="">Video Gallery <button onclick="addmarkscardnew()" type="button" class="btn ">Add</button>
</h4>
<?php } ?>
						
						
						
                    </div>
                    <div class="modal-body">
					
					
					
					
					
                    <div class="row post" id="postvideos">
				
				 </div>


<!--<h1 class="load-more" >Load More</h1>-->
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" >
			
			 <input type="hidden" id="videocategory" >
			  <input type="hidden" id="videodepartment" >

             </div>
                
					
					</div>
					
					</div>
					</div>
					
					<script>
				

$(document).ready(function(){
 
  $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        limit = (row + 1) + 14;
		//limit = 3;

        if(row <= allcount){
            $("#row").val(limit);

            $.ajax({
                url: urlmainsite+"sms/fetch.php",
                type: 'post',
                data: {start:row + 1 , limit:limit,userrole : '<?php echo $usersrole; ?>' },
                beforeSend:function(){
				$(".load-more").show();
                    $(".load-more").text("Loading...");
                },
                success: function(response){
				
				
				$("#postvideos").append(response);
 $('.load-more').text("Load more");

                   


                }
            });
        }else{
          $('.load-more').hide();


        }

    });

 
});
</script>


<style>
.load-more{
text-align: center;
    cursor: pointer;
    font-size: 23px;
    font-weight: bold;
    border: 1px solid;
    padding: 7px;
    width: 148px;
    background: orange;
}
</style>
<div id="loadvedieoaddgva" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Video</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return savevideogalleery()')) ?>
 <div class="form-group">
							<b>Title <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videotittle', 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						
						
                       <div class="form-group">
							<b>Category <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videocategpy" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								

                            </select>                      
			
                        </div>
						  <div class="form-group">
							<b>Department <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videodepartment" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="All">All</option>
								<option value="ComputerScience">Computer Science</option>
								<option value="Mechanical">Mechanical</option>
								<option value="Electrical">Electrical</option>
								<option value="Electronics">Electronics</option>
								

                            </select>                      
			
                        </div>
						<div class="form-group">
						<b>Video URL <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videourl', 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						
						  <div class="form-group">
							<b>Vision <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videovisson" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="1">Enable</option>
								<option value="0">Disable</option>
								

                            </select>                      
			
                        </div>
						
 <div class="form-group">
							<b>Video Order <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videoorder','onkeypress' => "return isNumberKeydlot(event)", 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
					
					  <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>
					  
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 


		   
		    <div id="modalforfileegtveid" class="modal fade right" role="dialog">
            <div class="modal-dialog" id="modalboxesfiorfilter">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" >Filter</h4>
                    </div>
                    <div class="modal-body">



            <!-- Accordion wrapper -->
            <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
			
              <div class="card">

               
                <div class="card-header grey lighten-2" role="tab" id="headingTwo1">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1200"
                    aria-expanded="false" aria-controls="collapseTwo1200">
                    <h5 class="mb-0">
                      Filter by Department <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

               
                <div id="collapseTwo1200" class="collapse grey lighten-2" role="tabpanel" aria-labelledby="headingTwo1"
                  data-parent="#accordionEx1">
                  <div class="card-body text-white">
				   <select name="color"  class="form-control" id="kkkkkk"  onchange="displayvideogalleey(this.value,'department')" required style="display:block !important">
                             <option value="">Select the option</option>
                               
								<option value="ComputerScience">Computer Science</option>
								<option value="Mechanical">Mechanical</option>
								<option value="Electrical">Electrical</option>
								<option value="Electronics">Electronics</option>
								

                            </select>             
                 

				 </div>
                </div>

              </div>
			
              <!-- Accordion card -->

       

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header grey lighten-2" role="tab" id="headingThree31">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31200"
                    aria-expanded="false" aria-controls="collapseThree31200">
                    <h5 class="mb-0">
                     Filter by Category  <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree31200" class="collapse grey lighten-2" role="tabpanel" aria-labelledby="headingThree31"
                  data-parent="#accordionEx1">
                  <div class="card-body text-white">
				  
				 <select name="color"  class="form-control" id="kkkkkk1" onchange="displayvideogalleey(this.value,'category')" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								

                            </select>  
					
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->
                       









                    </div>
                    <!--  <!--<div class="modal-footer">
                         <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                     </div>-->
                </div>

            </div>
        </div>


<script>
function dispalyresouvcesgallerty()
{
  $.ajax({
                url: urlmainsite+"sms/fetchesoyuecs.php",
                type: 'post',
                data: {start:0 , limit:10000 ,userrole : '<?php echo $usersrole; ?>' },
                beforeSend:function(){
				$("#postvideosresouces").html("");
			
                    $(".load-more-rresouces").text("Loading...");
                },
                success: function(response){
$(".load-more-rresouces").hide();
               
$("#postvideosresouces").append(response);


                }
            });
$("#resourcesgallery").modal({keyboard: false});
}
</script>
	 <div id="resourcesgallery" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
						 <h4 class="modal-title" id="">Resources 
						 <?php if($usersrole == 3) { ?>
						 <button onclick="addmarkscardnewresouces()" type="button" class="btn ">Add</button>
						 <?php } ?>
						 </h4>
                    </div>
                    <div class="modal-body">
					
					<div class="load-more-rresouces"> </div>
					<div class="row" id="postvideosresouces"> </div>
					
				
					
                   
				
				 </div>




             </div>
                
					
					</div>
					
					</div>
					
					
					 <div id="resourcesgalleryvweie" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
						 <h4 class="modal-title" id="loadrsiycestitlr"><a  id="doanldreslk" type="button" class="btn" download>Download</a></h4>
                    </div>
                    <div class="modal-body">
					
					
				
				
				 <iframe id="urlforthemainusereeer" frameBorder="0" width="100%" height="700px" class="embed-responsive-item"></iframe>
					
                   
				
				 </div>




             </div>
                
					
					</div>
					
					</div>
					<script>
					function deletetargetsforstudentttendcenewresouu(id)
{
var r = confirm('Are you sure to delete?');
if (r == true) {



 url=  urlmainsite+'sms/delertresii.php';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : id 
                   },
                   dataType: 'text',
				   beforeSend: function() {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					dispalyresouvcesgallerty();

					     
					
                    }
                });


 
} else {
  
}
}
function loadfilesforres(a,b)
{

$("#loadrsiycestitlr").html(b);
document.getElementById('urlforthemainusereeer').src = a;


		$("#doanldreslk").attr("href", a);

					
					$("#resourcesgalleryvweie").modal({keyboard: false});
}
</script>
<div id="loadvedieoaddgvaresor" class="modal fade right" role="dialog">
            <div class="modal-dialog" >

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Resources</h4>
                    </div>
                    <div class="modal-body">
	
                        <?= $this->Form->create(null, array('action' => '/saveonlineclassdetails/','onsubmit'=>'return savevideogalleeryress()')) ?>
 <div class="form-group">
							<b>Title <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videotittler', 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						
						
                       <div class="form-group">
							<b>Category <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videocategpyr" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="Seminar">Seminar</option>
								<option value="Webinar">Webinar</option>
								

                            </select>                      
			
                        </div>
						  <div class="form-group">
							<b>Department <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videodepartmentr" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="All">All</option>
								<option value="ComputerScience">Computer Science</option>
								<option value="Mechanical">Mechanical</option>
								<option value="Electrical">Electrical</option>
								<option value="Electronics">Electronics</option>
								

                            </select>                      
			
                        </div>
						<div class="form-group">
						<b>Resource URL <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videourlr', 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						<div class="form-group">
						<b>Resource Preview URL Path <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('filepreview_image',array('id' => 'videourlrr', 'autocomplete' => 'off','value'=>'https://nsms.odinlearning.in/img/1024px-Text-x-generic.svg.png','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
						
						  <div class="form-group">
							<b>Vision <span style="color:red">*</span>:</b> 
			
			   <select name="color"  class="form-control" id="videovissonr" required style="display:block !important">
                             <option value="">Select the option</option>
                                <option value="1">Enable</option>
								<option value="0">Disable</option>
								

                            </select>                      
			
                        </div>
						
 <div class="form-group">
							<b>Resource Order <span style="color:red">*</span>:</b> 
			<?= $this->Form->control('title',array('id' => 'videoorderr','onkeypress' => "return isNumberKeydlot(event)", 'autocomplete' => 'off','label' => false,'class' => 'form-control' ,'required' => 'required' )); ?>
                        </div>
					
					  <button type="submit" class="btn ">Save</button>

												   <?= $this->Form->end(); ?>
					  
					    </div>
                    <!--<div class="modal-footer">
                      <button type="button" class="btn  -another" data-dismiss="modal">Close</button>
                    </div>-->
                </div>

            </div>
        </div> 