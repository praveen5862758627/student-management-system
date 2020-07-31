<?php 
use Cake\Core\Configure;
Configure::load('myconfig');


?>
<style>
.vertical-divider {
  position: absolute;
  z-index: 10;
  top: 50%;
  left: 33%;
  margin: 0;
  padding: 0;
  width: auto;
  height: 50%;
  line-height: 0;
  text-align:center;
  text-transform: uppercase;
  transform: translateX(-50%);
}

.vertical-divider:before, 
.vertical-divider:after {
  position: absolute;
  left: 33%;
  content: '';
  z-index: 9;
  border-left: 1px solid rgba(34,36,38,.15);
  border-right: 1px solid rgba(255,255,255,.1);
  width: 0;
  height: calc(100% - 1rem);
}

.row-divided > .vertical-divider {
  height: calc(50% - 1rem);    
}

.vertical-divider:before {
  top: -102%;
}

.vertical-divider:after {
  top: auto;
  bottom: 0;
}

.row-divided {
  position:relative;
}

.row-divided > [class^="col-"],
.row-divided > [class*=" col-"] {
  padding-left: 30px;  /* gutter width (give a little extra room) 2x default */
  padding-right: 30px; /* gutter width (give a little extra room) 2x default */
}




/* just to set different column heights - not needed to function */          
.column-one {
  height: 300px; 
 // background-color: #EBFFF9;
}
.column-two {
  height: 400px;
 // background-color: #F7F3FF;
}
</style>
<script type="text/javascript">
    
    function likethisuser(userid,studentid,type,inscode){
	
	//$('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
	url = urlmainsiteaapi+'ic/likeunlike.php';
	if(type == 1){
	
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      userid : userid,studentid:studentid,type:type,inscode:inscode
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
    // xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
						console.log(data);
						$("#likebutton"+userid).html('<button type="button"  class="btn btn-danger px-3" onclick=\'likethisuser('+userid+','+studentid+',2,"'+inscode+'")\'  title="Unlike this Speaker"><i class="far fa-thumbs-down" aria-hidden="true" style="font-size: 20px;"></i></button>');
                     // toastr.success('');
					     //$('#loadacdemicdd1').DataTable().ajax.reload();
					
                    },
                  error: function(xhr, status, error) 
            {
			toastr.success(xhr.responseText);
            }
                });

	

	}
	else
	{
			  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      userid : userid,studentid:studentid,type:type,inscode:inscode
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
    // xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
						console.log(data);
						$("#likebutton"+userid).html('<button type="button"  class="btn btn-success px-3" onclick=\'likethisuser('+userid+','+studentid+',1,"'+inscode+'")\'  title="Like this Speaker"><i class="far fa-thumbs-up" aria-hidden="true" style="font-size: 20px;"></i></button>');
					
                    },
                      error: function(xhr, status, error) 
            {
			toastr.success(xhr.responseText);
            }
                });
		

	}
}
    
		function applicablepostgraduation(){
		
		if($('input[name="ffffnmkfbkjasfljdfjags"]').is(':checked'))
{
  // checked
  
  //alert("checked");
  $("#postygarduatoionchec").show();
  
}else
{
 // unchecked
 //alert("unchecked");
  $("#postygarduatoionchec").hide();
}
	
}	
 
    function removefromappliedproject(userid,type,studentid,projectid,inscode)
{
if(type == 2 || type == 3)
{
	
	//url = targeturl+'Users/applyprojectdetailsdelete/';
    
    url =  urlmainsiteaapi+'ic/deleteprojectjos.php',
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      userid : userid,studentid:studentid,type:type,projectid:projectid,inscode:inscode
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                        console.log(data);
						toastr.success(data);
						if(type == 2)
{
						$('#appliedprojects').DataTable().ajax.reload();
}
else
{
	$('#appliedprojects').DataTable().ajax.reload();
}
					
                    }
                });
	
}
}
    
    function listofappliedprojects()
{

	     $('#appliedprojects').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listofappliedprojects.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "desctription" },
        { "data": "definition" },
        { "data": "type" },
		 { "data": "action" }
 
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );

}
function listofstudentsappliedforpeojects()
{

	     $('#listofstudentsappliedforjob').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listofappliedprojectsbystudents.php',
    "type": "POST",
	"data":{
                      insidforic : document.getElementById("insidforic").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
      { "data": "studentname" },
		 { "data": "studentemailaddress" },
		  { "data": "type" },
   { "data": "desctription" },
        { "data": "definition" }
    
 
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );

$("#appliedprojectlist").modal({keyboard: false});

}
		
		
				function showlistoflikesmentor()
		{
						     $('#likesspeakerbystu').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/studentslikes.php',
    "type": "POST",
	"data":{
                     // useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value ,collgedomainkey : collgedomainkey
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "username" },
   { "data": "contactdetails" },
    { "data": "moreinfo" },
   { "data": "liekstab" }
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );

$("#listofspeakerlikes").modal({keyboard: false});


		}
    
    function listofappliedjobs()
{

	     $('#appliedjblist').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listofappliedjobs.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "comopanyname" },
        { "data": "jobtitle" },
        { "data": "jobdescription" },
		 { "data": "jobenddate" },
		 
		   { "data": "appliedforjobdate" },
		    { "data": "status" },
		    { "data": "statusprocesseddate" }
 
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6]}
  ],
   
} );

}
		function statusofapploiedjobs()
		{
						     $('#appliedjblist').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listofappliedjobsbystatus.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value ,collgedomainkey : collgedomainkey
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "studentname" },
   { "data": "comopanyname" },
        { "data": "jobtitle" },
        { "data": "jobdescription" },
		 { "data": "jobenddate" },
		 
		    { "data": "applieddate" },
			 { "data": "status" },
			  { "data": "proceeseddate" },
		   { "data": "viewcv" }
 
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6]}
  ],
   
} );

$("#jobslistbysyatus").modal({keyboard: false});


		}
		function checkboxcheckedforsubs(a)
		{
		
		
		  var checkBox = document.getElementById("materialUnchecked"+a);
 
  if (checkBox.checked == true){
  
  //alert("checked");
  
  url = targeturl+'Users/updatevebnts/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : 1,type : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       //toastr.success(data);
					     updateinsdetailsins(1,a);
					
                    }
                });
 
   
  } else {
   //alert("not checked");
    url = targeturl+'Users/updatevebnts/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : 0,type : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       //toastr.success(data);
					      updateinsdetailsins(0,a);
					     
					
                    }
                });
    
  }
		}
		
		
function  updateinsdetailsins(cat_val,type)
{

/*alert(cat_val);
alert(type);
alert(document.getElementById("sessionemail").value);*/

 $.ajax({
                   type:"POST",
                   url:urlmainsiteaapi+'ic/insemaildetaills.php',
                   data:{
                      cat_val : cat_val , type :type , email : document.getElementById("sessionemail").value
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					
					
					   
					   /* $('#'+id).html(data);
					    */
						//$('#collegelistnamejbss').DataTable().ajax.reload();
						
						if(data ==0)
						{
						 toastr.error('Error in updating record. Please reach out to IC admin to update your details.');
						 }
						 else{
						 toastr.success('Event status has been changed.');
						 }
					
                    }
                });
    

}		
		
		
		function shojobslist(a)
		{
		
	     $('#jobslistcou').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/lisofjobs.php',
    "type": "POST",
	"data":{
                      cat_val : a,useridforic : "",insidforic : "" , getuserfname : ""
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "name" },
        { "data": "description" },
        { "data": "jobenddate" },
    { "data": "noofposition" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );

$("#jobslist").modal({keyboard: false});
		}
		
		
				function listofcompaniesnew()
{

	     $('#collegelistnamenew').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listcompanies.php',
    "type": "POST",
	"data":{
                     // cat_val : b, getgroups :  getg
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;display:block" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "name" },
       // { "data": "url" },
        { "data": "actionview" }
    
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );

$("#listofcolleges").modal({keyboard: false});

}
    
    function shojobslistcom(a)
		{
		$("#butonbacj").show();
		
		$("#collegelistnameic").hide();
		
		$("#jobslistcouic").show();
		
		var table = $('#collegelistnameic').DataTable();
		table.destroy();
		
		
	     $('#jobslistcouic').DataTable( {
	"order": [[ 4, "asc" ]],
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/lisofjobs.php',
    "type": "POST",
	"data":{
                      cat_val : a,useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value , getuserfname : document.getElementById("getuserfname").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "name" },
        { "data": "description" },
        { "data": "jobenddate" },
    { "data": "noofposition" },
	{ "data": "applyjob" }
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );

//$("#jobslist").modal({keyboard: false});
		}
    
    function applyjob(jobid,companyid,name)
{



 // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsiteaapi+'ic/appllyforjob.php',
                   data:{
                      jobid : jobid ,name : name , companyid :companyid ,useridforic : document.getElementById("useridforic").value,insidforic : document.getElementById("insidforic").value
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
   //  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					   
					   /* $('#'+id).html(data);
					    */
						$('#jobslistcouic').DataTable().ajax.reload();
						 toastr.success(data);
					
                    }
                });

}
    function listofcompaniesicic()
{

$("#butonbacj").hide();


	$("#collegelistnameic").show();
		
		$("#jobslistcouic").hide();
		
		var table = $('#jobslistcouic').DataTable();
		table.destroy();

$("#jobslistcouic").hide();
	     $('#collegelistnameic').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listcompanies.php',
    "type": "POST",
	"data":{
                     // cat_val : b, getgroups :  getg
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;display:block" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "name" },
       // { "data": "url" },
        { "data": "actionview" }
    
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );

$("#industryconnectmodal").modal({keyboard: false});

}
		
		function listofcompanies()
{

	     $('#collegelistname').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listcompanies.php',
    "type": "POST",
	"data":{
                     // cat_val : b, getgroups :  getg
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;display:block" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
   { "data": "name" },
       // { "data": "url" },
        { "data": "actionview" }
    
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );

//$("#listofcolleges").modal({keyboard: false});

}
		
		function ControlChanges(a,b)
		{
		
			
			$("#"+a+"editbutton"+b).css('background-color','green');
			
		}
		function deleteacademicedetails(a)
		{
		
		url = targeturl+'Users/deleterowacemic/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					     $('#loadacdemicdd').DataTable().ajax.reload();
					
                    }
                });
		}
		
			function deleteacademicedetailsgrad(a)
		{
		
		url = targeturl+'Users/deleterowacemicgrad/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					     $('#loadacdemicdd1').DataTable().ajax.reload();
					
                    }
                });
		}
		function showacademicdetails()
		{
		 $('#loadacdemicdd').DataTable( {
		 
	 paging: false,
   ordering: false,
   searching: false,
	 "bInfo" : false,
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/deleteacademicdetailslist',
    "type": "POST",
	"data":{
                 // cat_val : a
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
  
  "columns": [
  { "data": "type" },
  { "data": "name" },
  { "data": "actiondel" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );



	 $('#loadacdemicdd1').DataTable( {
		 
	 paging: false,
   ordering: false,
   searching: false,
	 "bInfo" : false,
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/deleteacademicdetailslistgrad',
    "type": "POST",
	"data":{
                 // cat_val : a
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  

  "columns": [
  { "data": "type" },
  { "data": "name" },
  { "data": "actiondel" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );

$("#loadacdemicdetails").modal({keyboard: false});

		}
 function fun_AllowOnlyAmountAndDot(txt)
        {
            if(event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46)
            {
               var txtbx=document.getElementById(txt);
               var amount = document.getElementById(txt).value;
               var present=0;
               var count=0;

               if(amount.indexOf(".",present)||amount.indexOf(".",present+1));
               {
              // alert('0');
               }

              if(amount.length==2)
              {
                if(event.keyCode != 46)
                return false;
              }
               do
               {
               present=amount.indexOf(".",present);
               if(present!=-1)
                {
                 count++;
                 present++;
                 }
               }
               while(present!=-1);
               if(present==-1 && amount.length==0 && event.keyCode == 46)
               {
                    event.keyCode=0;
                    //alert("Wrong position of decimal point not  allowed !!");
                    return false;
               }

               if(count>=1 && event.keyCode == 46)
               {

                    event.keyCode=0;
                    //alert("Only one decimal point is allowed !!");
                    return false;
               }
               if(count==1)
               {
                var lastdigits=amount.substring(amount.indexOf(".")+1,amount.length);
                if(lastdigits.length>=2)
                            {
                              //alert("Two decimal places only allowed");
                              event.keyCode=0;
                              return false;
                              }
               }
                    return true;
            }
            else
            {
                    event.keyCode=0;
                    //alert("Only Numbers with dot allowed !!");
                    return false;
            }
			
			
	

        }
		
		

		


    </script>

		 	<script>
			function shownotifications()
			{
			$("#noticationsdialo").modal({keyboard: false});
			}
			
					function onsubmitchangepassword()
{
 $.ajax({
                   type:"POST",
                   url:targeturl+'Users/changepass/',
                   data:{
				    password_check : $("#mypassowrdprofile1").val(),password_new : $("#mypassowrdprofile2").val(), password_newconfirm : $("#mypassowrdprofile3").val()
					
		
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					if(data == 1)
					{
					 toastr.success('Your password has been successfully updated. Please login with your new login information.');
					 
					  setTimeout(function () {
window.location = targeturl+'Users/login/';
  
}, 3000)
					}
					else
					{
                       toastr.error(data);
					   }
					    
					
                    }
                });
				 return false;
}
			
			
			function savestudeyduartions()
{
 $.ajax({
                   type:"POST",
                   url:targeturl+'Users/adduserstudyhours/',
                   data:{
				    sunday : $("#sunday").val(),monday : $("#monday").val(), tuesday : $("#tuesday").val(),wednesday : $("#wednesday").val(), thursday : $("#thursday").val(),friday : $("#friday").val(), saturday : $("#saturday").val()
		
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					if(data == 1)
					{
					 toastr.error('Study hours can`t be 0.  Please, try again.');
					}
					else
					{
                       toastr.success(data);
					   }
					    
					
                    }
                });
				 return false;
}
			
			
			
function validateprefrencessettings()
{

yearfrom1 = $("#date-picker-example11").val();
yearfrom2 = $("#date-picker-example111").val();
yearfrom3 = $("#date-picker-example22").val();
yearfrom4 = $("#date-picker-example222").val();
yearfrom5 = $("#date-picker-example33").val();
yearfrom6 = $("#date-picker-example333").val();
yearfrom7 = $("#date-picker-example44").val();
yearfrom8 = $("#date-picker-example444").val();

years = yearfrom1+','+yearfrom2+','+yearfrom3+','+yearfrom4+','+yearfrom5+','+yearfrom6+','+yearfrom7+','+yearfrom8;

 $.ajax({
                   type:"POST",
                   url:targeturl+'Preferencesquestion/add/',
                   data:{
				   
				   question1 : $("input[name=question1]:checked").val(),question2 : $("input[name=question2]:checked").val(),question3 : $("input[name=question3]:checked").val(),question4 : $("input[name=question4]:checked").val(),question5 : $("input[name=question5]:checked").val(),question6 : $("input[name=question6]:checked").val(),question7 : $("input[name=question7]:checked").val()
				   ,question10 : $("input[name=question10]:checked").val(),question11 : years,question12 : $("input[name=question12]:checked").val(),question13 : $("input[name=question13]:checked").val(),question9 : $("input[name=question9]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
				 return false;
}			
			
													function validatephoinenum(){
													var name = $("#phpnenumbeforstude").val(); 
													
													var name1 = $("#phpnenumbeforstudeal").val(); 
													
													var name2 = $("#alternateemail").val(); 
													
													
													var name5 = $("#citystudent").val(); 
													var name6 = $("#date-picker-example").val(); 




if (name.length != 10 && "<?php echo Configure::read('Myprofile_personal_mandatory.phone_primary'); ?>" == 1 && "<?php echo Configure::read('Myprofile_personal.phone_primary'); ?>" == 1) {
    toastr.error("Please enter the valid phone number.");
	document.getElementById("phpnenumbeforstude").focus();
    return false;
}

else if ((name6.length == 0 || name6 == 0) && "<?php echo Configure::read('Myprofile_personal_mandatory.dob'); ?>" == 1 && "<?php echo Configure::read('Myprofile_personal.dob'); ?>" == 1 ) {
    toastr.error("Please choose your date of birth.");
	document.getElementById("date-picker-example").focus();
    return false;
	
}
else if (name5.length==0 && "<?php echo Configure::read('Myprofile_personal_mandatory.city'); ?>" == 1 && "<?php echo Configure::read('Myprofile_personal.city'); ?>" == 1) {
    toastr.error("City is required.");
		document.getElementById("citystudent").focus();
    return false;
}

else{
	
	  $.ajax({
                   type:"POST",
                   url:targeturl+'Users/saveuserdatails/',
                   data:{
				   
				   city:$("#citystudent").val(),fname : $("#inputName").val(),lname : $("#inputName1").val(),phonenumber : $("#phpnenumbeforstude").val(),phonenumalter : $("#phpnenumbeforstudeal").val(),country : $("#countrylistdata").val(),state : $("#loadcountrystates").val(),email : $("#email").val(),emailalternate : $("#alternateemail").val(),nationality : $("#nationality").val(),dateofbirth : $("#date-picker-example").val(),category : $("#category11").val(), pincode : $("#pincodeforstude").val(),address : $("#addstu").val(),address2 : $("#addstu1").val(),userroles_id : $("#userroles-id").val(),gender : $("input[name=gender]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
				 return false;
}
													}
													</script>
		<script>
													function onsubfunction(){
													var name = $("#aboutmedata").val(); 
var n = name.replace(/ /g,'');
var c = n.replace(/^(&nbsp;)+/g, '');
var f = c.replace(/^(<br>)+/g, '');
if (f.length==0) {
    toastr.error("Please write about yourself.");
    return false;
}
else{
	
	
		  $.ajax({
                   type:"POST",
                   url:targeturl+'Users/saveaboutme/',
                   data:{
                      aboutme : name
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
				 return false;
   
}
													}
	
function onsubmitpersonalityquestiuons255()
{
//alert($("input[name=pquestion31]:checked").val());
url = targeturl+'Users/myersbriggs/';
   $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion11]:checked").val(),question2 : $("input[name=pquestion21]:checked").val(),
					  question3 : $("input[name=pquestion31]:checked").val(),question4 : $("input[name=pquestion41]:checked").val(),
					  question5 : $("input[name=pquestion51]:checked").val(),question6 : $("input[name=pquestion61]:checked").val(),
					   question7 : $("input[name=pquestion71]:checked").val(),question8 : $("input[name=pquestion81]:checked").val(),
					  question9 : $("input[name=pquestion91]:checked").val(),question10 : $("input[name=pquestion101]:checked").val(),
					  question11 : $("input[name=pquestion111]:checked").val(),question12 : $("input[name=pquestion121]:checked").val(),
					   question13 : $("input[name=pquestion131]:checked").val(),question14 : $("input[name=pquestion141]:checked").val(),
					  question15 : $("input[name=pquestion151]:checked").val(),question16 : $("input[name=pquestion161]:checked").val(),
					  question17 : $("input[name=pquestion171]:checked").val(),question18 : $("input[name=pquestion181]:checked").val(),
					   question19 : $("input[name=pquestion191]:checked").val(),question20 : $("input[name=pquestion201]:checked").val()
					  
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					
					
						
					$("#personalitytype").modal('toggle');
					
					urlva = targeturl+"img/"+data+".png";
					$("#eveabriges").hide();
				$('#loadimgss').html("<img alt='' src='"+urlva+"' id='dbfskjvKJSFJKAFDFAS' onClick=redirecturlsstudent17545574('"+targeturl+"users/"+data+"','"+data.toUpperCase()+"') class='img-fluid' style='height: 105px;' >");
					 //$('#loadimgss').html('<img class="img-fluid" id="userpicturechange" src=targeturl+data+".png"  style="height: 120px;width: 120px;" alt="Avatar">');
					}
					});
				 return false;
}	

function conditionsuit()
{
var userid  = document.getElementById("userid").value;
	
	
	  $.ajax({
                   type:"POST",
                   url:urlmainsite+'sms/getusertargetrules.php',
                   data:{
                        userid : userid
                   },
                   dataType: 'json',
				   beforeSend: function() {
   
  },
                   success:function(response)
                    {

 
 if(response == 'dateofbirtherroe')
						{
						//toastr.error('Please fill your date of birth in the Profile section to view the Targets.');
						
toastr.error('To view eligibility and suitability of targets complete the preference and profile sections.');
						}
						else if(response == 'yearofpassout')
						{
						//toastr.error('Please fill your year of passout in the Academic section to view the Targets.');
						toastr.error('To view eligibility and suitability of targets complete the preference and profile sections.');

						}
						else if(response == 'personality')
						{
						//toastr.error('Please answer the questions in Personality section to view the Targets.');
						toastr.error('To view eligibility and suitability of targets complete the preference and profile sections.');

						}
						else
						{
						//openmodalbox("Add Targets" , "Manage My Targets");
							toastr.success('Suitability Rank and eligibility computed.');
						}
 
                    }
                });
}

function onsubmitpersonalityquestiuons(a)
{


			if(a==1){
url = targeturl+'Users/problemsolving/';

  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });


}

else if(a==2) {
url = targeturl+'Users/teamwork/';


  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });

}
else if(a==3) {
url = targeturl+'Users/leadership/';

  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });
}
else if(a==4) {
url = targeturl+'Users/socialskils/'

  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
					  
					  ,question6 : $("input[name=pquestion6"+a+"]:checked").val()
					  ,question7 : $("input[name=pquestion7"+a+"]:checked").val()
					  ,question8 : $("input[name=pquestion8"+a+"]:checked").val()
					  ,question9 : $("input[name=pquestion9"+a+"]:checked").val()
					  ,question10 : $("input[name=pquestion10"+a+"]:checked").val()
					  ,question11 : $("input[name=pquestion11"+a+"]:checked").val()
					  ,question12 : $("input[name=pquestion12"+a+"]:checked").val()
					 /* ,question13 : $("input[name=pquestion13"+a+"]:checked").val()
					  ,question14 : $("input[name=pquestion14"+a+"]:checked").val()
					  ,question15 : $("input[name=pquestion15"+a+"]:checked").val()*/
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });

}
else if(a==5) {
url = targeturl+'Users/initative/';

  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });
}
else if(a==6) {
url = targeturl+'Users/communicationspoken/';


  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
					  
					  ,question6 : $("input[name=pquestion6"+a+"]:checked").val()
					  ,question7 : $("input[name=pquestion7"+a+"]:checked").val()
					  ,question8 : $("input[name=pquestion8"+a+"]:checked").val()
					  ,question9 : $("input[name=pquestion9"+a+"]:checked").val()
					  ,question10 : $("input[name=pquestion10"+a+"]:checked").val()
					  
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });
}
else if(a==7) {
url = targeturl+'Users/communicationwritten/'
}
else if(a==8) {
url = targeturl+'Users/communicationoratory/'
}
else if(a==9) {
url = targeturl+'Users/travelandexploration/'
}
else if(a==10) {
url = targeturl+'Users/technologyaffiliation/';
  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });
}
else if(a==11) {
url = targeturl+'Users/managementskills/';
 $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      question1 : $("input[name=pquestion1"+a+"]:checked").val(),question2 : $("input[name=pquestion2"+a+"]:checked").val(),question3 : $("input[name=pquestion3"+a+"]:checked").val(),question4 : $("input[name=pquestion4"+a+"]:checked").val(),question5 : $("input[name=pquestion5"+a+"]:checked").val()
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success('Thanks for answering the questions');
					   
					   $("#getvaluesp"+a).html(data);
					     $("#getvaluespp"+a).val(data);
					   
					   
					   
					    
						$("#modalboxes"+a).toggle();
						
						if(a==1){
$("#problemsolving").modal('toggle');
}

else if(a==2) {
$("#teamwork").modal('toggle');
}
else if(a==3) {
$("#leadership").modal('toggle');
}
else if(a==4) {
$("#socialskils").modal('toggle');
}
else if(a==5) {
$("#initative").modal('toggle');
}
else if(a==6) {
$("#communicationspoken").modal('toggle');
}
else if(a==7) {
$("#communicationwritten").modal('toggle');
}
else if(a==8) {
$("#communicationoratory").modal('toggle');
}
else if(a==9) {
$("#travelandexploration").modal('toggle');
}
else if(a==10) {
$("#technologyaffiliation").modal('toggle');
}
else if(a==11) {
$("#managementskills").modal('toggle');
}
else if(a==12) {
$("#foriegnlanguages").modal('toggle');
}

					   
					   
					    
					
                    }
                });

}
else if(a==12) {
url = targeturl+'Users/foriegnlanguages/'
}
 
 
				 return false;
 
 
}

function onsubfunctionugpg(a)
{

 /*if ("<?php echo Configure::read('Academic.graduation_joining_year'); ?>" == 1) {
	 
	 if($("#yearjoiningugpg"+a).val().length > 0 && $("#yearjoiningugpg"+a).val().length != 4){
    toastr.error("Please correct year of joining.");
	document.getElementById("yearjoiningugpg"+a).focus();
    return false;
	 }
    }
	else if ("<?php echo Configure::read('Academic.graduation_passout_year'); ?>" == 1) {
		if($("#yearpassoutugpg"+a).val().length > 0 && $("#yearpassoutugpg"+a).val().length != 4)
		{
    toastr.error("Please correct year of passout.");
	document.getElementById("yearpassoutugpg"+a).focus();
    return false;
		}
    }
	
	else {*/
		
		if("<?php echo Configure::read('Academic.graduation_institute_field'); ?>" == 1)
		{
			 universityname = document.getElementById("universitynameugpg"+a).value;
		}
		else 
		{
			universityname ="";
		}
		if("<?php echo Configure::read('Academic.graduation_stream'); ?>" == 1)
		{
			  stream = document.getElementById("boarderwwfsfs"+a).value; 
		}
		else 
		{
			stream ="";
		}
		if("<?php echo Configure::read('Academic.graduation_specialization'); ?>" == 1)
		{
			 specialization = document.getElementById("loadugsepcilaization"+a).value;
		}
		else 
		{
			specialization ="";
		}
		if("<?php echo Configure::read('Academic.graduation_regno'); ?>" == 1)
		{
			  regno = document.getElementById("regnougpg"+a).value;
		}
		else 
		{
			regno ="";
		}
		if("<?php echo Configure::read('Academic.graduation_joining_year'); ?>" == 1)
		{
			yearjoining = document.getElementById("yearjoiningugpg"+a).value;
		}
		else 
		{
			yearjoining ="";
		}
		if("<?php echo Configure::read('Academic.graduation_passout_year'); ?>" == 1)
		{
			 yearpassout = document.getElementById("yearpassoutugpg"+a).value;
		}
		else 
		{
			yearpassout ="";
		}
		if("<?php echo Configure::read('Academic.graduation_course_duration'); ?>" == 1)
		{
			  courseduration = document.getElementById("boadfdgfrdfsfs"+a).value;
		}
		else 
		{
			courseduration ="";
		}
		
		if("<?php echo Configure::read('Academic.graduation_semwise_marks'); ?>" == 1)
		{
			 sem1 = document.getElementById("sem1"+a).value;
					  sem2 = document.getElementById("sem2"+a).value;
					  sem3 = document.getElementById("sem3"+a).value;
					  sem4 = document.getElementById("sem4"+a).value;
					  sem5 = document.getElementById("sem5"+a).value;
					  sem6 = document.getElementById("sem6"+a).value;
					  sem7 = document.getElementById("sem7"+a).value;
					  sem8 = document.getElementById("sem8"+a).value;
		}
		else 
		{
			 sem1 ="";
					  sem2 = "";
					  sem3 = "";
					  sem4 = "";
					  sem5 = "";
					  sem6 = "";
					  sem7 = "";
					  sem8 = "";
		}
		
$.ajax({
                   type:"POST",
                   url:targeturl+'Ugpg/add/',
                   data:{ 
                      universityname : universityname, 
					  stream : stream, 
					  specialization : specialization, 
					  regno : regno,  
					  yearjoining : yearjoining,  
					  yearpassout : yearpassout,
					  
					  courseduration : courseduration,
					  sem1 : sem1,
					  sem2 : sem2,
					  sem3 : sem3,
					  sem4 : sem4,
					  sem5 : sem5,
					  sem6 : sem6,
					  sem7 : sem7,
					  sem8 : sem8,
					  
					  type : document.getElementById("typeugpg"+a).value
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
	 return false;
	// }
}			
													
   function onsubfunctionsslcpuc(a)
	{
	
	if ($("#joining"+a).val().length > 0 && $("#joining"+a).val().length != 4) {
    toastr.error("Please correct year of joining.");
	document.getElementById("joining"+a).focus();
    return false;
    }
	else if ($("#passout"+a).val().length > 0 && $("#passout"+a).val().length != 4) {
    toastr.error("Please correct year of passout.");
	document.getElementById("passout"+a).focus();
    return false;
    }
	
	else {
	
	
	  $.ajax({
                   type:"POST",
                   url:targeturl+'Sslcpuc/add/',
                   data:{
                      collegename : document.getElementById("collegename"+a).value,  board : document.getElementById("boardfsfs"+a).value,  percentage : document.getElementById("percentage"+a).value,  regno : document.getElementById("regno"+a).value,  joining : document.getElementById("joining"+a).value,  passout : document.getElementById("passout"+a).value,type : document.getElementById("type"+a).value
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
	 return false;
	 }
	}
													
	</script>
	<script>
	function deleteareaofinterest(a,b)
	{
	

	if(b==1)
	{
	url = targeturl+'Areaofinterest/deleterow/';
	type='loadareofinterest';
	}
	else if(b==2)
	{
	url = targeturl+'Projectexecuted/deleterow/';
	type='loadprojecexecuted';
	}
	else if(b==3)
	{
	url = targeturl+'Internshipdetails/deleterow/';
	type='loadinternshipdetails';
	}
	else if(b==4)
	{
	url = targeturl+'Hobiesandextracurricular/deleterow/';
	type='loadhobies';
	}
	else if(b==5)
	{
	url = targeturl+'Electives/deleterow/';
	type='loadelectives';
	}
	else if(b==6)
	{
	url = targeturl+'Coursesattended/deleterow/';
	type='laodcouseattended';
	}
	else if(b==7)
	{
	url = targeturl+'Personaldetails/deleterow/';
		type='laodaditionaldeatils';
	}
	
	  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					     $('#'+type).DataTable().ajax.reload();
					
                    }
                });
	}
	
	
		function loadareaofinterest1(a)
	{
	
	if(a == 1)
	type='loadareofinterest';
	else if(a == 2)
	type='loadprojecexecuted';
	else if(a == 3)
	type='loadinternshipdetails';
	else if(a == 4)
	type='loadhobies';
	else if(a == 5)
	type='loadelectives';
	else if(a == 6)
	type='laodcouseattended';
	else if(a == 7)
	type='laodaditionaldeatils';
	
	
	
	
	 $('#'+type).DataTable( {
		 
	 paging: false,
   ordering: false,
   searching: false,
	 "bInfo" : false,
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/areaofinterestajaxx',
    "type": "POST",
	"data":{
                  cat_val : a
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  class="browser-default custom-select" style="display:block"><option value="">Filter by All</option></select>')
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
				
				if(d.length > 1 ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
					}
                } );
            } );
        },
  "columns": [
  { "data": "description" },
  { "data": "name" },
  
  { "data": "editbutton" },
  { "data": "deletebutton" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );
	
	}
	function loadareaofinterest(a)
	{
	
	if(a == 1)
	type='loadareofinterest';
	else if(a == 2)
	type='loadprojecexecuted';
	else if(a == 3)
	type='loadinternshipdetails';
	else if(a == 4)
	type='loadhobies';
	else if(a == 5)
	type='loadelectives';
	else if(a == 6)
	type='laodcouseattended';
	else if(a == 7)
	type='laodaditionaldeatils';
	
	
	
	
	 $('#'+type).DataTable( {
		 
	 paging: false,
   ordering: false,
   searching: false,
	 "bInfo" : false,
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/areaofinterestajaxx',
    "type": "POST",
	"data":{
                  cat_val : a
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  class="browser-default custom-select" style="display:block"><option value="">Filter by All</option></select>')
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
				
				if(d.length > 1 ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
					}
                } );
            } );
        },
  "columns": [
  { "data": "name" },
  { "data": "description" },
  { "data": "editbutton" },
  { "data": "deletebutton" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );
	
	}
												
												
												
												function saveareaofinterets(a){
												
												
												if(a==1)
	{
	url = targeturl+'Areaofinterest/add/';
	type='loadareofinterest';

	}
	else if(a==2)
	{
	url = targeturl+'Projectexecuted/add/';
	type='loadprojecexecuted';
	
	}
	else if(a==3)
	{
	url = targeturl+'Internshipdetails/add/';
		type='loadinternshipdetails';
	
	}
	else if(a==4)
	{
	url = targeturl+'Hobiesandextracurricular/add/';
type='loadhobies';
	}
	else if(a==5)
	{
	url = targeturl+'Electives/add/';
type='loadelectives';
	}
	else if(a==6)
	{
	url = targeturl+'Coursesattended/add/';
type='laodcouseattended';
	}
	else if(a==7)
	{
	url = targeturl+'Personaldetails/add/';
		type='laodaditionaldeatils';
	}
												
													var name = $("#areaofinterest100"+a).val(); 
var n = name.replace(/ /g,'');
var c = n.replace(/^(&nbsp;)+/g, '');
var f = c.replace(/^(<br>)+/g, '');


													var name1 = $("#decriptionatreaofinterest100"+a).val(); 
var n1 = name1.replace(/ /g,'');
var c1 = n1.replace(/^(&nbsp;)+/g, '');
var f1 = c1.replace(/^(<br>)+/g, '');

if (f.length == 0) {
    toastr.error("Please enter the details.");
	document.getElementById("areaofinterest100"+a).focus();
    return false;
}
else if(f1.length == 0) {
    toastr.error("Please enter the details.");
	document.getElementById("decriptionatreaofinterest100"+a).focus();
    return false;
}
else 
{
 $.ajax({
            type: 'POST',
            url: url,
			data:{
                     userid: document.getElementById("useridare"+a).value,  name : document.getElementById("areaofinterest100"+a).value , description: document.getElementById("decriptionatreaofinterest100"+a).value
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
           
            },
            success: function(response) 
            {
               
			 toastr.success(response);
			  $('#profileextradetails'+a).modal('toggle');
		   $('#'+type).DataTable().ajax.reload();
		
 
  
            },
            error: function(xhr, status, error) 
            {
			toastr.success(xhr.responseText);
			 $('#profileextradetails'+a).modal('toggle');
		   $('#'+type).DataTable().ajax.reload();
			
            }
        });
		 
		   
		   
		   
}
													}
													</script>
<script>
//backdrop: 'static',keyboard: false






function loadprofilewithgraph(){
/* document.getElementById('loadcomprweagraph').src = targeturl+'users/showstatusbar';*/
}

function setlessonurl(a,url){

if( a == '4')
{
document.getElementById('urlforthemainuser').src = url;
}
else{
 document.getElementById('iframepreferencesseturl'+a).src = url;
 }
}

function checktargetrulesnew()
	{
		openmodalboxacademoc("Add Targets" , "Manage My Academic Targets");
		
		
		}
	function checktargetrules()
	{
		openmodalbox("Add Targets" , "Manage My Job Targets");
		
	/*
	var userid  = document.getElementById("userid").value;
	
	
	  $.ajax({
                   type:"POST",
                   url:urlmainsite+'sms/getusertargetrules.php',
                   data:{
                        userid : userid
                   },
                   dataType: 'json',
				   beforeSend: function() {
   // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(response)
                    {
//alert(response);
 
 if(response == 'dateofbirtherroe')
						{
						toastr.error('Please fill your date of birth in the Profile section to view the Targets.');
						

						}
						else if(response == 'yearofpassout')
						{
						toastr.error('Please fill your year of passout in the Academic section to view the Targets.');
						

						}
						else if(response == 'personality')
						{
						toastr.error('Please answer the questions in Personality section to view the Targets.');
						

						}
						else
						{
						openmodalbox("Add Targets" , "Manage My Targets");
							
						}
 
                    }
                });*/
	}
function leaveChange1(a)
{

    var url             =   urlmainsite+'sms/speacilizatiobn.php';
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
							 
							
							 
						
							
							selOpts += "<option value='"+element.name+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
						
                       $('#loadugsepcilaization2').html(selOpts);
                    }
                });
}
function leaveChange(a)
{

    var url             =   urlmainsite+'sms/speacilizatiobn.php';
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
							 
							
							 
						
							
							selOpts += "<option value='"+element.name+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
						
                       $('#loadugsepcilaization1').html(selOpts);
                    }
                });
}



function leaveChangecountry(a)
{


    var url             =   urlmainsite+'sms/countrystes.php';
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
							 
							
							 
						
							
							selOpts += "<option value='"+element.name+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
						
                       $('#loadcountrystates').html(selOpts);
                    }
                });
}
function modalboxes(a){

if(a==1){
$("#problemsolving").modal({keyboard: false});
}

else if(a==2) {
$("#teamwork").modal({keyboard: false});
}
else if(a==3) {
$("#leadership").modal({keyboard: false});
}
else if(a==4) {
$("#socialskils").modal({keyboard: false});
}
else if(a==5) {
$("#initative").modal({keyboard: false});
}
else if(a==6) {
$("#communicationspoken").modal({keyboard: false});
}
else if(a==7) {
$("#communicationwritten").modal({keyboard: false});
}
else if(a==8) {
$("#communicationoratory").modal({keyboard: false});
}
else if(a==9) {
$("#travelandexploration").modal({keyboard: false});
}
else if(a==10) {
$("#technologyaffiliation").modal({keyboard: false});
}
else if(a==11) {
$("#managementskills").modal({keyboard: false});
}
else if(a==12) {
$("#foriegnlanguages").modal({keyboard: false});
}

}
function saveareaofintesdata(a,b)
{
//alert(document.getElementById("nameforare"+a).value);
 $.ajax({
            type: 'POST',
            url: targeturl+'users/saveareaofintereste/',
			data:{
                     urltype:b,userid: document.getElementById("userid").value, recordid : a , nameforare : document.getElementById("nameforare"+a).value , descforare: document.getElementById("descforare"+a).value
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
           
            },
            success: function(response) 
            {
               
			 toastr.success(response);
			 
			 $("#"+b+"editbutton"+a).css('background-color','');
			 
  
  
            },
            error: function(xhr, status, error) 
            {
			toastr.success(xhr.responseText);
			$("#"+b+"editbutton"+a).css('background-color','');
			
            }
        });

}
function showuserguisde()
{
$("#userguisde").modal({keyboard: false});
}

function opencompany()
{

     $('#loadcomapny').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/company.php",
    "type": "POST",
	"data":{
                      cat_val : ""
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm" ><option value="">Filter by All</option></select>')
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
       // { "data": "code" },
        { "data": "name" },
        { "data": "description" }
		/*{ "data": "link" },
			{ "data": "detailsindustry" }*/
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
$("#opencomp").modal({keyboard: false});
}

function openindustry()
{
   $('#loadindustrytable2011').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/industry.php",
    "type": "POST",
	"data":{
                      cat_val : ""
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
    $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
        /*{ "data": "code" },*/
        { "data": "name" },
        { "data": "description" }
	/*	{ "data": "link" },
		{ "data": "detailsindustry" }*/
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
$("#openindustry").modal({keyboard: false});
}

function opentargtes()
{
     $('#loadexam1').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/examsearch.php",
    "type": "POST",
	"data":{
                      cat_val : ""
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm" ><option value="">Filter by All</option></select>')
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
   
        { "data": "tname1" },
        { "data": "compname1" },
		{ "data": "tcutoff1" },
		{ "data": "tminage1" },
		{ "data": "tmaxage1" }
	/*	{ "data": "link" },
		{ "data": "detailsindustry" }*/
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
$("#opentargets").modal({keyboard: false});
}

/*function hideme() {
  var x = document.getElementById("hidemesges");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}*/

function addprofileextra(a){

if(a== 'areaofinterest'){
$("#areaofinterest1001").val("")

$("#decriptionatreaofinterest1001").val(""); 
$("#profileextradetails1").modal({keyboard: false});
}

else if(a== 'projectexecuted'){
$("#areaofinterest1002").val("")

$("#decriptionatreaofinterest1002").val(""); 
$("#profileextradetails2").modal({keyboard: false});
}
else if(a== 'internshipdetails'){
$("#areaofinterest1003").val("")

$("#decriptionatreaofinterest1003").val(""); 
$("#profileextradetails3").modal({keyboard: false});
}
else if(a== 'hobbiesandextra'){
$("#areaofinterest1004").val("")

$("#decriptionatreaofinterest1004").val(""); 
$("#profileextradetails4").modal({keyboard: false});
}
else if(a== 'electives'){
$("#areaofinterest1005").val("")

$("#decriptionatreaofinterest1005").val(""); 
$("#profileextradetails5").modal({keyboard: false});
}
else if(a== 'coursesattended'){
$("#areaofinterest1006").val("")

$("#decriptionatreaofinterest1006").val(""); 
$("#profileextradetails6").modal({keyboard: false});
}

else if(a== 'personaldetails'){
$("#areaofinterest1007").val("")

$("#decriptionatreaofinterest1007").val(""); 
$("#profileextradetails7").modal({keyboard: false});
}







}
function buyiccoptions()
	{
	
	 
	
	
	 /* $('#dataTables-example52').DataTable( {
	  
	  
	     paging: false,
   ordering: false,
   searching: false,
		
	 destroy : true,
	 
	 "ajax": {
    "url": urlmainsite+"ims/addoncoursedisplay.php",
    "type": "POST",
	"data":{
                     uid : document.getElementById("userid").value
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
			
                var select = $('<select  style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
				
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
 
  { "data": "name" },
  { "data": "description" },
  { "data": "position" },
   { "data": "price" },
  { "data": "bynowbuttn" }

		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2,3,4]}
	],
   
} );*/



  /*$('#dataTables-example52modules').DataTable( {
	  
	
	     paging: false,
   ordering: false,
   searching: false,
		
	 destroy : true,
	 
	 "ajax": {
    "url": urlmainsite+"ims/modulesdisplay.php",
    "type": "POST",
	"data":{
                     uid : document.getElementById("userid").value
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
				
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
 
  { "data": "name" },
  { "data": "description" },
   { "data": "price" },
  { "data": "bynowbuttn" }

		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2,3]}
	],
   
} );*/

 document.getElementById('displayamodiulescourses').src = targeturl+'users/disaplyallmodulecourses';

document.getElementById('displayamodiulescourses1').src = targeturl+'users/disaplyalladdoncourses';

	
	$("#viewtargetforicc").modal({keyboard: false});
	}


if(document.readyState === 'complete') {
    DoStuffFunction();
} else {
    if (window.addEventListener) {  
        window.addEventListener('load', DoStuffFunction, false);
    } else {
        window.attachEvent('onload', DoStuffFunction);
    }
}


function comptaraereport()
{
getcompraedetails();
$("#comparerepro").modal({keyboard: false});
}

function DoStuffFunction()
{


document.getElementById("synctocalsem1").style.display = "none";
}

/*window.onbeforeunload = function (event) {
  var message = 'Sure you want to leave?';
  if (typeof event == 'undefined') {
    event = window.event;
  }
  if (event) {
    event.returnValue = message;
  }
  
  
  return message;
  
  
  
}*/

function deleteuserpic(){
//window.location = targeturl+"users/deleteuserpics";

	  $.ajax({
                   type:"POST",
                   url:targeturl+'Users/deleteuserpics/',
                   data:{
                     // aboutme : name
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					   
					   
					   
					    $("#profile_image1").attr("src",targeturl+"img/logo_150-150.png");
						$("#userpicssave").attr("src",targeturl+"img/logo_150-150.png");
						$("#userpicturechange").attr("src",targeturl+"img/logo_150-150.png");
						   $("#showdeletimage").hide();
					    
					
                    }
                });
}

function changeuserpic(){


 document.getElementById("filepic").click();
}


$(document).on("keydown","#addstu" ,function(evt){
     var firstChar = $("#addstu").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addstu1" ,function(evt){
     var firstChar = $("#addstu1").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#citystu" ,function(evt){
     var firstChar = $("#citystu").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});


$(document).on("keydown","#addressprofile" ,function(evt){
     var firstChar = $("#addressprofile").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addressprofile1" ,function(evt){
     var firstChar = $("#addressprofile1").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).on("keydown","#addressprofile2" ,function(evt){
     var firstChar = $("#addressprofile2").val()
     if(evt.keyCode == 32 && firstChar == ""){
     	return false;
     }
});

$(document).ready(function(){


		$('#joining1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#passout1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#joining2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#passout2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#yearjoiningugpg1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#yearpassoutugpg1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#yearjoiningugpg2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#yearpassoutugpg2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#percentage1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
  $('#percentage2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 
 
 
 $('#sem11').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 
 $('#sem21').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem31').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem41').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem51').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem61').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem71').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem81').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 
 
  $('#sem12').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 
 $('#sem22').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem32').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem42').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem52').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem62').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem72').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#sem82').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 


$('#citystu').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('#addressprofile2').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('#alternateemail').keypress(function (e) {
 
	
	if (e.which === 32 &&  e.target.selectionStart === 0) {
	  e.preventDefault();
  return false;
  }  

  
});

$('#inputName').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#inputName1').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#fnameprofile').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#lnameprofile').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});



$('#inputName').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#alternateemail').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#inputName1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#fnameprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#lnameprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });



$('#addressprofile3').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#phonenumberprofile').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#pincodeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#phpnenumbeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });


$('#addstu').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#citystu').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 $('#pincodeforstude').on("cut copy paste",function(e) {
     e.preventDefault();
 });
 
 $('#addressprofile1').on("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#addressprofile2').on("cut copy paste",function(e) {
     e.preventDefault();
 });
  $('#addstu1').on("cut copy paste",function(e) {
     e.preventDefault();
 });






});

    function inputNameChk(t){
        var specialcharchk = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        var digitchk =/\d/; 
        if(specialcharchk.test(t.value)|| digitchk.test(t.value)){
              t.value='';
        }

    }  

</script>			





<script>


function displayerrorformodule()
{
 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">You`re not eligible to view this semester module.</div>');


}


function displayerrorforgrade()
{
 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">You`re not eligible to view this semester grade.</div>');


}
function semstertargetforstudents(a,b,c)
{
//alert(a);

/*alert(document.getElementById("getsemanme").value);

alert(c);*/

if(document.getElementById("getsemanme").value == c) {


 //$('#hideactionforstudent').attr("disabled", true);
 
 k=1;


}
else {
//$('#hideactionforstudent').attr("disabled", false);
k=0;
}


$('#semnammes').html(b);


     $('#semstudenttopis').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	   ordering: false,
	 "ajax": {
    "url": urlmainsite+"ims/semcomsstudentnolomit.php",
    "type": "POST",
	"data":{
                      cat_val : a , companaytype: k
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm" ><option value="">Filter by All</option></select>')
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
   
        { "data": "topiccode" },
        { "data": "lessoncode" },
		//{ "data": "levelcode" },
		//{ "data": "score" },
     	{ "data": "action" },
		{ "data": "grade" }
		
		

		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );


 $("#semcompsfprstudents").modal({
          
            keyboard: false,
			backdrop: 'static'
           
        });


}

function openscorecardforstudents(a)
{

//redirecturlsstudent1('cms/displayquizfscorecard/','Score Card');

var userid  = document.getElementById("userid").value;

    $('#scoredisp').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	   rowReorder: {
            selector: 'td:nth-child(2)'
        },
	 "ajax": {
    "url": urlmainsite+"sms/getallscores.php",
    "type": "POST",
	"data":{
                      userid : userid
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
        { "data": "name" , className: 'reorder dtr-control'},
		 { "data": "code" },
		  { "data": "type" },
        { "data": "attempts" },
        { "data": "duration" },
		   { "data": "starttime" },
		    { "data": "endtime" },
        { "data": "score_in_percentage" },
        { "data": "passingscore_in_percentage" },
		   { "data": "timeconsumed" },
		   		   { "data": "status" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10]}
  ],
   
} );
	
	$("#scorecrddisplayforstudent").modal({keyboard: false});

}

function loadmodalrfeportsins(a)
{
$("#diagnosticsreports"+a).modal({keyboard: false});
}
function loadmodalrfeports()
{
$("#diagnosticsreports").modal({keyboard: false});
}

function redirecturlsstudent1(url,a)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  


$(".holds-the-iframe").css("background", "url(/img/ajax-loading.gif) center center no-repeat");


  document.getElementById('iframepreferences').src = url;
  
  $("#titlefiorpreference").html(a);
  
  	$("#diagnostics").modal({
    keyboard: false
});
	
	
	$("#diagnostics").on("hidden.bs.modal", function () {
    
	
	document.getElementById('iframepreferences').src = "";
});
	
	}
	
		function redirecturlsstudent17545574(url,a)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  


$(".holds-the-iframe").css("background", "url(/img/ajax-loading.gif) center center no-repeat");


  document.getElementById('iframepreferencesfsdfsdfs').src = url;
  
  $("#titlefiorpreferenceadfsdfsdfs").html(a);
  
  	$("#diagnosticsfgffgfg").modal({
    keyboard: false
});
	
	
	$("#diagnosticsfgffgfg").on("hidden.bs.modal", function () {
    
	
	document.getElementById('iframepreferencesfsdfsdfs').src = "";
});
	
	}
    
    	
	function displayalllicprom()
    {
     
        
	     $('#displayalllicprom').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listoficprojectmentor.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value, insidforic : document.getElementById("insidforic").value,
         getuserfname : document.getElementById("getuserfname").value, sessionemail : document.getElementById("sessionemail").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
      { "data": "projectname" },
		 { "data": "industry" },
		  { "data": "streamapplicable" },
      { "data": "estimatedeffort" },
   { "data": "fundedornot" },
        { "data": "technologies" },
       
       { "data": "freelancername" },
       { "data": "moreinfo" },
       { "data": "applyprojects" }
      
    
		

        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8]}
  ],
   
} );

$("#industryconnectmodal").modal({keyboard: false});
        
        
    }
    
    function displayalllicappren()
    {
     
        
	     $('#displayalllicappren').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listoficapprentice.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value, insidforic : document.getElementById("insidforic").value,
         getuserfname : document.getElementById("getuserfname").value, sessionemail : document.getElementById("sessionemail").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
      { "data": "projectname" },
		 { "data": "industry" },
		  { "data": "streamapplicable" },
       { "data": "estimatedeffort" },
   { "data": "fundedornot" },
        { "data": "technologies" },
      
       { "data": "freelancername" },
       { "data": "moreinfo" },
       { "data": "applyprojects" }
      
    
		

        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8]}
  ],
   
} );

$("#industryconnectmodal").modal({keyboard: false});
        
        
    }
	
	function listindustryconnectusers()
    {
     
        
	     $('#dtBasicExample').DataTable( {
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsiteaapi+'ic/listoficspeakers.php',
    "type": "POST",
	"data":{
                      useridforic : document.getElementById("useridforic").value, insidforic : document.getElementById("insidforic").value,
         getuserfname : document.getElementById("getuserfname").value, sessionemail : document.getElementById("sessionemail").value
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
				   beforeSend: function(xhr) 
            {
			//  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px;" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
      { "data": "fname" },
		 { "data": "lname" },
		  { "data": "industry" },
   { "data": "functionalexpertise" },
        { "data": "yearofexpertise" },
       { "data": "location" },
       { "data": "moreinfo" },
       { "data": "likeunlike" }
      
    
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7]}
  ],
   
} );

$("#industryconnectmodal").modal({keyboard: false});
        
        
    }
	function redirecturlsstudent1industry(url,a)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  


$(".holds-the-iframe").css("background", "url(/img/ajax-loading.gif) center center no-repeat");


  document.getElementById('iframepreferencesindustry').src = url;
  
  $("#titlefiorpreferenceindustry").html(a);
  
  	$("#diagnosticsindustry").modal({
   // backdrop: 'static',
    keyboard: false
});
	
	
	$("#diagnosticsindustry").on("hidden.bs.modal", function () {
    
	
	document.getElementById('iframepreferences').src = "";
});
	
	}
	
	function redirecturlsstudent125(url,a)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  
  
  document.getElementById('iframepreferences').src = url;
  
  $("#titlefiorpreference").html(a);
  
  	$("#diagnostics").modal({keyboard: false});
	
	
	/*$("#diagnostics").on("hidden.bs.modal", function () {
    
	
	document.getElementById('iframepreferences').src = "";
});*/
	
	}
	
	function redirecturlsstudent11(url,a,b)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  
/*$("#getmod"+b).html('Payment processing...');

document.getElementById("#getmod"+b).disabled = false;*/

  
  document.getElementById('iframepreferences').src = url;
  
  $("#titlefiorpreference").html(a);
  $(".holds-the-iframe").css("background", "none");
  
  	$("#diagnostics").modal({keyboard: false});
	//alert("#getmod"+b);
	
	

	
	}

function redirectrespectivestudentscore()
{
var userid = $("#studentscoreuserid").val();

redirecturlsstudent1(targeturl+"userdashboard/scoreanalysis/index.php?id="+userid,"Score Analysis")
}

function loadestudentsscore(a,b,c,d)
{
//alert('cms/displayquizfscorecardforeach/'+c+'/'+d);
//redirecturlsstudent1('cms/displayquizfscorecardforeach/'+c+'/'+d,'Score Card for the user ' + a +' '+b);
var userid  = d;

$("#studentscoreuserid").val(d);

    $('#scoredisp').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getallscores.php",
    "type": "POST",
	"data":{
                       userid : userid, userroles_id : '<?php echo $this->request->getSession()->read('sessionname2'); ?>', fcomps : '<?php echo $this->request->getSession()->read('fcomps'); ?>'
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
		 { "data": "code" },
		  { "data": "type" },
        { "data": "attempts" },
        { "data": "duration" },
		   { "data": "starttime" },
		    { "data": "endtime" },
        { "data": "score_in_percentage" },
        { "data": "passingscore_in_percentage" },
		   { "data": "timeconsumed" },
		   		   { "data": "status" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10]}
  ],
   
} );
	
	$("#scorecrddisplayforstudent").modal({keyboard: false});

}



function opengradebookofstudentquiz(uid,code){
//redirecturlsstudent1('cms/displayquizfscorecard/','Score Card');

var userid  = document.getElementById("userid").value;

    $('#scoredisp').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getallscoresnew.php",
    "type": "POST",
	"data":{
                      userid : userid, code :code
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
		 { "data": "code" },
		  { "data": "type" },
        { "data": "attempts" },
        { "data": "duration" },
		   { "data": "starttime" },
		    { "data": "endtime" },
        { "data": "score_in_percentage" },
        { "data": "passingscore_in_percentage" },
		   { "data": "timeconsumed" },
		   		   { "data": "status" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10]}
  ],
   
} );
	
	$("#scorecrddisplayforstudent").modal({keyboard: false});

/*var useridmoodle =document.getElementById("useridmoodle").value;


redirecturlsstudent1('cms/displayquizforgarde/'+a,'Grade Book');*/

//redirecturlsstudent(targeturlforcms+'course/user.php?mode=grade&id='+a+'&user='+useridmoodle,'Grade Book');
}


function opengradebookofstudent(a){

var useridmoodle =document.getElementById("useridmoodle").value;


redirecturlsstudent1('cms/displayquizforgardeforlesson/'+a,'Score Card');

//redirecturlsstudent(targeturlforcms+'course/user.php?mode=grade&id='+a+'&user='+useridmoodle,'Grade Book');
}

 function validatealphanumeric(evt,a) {
 
      evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
 

}

/*$(document).ready(function() {
    setInterval(timestamp, 1000);
});*/

function finishatargetcomps()
{

	     $('#studentcompetencieslist').DataTable( {
		 
		   paging: false,
   ordering: false,
   searching: false,
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/targetlists',
    "type": "POST",
	"data":{
                    //  cat_val : ""
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
 
  "columns": [
        { "data": "name" },
		{ "data": "companyname" }
      
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
	
	$("#targetmodalforstudentselected").modal({keyboard: false});

}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
 
function checkLength(len,ele){
  var fieldLength = ele.value.length;
  if(fieldLength <= len){
    return true;
  }
  else
  {
    var str = ele.value;
    str = str.substring(0, str.length - 1);
    ele.value = str;
  }
}

function alertforuser()
{
$("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;    top: 0;">Please wait... Don`t refresh the page until we process your request.</div>');

}

function finishatargetcompsfinsish() 
{
	   $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;    top: 0;">Your targets are being added. Please do not refresh....</div>');

window.location = targeturl+"targetcomps/evalauetargetcomps";
 
}

function removeclasfromiframe()
{

/*document.getElementById('displayamodiulescourses').style.display = "none";
 $('#displayamodiulescourses').removeClass('holds-the-iframe222');
$("#displayamodiulescourses1").css("background", "none !important");
  $("#displayamodiulescourses").css("background", "none !important");*/
}



function removeopacity()
{
//alert("hello");
//$('span').css('opacity', '1');

/*if($('.block-body-top span span span span span span').hasClass('rotatedopacity1')) {
 $('span').css('opacity', '0.4');
 $('.block-body-top span span span span span span').removeClass('rotatedopacity1');
 $('.block-body-top span span span span span span').addClass('rotatedopacity');
 
}
else {
  $('span').css('opacity', '1');
  $('.block-body-top span span span span span span').addClass('rotatedopacity1');
 $('.block-body-top span span span span span span').removeClass('rotatedopacity');
}*/

 $('.overlay1').toggle();

}

function timestamp() {
    $.ajax({
        url: urlmainsite+"timestamp.php",
        success: function(data) {
            $('#timestamp').html(data);
        },
    });
}
function hidesuccessmesage()
{
 $("#displayerrormesageforstudent").hide();
}
function syncscorecardfinal(){


 $.ajax({
            type: 'POST',
            url: targeturl+'users/getallcourses/',
			data:{
                      //cat_val : a , userid : uid , score: score
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // alert("Processing please wait....");
			 
			  //document.getElementById("overlay").style.display = "block";
			  
			   $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">Score card is being updated. Please check after a few minuites.</div>');
			  
			  document.getElementById("synctoscorecarddisable").disabled = true;
			 
			  
			  
			 // $('#loadquizattempts').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
            success: function(response) 
            {
               
			 console.log(response);
			 //$('#text').html(response);
			 
			document.getElementById("overlay").style.display = "none";
			 
			
			 //alert(response);
			 
			   $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">'+response+'</div>');
			  
			  document.getElementById("synctoscorecarddisable").disabled = false;
			 
			 
  
  
            },
            error: function(xhr, status, error) 
            {
			
			
				
				 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;"> An error occurred: '+xhr.responseText+'</div>');
			  
			  document.getElementById("synctoscorecarddisable").disabled = false;
				
				document.getElementById("overlay").style.display = "none";
                console.log(e);
            }
        });



}

</script>


	
	<script type="text/javascript" >
	

history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
	
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


</script>


	<script>
	
	function calendarviewforadmin(value,type){
	
		$("#hhjjjkjkjkjl").val('all');
	$("#lisddiffcompsaccor").val('');
	$("#lisdifftopivsacco").val('');
	$("#nfkvdslkfkc").val('');
	
	$('#calendarinst').fullCalendar('destroy');
	
		if(value == 'all') {
	$("#foletrdbuifckf").hide();
$("#modalforfileegt").modal('hide');
	
	var urlevent = targeturl+'events/getallusereventsforadmin/all/'+type;
	
	}
	else {
	$("#foletrdbuifckf").show();
	$("#modalforfileegt").modal('hide');
	 
	
	var urlevent = targeturl+'events/getallusereventsforadmin/'+value+'/'+type;
	}
	
//alert(urlevent);
	
		$('.fc-scroller').css('overflow','visible');

   var tdate = new Date();
   var dd = tdate.getDate(); //yields day
   var MM = tdate.getMonth(); //yields month
   var yyyy = tdate.getFullYear(); //yields year
   var currentDate= yyyy + "-" +( MM+1) + "-" +dd ;

    $('#calendarinst').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
	   height: 600,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	  
	  events: urlevent,
	  /*  events: [
    {
      groupId: 'blueEvents', 
      daysOfWeek: [ '4' ],
      startTime: '10:45:00',
      endTime: '12:45:00'
    },
    {
      dow: [ '3' ], 
      start: '11:00:00',
      end: '16:30:00',
      color: 'red',
	     ranges: [{
                    start: '2020-06-01',                                                                                                        
                    end: '2020-08-25',                                                                  
                }]
	  
    }
  ],*/
  eventRender: function(event,element){
  

  //console.log(event.dow);
 // console.log(event.start);
 

 //alert(moment(event.end).format("YYYY-MM-DD"+"T"+"HH:MM:SS"));
 
 //olxdate =moment(event.end).format("YYYY-MM-DD"+"T"+"HH:MM:SS");
 
 //if(event.ttype == 'SEM' || event.ttype == 'Seminar' || event.ttype == 'Webinar' || event.ttype == 'Recordings' || event.ttype == 'Assignment' || event.ttype == 'Internals' || event.ttype == 'MidtermExamination' || event.ttype == 'SemesterExamination' || event.ttype == 'CampusPlacement' || event.ttype == 'OffCampusPlacement' || event.ttype == 'ProjectDiscussion' || event.ttype == 'EE') {
  
if(event.ttype == 'SEM') {
  nnn = moment(new Date()).format("YYYY-MM-DD");
 if(moment(event.end).isBefore(nnn))
 {
  element.css('background-color', '#899194');

 }
 else{
 console.log("after");
 }



 
  //console.log(event.ranges);
 //console.log(event.ranges.end);
    return (event.ranges.filter(function(range){ 

        return (event.start.isBefore(range.end) &&
                event.end.isAfter(range.start));

    }).length)>0; 
	}
},
	   timezone: 'Asia/Kolkata',
	  
	   eventConstraint: {
            start: currentDate,
             end: '2030-01-01'
          
        },
		
				 eventDrop: function(event, delta) {
                   if(event.ttype == 'ONLINECLASS' || event.ttype == 'EE' ){
	
	
	
	alert("You're not allowed to modify this event.");
	
	   $('#calendarinst').fullCalendar('refetchEvents');
	
	}  
                     
                  else {
   var start = event.start.format();
   var end = event.end.format();
  // alert(start);
    // alert(end);
   $.ajax({
  
   url: targeturl+'events/updateeventsforadmin/',
  
     data: {'code': event.code, 'start': start , 'end' : end },
   type: "POST",
   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
   success: function(json) {
    console.log(json);
   }
   });
                 }
   },
   eventResize: function(event) {
   var start = event.start.format();
   var end = event.end.format();
   //alert(start);
     //alert(end);
   $.ajax({
     url: targeturl+'events/updateeventsforadmin/',
  
     data: {'code': event.code, 'start': start , 'end' : end },
    type: "POST",
		   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
    success: function(json) {
     //console.log(json);
    }
   });

},
	  
	/*  eventClick: function(event) {
    if (event.url) {
       
		
		redirecturlsstudent(event.url,'');
		
        return false;
    }
}*/
eventClick: function(event) {
 if(event.ttype == 'Seminar')
	{

	$("#titleforevenmtscal").html("Seminar");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'Webinar')
	{
	$("#titleforevenmtscal").html("Webinar");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.ttype == 'Recordings')
	{
	$("#titleforevenmtscal").html("Recordings");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'Assignment')
	{
	$("#titleforevenmtscal").html("Assignment");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'Internals')
	{
	$("#titleforevenmtscal").html("Internals");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'MidtermExamination')
	{
	$("#titleforevenmtscal").html("Midterm Examination");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.ttype == 'SemesterExamination')
	{
	$("#titleforevenmtscal").html("Semester Examination");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.ttype == 'CampusPlacement')
	{
	$("#titleforevenmtscal").html("Campus Placement");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'OffCampusPlacement')
	{
	$("#titleforevenmtscal").html("Off Campus Placement");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.ttype == 'ProjectDiscussion')
	{
	$("#titleforevenmtscal").html("Project Discussion");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}

 else if(event.ttype == 'EE')
	{
	$("#titleforevenmtscal").html("Job Test");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else if(event.ttype == 'SEM')
	{
	
	if(event.color == '#899194')
	{
	$("#joinlinkforadmin").hide();
	}
	else
	{
	$("#joinlinkforadmin").hide();
	}

$("#titleforevenmtscal").html("On Campus Class");
			$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").html("End : "+moment(event.end).format("MMMM Do YYYY, h:mm a"));
						$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						$("#onlineclassenddate").show();
					$("#groupnameofonlineclass").show();
						
						$("#joinlinkforadmin").attr("href", event.joinurl);
						//	$("#joinlinkforadmin").show();
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
				
		}
	else 
	{
	
	if(event.color == '#899194')
	{
	$("#joinlinkforadmin").hide();
	}
	else
	{
	$("#joinlinkforadmin").show();
	}

$("#titleforevenmtscal").html("Online Class");
			$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").html("End : "+moment(event.end).format("MMMM Do YYYY, h:mm a"));
						$("#groupnameofonlineclass").html("Group name : " +event.gname);
						$("#descriptionforonlioneclass").html(event.description);
						$("#onlineclassenddate").show();
					$("#groupnameofonlineclass").show();
						
						$("#joinlinkforadmin").attr("href", event.joinurl);
						//	$("#joinlinkforadmin").show();
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
				
		}		
		}

    });
	$("#myModalinstitute").modal({keyboard: false});
	}
	
	function saveiccinfo(a,b,code)
	{
	
	$("#titleiccdeptype").val(b);
		$("#titleiccdepcode").val(code);
	$("#titleiccdep").val(a);
	$("#studneticcdep").modal({keyboard: false});
	}
	
	function addsemadmin()
	{
	$("#myModalinstitutesemester").modal({keyboard: false});
	}
	
	function logouturl()
	{
	 
window.location.href = targeturl+'users/logout';
	}
	
	function synctoclanederbystudent()
	{
	 
window.location.href = targeturl+'users/synctocalendar';
	}
	
	
	
 function calendarfilter(a,b)
	{
	//alert("hello");
	
	$("#hhjjjkjkjkjl").val('all');
	$("#lisddiffcompsaccor").val('');
	$("#lisdifftopivsacco").val('');
	$("#nfkvdslkfkc").val('');
	
	
	var getsemmode = $("#getsemmode").val();
	
	
	
	if(a == 'all') {
	$("#showallonlinecls").hide();
	
	var urlevent = targeturl+'events/getalluserevents/all/all';
	
	}
	else {
	$("#showallonlinecls").show();
	
	var urlevent = targeturl+'events/getalluserevents/'+a+'/'+b;
	}
	$("#modalforfileegt").modal('hide');
	
	
	//alert(urlevent);
	//alert(a);
	$('#calendar').fullCalendar('destroy');
	
	$('.fc-scroller').css('overflow','visible');
	
	 var tdate = new Date();
   var dd = tdate.getDate(); //yields day
   var MM = tdate.getMonth(); //yields month
   var yyyy = tdate.getFullYear(); //yields year
   var currentDate= yyyy + "-" +( MM+1) + "-" +dd ;
  // alert(currentDate);

 //currentDate = '2019-05-15';

  //alert(targeturl+'events/getallusereventsfilter/'+a);

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
	   height: 600,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
     eventLimit: true, // allow "more" link when too many events
	 eventOrder: 'id',
	 timezone: 'Asia/Kolkata',
	    
    events: urlevent,
	/* events: [
	  
	  {
          title: 'Number System Lesson',
          start: '2019-05-015',
		   allDay : true
        }
		],*/
	
/*	eventDrop: function(event, delta, revertFunc) {
           
		alert(event.id);
		alert(urlevent);
		alert(event.title + " was dropped on " + event.start.format() +" end date "+ event.end.format());

        },  */
  eventConstraint: {
            start: currentDate,
             end: '2030-01-01'
          
        },
		
		eventRender: function(event, element) {
    if (event.type == 'EXAM' || event.type == 'SEM' ) {
        element.draggable = false;

    }
	},

 eventDrop: function(event, delta) {
 
 
   
	 
	
  if(event.start == null )
   var start = event.start+'T00:00:00'; 
   else   
   var start = event.start.format();
   
   
 
   
      if(event.end == null )
   var end = event.start.format();
   else   
   var end = event.end.format();
   
   
   /* alert(event.durationprofile);
	alert(start);
     alert(end);
	alert(event.end);*/
	
	 /*alert(start);
     alert(end);*/
	 
	 //alert(event.completionflag);
	 
	 if(event.completionflag == '1'){
	 
	  $('#calendar').fullCalendar('refetchEvents');
	 } 
	 else if(getsemmode == 'Semester wise')
	 {
	 
	 //alert("Drop disabled.");
	 $('#calendar').fullCalendar('refetchEvents');
	 
	 
	 }
	
     else if(event.type == 'EXAM' || event.type == 'SEM' || event.type == 'OC' ){
	
	
	
	alert("You're not allowed to modify this event. Please reach out to Institute Admin for the modification.");
	
	   $('#calendar').fullCalendar('refetchEvents');
	
	} else {
   $.ajax({
  
   url: targeturl+'events/updateevents/',
  
     data: {'id': event.id, 'start': start , 'end' : end ,'durationprofile' : event.durationprofile  },
   type: "POST",
   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
           
            },
   success: function(json) {
 //   console.log(json);
	   $('#calendar').fullCalendar('refetchEvents');
   }
   });
   
   }
   },
   timeFormat: 'h(:mm)a',
   eventResize: function(event) {
   var start = event.start.format();
   var end = event.end.format();
   
 //  console.log(event.start);
//	console.log(event.end);
   //alert(start);
     //alert(end);
	  if(event.completionflag == '1'){
	 
	  $('#calendar').fullCalendar('refetchEvents');
	 } 
	 else if(getsemmode == 'Semester wise')
	 {
	 
	// alert("Drop disabled.");
	 $('#calendar').fullCalendar('refetchEvents');
	 
	 
	 }
	
     else if(event.type == 'EXAM' || event.type == 'SEM' ){
	
	//console.log('Not allowed to edit');
			alert("You're not allowed to modify this event. Please reach out to Institute Admin for the modification.");
		  $('#calendar').fullCalendar('refetchEvents');
	
	} else {
	 
   $.ajax({
     url: targeturl+'events/updateevents/',
  
     data: {'id': event.id, 'start': start , 'end' : end },
    type: "POST",
		   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
    success: function(json) {
    // console.log(json);
    }
   });
}
},		
     timeFormat: 'h(:mm)a',

    eventClick: function(event) {
    if (event.url) {
        //window.open(event.url, "_blank");
		/*window.open(event.url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1200, HEIGHT=600');*/
	
		if(event.type == 'SEM')
	{
	$("#titleforevenmtscal").html("On Campus Class");
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").html("End : "+moment(event.end).format("MMMM Do YYYY, h:mm a"));
						$("#descriptionforonlioneclass").html(event.description);
						
							$("#onlineclassenddate").show();
					$("#groupnameofonlineclass").hide();
						
					//	$("#joinlinkforadmin").attr("href", event.url);
			
				$("#basicExampleModal").modal({keyboard: false});
				
				
					if(event.color == '#899194')
	{
	$("#joinlinkforadmin").hide();
	}
	else
	{
	$("#joinlinkforadmin").hide();
	}
				
	}
	else if(event.type == 'OC')
	{
	$("#titleforevenmtscal").html("Online Class");
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").html("End : "+moment(event.end).format("MMMM Do YYYY, h:mm a"));
						$("#descriptionforonlioneclass").html(event.description);
						
							$("#onlineclassenddate").show();
					$("#groupnameofonlineclass").hide();
						
						$("#joinlinkforadmin").attr("href", targeturl+'/users/onlineclassactivity?code='+event.code+'&url='+event.url);
			
				$("#basicExampleModal").modal({keyboard: false});
				
				
					if(event.color == '#899194')
	{
	$("#joinlinkforadmin").hide();
	}
	else
	{
	$("#joinlinkforadmin").show();
	}
				
	}
	 else if(event.type == 'Seminar')
	{
	$("#titleforevenmtscal").html("Seminar");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
				
				
				
				
	}
	else  if(event.type == 'Webinar')
	{
	$("#titleforevenmtscal").html("Webinar");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.type == 'Recordings')
	{
	$("#titleforevenmtscal").html("Recordings");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.type == 'Assignment')
	{
	$("#titleforevenmtscal").html("Assignment");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.type == 'Internals')
	{
	$("#titleforevenmtscal").html("Internals");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.type == 'MidtermExamination')
	{
	$("#titleforevenmtscal").html("Midterm Examination");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.type == 'SemesterExamination')
	{
	$("#titleforevenmtscal").html("Semester Examination");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
		else  if(event.type == 'CampusPlacement')
	{
	$("#titleforevenmtscal").html("Campus Placement");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.type == 'OffCampusPlacement')
	{
	$("#titleforevenmtscal").html("Off Campus Placement");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else  if(event.type == 'ProjectDiscussion')
	{
	$("#titleforevenmtscal").html("Project Discussion");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
						$("#descriptionforonlioneclass").html(event.description);
						
					
			
				$("#basicExampleModal").modal({keyboard: false});
				$("#meetingidforuser").val(event.meetingid);
	}
	else if(event.type == 'EE')
	{
	$("#titleforevenmtscal").html("Job Test");
	$("#joinlinkforadmin").hide();
	$("#titleforonlineevent").html("<b>"+event.title+"</b>");
				$("#onlineclasssgtartdate").html("Start : "+moment(event.start).format("MMMM Do YYYY, h:mm a"));
					$("#onlineclassenddate").html("End : "+moment(event.end).format("MMMM Do YYYY, h:mm a"));
						$("#descriptionforonlioneclass").html(event.description);
							$("#onlineclassenddate").hide();
					$("#groupnameofonlineclass").hide();
					
						
						
				
			
				$("#basicExampleModal").modal({keyboard: false});
	}
	else	if(event.type == 'L')
{

//alert("chapter coming soon.");


var useridmoodle =document.getElementById("userid").value;
	
	$.ajax({
                   type:"POST",
                   url: urlmainsite+'sms/savescorebooknew.php',
                   data:{
					 
                        useridmoodle : useridmoodle , lessoncode : event.title
                   },
                   dataType: 'json',
				   beforeSend: function() {
  
  },
                   success:function(response)
                    {

	//redirecturlsstudent(event.url,event.title);
	displayallchapeters(event.courseid);
		
 
                    }
                });
				
				

} else {
var r = confirm('This action will launch '+event.title);
if (r == true) {



redirecturlsstudentnew(event.url,event.title);


 
} else {
  
}
}
		
        return false;
    }
    },
	  eventRender: function(event,element){
  
  //console.log(event.ranges);
  //console.log(event.dow);
 // console.log(event.start);
 
 if(event.type == 'SEM') {
 
  nnn = moment(new Date()).format("YYYY-MM-DD");
 if(moment(event.end).isBefore(nnn))
 {
  element.css('background-color', '#899194');

 }
 else{
 console.log("after");
 }
 
  //console.log(event.ranges);
 //console.log(event.ranges.end);
    return (event.ranges.filter(function(range){ 

        return (event.start.isBefore(range.end) &&
                event.end.isAfter(range.start));

    }).length)>0; 
	}
}
      
    });
	$("#myModal1").modal({keyboard: false});
	
	}
	
	
	function displayallchapeters(a)
	{
	 $('#displaychaptersoflessionnew').html("");
				    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/calendarlesson.php',
                   data:{
                      cat_val : a 
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#displaychaptersoflessionnew').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
	
/*	if(data.length <= 5)
	{
							 $(".step-content.one1").css('height','400px');
	}
	else if(data.length >= 5 && data.length <= 10)
	{
							 $(".step-content.one1").css('height','800px');
	}*/
	
		
//maxHeight = 300 ;
						
						 $.each(data, function(index, element) {
						 
	//						 $(".step-content.one1").css('height', maxHeight+'px');
							 
												selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td style='width:200px'><a style='cursor:pointer;text-decoration:underline;color:blue' onClick='openmoodlelinklessonc(\"" + element.url + "\",\"" + element.name + "\",\"" + element.code + "\")' >View</a></td></tr>";	 

//maxHeight += 50 ;

                    });
						
					} else {
						
						 
                       selOpts += "<tr class='odd gradeX' ><td colspan='2' align='center'>No chapters found</td></tr>";
					}
						
                       $('#displaychaptersoflessionnew').html(selOpts);
					
                    }
                });
				
				$("#displaychapetrs").modal({keyboard: false});
	}
	
	
	function gettingstartedpopup()
	{
	$("#gettingStartedmodal").modal({keyboard: false});
	}
	
	function viewstudentcalendar(){
	
	
	$("#studentcalendarmodal").modal({keyboard: false});

 
 setTimeout(function () {
 document.getElementById("calendarfileterloadf").click();
  
}, 100);
 
	}
	
	function calendarview()
	{
	
	  $('#calendar').fullCalendar('rerenderEvents');
	$('.fc-scroller').css('overflow','visible');

  $('#calendar').fullCalendar('destroy');

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
	   height: 600,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	   eventOrder: 'id',
	  events: targeturl+'events/getalluserevents',
	  
	  timeFormat: 'h(:mm)a',
	  
	  eventClick: function(event) {
    if (event.url) {
        //window.open(event.url, "_blank");
		/*window.open(event.url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1200, HEIGHT=600');*/
		
		redirecturlsstudent(event.url,'');
		
        return false;
    }
}
      /*events: [
	  
	  {
          title: 'Number System Lesson',
          start: '2019-04-03',
        },
		
		{
          title: 'Number System Practice Quiz',
          start: '2019-04-04',
        },
		{
          title: 'Number System Level 1 Quiz',
          start: '2019-04-05',
        },
		{
          title: 'Number System Level 2 Quiz',
          start: '2019-04-08',
        }
		,
		{
          title: 'Number System Level 3 Quiz',
          start: '2019-04-09',
        },
		{
          title: 'HCF and LCM Lesson 1',
          start: '2019-04-10',
        }
		,
		{
          title: 'QA02 Practice test',
          start: '2019-04-11',
        },
		{
          title: 'QA02 Level 1 Quiz',
          start: '2019-04-12',
        },
		{
          title: 'QA02 Level 2 Quiz',
          start: '2019-04-15',
        },
		{
          title: 'QA02 Level 3 Quiz',
          start: '2019-04-16',
        },
		{
          title: 'QA02 Level 4 Quiz',
          start: '2019-04-17',
        }
	  
       {
          title: 'All Day Event',
          start: '2019-01-01',
        },
        {
          title: 'Long Event',
          start: '2019-01-07',
          end: '2019-01-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2019-01-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-01-11',
          end: '2019-01-13'
        },
        {
          title: 'Meeting',
          start: '2019-01-12T10:30:00',
          end: '2019-01-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-01-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-01-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-01-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-01-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-01-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2019-01-28'
        }
      ]*/
    });
	$("#myModal1").modal({keyboard: false});
	}
	
	
	function studentgroup()
	{
	$("#studentgroup").modal({keyboard: false});
	}
	
	
	
	
	function skipthelesson(id,status,c)
	{
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/updatestutsoflesson/',
                   data:{
                      cat_val : id , sta :status
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                      $('#'+id).html(data);
					    $('#modulestablez').DataTable().ajax.reload();
						 $('#modulestablezaddon').DataTable().ajax.reload();
						
					
                    }
                });
	
	}
	
	
	
		function deletetargetsforstudentre(targteid)
	{
	
	
if(targteid == 'EBL0001')
{
 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">Baseline Target deletion not allowed.</div>');
			
} else {
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/deleteexamcode/',
                   data:{
                      cat_val :targteid
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					  toastr.success(data);
					
				//	  $("#displayerrormesageforstudent").show();
			  
		//	  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">'+data+'</div>');

						/*$('#targetreomove1'+targteid).hide();
							 $('#targteadd1'+targteid).hide();*/
							 
							// openmodalbox("Add Targets" , "Manage my Targets");
							
							   
							   if(data === 'Could not be saved. Target already exists.' || data === 'Could not be saved. Not allowed to add.')
							{
							
							$('#existsidre'+targteid).show();
						   $('#existsid1re'+targteid).hide();
							toastr.error(data);
							}
							else {
							
							
							if($('#existsidre'+targteid).css('display') == 'none')
{
 $('#existsidre'+targteid).show();
   $('#existsid1re'+targteid).hide();
}
							
	else {						
						 
						   $('#existsid1re'+targteid).show();
						    $('#existsidre'+targteid).hide();
						   }
						   
						   
						   
						   }
                      
							 
							
							 
					
                    }
                });
	 }
	}
	
	
		function addtargetsforstudentre(targteid)
	{
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/tagetadd/',
                   data:{
                      cat_val :targteid
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					//alert(data);

							if(data == 'The number of Targets selected exceeds the permissible limit set for you. Please contact your administrator.')
							{
								toastr.error(data);
			  
		
							}
							else if(data === 'Could not be saved. Target already exists.' || data === 'Could not be saved. Not allowed to add.')
							{
							
							$('#existsidre'+targteid).show();
						   $('#existsid1re'+targteid).hide();
						   toastr.error(data);
							
							}
							else {
							
							  toastr.success(data);
							
								if($('#existsidre'+targteid).css('display') == 'none')
{
 $('#existsidre'+targteid).show();
   $('#existsid1re'+targteid).hide();
}
							
	else {						
						 
						   $('#existsid1re'+targteid).show();
						    $('#existsidre'+targteid).hide();
						   }
						   }
                      
					
                    }
                });
	
	}
	function deletetargetsforstudent(targteid)
	{
	
	
if(targteid == 'EBL0001')
{
 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">Baseline Target deletion not allowed.</div>');
			
} else {
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/deleteexamcode/',
                   data:{
                      cat_val :targteid
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					  toastr.success(data);
					
				//	  $("#displayerrormesageforstudent").show();
			  
		//	  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">'+data+'</div>');

						/*$('#targetreomove1'+targteid).hide();
							 $('#targteadd1'+targteid).hide();*/
							 
							// openmodalbox("Add Targets" , "Manage my Targets");
							
							   
							   if(data === 'Could not be saved. Target already exists.' || data === 'Could not be saved. Not allowed to add.')
							{
							
							$('#existsid'+targteid).show();
						   $('#existsid1'+targteid).hide();
							toastr.error(data);
							}
							else {
							
							
							if($('#existsid'+targteid).css('display') == 'none')
{
 $('#existsid'+targteid).show();
   $('#existsid1'+targteid).hide();
}
							
	else {						
						 
						   $('#existsid1'+targteid).show();
						    $('#existsid'+targteid).hide();
						   }
						   
						   
						   
						   }
                      
							 
							
							 
					
                    }
                });
	 }
	}
	
	
		function addtargetsforstudent(targteid)
	{
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/tagetadd/',
                   data:{
                      cat_val :targteid
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					

						 /* $('#targetreomove2'+targteid).hide();
							 $('#targteadd2'+targteid).hide();*/
							 
							//  openmodalbox("Add Targets" , "Manage my Targets");
							
									 // $("#displayerrormesageforstudent").show();
									  
									
			  
			//  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style=" width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">'+data+'</div>');

							
							if(data == 'The number of Targets selected exceeds the permissible limit set for you. Please contact your administrator.')
							{
												 // $("#displayerrormesageforstudent").show();
												 
												   toastr.error(data);
			  
		//	  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style=" width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">'+data+'</div>');

							
							}
							else if(data === 'Could not be saved. Target already exists.' || data === 'Could not be saved. Not allowed to add.')
							{
							
							$('#existsid'+targteid).show();
						   $('#existsid1'+targteid).hide();
						   toastr.error(data);
							
							}
							else {
							
							  toastr.success(data);
							
								if($('#existsid'+targteid).css('display') == 'none')
{
 $('#existsid'+targteid).show();
   $('#existsid1'+targteid).hide();
}
							
	else {						
						 
						   $('#existsid1'+targteid).show();
						    $('#existsid'+targteid).hide();
						   }
						   }
                      
					
                    }
                });
	
	}
	
	
	function makestudentactive(id,status)
	{
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/updatestuts/',
                   data:{
                      cat_val : id , sta :status
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
  //console.log(data);
						
                       //$('#st'+id).html(data);
					   $('#stdtable').DataTable().ajax.reload();
					
                    }
                });
	
	}
	
	function showdetail(a,b)
	{
	//alert(a);
	/*if(b == 'industry')
	url = 'https://mongodb.loc/display.php';
	if(b == 'company')
	url = 'https://mongodb.loc/company.php';
	if(b == 'exams')
	url = 'https://mongodb.loc/exams.php';
	if(b == 'institution')
	url = 'https://mongodb.loc/institution.php';*/
	
	
	if(b == 'industry')
	url = 'https://mongodb.odinlearning.in/display.php';
	if(b == 'company')
	url = 'https://mongodb.odinlearning.in/company.php';
	if(b == 'exams')
	url = 'https://mongodb.odinlearning.in/exams.php';
	if(b == 'institution')
	url = 'https://mongodb.odinlearning.in/institution.php';
	
	
	       $.ajax({
                    url: url,
                    //force to handle it as text
                    dataType: "text",
					
					 type: 'POST',
           
			data:{
                      cat_val : a 
                   },
				     beforeSend: function(xhr) 
            {
			$('#getdatafornosql').html("");
			  //xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#getdatafornosql').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
                    success: function(data) {
					
					//alert(data);
                       
                        //data downloaded so we call parseJSON function
                        //and pass downloaded data
                        var json = $.parseJSON(data);
                        //now json variable contains data in json format
                        //let's display a few itemscons
                        //console.log("data is - "+json);
                       
                       // $.each(json, function(idx, obj) {
 
 //$.each(obj, function(idx, obj) {
 //console.log("one-"+obj+" "+idx);
 //$('#results').append("<strong>"+obj+"</strong> :- "+idx+"<br/><br/>");
 //});
//});
function Iterate(data)
{
// console.log(data.length);

if(data.length == 0)
{
$('#getdatafornosql').append("No data found");

} else {

    jQuery.each(data, function (index, value) {
        if (typeof value == 'object') {
            //alert("Object " + index);
            Iterate(value);
        }
        else {
            // alert(index + "   :   " + value);
			
			if( index != '$oid') {
			 
			 $('#getdatafornosql').append("<tr class='odd gradeX'><td><strong>"+index+"</strong></td><td>"+value+"</td></tr>");	}
			 
            // $('#results').append("<strong>"+index+"</strong> :- "+value+"<br/><br/>");
        }
    });
	}
};
Iterate(json);
                       
                      //  $('#results').html('Plugin name: ' + json.alignment1);
                    }
                });
	
	
	$("#nosqldata").modal({keyboard: false});
	}
	
	
	function getmoodlequizid(a,score)
	{
	
	var uid = document.getElementById("useridmoodle").value;


	
	
	
	        $.ajax({
            type: 'POST',
            url: targeturl+'users/getquizattaemps/',
			data:{
                      cat_val : a , userid : uid , score: score
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			  $('#loadquizattempts').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
            success: function(response) 
            {
                  var selOpts = "";
				//  console.log(uid);
				 // console.log(response.length);
			 // console.log(response);
  
  	if(response.length > 0){
		

						
						 $.each(response, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.attempt+"</td><td>"+element.timestart+"</td><td>"+element.timefinish+"</td><td>"+element.sumgrades+"</td><td>"+element.timeinterval+"</td></tr>";	 
				
                    });
						
					} else {
						
						  selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#loadquizattempts').html(selOpts);
            }
           /* error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }*/
        });
	
	
			$("#quizattempts").modal({keyboard: false});	
	
	}
	
	
	function viewhrconnect(a)
	{
	if(a == 'hc') {
	window.open('users/openhrconect/', 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	else if(a == 'sc') {
	window.open('users/openscconect/', 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	else if(a == 'ic') {
	window.open('users/openicconect/', 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	else if(a == 'recoapi') {
	
	window.open('users/openrecoapiconect/', 'Pagina', 'directories=no,titlebar=no,STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=900, HEIGHT=700'); 
	
	/*document.getElementById('iframerecoapi').src = 'http://recoapi.odinlearning.in/';
	$("#recoapi").modal({keyboard: false});*/
	
	
	}
	else {
	window.open('users/openpcconect/', 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	
	
	
	}
	function openmoodlelink(a,b){
	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	
	redirecturlsstudentnew(a,b);
	
	
	}
	
	 function openmoodlelinkassignmentcoding(a,b,c,d,e){
	 
	  $.getJSON(b, function(data) {
                //console.log(data);
 $("#assignmentquestionffee").html(data.question.questiontext.text);
})
	 
	            
	 $("#modalforassignmentfeed").modal({keyboard: false});
	 
	 
	 }

        function openmoodlelinkassignment(a,b,c,d,e){
	
		
			document.getElementById('homeas-tab').click(); 
	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	
	//redirecturlsstudentnew(a,b);
            $.getJSON(b, function(data) {
                console.log(data);
 $("#assignmentquestion").html(data.question.questiontext.text);
 
 settoime = data.recording_duration_seconds;
  $("#settoime").val(settoime);
 if(data.showtextupload == 1)
 {
 $("#writeamseflas").show();
 }
 else
 {
  $("#writeamseflas").hide();
 }
 
 if(data.showfileupload == 1)
 {
 $("#uplaodassflas").show();
 }
 else
 {
  $("#uplaodassflas").hide();
 }
 
 if(data.showvideoupload == 1)
 {
 $("#recordingflas").show();
 }
 else
 {
  $("#recordingflas").hide();
 }
})



           
            $("#codeforassignment").val(a);
            
             $("#assignmentnamestu").val(c);
             $("#assignmenturlstu").val(b);
              $("#compreacodeforassignment").val(e);
              
              
              /*************************/
              
                      var fd = new FormData();
      
      
fd.append('userid',d);
    
        
fd.append('codeforassignment',a);
       
        
        


        $.ajax({
            url: urlmainsite+'sms/checksorecforassign.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
              beforeSend: function() {
   
                  
                  
  },
            success: function(response){
			
			//alert(response);
               
                 
                if(response == '1')
                    {
                                                  $.getJSON(b, function(data) {
                
 $("#feedabckstudentassih").html(data.question.generalfeedback.text);
})
                         $("#shwistudentanswerfeedbavck").hide();
                         $("#genefadcehkkjdlk").show();
                        
                    }
                else
                    {
                          $("#shwistudentanswerfeedbavck").show();
                          $("#genefadcehkkjdlk").hide();
                        
                    }
              
            },
        });
              /***************************/
            
            
	 $("#modalforassignment").modal({keyboard: false});
	
	}
        
                function openmoodlelinkassignmentnew(a,b,c,d,e){
	
		document.getElementById('homeas1-tab').click(); 

	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	
	//redirecturlsstudentnew(a,b);
            $.getJSON(b, function(data) {
                //console.log(data);
 $("#assignmentquestion1").html(data.question.questiontext.text);
})
           
            $("#codeforassignment").val(a);
            
             $("#assignmentnamestu").val(c);
             $("#assignmenturlstu").val(b);
                      $("#assignmenturlstuuid").val(d);
                    
                     $("#assignmenturlstuuidgroupid").val(e);
            
            
	 $("#modalforassignment1").modal({keyboard: false});
	
	}
	

	function openmoodlelinklesson(a,b,c){
	
	var useridmoodle =document.getElementById("userid").value;
	
	$.ajax({
                   type:"POST",
                   url: urlmainsite+'sms/savescorebooknew.php',
                   data:{
					 
                        useridmoodle : useridmoodle , lessoncode : c 
                   },
                   dataType: 'json',
				   beforeSend: function() {
   // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(response)
                    {
//alert(response);
 
	redirecturlsstudent(a,b);
 
                    }
                });
	
	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	

	
	
	}
	
		function openmoodlelinklessonc(a,b,c){
		
		var r = confirm('This action will launch the Chapter '+ b);
if (r == true) {
	
	var useridmoodle =document.getElementById("userid").value;
	
	$.ajax({
                   type:"POST",
                   url: urlmainsite+'sms/savescorebooknew.php',
                   data:{
					 
                        useridmoodle : useridmoodle , lessoncode : c 
                   },
                   dataType: 'json',
				   beforeSend: function() {
   // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(response)
                    {
//alert(response);
 
	redirecturlsstudent(a,b);
 
                    }
                });
	
	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	

	} else {
  
}
	
	}
	
	
	
	
	function openmoodlelink1(a,b){
	
	
	if(document.getElementById("getsemanme").value == b) {
	
	/*window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); */
	
	redirecturlsstudent('cms/displayquiz/'+a,'');
	 }
	 else {
	 
	   $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="width: 70%;margin-left: 18%;text-align: center;position: fixed;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 100000000000000;">You`re not eligible to view this semester lesson.</div>');

	 
	 
	 }
	
	}
	
	
	
	


	
	
	function openmodalboxfordonut(a,b,c)
	{
	 
	 $("#examnameaccordin").html(c);
	
	
	function openmodalboxfordonut1(a,b,c)
	{
	 
	 $("#examnameaccordin").html(c);
	 
	  $("#learningmodulesfordonut").modal({keyboard: false});
	 
	 
	 
	}
	 
	/***************************************/
	     $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getlesson.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
   
  },
                   success:function(data)
                    {
  var selOpts1 = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts1+=element.courseid+',';
				
                    });
						
					} else {
						
						selOpts1+=''; 
                      
					}
						// alert(selOpts1);
						
						//document.getElementById("lessoncount").value = selOpts1;  
						
						$.cookie("lessoncount", selOpts1);
						
					
                    }
					 
                });
	 /***************************************/
	 
	 
	  /****************************** practice quiz ****************************/
						  $.ajax({
						   type:"POST",
                   url:urlmainsite+'cmd/getpracticequiz.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmods').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts1 = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts1+=element.courseid+',';
				
                    });
						
					} else {
						
						 
                       selOpts1+=''; 
					}
						
                      // alert(selOpts1);
					 //  document.getElementById("pccount").value = selOpts1;  
					 $.cookie("pccount", selOpts1);
					
                    }
					 });	 
						 /****************************** end ***************************************/
						 
						 
						   $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getquizes.php',
                   data:{
                      cat_val : a , limitre : b
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmods').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts1 = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
							selOpts1+=element.courseid+',';
				
                    });
						
					} else {
						
						 
                      selOpts1+=''; 
					}
						
                      // document.getElementById("quizcount").value = selOpts1;  
					    $.cookie("quizcount", selOpts1);
						
						var courses =  $.cookie("lessoncount") +  $.cookie("pccount") +  $.cookie("quizcount");
	alert(courses);
					
                    }
                });
                
	  
	 
	 
	//  $( "#morris-donut-chart" ).empty();
	 
	     Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
			label: "Selected Targets",
            value: document.getElementById("gettargetcount").value
            
        }, {
            label: "Remaining Tragets",
            value: 10 - document.getElementById("gettargetcount").value
        }],
        resize: true
    });
	
	
	
	 $("#learningmodulesfordonut").modal({keyboard: false});
	 
	 
	 
	}
	
	function openmodalboxforlearningcomprea(a,b)
	{
	
	 $('#learningmodscomprea').html("");
	 
	// alert(a);
	
	  
	  var csrftt = $('[name="_csrfToken"]').val();
	  
	  var uid =document.getElementById("userid").value;
	
//var useridmoodle =document.getElementById("useridmoodle").value;
	
		
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getbaselinelist.php',
                   data:{
                      cat_val : a , csrftokn : csrftt , uid : uid
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmodscomprea').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	 $.each(data, function(index, element) {
							 
							 finalurl = element.mcode +'&nsadfkj='+uid;
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.studyduration+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer' onClick='openmoodlelink(\"" + finalurl + "\",\"" + element.name + "\",\"" + uid + "\")'>View</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";	 
				
                    });
						
						/* $.each(data, function(index, element) {
							 
		
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.studyduration+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer;' onClick='openmoodlelink(\"" + element.mcode + "\",\"" + element.name + "\")' >View Quiz</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";	 
				
                    });*/
						
					} else {
						
						 
                       
					}
						
                       $('#learningmodscomprea').html(selOpts);
					
                    }
					,
            error: function(xhr, status, error) 
            {
			console.log(xhr.responseText);
			 
			
            }
                });
				
				$("#learningmodulescomprea").modal({keyboard: false});
				
				
				
				/**************************************************************/
				var userid  = document.getElementById("userid").value;

    $('#displayallbaselionedatalist').DataTable( {
	"bInfo" : false,
	      paging: false,
   ordering: false,
   searching: false,
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getbasliensub.php",
    "type": "POST",
	"data":{
                      userid : userid, compcode :b
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
        { "data": "totalquiz" },
		 { "data": "totalattempts" },
		  { "data": "passfail" },
        { "data": "percentagecom" },
        { "data": "avegaregarde" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
				
				/*************************************************************/
	}
	
				 function loadleassonstauys(code,uid,name,id,compreacode){
						 
						 			    $.ajax({
                   type:"POST",
                   url:urlmainsite+'sms/getchaptersstatus.php',
                   data:{
                      code : code , uid : uid , name : name , id : id , compreacode : compreacode
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadlessonstaus').html('<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>');
                  },
                   success:function(data)
                    {
					 $('#loadlessonstaus').html(data);
					}
					    });
						 }
        
        		 function loadleassonstauys22(code,uid,name,id,compreacode){
						 
						 			    $.ajax({
                   type:"POST",
                   url:urlmainsite+'sms/getchaptersstatus.php',
                   data:{
                      code : code , uid : uid , name : name , id : id , compreacode : compreacode
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadlessonstaus22').html('<button class="btn btn-primary" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</button>');
                  },
                   success:function(data)
                    {
					 $('#loadlessonstaus22').html(data);
					}
					    });
						 }
	
	function openmodalboxforlearning(a,b ,url,uid)
	{
	var uid =document.getElementById("userid").value;
	
	if( b == '7')
	{
	document.getElementById("loadurlforgraph").style.display = "none";
	}
	else
	{
	document.getElementById("loadurlforgraph").style.display = "block";
	}
	  document.getElementById('loadurlforgraph').src = url;
	
	 $('#learningmods').html("");
					   $('#learningmods1').html("");
					   $('#learningmods2').html("");
	
		 $('#displaychaptersoflession').html("");
	
	
	  //xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
	  
	//  console.log($('[name="_csrfToken"]').val());
	  
	  var csrftt = $('[name="_csrfToken"]').val();
	  
	
	var useridmoodle =document.getElementById("useridmoodle").value;
	if( b == '7')
	{
        $("#laefvsadfsjk").hide();
	$("#laefvsadfdsdsDSdsjknew").show();
	$("#laefvsadfsjknew").hide();
        
        
            // call subcategory ajax here 
   $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getlesson.php',
                   data:{
                      cat_val : a , csrftokn : csrftt
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadlessonstaus22').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
						 
						 loadleassonstauys22(element.code,uid,element.name,element.id,element.compreacoce);
							 
	
						//selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td><a style='cursor:pointer;' onClick='openmoodlelinklesson(\"" + element.mcode + "\",\"" + element.name + "\",\"" + element.code + "\")' >View</a></td></tr>";	 
				
                    });
					
					
						
					} else {
						
						 
                       
					}
						
                      // $('#learningmods').html(selOpts);
					
                    }
                });
        
        				    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getchapters.php',
                   data:{
                      cat_val : a 
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#displaychaptersoflession22').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
	
/*	if(data.length <= 5)
	{
							 $(".step-content.one1").css('height','400px');
	}
	else if(data.length >= 5 && data.length <= 10)
	{
							 $(".step-content.one1").css('height','800px');
	}*/
	
		
//maxHeight = 300 ;
						
						 $.each(data, function(index, element) {
						 
	//						 $(".step-content.one1").css('height', maxHeight+'px');
							 
												selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td style='width:200px'><a style='cursor:pointer;text-decoration:underline;color:blue' onClick='openmoodlelinklesson(\"" + element.url + "\",\"" + element.name + "\",\"" + element.code + "\")' >View</a></td></tr>";	 

//maxHeight += 50 ;

                    });
						
					} else {
						
						 
                       selOpts += "<tr class='odd gradeX' ><td colspan='2' align='center'>No chapters found</td></tr>";
					}
						
                       $('#displaychaptersoflession22').html(selOpts);
					
                    }
                });
    }
	else 
        {
            
            $("#laefvsadfsjk").show();
	$("#laefvsadfsjknew").hide();
	$("#laefvsadfdsdsDSdsjknew").hide();
            
    // call subcategory ajax here 
   $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getlesson.php',
                   data:{
                      cat_val : a , csrftokn : csrftt
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmods').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
						 
						 loadleassonstauys(element.code,uid,element.name,element.id,element.compreacoce);
							 
	
						//selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td><a style='cursor:pointer;' onClick='openmoodlelinklesson(\"" + element.mcode + "\",\"" + element.name + "\",\"" + element.code + "\")' >View</a></td></tr>";	 
				
                    });
					
					
						
					} else {
						
						 
                       
					}
						
                       $('#learningmods').html(selOpts);
					
                    }
                });
				/*******************************************************************************************************************/
				    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getchapters.php',
                   data:{
                      cat_val : a 
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#displaychaptersoflession').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
	
/*	if(data.length <= 5)
	{
							 $(".step-content.one1").css('height','400px');
	}
	else if(data.length >= 5 && data.length <= 10)
	{
							 $(".step-content.one1").css('height','800px');
	}*/
	
		
//maxHeight = 300 ;
						
						 $.each(data, function(index, element) {
						 
	//						 $(".step-content.one1").css('height', maxHeight+'px');
							 
												selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td style='width:200px'><a style='cursor:pointer;text-decoration:underline;color:blue' onClick='openmoodlelinklesson(\"" + element.url + "\",\"" + element.name + "\",\"" + element.code + "\")' >View</a></td></tr>";	 

//maxHeight += 50 ;

                    });
						
					} else {
						
						 
                       selOpts += "<tr class='odd gradeX' ><td colspan='2' align='center'>No chapters found</td></tr>";
					}
						
                       $('#displaychaptersoflession').html(selOpts);
					
                    }
                });
				/********************************************************************************************************************/
				
				
 if(b !=7) {		
 
			
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getpracticequiz.php',
                   data:{
                      cat_val : a , uid : uid
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmods').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
						 
						  url = element.mcode;
if(url.includes('?')){
 finalurl = element.mcode +'&nsadfkj='+uid;
  console.log('Parameterised URL');
}else{
  console.log('No Parameters in URL');
   finalurl = element.mcode +'?nsadfkj='+uid;
}
							if(element.targettype_id == 1) 
                                {
                                    selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer' onClick='openmoodlelink(\"" + finalurl + "\",\"" + element.name + "\",\"" + uid + "\")'>View</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";
                                }
								else if(element.targettype_id == 3)
								{
								                                      selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer' onClick='openmoodlelinkassignmentcoding(\"" + element.code + "\",\"" + finalurl + "\",\"" + element.name + "\",\"" + uid + "\",\"" + element.compreacoce + "\")'>View</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";

								}
                             else 
                                 {
                                  
                                     
                                      selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer' onClick='openmoodlelinkassignment(\"" + element.code + "\",\"" + finalurl + "\",\"" + element.name + "\",\"" + uid + "\",\"" + element.compreacoce + "\")'>View</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";
                                 }
							
							 
				
                    });
						
					} else {
						
						 
                       //selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#learningmods1').html(selOpts);
					
                    }
                });
	
	
	
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getquizes.php',
                   data:{
                      cat_val : a , limitre : b , uid : uid
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#learningmods').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							 finalurl = element.mcode +'&nsadfkj='+uid;
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.compstatus+"</td><td><a style='cursor:pointer' onClick='openmoodlelink(\"" + finalurl + "\",\"" + element.name + "\",\"" + uid + "\")'>View</a></td><td><a style='cursor:pointer;' onclick='opengradebookofstudentquiz(\"" + uid + "\",\"" + element.code + "\")'>View</a></td></tr>";	 
				
                    });
						
					} else {
						
						 
                       //selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#learningmods2').html(selOpts);
					
                    }
                });
	
	}
        
    }
	
	$("#learningmodules").modal({keyboard: false});
	
	
	 
	 
	
	
	}
	
	function openmodalboxprofile(a)
	{
	loadareaofinterest(1);
	 loadareaofinterest(2);
	 loadareaofinterest(3);
	 loadareaofinterest(4);
	 loadareaofinterest1(5);
	 loadareaofinterest(6);
	 loadareaofinterest(7);
	//  loadprofilewithgraph();
	
	if(a==3)
	{
	
	document.getElementById('removedefaultlink').click(); 
	
	
$("#dispalytileforecahc").html("My Profile");

	$("#idforprofilesection").show();
	$("#idforpersonal").show();
	$("#idforacdemic").show();
	$("#idforpersonality").show();
	
	
	
	$("#iforpreference").hide();
	$("#idfortargetsection").hide();
	$("#idforprodcutslist").hide();
	$("#workexperience").show();
	 
	 
	 
	}
	else if(a==4) {
	$("#dispalytileforecahc").html("My Settings");
	
document.getElementById('preferencessection').click();









$("#iforpreference").show();
	$("#idfortargetsection").show();
	$("#idforprodcutslist").hide();
	$("#idforprofilesection").hide();
	$("#idforpersonal").hide();
	$("#idforacdemic").hide();
	$("#idforpersonality").hide();
		$("#workexperience").hide();
	
	}
	
	else if(a==5) {
	
	
document.getElementById('lisdtofpurchadeitems').click();




	$("#dispalytileforecahc").html("My Purchases");




$("#iforpreference").hide();
	$("#idfortargetsection").hide();
	$("#idforprodcutslist").show();
	$("#idforprofilesection").hide();
	$("#idforpersonal").hide();
	$("#idforacdemic").hide();
	$("#idforpersonality").hide();
	
		$("#workexperience").hide();
	}
	else 
	{
	document.getElementById('removedefaultlink').click();
	}
	$("#userfprofile").modal({keyboard: false});
	}
	
	function redirecturlsstudent(url,a)
	{
	
	
	//alert("ghhlll");

//alert(targeturl+''+url);
document.getElementById('urlforthemainuser').src = url+'?nsadfkj='+document.getElementById("userid").value;

 $("#listallgroupsandcomscomsac").modal('hide');
 $("#studentcalendarmodal").modal('hide');
 
  $("#learningmodules").modal('hide');
   $("#comparerepro").modal('hide');
  
    $("#mymodalexamcomps").modal('hide');
	 $("#learningmodulescomprea").modal('hide');
	 	 $("#displaychapetrs").modal('hide');
  
 
 
 $("#sidenav-overlay").click();
 

	}
	
		function redirecturlsstudentnew(url,a)
	{
	
	
	//alert("ghhlll");

//alert(targeturl+''+url);
document.getElementById('urlforthemainuser').src = url+'&nsadfkj='+document.getElementById("userid").value;


 $("#studentcalendarmodal").modal('hide');
 
  $("#learningmodules").modal('hide');
   $("#comparerepro").modal('hide');
  
    $("#mymodalexamcomps").modal('hide');
	 $("#learningmodulescomprea").modal('hide');
  
 $("#listallgroupsandcomscomsac").modal('hide');
 
 $("#sidenav-overlay").click();
 

	}
	
	function openmodalboxscoredacrd()
	{
	
	$("#scoredcard").modal({keyboard: false});
	
	$("#morris-bar-chart").html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' style='margin-top: -215px;margin-left: -215px;' />");
									$("#morris-bar-chart1").html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' style='margin-top: -215px;margin-left: -215px;' />");
									
									$("#morris-bar-chart").html("Loading");
									$("#morris-bar-chart1").html("Loading");
									
									
	
	setTimeout(function () {
  document.getElementById('getchartforscore').click();
  
}, 1000);
	
 

//getalllttheexams();


	
	}
	
	function gettopicslist(a)
{

    $('#topicstable').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"cmd/getalltopicsnew.php",
    "type": "POST",
	"data":{
                      topic : a
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
        { "data": "comparea_id" },
        { "data": "name" },
        { "data": "description" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	$("#topicsdoaply").modal({keyboard: false});
}
	function openmodalboxtopics()
	{
	
	     $('#topicstable').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"cmd/getalltopics.php",
    "type": "POST",
	"data":{
                      topic : ""
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm" ><option value="">Filter by All</option></select>')
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
        { "data": "comparea_id" },
        { "data": "name" },
        { "data": "description" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	$("#topicsdoaply").modal({keyboard: false});
	/******/

	}
	
	
	function openmodalboxtarget(a,b)
	{
	document.getElementById("baselinecompnew-tab").click();
	 $('#mymodalexamcomps1').css('width', '90%');
	
	//$('#examcompsnormal').DataTable().ajax.reload();
	$("#mtitle2").text(b);
	//$(".form-control input-sm").val('Baseline');
	
	if(b=='Learning Plans-Baseline') {
	 var table = $('#examcompsnormal').DataTable();
   
           table.search("Baseline").draw();
		   
		    var table = $('#examcompsconsolidated').DataTable();
   
           table.search("Baseline").draw();
		   
		   
		   
		   
		   }
		  else  if(b=='My Target Competency - Target') {
	 var table = $('#examcompsnormal').DataTable();
 //  alert(a);
           table.search(a).draw();
		   
		    var table = $('#examcompsconsolidated').DataTable();
   
           table.search(a).draw();
		   
		   $('#mymodalexamcomps1').css('width', '40%');
		   
		   
		   }
		  
		   
		   else {
		   
		   var table = $('#examcompsnormal').DataTable();
   
           table.search("").draw();
		   
		    var table = $('#examcompsconsolidated').DataTable();
   
           table.search("").draw();
		   }
      
	
		/*getcompraedetails();
	
	exampscompfr();
	
	learningplaconsolida();*/
	

	
	//loadmodulesforstudents();
	displaymodulestype();
	
	
	
	$("#mymodalexamcomps").modal({keyboard: false});
	
	
	
	}
	
	function openmodalboxtargetfornew(a,b,c)
	{
	if(c=='SEM')
	{
	$("#showcompsh").hide();
	}
	else
	{
	$("#showcompsh").show();
	}
	 $('#compnamesforstud').html(a);
	 
	 var useridmoodle =document.getElementById("userid").value;
	 
	  var gettopicids =document.getElementById("gettopicids").value;
	   var tragetids =document.getElementById("tragetids").value;
	 
	
	
	  $('#studentcompetencies').DataTable( {
	  
	  //  "order": [[ 3, "desc" ],[ 0, "asc" ]],
	     paging: false,
   ordering: false,
   searching: false,
		
	 destroy : true,
	  //responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/targetcomps.php",
    "type": "POST",
	"data":{
                      cat_val : b ,useridmoodle: useridmoodle , gettopicids: gettopicids , tragetids : tragetids
                   },
				   "dataType": "json",
				   "cache": false,
				   
        				   	"dataSrc": function(data){
//  alert("Done!");
  calbackfortagets(b,useridmoodle,gettopicids,tragetids);
//console.log(data.data);
if(data.data == "No data found"){
return [];
}
else {
return data.data;
}
}
  },
   initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
  { "data": "level" },
  { "data": "topics" },
  
 
 
  { "data": "totalhours" },
   { "data": "pendinghours" },
   { "data": "hours" }
   
  
		
        
    ],
		 "columnDefs": [
		// { "width": "70px", "targets": [3] },
    { "orderable": false, "targets": [0,1]}
	],
   
} );
	
	$("#targetmodalforstudent").modal({keyboard: false});
	
	
		    // call subcategory ajax here 
  
	
	
	}
	
	function calbackfortagets(b,useridmoodle,gettopicids,tragetids)
	{
	  $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/targetcompsotbs.php',
                   data:{
                        cat_val : b ,useridmoodle: useridmoodle , gettopicids: gettopicids , tragetids : tragetids
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(data)
                    {

 
 if(data == '0')
						{
 $('#overalltagetsection').html('0.00% <a onclick="comptaraereport();return false;" style="text-decoration:underline">Set Score</a>');
						}
						else
						{
							$('#overalltagetsection').html(data+'%');
						}
 
                    }
                });
	}
	
	
	function displaydetailsforthemoduels(a,b)
	{
	 $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/modulesdisplaydescription.php',
                   data:{
                        cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function() {
    $('#contenmtmodiules').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(data)
                    {
 $('#contenmtmodiules').html(data);
 //console.log(data.data);
 $('#loadmodaltil').html(b);

 
                    }
                });
				$("#diagnosticsdescriptio").modal({keyboard: false});
	}
	function getcomapnytypefileters(){
	
	
	    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'neo4j/companytypefilters.php',
                   data:{
                       //cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#companytypes').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	//selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.name+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#companytypes').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
	
	}
	
	function getcomapnyoperationsfileters(){
	
	
	    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'neo4j/companyoperationsfilters.php',
                   data:{
                     //  cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#companyoperations').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	//selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.name+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#companyoperations').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
	
	}
	
	
	function getrecommendedcomapnies(){
	
	
	
	  var final = '';
    $('.ads_Checkbox1:checked').each(function(){        
        //var values = '' + '"'+ $(this).val()+ '"'+',';
		
		 var values =  $(this).val()+ ',';
		
		var values1 = (this.checked ? values : "");
		
        final += values1;
		
        
    });
	
	
	
	str = final.replace(/,\s*$/, "");
//	alert(str);
	
	    $('#recommedcompanies').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"json.php",
    "type": "POST",
	data:{cid: str}, 

	
	
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
   

      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        //{ "data": "recommendedCompanyId" },
        { "data": "recommendedCompanyName" },
        { "data": "recommendedCompanyType" },
		 { "data": "recommededOperations" },
     //   { "data": "recommededIndustryId" }
        
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	
	}
	
	
	
	function filtercomapnies()
	{
	
	

 $('#recommedcompanies').dataTable().fnClearTable(); // CODE TO CLEAR THE TABLE
  $('#recommedjobes').dataTable().fnClearTable();
	
	var referenceToForm = document.getElementById("myFormforfilter");
	
	if (referenceToForm.elements["companytypes[]"].selectedIndex == -1) {
  alert("Please select the company type.");
  return false;
}
	else 	if (referenceToForm.elements["companyoperations[]"].selectedIndex == -1) {
  alert("Please select the company operation.");
} else {
	
	//alert(document.getElementById("getallcomapniesliststat").value);
	
	var a = document.getElementById("getallcomapniesliststat").value;
	
	
	if(document.getElementById("getallcomapniesfiltertype").value==1){
	
	  var final = '';
	
	$("#companytypes1 :selected").map(function(i, el) {
   
	 
	  
	   var values = 'c.CompanyType =' + '"'+ $(el).val()+ '"'+' or ';
		
		
		
        final += values ;
	  
	
}).get();
     
	b = final;
	
	
	  var final1 = '';
	
	$("#companyoperations1 :selected").map(function(i, el) {
   
	 
	  
	   var values1 = 'c.Operations =' + '"'+ $(el).val()+ '"'+' or ';
		
		
		
        final1 += values1 ;
	  
	
}).get();
     
	c = final1;
	
	var url = urlmainsite+'neo4j/getcompaniesfilter.php';
	
	} else {
	
	//alert("Jobs Type");
	
	
		  var final = '';
	
	$("#companytypes1 :selected").map(function(i, el) {
   
	 
	  
	   var values = 'm.CompanyType =' + '"'+ $(el).val()+ '"'+' or ';
		
		
		
        final += values ;
	  
	
}).get();
     
	b = final;
	
	
	  var final1 = '';
	
	$("#companyoperations1 :selected").map(function(i, el) {
   
	 
	  
	   var values1 = 'm.Operations =' + '"'+ $(el).val()+ '"'+' or ';
		
		
		
        final1 += values1 ;
	  
	
}).get();
     
	c = final1;
	
	
	var url = urlmainsite+'neo4j/getjobsforgroupfileter.php';
	
	}
	
	/*alert(a);
	alert(b)
	alert(c);*/
	
	
	
	
	/******************************* filter *********************************/
	
	$.ajax({
                    url: url,
                    //force to handle it as text
                    dataType: "text",
					
					 type: 'POST',
           
			data:{
                      cat_val : a , companaytype: b , companyoperations: c
                   },
				     beforeSend: function(xhr) 
            {
			$('#getdatafornosql1').html("");
			  //xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#getdatafornosql').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
                    success: function(data) {
					
				//	alert(data);
                       
                        //data downloaded so we call parseJSON function
                        //and pass downloaded data
                        var json = $.parseJSON(data);
                        //now json variable contains data in json format
                        //let's display a few itemscons
                        //console.log("data is - "+json);
                       
                       // $.each(json, function(idx, obj) {
 
 //$.each(obj, function(idx, obj) {
 //console.log("one-"+obj+" "+idx);
 //$('#results').append("<strong>"+obj+"</strong> :- "+idx+"<br/><br/>");
 //});
//});
function Iterate(data)
{
// console.log(data.length);

if(data.length == 0)
{
$('#getdatafornosql1').append("No data found");

} else {

    jQuery.each(data, function (index, value) {
        if (typeof value == 'object') {
            //alert("Object " + index);
            Iterate(value);
        }
        else {
            // alert(index + "   :   " + value);
			
			if( index != '$oid') {
			 
			 $('#getdatafornosql1').append("<tr class='odd gradeX'><td><strong>"+index+"</strong>&nbsp;&nbsp;"+value+"</td></tr>");	}
			 
            // $('#results').append("<strong>"+index+"</strong> :- "+value+"<br/><br/>");
        }
    });
	}
};
Iterate(json);
                       
                      //  $('#results').html('Plugin name: ' + json.alignment1);
                    }
                });
	
	/***************************** end of filter *************************************/
	
	}
	}
	
	function getgraphdbindustryname(a , b)
	{
	//alert(a);
	 $('#recommedcompanies').dataTable().fnClearTable();
	  $('#recommedjobes').dataTable().fnClearTable();
	 
	 
	
	
	//$('#getdatafornosql1').remove();
	
	if(b == '1'){
	
	getcomapnyoperationsfileters();
getcomapnytypefileters();
	
	
	  var final = '';
    $('.ads_Checkbox:checked').each(function(){        
        var values = 'n.IndustryName =' + '"'+ $(this).val()+ '"'+' or ';
		
		var values1 = (this.checked ? values : "");
		
        final += values1 ;
    });
     
	 var a = final;
	 
	// alert(a);
	
	document.getElementById("getallcomapniesliststat").value= a;
	document.getElementById("getallcomapniesfiltertype").value= 1;
	
	
	 
	 if(a == "")
	 {
	 alert("Please choose the options to proceed further.");
	 return false;
	 }
	 $("#getthetitleforgraph").html('Companies : ');
	
	$("#showcomapnygdb").hide();
	$("#showjobsgdb").show();
	$("#showtargetgdb").hide();
	$("#showjobsgdb1").hide();
	$("#recomenedcompanies").show();
	$("#recomenedjobs").hide();
		$("#companytypes1").show();
	$("#companyoperations1").show();
	$("#getfiltersforthecompany").show();
	
	var url = urlmainsite+'neo4j/getcompanies.php';
	}
	else if(b == '2'){
		
	
	  var final = '';
    $('.ads_Checkbox1:checked').each(function(){        
        var values = 'n.CompanyName =' + '"'+ $(this).val()+ '"'+' or ';
		
		var values1 = (this.checked ? values : "");
		
        final += values1 ;
		
        
    });
     
	 var a = final;
	  if(a == "")
	 {
	 alert("Please choose the options to proceed further.");
	 return false;
	 }
	 $("#getthetitleforgraph").html('Jobs : ');
		
		$("#showcomapnygdb").hide();
	$("#showjobsgdb").hide();
	$("#showtargetgdb").show();
		$("#showjobsgdb1").hide();
		$("#recomenedcompanies").hide();
	$("#recomenedjobs").show();
		$("#companytypes1").hide();
	$("#companyoperations1").hide();
	$("#getfiltersforthecompany").hide();
	var url = urlmainsite+'neo4j/getjobs.php';
	}
	else if(b == '3'){
		
	
	  var final = '';
    $('.ads_Checkbox2:checked').each(function(){        
        var values = 'n.ExamName =' + '"'+ $(this).val()+ '"'+' or ';
       var values1 = (this.checked ? values : "");
		
        final += values1 ;
    });
     
	 var a = final;
	  if(a == "")
	 {
	 alert("Please choose the options to proceed further.");
	 return false;
	 }
	 
	// alert(a);
	
	$("#getthetitleforgraph").html('Suggested Targets for the Job : ');
		
		$("#getfiltersforthecompany").hide();
		$("#showcomapnygdb").hide();
	$("#showjobsgdb").hide();
	$("#showtargetgdb").hide();
		$("#showjobsgdb1").hide();
		$("#recomenedcompanies").hide();
	$("#recomenedjobs").hide();
		$("#companytypes1").hide();
	$("#companyoperations1").hide();
	
	var url = urlmainsite+'neo4j/suggestedtargets.php';
	}
	else if(b == '4'){
		
		getcomapnyoperationsfileters();
getcomapnytypefileters();
	
	  var final = '';
    $('.ads_Checkbox5:checked').each(function(){        
        var values = 'k.JobgroupCode =' + '"'+ $(this).val()+ '"'+' or ';
        var values1 = (this.checked ? values : "");
		
        final += values1 ;
    });
     
	 var a = final;
	 //alert(a);
	  if(a == "")
	 {
	 alert("Please choose the options to proceed further.");
	 return false;
	 }
	 
	 	document.getElementById("getallcomapniesliststat").value= a;
		document.getElementById("getallcomapniesfiltertype").value= 2;
	 
	 $("#getthetitleforgraph").html('Companies : ');
		
		$("#showcomapnygdb").hide();
	$("#showjobsgdb").show();
	$("#showtargetgdb").hide();
		$("#showjobsgdb1").hide();
	$("#getfiltersforthecompany").show();	
		$("#recomenedcompanies").show();
	$("#recomenedjobs").hide();
		$("#companytypes1").show();
	$("#companyoperations1").show();
	
	var url = urlmainsite+'neo4j/getjobsforgroup.php';
	}
	
	
	
	$.ajax({
                    url: url,
                    //force to handle it as text
                    dataType: "text",
					
					 type: 'POST',
           
			data:{
                      cat_val : a 
                   },
				     beforeSend: function(xhr) 
            {
			$('#getdatafornosql1').html("");
			  //xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#getdatafornosql').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
                    success: function(data) {
					
				//	alert(data);
                       
                        //data downloaded so we call parseJSON function
                        //and pass downloaded data
                        var json = $.parseJSON(data);
                        //now json variable contains data in json format
                        //let's display a few itemscons
                        //console.log("data is - "+json);
                       
                       // $.each(json, function(idx, obj) {
 
 //$.each(obj, function(idx, obj) {
 //console.log("one-"+obj+" "+idx);
 //$('#results').append("<strong>"+obj+"</strong> :- "+idx+"<br/><br/>");
 //});
//});
function Iterate(data)
{
// console.log(data.length);

if(data.length == 0)
{
$('#getdatafornosql1').append("No data found");

} else {

    jQuery.each(data, function (index, value) {
        if (typeof value == 'object') {
            //alert("Object " + index);
            Iterate(value);
        }
        else {
            // alert(index + "   :   " + value);
			
			if( index != '$oid') {
			 
			 $('#getdatafornosql1').append("<tr class='odd gradeX'><td><strong>"+index+"</strong>&nbsp;&nbsp;"+value+"</td></tr>");	}
			 
            // $('#results').append("<strong>"+index+"</strong> :- "+value+"<br/><br/>");
        }
    });
	}
};
Iterate(json);
                       
                      //  $('#results').html('Plugin name: ' + json.alignment1);
                    }
                });
	
	}
	
	function graphdbselection(a)
	{
	//alert(a);
	$("#getthetitleforgraph").html(a);
	
	
	
	
	if(a == 'Industries'){
	
	$("#showcomapnygdb").show();
	$("#showjobsgdb").hide();
	$("#showtargetgdb").hide();
	$("#showjobsgdb1").hide();
	$("#recomenedcompanies").hide();
	$("#recomenedjobs").hide();
	$("#getfiltersforthecompany").hide();
	$("#companytypes1").hide();
	$("#companyoperations1").hide();
	
	var url = urlmainsite+'neo4j/index.php';
	}else { 
	
	$("#showjobsgdb1").show();
	$("#showcomapnygdb").hide();
	$("#showjobsgdb").hide();
	$("#showtargetgdb").hide();
	$("#recomenedcompanies").hide();
	$("#recomenedjobs").hide();
	$("#companytypes1").hide();
	$("#companyoperations1").hide();
	$("#getfiltersforthecompany").hide();
	var url = urlmainsite+'neo4j/jobgroup.php';
	}
	
	
	       $.ajax({
                    url: url,
                    //force to handle it as text
                    dataType: "text",
					
					 type: 'POST',
           
			data:{
                     // cat_val : a 
                   },
				     beforeSend: function(xhr) 
            {
			$('#getdatafornosql1').html("");
			  //xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#getdatafornosql').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
                    success: function(data) {
					
				//	alert(data);
                       
                        //data downloaded so we call parseJSON function
                        //and pass downloaded data
                        var json = $.parseJSON(data);
                        //now json variable contains data in json format
                        //let's display a few itemscons
                        //console.log("data is - "+json);
                       
                       // $.each(json, function(idx, obj) {
 
 //$.each(obj, function(idx, obj) {
 //console.log("one-"+obj+" "+idx);
 //$('#results').append("<strong>"+obj+"</strong> :- "+idx+"<br/><br/>");
 //});
//});
function Iterate(data)
{
// console.log(data.length);

if(data.length == 0)
{
$('#getdatafornosql1').append("No data found");

} else {

    jQuery.each(data, function (index, value) {
        if (typeof value == 'object') {
            //alert("Object " + index);
            Iterate(value);
        }
        else {
            // alert(index + "   :   " + value);
			
			if( index != '$oid') {
			 
			 $('#getdatafornosql1').append("<tr class='odd gradeX'><td><strong>"+index+"</strong>&nbsp;&nbsp;"+value+"</td></tr>");	}
			 
            // $('#results').append("<strong>"+index+"</strong> :- "+value+"<br/><br/>");
        }
    });
	}
};
Iterate(json);
                       
                      //  $('#results').html('Plugin name: ' + json.alignment1);
                    }
                });
	
	
	$("#nosqldata1").modal({keyboard: false});
	}
	
	function targetrecommender()
	{
	
	$("#targetrecommender").modal({keyboard: false});
	}
	
	function openmodalboxtarget1(a,b)
	{
	//$('#examcompsnormal').DataTable().ajax.reload();
	$("#mtitle22").text(b);
	$("#mymodalexamcomps1").modal({keyboard: false});
	}
	
	function openmodalboxchar(a)
	{
	if(a== 1)
	$("#myModal1popschat").modal({keyboard: false});
	else 
	$("#myModal1popschat2").modal({keyboard: false});
	}
	
	function showrelatedexamscomps(a)
	{
	//alert(a);
	
	
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/examsearchrelatedschdulescomps.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadexamrealtedschedulescomps').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.topic_code+"</td><td>"+element.lesson_code+"</td><td>"+element.level_code+"</td><td>"+element.score+"</td></tr>";	 
				
                    });
						
					} else {
						
						  selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#loadexamrealtedschedulescomps').html(selOpts);
					
                    }
                });
				$("#examsrelatedschedulescomps").modal({keyboard: false});
	
	}
	
	function showrelatedschedules(a)
	{
	  
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/examsearchrelatedschdules.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadexamrealtedschedules').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.date+"</td><td>"+element.location+"</td><td>"+element.eligibility+"</td><td>"+element.Selectionstages+"</td><td><a style='cursor:pointer' onclick='showrelatedexamscomps("+element.id+")'>Show Examcomps</a></td></tr>";	 
				
                    });
						
					} else {
						
						  selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#loadexamrealtedschedules').html(selOpts);
					
                    }
                });
				$("#examsrelatedschedules").modal({keyboard: false});
	
	}
	
	function showrelatedexams(a)
	{
		 
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/examsearchrelated.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   
				   beforeSend: function() {
    $('#loadexamrealted').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.code+"</td><td>"+element.name+"</td><td>"+element.description+"</td><td>"+element.position+"</td></tr>";	 
				
                    });
						
					} else {
						
						  selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#loadexamrealted').html(selOpts);
					
                    }
                });
				$("#examsrelated").modal({keyboard: false});
	}
	
	
	function showrelatedcompanies(a)
	{
	
		 
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/relatedcompanies.php',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#loadcomapnyrelated').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.code+"</td><td>"+element.name+"</td><td>"+element.description+"</td></tr>";	 
				
                    });
						
					} else {
						
						 
                       selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#loadcomapnyrelated').html(selOpts);
					
                    }
                });
	
	$("#companyrelated").modal({keyboard: false});
	}
	
	function editauser(a,b,c)
	{
	
	
	$("#edituserfrom").modal({keyboard: false});
	document.getElementById("useridforrow").value = a;
	
		
			document.getElementById("useridforrowmoodle").value = b;
			document.getElementById("productslist").value = c;
	
	
	
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getstudentdetsils/',
                   data:{
                      cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
// alert(data.regnumber);

 $.each(data, function(index, element) {
 

 
           
             document.getElementById("inscoursename1").value =    element.inscoursename;
             
             // document.getElementById("scheduleoption1").value =   element.scheduleoption;
             document.getElementById("courseduration1").value =    element.courseduration;
			
			
			
			var values= element.programenrolled;







			
			
						
                     }); 
					
                    }
                });
				
				
			

				
	
	
	
	}
	
	function getallenrolledcourses(values,a){
	
	//alert(values);
	$('input[name="programenrolled[]"]').prop('checked',false);
	document.getElementById("iccoption").style.display = "none";
	 document.getElementById("depoption").style.display = "none";
	
	$.each(values.split(","), function(i,e){
	
	createslectprogram1(e,a);
	
	/*if(e == 'ICC'){
	document.getElementById("iccoption").style.display = "block";
	}
	if(e == 'DEP'){
	 document.getElementById("depoption").style.display = "block";
	}*/
   
	$('input[name="programenrolled[]"][value="' + e + '"]').prop('checked',true);
	
	
});

	}
	



function getlessoncompltedstuts(a)
{

//alert(a);
 // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getmoodlecomplestatusfinalnew',
                   data:{
                       cat_val : a
                   },
                   dataType: 'text',
				  
		   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					
					$('#coursegradedisplaybyid'+a).html(data);		
//return data;

  $('#coursegradedisplaybyid'+a).css("text-decoration", "none");
  $('#coursegradedisplaybyid'+a).css("font-weight", "bold");
  
   $('table tbody tr td a #coursegradedisplaybyid'+a).css("text-decoration", "none");
  
  

					}
					});
					
					

}

function getslectedvalu(b){

 // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getselectsemsister1',
                   data:{
                       cat_val : b
                   },
                   dataType: 'text',
				  
		   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
					//alert(data);
							var values= data;
							
						//	var values= 'S0003,S0004,S0005';
						
						
						
						
							
$.each(values.split(","), function(i,e){

    $('#semesterselec option[value="' + e + '"]').prop('selected', true);
	
	
});




					}
					});
}	
	
	
function getcoursename(a,b){


	
	//alert(ecodes);
	 
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/semester.php',
                   data:{
                       cat_val : a
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#semesterselec').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	//selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+" - ( Code:"+element.code+")</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#semesterselec').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
				
				
	
	 setTimeout(function () {
 getslectedvalu(b);	
  
}, 100);
	
			
				
				  
   
	
	}
	
	function createslectsemester(a){
	 var ecodes = (a.value || a.options[a.selectedIndex].value); 
		
						
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/semester.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
   // $('#semesterselec').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
					
				//	alert(data);
  var selOpts = "";
  
  	if(data.length > 0){
		
	selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+" - ( Code:"+element.code+")</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#semesterselecs').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
	}
	
	
	
	function createslectseme(a)
	{
		
		// = document.getElementById("semesterselec").value;
		 var ecodes = (a.value || a.options[a.selectedIndex].value); 
		
					//alert(ecodes);
	
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/semester.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#semesterselec').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	//selOpts += "<option value=''>Select the option</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+" - ( Code:"+element.code+")</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#semesterselec').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
				
				
				
				
	}
	function deletemodules(a)
	{
	//window.location = targeturl+"users/deleteactionformodules/"+a;
	
	
	 url = targeturl+'Users/deleteactionformodules/';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      cat_val : a
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					   $('#listoftablesmodules').DataTable().ajax.reload(); 
					     
					
                    }
                });
	
	
	}
	
	function displaypaidmodules(a,b)
	{
	 $('#listoftablesmodules').DataTable( {
		 
		 
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/studentslistmodules',
    "type": "POST",
	"data":{
                      cat_val : a
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
 /*  initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
				
 
                column.data().unique().sort().each( function ( d, j ) {
				
				if(d.length > 1 ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
					}
                } );
            } );
        },*/
  "columns": [
  { "data": "productcode" },
        { "data": "productname" },
        { "data": "type" },
        { "data": "datetime" },
		
		 { "data": "deleteaction" }
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
	$("#studentsmodalpayment").modal({keyboard: false});
	}
	
	function openmodalbox1(a,b)
	{
	   if(b =="")
   {
   b = "";
   }
   else {
   b= b;
   }
   
    

	
	     $('#stdtable').DataTable( {
		 
		   dom: 'lBfrtip',
        buttons: [
           
			 {
                extend: 'csvHtml5',
				title: 'students',
                exportOptions: {
                    columns: [0, 1 ,2,3,4,5,6,7]
                }
            },
			 {
                extend: 'excelHtml5',
				title: 'students',
                exportOptions: {
                   columns: [ 0, 1 ,2,3,4,5,6,7]
                }
            }
        ],
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/studentslist',
    "type": "POST",
	"data":{
                      cat_val : b
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
 /*  initComplete: function () {
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select  style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
                   .appendTo( $(column.header()))
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
					
				
 
                column.data().unique().sort().each( function ( d, j ) {
				
				if(d.length > 1 ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
					}
                } );
            } );
        },*/
  "columns": [
  { "data": "regnumber" },
        { "data": "fname" },
        { "data": "lname" },
        { "data": "email" },
		/*{ "data": "username" },
			{ "data": "gender" },*/
			{ "data": "groupid" },
			//{ "data": "created" },
			{ "data": "link" },
			//{ "data": "totall" },
			//{ "data": "averagescore" },
			{ "data": "report" },
			{ "data": "activitylog" },
			{ "data": "markscard" },
			{ "data": "attendance" },
            { "data": "editlink" },
			{ "data": "icc" },
      { "data": "resetpass" }
			//{ "data": "dep" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [10,11,12]}
  ],
   
} );
	
	$("#studentsmodal").modal({keyboard: false});
	}
	
	function openmodalbox2(a,b){
	
	buyiccoptions();
	
	
	 /*if(a == 'View Targets ICC'){
	
			$("#viewtargetforicc").modal({keyboard: false});	
	}
	
	else if(a == 'View Targets DEP'){
	
		$("#viewtargetfordep").modal({keyboard: false});	
	}*/
	}
	
	
	function openmodalboxforadmin()
	{
	
	var ecodes = document.getElementById("getexamcodes").value;
	//alert(ecodes);
	
	//alert(a);
	  
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/examsinsadmin.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#targets').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  //	if(data.length > 0){
		
	selOpts += "<option value=''>Select an Exam</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+"</option>";
							
							 
				
                    });
						
					/*} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}*/
						
                       $('#targetsins').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
				
				$("#inscalendartab").modal({keyboard: false});
	
	}
	
	function shwoaddeventsnew()
	{
	displaycompslist();
	$("#inscalendartabneaeve").modal({keyboard: false});
	}
	
	function shwoaddeventsnewfilters()
	{
	$("#modalforfileegt").modal({keyboard: false});
	}
	
	function shwoaddeventsnewfiltersvideo()
	{
	$("#modalforfileegtveid").modal({keyboard: false});
	}
		function colorlegndsh()
	{
	$("#modalforfileegtnew").modal({keyboard: false});
	}
	
	function openmodalboxacademoc(a,b)
	{
	var ecodes = document.getElementById("getexamcodes").value;
	//alert(ecodes);
	
//	$("#loadtargetsforstudentss").dataTable().fnDestroy();
	 
	var userid  = document.getElementById("userid").value;
	
	  $('#loadtargetsforstudentssac').DataTable( {
	  
	 //"order": [[ 10, "asc" ],[ 9, "asc" ]],
	   
	   "oSearch": {"sSearch": " "},
		
	 destroy : true,
	  //responsive: true,
	 "ajax": {
    "url": targeturl+'target/getacademictargets',
    "type": "POST",
	"data":{
                     // cat_val : ecodes , userid : userid, ttype : 'SEM'
                   },
				   "dataType": "json",
				   "cache": false,
				   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
   initComplete: function () {
    $(this.api().table().container()).find('input[type="search"]').parent().wrap('<form>').parent().attr('autocomplete','off').css('overflow','hidden').css('margin','auto');
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  class="browser-default custom-select" style="display:block"><option value="">Filter by All</option></select>')
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
{ "data": "comparea_id" },
{ "data": "name" },
{ "data": "description" },
{ "data": "markscard" },
{ "data": "action" }
	 
		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2,3,4]}
	]
   
} );
$("#listallgroupsandcomscomsac").modal({keyboard: false});
	
	}
	
	function openmodalbox(a,b){
	
	var table = $('#loadtargetsforstudentss').DataTable();
	table.destroy();
	
	
	$("#mtitle").text(b);
	$("#mbody").text(b);
	//alert(a);
	
	if(a == 'Add Targets'){
	
	var ecodes = document.getElementById("getexamcodes").value;
	//alert(ecodes);
	
	$("#loadtargetsforstudentss").dataTable().fnDestroy();
	 
	var userid  = document.getElementById("userid").value;
	
	  $('#loadtargetsforstudentss').DataTable( {
	  
	 "order": [[ 10, "asc" ],[ 9, "asc" ]],
	   
	   "oSearch": {"sSearch": " "},
		
	 destroy : true,
	  //responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/exams.php",
    "type": "POST",
	"data":{
                      cat_val : ecodes , userid : userid , ttype : 'EEP'
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
    $(this.api().table().container()).find('input[type="search"]').parent().wrap('<form>').parent().attr('autocomplete','off').css('overflow','hidden').css('margin','auto');
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  style="font-size:14px;width:140px"  class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
 { "data": "recom" },
   { "data": "rank" },
     { "data": "viewcom" },
  { "data": "name" },
  { "data": "company" },
   { "data": "cutoff" },
    { "data": "minage" },
	 { "data": "maxage" },
	 { "data": "month_approximate" },
	 { "data": "year" },
	  { "data": "studentactions" }
	 
		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10]}
	]
   
} );
	
	
$('.dataTables_length').addClass('bs-select');
	
	//alert(a);
	  
    // call subcategory ajax here 
   /* $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/exams.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#targets').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
  },
                   success:function(data)
                    {
  var selOpts = "";
  
  	if(data.length > 0){
		
	
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+" - ( Code:"+element.code+")</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#targets').html(selOpts);
					  
                    }
                });*/

	
	document.getElementById("addtargets").style.display = "block";
	document.getElementById("displaytargets").style.display = "none";
	document.getElementById("companysearch").style.display = "none";
	document.getElementById("industrysearch").style.display = "none";
				document.getElementById("examsearch").style.display = "none";
	} 
	
	
	else if(a == 'View Targets'){
	
		document.getElementById("addtargets").style.display = "none";
		document.getElementById("displaytargets").style.display = "block";
		document.getElementById("companysearch").style.display = "none";
		document.getElementById("industrysearch").style.display = "none";
				document.getElementById("examsearch").style.display = "none";
	}
	
   else if(a == 'Company'){
   if(b =="")
   {
   b = "";
   }
   else {
   b= b;
   }
   


	
	document.getElementById("addtargets").style.display = "none";
		document.getElementById("displaytargets").style.display = "none";
		
		document.getElementById("companysearch").style.display = "block";
		document.getElementById("industrysearch").style.display = "none";
				document.getElementById("examsearch").style.display = "none";
	
	}
	else if(a == 'Industry'){
   if(b =="")
   {
   b = "";
   }
   else {
   b= b;
   }
   
  
   
     $('#loadindustrytable201').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/industry.php",
    "type": "POST",
	"data":{
                      cat_val : b
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
    $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
				  //console.log(column);
                var select = $('<select  style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
        /*{ "data": "code" },*/
        { "data": "name" },
        { "data": "description" }
	/*	{ "data": "link" },
		{ "data": "detailsindustry" }*/
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );
	
	document.getElementById("addtargets").style.display = "none";
		document.getElementById("displaytargets").style.display = "none";
		
		document.getElementById("companysearch").style.display = "none";
			document.getElementById("industrysearch").style.display = "block";
				document.getElementById("examsearch").style.display = "none";
		
	
	}
	 else if(a == 'Exams'){
   if(b =="")
   {
   b = "";
   }
   else {
   b= b;
   }
   
   
   
     $('#loadexam1').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/examsearch.php",
    "type": "POST",
	"data":{
                      cat_val : b
                   },
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				//  var title = $(this).text();
			
				  //console.log(column);
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm" ><option value="">Filter by All</option></select>')
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
   
        { "data": "tname1" },
        { "data": "compname1" },
		{ "data": "tcutoff1" },
		{ "data": "tminage1" },
		{ "data": "tmaxage1" }
	/*	{ "data": "link" },
		{ "data": "detailsindustry" }*/
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
   
  
	
	
	document.getElementById("addtargets").style.display = "none";
		document.getElementById("displaytargets").style.display = "none";
		
		document.getElementById("companysearch").style.display = "none";
			document.getElementById("industrysearch").style.display = "none";
				document.getElementById("examsearch").style.display = "block";
		
		
	
	}
    

      $("#myModal1pops").modal({
          
            keyboard: false
			//backdrop: 'static'
           
        });
	}
	
	</script>
	<style>
	
	.modal-dialog {
    max-width: 100% !important;
	
	}
	
	/*Right*/
	.modal.right.fade .modal-dialog {
		right: 0px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}
	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	.modal.right .modal-body {
		/*padding: 15px 15px 80px;*/
		padding: 5px 27px 5px 27px !important;
	}
	.modal.right .modal-dialog {
		position: fixed;
		margin: auto;
		width: 320px;
		height: 100%;
		-webkit-transform: translate3d(0%, 0, 0);
		    -ms-transform: translate3d(0%, 0, 0);
		     -o-transform: translate3d(0%, 0, 0);
		        transform: translate3d(0%, 0, 0);
	}
	</style>
	
			 <script>
			
			
		/*$(window).load(function(){
		 
		 $("#selectedtarget").text(document.getElementById("gettargetcount").value);
		 
   
   	});*/
	 
		



$(document).ready(function(){
 $(document).on('change', '#filepic', function(){
  var name = document.getElementById("filepic").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("filepic").files[0]);
  var f = document.getElementById("filepic").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big (Max. 2 MB)");
    return false;
  }
  else
  {
   form_data.append("file", document.getElementById('filepic').files[0]);
   var userid = document.getElementById("userid").value;
   $.ajax({
    url:urlmainsite+"upload.php?uid="+userid,
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
		//alert(data);
		//$("#profile_image1").attr("src","");
		// document.getElementById('profile_image1').src = urlmainsite+"upload/"+data;
		
  //  $('#uploaded_image').html("Image uploaded successfully");
  var urlva = urlmainsite+"upload/"+data;
  
  $("#userpicturechange").attr("src",urlmainsite+"upload/"+data);
 // alert(urlva);
  $("#originalinmage").hide();
   $('#uploaded_image').html("<img alt='User Pic' src='"+urlva+"' id='profile_image1'  class='z-depth-1 mb-3 mx-auto' style='height:150px;width:150px'>");
   
    $("#showdeletimage").show();
	 
	toastr.success('Profile picture has been added successfully.');
    }
   });
  }
 });
});

function getcomptencieslist()
{

    $('#allcompstable').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"cmd/getallcompsforins.php",
    "type": "POST",
	"data":{
                     // topic : a
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" class="custom-select custom-select-sm form-control form-control-sm"><option value="">Filter by All</option></select>')
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
        { "data": "description" },
		 { "data": "topics" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	$("#allcompsdoaply").modal({keyboard: false});
}
  

                 
      function viewtaecherscomments()
        {
           $("#studentlistcommengts").html("");
            $("#studentlistcommengtsteachers").html("");
            
                   var userid  = document.getElementById("userid").value;

        
         var groupidforstudent  = document.getElementById("groupidforstudent").value;

        
         var codeforassignment  = document.getElementById("codeforassignment").value;

            
            		url = urlmainsite+'sms/getstudentscomments.php';
		  $.ajax({
                   type:"POST",
                   url:url,
                   data:{
                      userid : userid ,groupidforstudent : groupidforstudent , codeforassignment : codeforassignment
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
    // xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                       
                       $("#studentlistcommengts").html('<button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>');
  },
                   success:function(data)
                    {
                       $("#studentlistcommengts").html(data);
					
                    }
                });
            
                       		url1 = urlmainsite+'sms/getteachercomments.php';
		  $.ajax({
                   type:"POST",
                   url:url1,
                   data:{
                      userid : userid ,groupidforstudent : groupidforstudent , codeforassignment : codeforassignment
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
    // xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                       
                       $("#studentlistcommengtsteachers").html('<button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>');
  },
                   success:function(data)
                    {
                       $("#studentlistcommengtsteachers").html(data);
					
                    }
                });
        }
                     

</script>
<script>

function validateexpenceiec(){


 if (parseInt($("#exp_experience").val()) > 50) {
    toastr.error("Experience should be between 0 & 50.");
		document.getElementById("exp_experience").focus();
    return false;
}
else if (parseInt($("#exp_currentcompany").val()) > 50) {
    toastr.error("Experience should be between 0 & 50.");
		document.getElementById("exp_currentcompany").focus();
    return false;
}
else if (parseInt($("#exp_currentcompany").val()) > parseInt($("#exp_experience").val())) {
    toastr.error("Current experience cannot be more than total experience.");
		document.getElementById("exp_currentcompany").focus();
    return false;
}

else {	
	  $.ajax({
                   type:"POST",
                   url:targeturl+'Users/saveuserdatailsexpe/',
                   data:{
				   
				   exp_industry:$("#exp_industry").val(),exp_expertise : $("#exp_expertise").val(),exp_experience : $("#exp_experience").val(),
				   exp_currentcompany : $("#exp_currentcompany").val(),exp_namecurrentcompany : $("#exp_namecurrentcompany").val(),
				   exp_website : $("#exp_website").val(),exp_country : $("#exp_country").val(),
				   exp_levels : $("#exp_levels").val(), digitaltransformation : $("#digitaltransformation").val(), workindustry : $("#workindustry").val(), dtprojects : $("#dtprojects").val()
				  
				   
				   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                       toastr.success(data);
					    
					
                    }
                });
				 return false;
}}
													
													</script>