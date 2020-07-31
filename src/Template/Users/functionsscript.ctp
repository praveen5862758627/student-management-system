<script>
function viemarkfrostu(topicid,comp)
{
$('#loadthhhargetsforstudentssacadmin').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/markscardfostu.php",
    "type": "POST",
	"data":{
                       userid : '<?php echo $this->request->getSession()->read('sessionname'); ?>'  , topicid : topicid , comp : comp
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
        { "data": "type" },
		 { "data": "comparea" },
		  { "data": "topic" },
        { "data": "score" },
        { "data": "passingscore" },
		   { "data": "maxscore" },
		    { "data": "status" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6]}
  ],
   
} );

$("#listallgroupsandcomscomsacadminvvv").modal({keyboard: false});
}
function savemarksforadmin()
{



                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/savemarksrecords.php',
                    data: {
                       uid: $("#useridforrownewd").val(), 
                        markstype: $("#markstype").val(), 
						listofmarkscomname: $('#listofmarkscom option:selected').text(),
						listdoftopicsmarksname: $('#listdoftopicsmarks option:selected').text(),
						marksscore: $("#marksscore").val(),
						markapssing: $("#markapssing").val(),
                   markssmax: $("#markssmax").val(),
				   listofmarkscom: $("#listofmarkscom").val(),
				   listdoftopicsmarks: $("#listdoftopicsmarks").val(),
				   useridlog : '<?php echo $this->request->getSession()->read('sessionname'); ?>'

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#inscalendartabneaevehjhjjads").modal('hide');
$('#loadtargetsforstudentssacadmin').DataTable().ajax.reload();

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;

}
function onlineclasssaveinfo()
{

                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/saveonlineclassdetails.php',
                    data: {
                        // totalscopre : totalscopre , displayTime : displayTime
                        code: $("#getallthetopisbvf1nnn").val(),onlineclassname: $("#onlineclassname").val(), studentsgroupsclass: $("#studentsgroupsclass").val(),startdattime: $("#startdattime").val(),enddattime: $("#enddattime").val(),onlineclassdescription: $("#onlineclassdescription").val()
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#onlineclassmodal").modal('hide');
$('#calendarinst').fullCalendar( 'refetchEvents' );

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;
}
function onlineclasssaveinfof()
{

var output = jQuery.map($(':checkbox[name=recuday\\[\\]]:checked'), function (n, i) {
    return n.value;
}).join(',');


                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/savef2fclassdetails.php',
                    data: {
                       
                        topiccode: $("#sel_useralltopcfffff").val(), topicname: $('#sel_useralltopcfffff option:selected').text(),dow: output,groupid: $("#studentsgroupsclassf2f").val(),starttime: $("#starttimeforf2f").val(),
                   endtime: $("#endttimeforf2f").val(),startdattime11: $("#startdattime11").val(),enddattime11: $("#enddattime11").val(),
				   desc: $("#onlineclassdescriptionf2f").val(),color: $("#coloridf2f").val()

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#onlineclassmodalf2f").modal('hide');
$('#calendarinst').fullCalendar( 'refetchEvents' );

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;
}
function exameventssave()
{

                $.ajax({
                    type: "POST",
                    url: targeturl+'Users/tagetaddexam',
                    data: {
                        // totalscopre : totalscopre , displayTime : displayTime
                        targetexams: $("#targetsins").val(), examdatedate: $("#startdattimeexamevents").val(),color: $("#colorid").val(),description: $("#onlineclassdescriptionevents").val()
                    },
                    dataType: 'text',
                      beforeSend: function(xhr) {
                       xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#inscalendartab").modal('hide');
$('#calendarinst').fullCalendar( 'refetchEvents' );

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;
}
function onlineclassmodal()
{
$("#onlineclassname").val("")
$("#studentsgroupsclass").val("")
$("#startdattime").val("")
$("#enddattime").val("")
$("#onlineclassdescription").val("")

displaycompslistnew1();

$("#onlineclassmodal").modal({keyboard: false});
}
function onlineclassmodalf2f()
{
loadtopicsforadminalltopic();

$("#onlineclassmodalf2f").modal({keyboard: false});
}


    function setlessoncompletenw(uid,code,name,id,compcode)
{
             $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/savescorebooklesson.php',
                    data: {
                        // totalscopre : totalscopre , displayTime : displayTime
                        id : id , name : name , comparea_code: compcode, quiz_type: "", scoring_method: "", totalscopre: "", displayTime: "", quizstartdate: "", quizenddate: "", nsadfkj: uid, timeLeft: "", qurl: "", qname: "", passingscore_in_percentage: "", code: code
                    },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                      
  toastr.success(response);
  loadleassonstauys(code,uid,name,id,compcode);
  loadleassonstauys22(code,uid,name,id,compcode);                       


                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
}

function displaymodulestype()
{
//alert(document.getElementById("userid").value);
$('#modulestableztypess').DataTable( {
	  
	
	     paging: true,
   ordering: true,
   searching: true,
		
	 destroy : true,
	 
	 "ajax": {
    "url": urlmainsite+"ims/modulesdisplaynew.php",
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
					
				
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
 
  { "data": "name" },
  { "data": "description" },
   { "data": "type" },
  { "data": "bynowbuttn" }

		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2,3]}
	],
   
} );
}


function saveusermodulesinfo(){
var course = $("#inscoursename1").val(); 
var category = $("#scheduleoption1").val(); 
													
													
if (course == "" || course == null) {
    toastr.error("Please choose the course.");
	
    return false;
}
else if (category == "" || category == null) {
    toastr.error("Please choose the option.");
	
    return false;
}
else{
	
	//console.log($("#modulesl").val());
	//console.log($("#addoncourselis").val());
	
	  $.ajax({
                   type:"POST",
                   url:targeturl+'Users/savestudentinfobuyadminmodules/',
                   data:{
				   
			addoncourse:$("#addoncourselis").val(),modules:$("#modulesl").val(), scheduleoption:$("#scheduleoption1").val(),course : $("#inscoursename1").val(),useridforrow : $("#useridforrow").val(),useridsavemoodle : $("#useridsavemoodle").val()
			
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
	 $("#stdinfosave").hide();
	 $("#messagessksk").html('<div class="spinner-grow" role="status"> <span class="sr-only">Loading...</span></div>Please wait. Do not refresh.');
	 
	 
	 toastr.success("Processing your request please wait......");
  },
                   success:function(data)
                    {
                       toastr.success(data);
					   
					   console.log(data);
					    
					 $("#stdinfosave").show();
					  $("#messagessksk").html('');
                    }
                });
				 return false;
}
													}
													</script>
<?php if($getcatn == 'Semester wise1' ) { ?>

<script>
function exampscompfr() {
 $('#examcompsnormal').DataTable( {
		 
	
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltopiccodes',
    "type": "POST",
	"data":{
                     
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
  { "data": "tname" },
        { "data": "lcode" },
        { "data": "lecode" },
		  { "data": "actionname" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );
//$("#mymodalexamcomps").modal({keyboard: false});

}
</script>

<?php } else { ?>
<script>

function loadmodulesforstudents()
{
	//alert("hello");
		
 $('#modulestablez').DataTable( {
			"oLanguage": {
        "sEmptyTable": "No module competencies found."
    }, 
	
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltopiccodesformodules',
    "type": "POST",
	"data":{
                     
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
  { "data": "tname" },
        { "data": "lcode" },
        { "data": "lecode" },
		 { "data": "tcskip" },
		  { "data": "actionname" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
}
function addonmoduleslist()
{
	//alert("hello");
		
 $('#modulestablezaddon').DataTable( {
		 
	 "oLanguage": {
        "sEmptyTable": "You have no add-on courses purchased."
    },
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltopiccodesformodulesaddon',
    "type": "POST",
	"data":{
                     
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
  { "data": "tname" },
        { "data": "lcode" },
        { "data": "lecode" },
		 { "data": "tcskip" },
		  { "data": "actionname" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );
}

function exampscompfr() {
	

	
 $('#examcompsnormal').DataTable( {
		 
		"oLanguage": {
        "sEmptyTable": "You have no targets selected."
    },
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltopiccodes',
    "type": "POST",
	"data":{
                     
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
  { "data": "tname" },
        { "data": "lcode" },
        { "data": "lecode" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );

	

//$("#mymodalexamcomps").modal({keyboard: false});
}

</script>
<?php } ?>

<script>

function displaylistoftargetsbasedonyear()
{
	var getthestudentpassoutyear = document.getElementById("getthestudentpassoutyear").value;
	
	
	
	a= 	getthestudentpassoutyear;
	b = parseInt(getthestudentpassoutyear) + 2;
	 c = document.getElementById("coursenameforfileter").value;
		var ecodes = document.getElementById("getexamcodes").value;
		
			//var getthestudentpassoutyear = document.getElementById("getthestudentpassoutyear").value;
		//	console.log(a);
	
	
	
	
	$("#fromyears").val(getthestudentpassoutyear);
	$("#toyears").val(b);
	
	
	if(a == "" || a == null )
	{
		toastr.error('Please fill your graduation year in the academic section.');
		return false;
	}
	
	else {
		
		$("#serchresultytext").html("Please see the eligible and recommended targets from the target section on the sidebar and select the targets you wish to add to your list.");
	
	
		 $('#mytargetsstudentresults').DataTable( {
	  "order": [[ 7, "asc" ]],
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/targetfilterbyyear.php",
    "type": "POST",
	"data":{
                      fromdate : a,   todate : b ,filval : c , cat_val : ecodes
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
		{ "data": "tmaxage1" },
	 { "data": "month_approximate" },
	 { "data": "year" }
//	 { "data": "studentactions" }
	 
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6]}
  ],
   
} );
	
	}
}	

function displaytarghetsbasedonfromandto(){
	
a= 	document.getElementById("fromyears").value;
	b = document.getElementById("toyears").value;
	 c = document.getElementById("coursenameforfileter").value;
		var ecodes = document.getElementById("getexamcodes").value;
		
			var getthestudentpassoutyear = document.getElementById("getthestudentpassoutyear").value;
	
	if(a == "" || b == "")
	{
		toastr.error('Please choose From and To year');
		return false;
	}
	else if( a>= b)
	{
		toastr.error('From year should be less than to To year');
		return false;
	}
	else {
		
		$("#serchresultytext").html("Please see the eligible and recommended targets from the target section on the sidebar and select the targets you wish to add to your list.");
	}
	
		 $('#mytargetsstudentresults').DataTable( {
	  "order": [[ 7, "asc" ]],
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/targetfilterbyyear.php",
    "type": "POST",
	"data":{
                      fromdate : a,   todate : b ,filval : c , cat_val : ecodes
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
		{ "data": "tmaxage1" },
	 { "data": "month_approximate" },
	 { "data": "year" }
//	 { "data": "studentactions" }
	 
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6]}
  ],
   
} );
}

function evaluatemypersoanlity()
{
	$("#personalitytype").modal({keyboard: false});
}
function evaluatemypersoanlitytest2()
{
	$("#personalitytypetest2").modal({keyboard: false});
}
function getcompraedetailsnotforicc()
{
		  $('#compreaadata1').DataTable( {
		 
	
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'target/compereanameslistnotforicc',
    "type": "POST",
	"data":{
                     
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
        { "data": "view" },
        { "data": "total" },
		  { "data": "remaing" },
		    { "data": "percentge" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5]}
  ],
   
} );

/*exampscompfr();
learningplaconsolida();*/
//$("#mymodalexamcomps").modal({keyboard: false});
$("#comparerepro1").modal({keyboard: false});
}
function getcompraedetails()
{

 

		  $('#compreaadata').DataTable( {
		 
	
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'target/compereanameslist',
    "type": "POST",
	"data":{
                     
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			$('#overalltagetsectionfunda').html('0.00%');
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            },
        				   	"dataSrc": function(data){
//  alert("Done!");
  
//console.log(data.data.length);
 
 if( data.data.length == 0)
 {
	 $('#overalltagetsectionfunda').html('0.00%');
 }
 else
 {
	 callbackcal();
 }


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
        { "data": "view" },
        { "data": "total" },
		  { "data": "remaing" },
		    { "data": "percentge" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5]}
  ],
   
} );

/*exampscompfr();
learningplaconsolida();*/
//$("#mymodalexamcomps").modal({keyboard: false});
 // call subcategory ajax here 
  


}

function callbackcal()
{
	//alert("hello");
	  $.ajax({
                   type:"POST",
                   url:targeturl+'target/compereanameslistnew',
                   data:{
                  
                   },
                   dataType: 'json',
				   beforeSend: function(xhr) {
					    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
    $('#overalltagetsectionfunda').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
  },
                   success:function(data)
                    {
						//alert(data);
						if(data == '0')
						{
 $('#overalltagetsectionfunda').html('0.00%');
						}
						else
						{
							$('#overalltagetsectionfunda').html(data+'%');
						}
                    }
                });
}

function learningplaconsolida()
	{
	  
	  

   
	
	     $('#examcompsconsolidated').DataTable( {
		 
			 "oLanguage": {
        "sEmptyTable": "You have no targets selected."
    },
	
	
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/topiccodesconsolidated',
    "type": "POST",
	"data":{
                     
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
  { "data": "lcode" },
        { "data": "lecode" },
        //{ "data": "tcskip" },
        { "data": "actiondata" },
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	

//	$("#mymodalexamcomps").modal({keyboard: false});
	}
function mytargetsuggestionstudentdisplay()
{
b = document.getElementById("coursenameforfileter").value;


    /* $('#myclustersstudent').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/getclustersforstudents.php",
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
				
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
		{ "data": "market_trend" },
		{ "data": "market_size" }
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );*/

var userid  = document.getElementById("userid").value;
	var ecodes = document.getElementById("getexamcodes").value;

     $('#mytargetsstudent').DataTable( {
		 
		  "order": [[ 1, "desc" ]],
	   
	   "oSearch": {"sSearch": " "},
	     "fnDrawCallback": function (oSettings) { 
                    if ($('#mytargetsstudent tr').length < 5) {
                        $('#mytargetsstudent_paginate').hide();
                    }
                },
				
				
				

                 "bLengthChange": false,
                 "bFilter": true,
                 "bInfo": false,
                 "bAutoWidth": false,
                 "iDisplayLength": 5,
	 
	 "destroy" : true,
	  "responsive": true,
	 "ajax": {
    "url": urlmainsite+"ims/getclustersforstudentstarget.php",
    "type": "POST",
	"data":{
                      cat_val : b, userid : userid , ecodes : ecodes
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
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
  ],
   
} );






  /* $('#mycompnaiessstudent').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/getclustersforstudentscompanies.php",
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
				
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
        { "data": "locations" },
		{ "data": "noofemployees" },
		{ "data": "size" },
		{ "data": "ownership" }
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );*/


  /*$('#myindustriessstudent').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/getclustersforstudentindustries.php",
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
				
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
      
		{ "data": "description" }
	
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1]}
  ],
   
} );*/


 $("#targetsuggestionstudent").modal({
          
            keyboard: false
			
           
        });
}

function getrecommendedjobes(){
	
	 $('#recommedjobes').dataTable().fnClearTable(); // CODE TO CLEAR THE TABLE
	
	  var final = '';
    $('.ads_Checkbox2:checked').each(function(){        
        //var values = '' + '"'+ $(this).val()+ '"'+',';
		
		 var values =  $(this).val()+ ',';
		
		var values1 = (this.checked ? values : "");
		
        final += values1;
		
        
    });
	
	
	
	str = final.replace(/,\s*$/, "");
//	alert(str);
	
	    $('#recommedjobes').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"jsonforjobs.php",
    "type": "POST",
	data:{cid: str}, 

	
	
				   "dataType": "json",
				   "cache": false
  },
   initComplete: function () {
   

      $('.table select').remove();
	
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select id="deleteselect" style="font-size:14px;width:140px" ><option value="">Filter by All</option></select>')
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
        { "data": "recommendedjobName" }
       // { "data": "recommendedjobType" },
		// { "data": "recommededOperations" },
     //   { "data": "recommededIndustryId" }
        
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0]}
  ],
   
} );
	
	
	}

function getalllttheexams()
{

//alert(targeturl+'target/getalluserprogress');

$.ajax({
            type: 'POST',
            url: targeturl+'users/getallexams/',
			data:{
                     // cat_val : a , userid : uid
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			  
			 
            },
            success: function(response) 
            {
               
				  
  
  	if(response.length > 0){
		

						
						 $.each(response, function(index, element) {
							 
							
						//alert(element.id);	
loadallmodulesforscore1(element.id);	
					
				
                    });
					/*$("#morris-bar-chart").empty();
									$("#morris-bar-chart1").empty();
					getbarchart();*/
						
					} else {
						
						  //selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                      
            }
         
        });
}

function getbarchart() {

//alert("click");

									
									$("#morris-bar-chart").empty();
									$("#morris-bar-chart1").empty();
/***************************************************************/

 $.ajax({
        url: targeturl+'target/getalluserprogress',
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
		beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
			 
            },
        success: function(response) {
         
			//console.log(response);
			 Morris.Bar({
        element: 'morris-bar-chart',
		data : response ,
		/*data : [{"y":"DEP1","a":"33.33"},{"y":"DEP2","a":"0.00"},{"y":"ICC1","a":"20.00"},{"y":"ICC AUTO","a":"0.00"},{"y":"RBI Assistant","a":"0.00"},{"y":"RBI Grade B","a":"0.00"},{"y":"SBI Probationary Officer","a":"0.00"},{"y":"SBI Clerk","a":"0.00"},{"y":"ICC exam test ","a":"25.00"}],*/
        /*data: [{
            y: 'Exam1',
            a: 10
        }, {
            y: 'Exam2',
            a: 75
           
        }, {
            y: 'Exam3',
            a: 50
          
        }, {
            y: 'Exam4',
            a: 75
           
        }, {
            y: 'Exam5',
            a: 50
          
        }],*/
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Progress(%)'],
        hideHover: 'auto',
		/*barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  },*/
        resize: true,
		// xLabelAngle: 70
    });
			
        }
    });
	
	
	
	
	 $.ajax({
        url: targeturl+'target/getallusergrade',
        dataType: 'JSON',
        type: 'POST',
        data: {get_values: true},
		beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
			 
            },
        success: function(response) {
         	 Morris.Bar({
        element: 'morris-bar-chart1',
		data : response ,
      /*  data: [{
            y: 'Exam1',
            a: 10
        }, {
            y: 'Exam2',
            a: 75
           
        }, {
            y: 'Exam3',
            a: 50
          
        }, {
            y: 'Exam4',
            a: 75
           
        }, {
            y: 'Exam5',
            a: 50
          
        }],*/
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Grade'],
        hideHover: 'auto',
		/*barColors: function (row, series, type) {
    if (type === 'bar') {
      var red = Math.ceil(255 * row.y / this.ymax);
      return 'rgb(' + red + ',0,0)';
    }
    else {
      return '#000';
    }
  },*/
        resize: true,
		// xLabelAngle: 70
    });
		
			
        }
    });

/**************************************************************/


getalllttheexams();
								  


								}
								
								
								
function loadallmodulesforscore1(a)
	{
	
	
		 
		 $.ajax({
       
            type: 'POST',
            url: targeturl+'users/getalltargetsforscorecard1',
			data:{
                    
					 cat_val : a 
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 
            },
            success: function(response) 
            {
               
			   /**console.log(response);
			   
			    console.log(response.scorecount);*/
			   
			   
			   
			   
			   
			  
				
				tot = parseInt(response.pendig) + parseInt(response.completd);
				/*alert(response.pendig);
			     alert(response.completd);
				 alert(tot);*/
			    

var prgog = (response.completd/tot) * 100;

if(isNaN(prgog))
prgog1 ='0.00';
else 
prgog1 = prgog.toFixed(2);

$("#gradenum"+a).html(prgog1);
$("#gradenum"+a).css({color: 'rgb(' + ((100 - prgog1) *2.56) +',' + (prgog1 *2.56) +',0)'})



var prgog = (response.scorecount/response.completd);
if(isNaN(prgog))
prgog11 ='0.00';
else 
prgog11 = prgog.toFixed(2);

$("#gradenum1"+a).html(prgog11);






/********************************update target table *****************************/

 // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/updatetargetesscore/',
                   data:{
                      cat_val : a , grade :prgog11 , progress :prgog1
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
                    // alert(data);
					
					
                    }
                });

/****************************** end of update target table ************************/
//getbarchart();
                      
            }
         
        });
		
		
		/************************ score for evaluation *************************/
		
		
		 $.ajax({
       
            type: 'POST',
            url: targeturl+'users/getallscoreforbaseline',
			data:{
                    
					 cat_val : a 
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 
            },
            success: function(response) 
            {
			
			/*alert(response.level1);
			alert(response.level2);
			alert(response.level3);
			alert(response.level4);
			alert(response.level5);*/
			//(L1 * 1 + L2 *2 + L3*3 + L4*4 + L5*5 )/15

var uid = document.getElementById("userid").value;
//alert(uid);


var scoreval =parseInt(parseInt(response.level1*1)+ parseInt(response.level2*2) + parseInt(response.level3*3)  + parseInt(response.level4*4) + parseInt(response.level5*5))/15 ;


$("#scorenum1"+a).html(scoreval.toFixed(2));

	 document.getElementById("baselinescore").value = scoreval.toFixed(2);
			
			}
			});
		
		

		/******************************* end ***********************************/
		//	var scoreval = document.getElementById("baselinescore").value;
		//alert(document.getElementById("baselinescore").value);
		
		   $.ajax({
       
            type: 'POST',
            url: targeturl+'users/computehoursforscorebaseline',
			data:{
                    
					 cat_val : a , score :document.getElementById("baselinescore").value
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 
            },
            success: function(response) 
            {
			
			


$("#gethours"+a).html(response.pendinghours1+" Hours");

calcompltedpending(a,response.lessoncouserid1);

			
			}
			});


	}								

function calcompltedpending(a,durationminutes){

//alert(durationminutes);

baseline  = document.getElementById("baselinescore").value;
//alert(baseline);

  $.ajax({
       
            type: 'POST',
            url: targeturl+'users/gettargetforcompltedhours',
			data:{
                    
					 cat_val : a , durationminutes :durationminutes , baseline : baseline
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 
            },
            success: function(response) 
            {
			
			$("#completdhoursfinl"+a).html(response.scorecountff);
			
			$("#pendinghoursfinl"+a).html(response.totalpeninghoursinminutes);
			
			$("#baselinescorefinal"+a).html(response.baselinescorefin);
			
			
		//	$("#pendinghoursfinl"+a).html(response.scorecountff);
			
			/*$("#completdhoursfinl"+a).html(response.scorecountff);
			$("#pendinghoursfinl"+a).html(parseInt(durationminutes) - parseInt(response.scorecountff));*/
			}
			});
			
			/* $.ajax({
       
            type: 'POST',
            url: targeturl+'users/gettargetforcompltedhours',
			data:{
                    
					 cat_val : a , durationminutes :durationminutes , type : 'Completed'
                   },
            dataType: 'json',
			
            beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 
            },
            success: function(response) 
            {
		
			$("#completdhoursfinl"+a).html(response.scorecount);
			}
			});*/


}

function computeavearescore(finaltotal,a){

 $.ajax({
                   type:"POST",
                   url:targeturl+'users/computeaveragescoretargetwise',
                   data:{
                       cat_val : a , finaltotal:finaltotal
                   },
                   dataType: 'text',
				  
		   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
							   $("#aveargescoref"+a).html(data);
					}
					});

}
function callmefunction(a,pendingcount)
{
//alert(a);

$('#gradebookhistorycomplted'+a).DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltargetsforscorecard',
	"dataSrc": function(res){
         var count = res.data.length;
		 
		 var finaltotal = parseInt(pendingcount) + parseInt(count);
		 computeavearescore(finaltotal,a);
		 
		 //alert(parseInt(pendingcount) + parseInt(count) );  //totalcount
		 
     // document.getElementById("countofcomplted").value =  count;
	  
	  var pending = pendingcount;
var completed = count;
/*alert(pending); 
alert(completed);*/

var morrisDonut = "";
$("#morris-donut-chart1"+a).empty();

var morrisDonut = Morris.Donut({
        element: 'morris-donut-chart1'+a,
        data: [{
			label: "Completed",
           value: completed
			
            
        }, {
            label: "Pending",
            value: parseInt(pending) + parseInt(completed) - completed
			
        }],
        resize: true
    });
	  
	  

         return res.data;
     },
    "type": "POST",
	"data":{
                      cat_val : a , type : ''
                   },
				   "dataType": "json",
				   "cache": false,
				   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
           
            }
  },

  "columns": [
        { "data": "name" },
        { "data": "status" },
		 { "data": "complete_date" },
		  { "data": "score" },
		  
		   { "data": "link" },
		    { "data": "scorefinal" }
			// { "data": "log" }
		   
		   
       
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [4]}
  ],
   
} );

}
function loadallmodulesforscore(a)
	{
	
	$('#gradebookhistory'+a).DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getalltargetsforscorecard',
	"dataSrc": function(res){
         var pendingcount = res.data.length;
    //  document.getElementById("countofpending").value =  count;
	  
	  callmefunction(a,pendingcount);

         return res.data;
     },
    "type": "POST",
	"data":{
                      cat_val : a , type : 'pending'
                   },
				   "dataType": "json",
				   "cache": false,
				   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
           
            }
  },

  "columns": [
        { "data": "name" },
        { "data": "status" },
		 { "data": "complete_date" },
		  { "data": "score" },
		   
		    { "data": "link" },
			 { "data": "scorefinal" }
			//  { "data": "log" }
       
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [4]}
  ],
   
} );




	}

function createslectprogram1(e,a) {

//alert(e);

 if(e == 'DEP' )
		 {
		
		 document.getElementById("depoption").style.display = "block";
		
		 }
		/* else {
		 document.getElementById("depoption").style.display = "none";
		 }*/
		
		 if(e == 'ICC'){
		 	
		
		document.getElementById("iccoption").style.display = "block";
		 } /*else {
		 document.getElementById("iccoption").style.display = "none";
		 }*/
		

		geticcdep();
		
		
		
				
				
				  
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getselectsemsister',
                   data:{
                       cat_val : a
                   },
                   dataType: 'text',
				  
		   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
							var values= data;
							
							//alert(values);
$.each(values.split(","), function(i,e){
    $("#iccsave option[value='" + e + "']").prop("selected", true);
});
					}
					});
					
		
				
				
				  
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getselectsemsister',
                   data:{
                       cat_val : a
                   },
                   dataType: 'text',
				  
		   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
							var values= data;
$.each(values.split(","), function(i,e){
    $("#depsave option[value='" + e + "']").prop("selected", true);
});
					}
					});
		
}

function createslectprogram(a){

var ecodes = a.value;

//alert(ecodes);


 

 if(ecodes == 'DEP' && $(a).is(':checked'))
		 {
		
		 document.getElementById("depoption").style.display = "block";
		
		 }
		 if(ecodes == 'DEP' && $(a).is(':not(:checked)')){
		 
		// alert("unchecked")
		 document.getElementById("depoption").style.display = "none";
		 }
		 if(ecodes == 'ICC' && $(a).is(':checked')){
		 	
		
		document.getElementById("iccoption").style.display = "block";
		 }
		 if(ecodes == 'ICC' && $(a).is(':not(:checked)')) {
		// alert("unchecked")
		  document.getElementById("iccoption").style.display = "none";
		 }
		 

		geticcdep();
		
		//alert("hello");
		
		
		
		
		 

}


function geticcdep()
{
		 /*****************************************************/
		 	//alert(ecodes);
	
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/icc.php',
                   data:{
                       cat_val : ""
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#iccsave').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
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
						
                       $('#iccsave').html(selOpts);
					   
                    }
                });
		
		
		
		    	//alert(ecodes);
	
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/dep.php',
                   data:{
                       cat_val : ""
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#depsave').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
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
						
                       $('#depsave').html(selOpts);
					  
                    }
                });
		
		 /***********************************************************/
}

	function getlistofmodules()
	{
		
		
		// var ecodes = (a.value || a.options[a.selectedIndex].value); 
		var ecodes = document.getElementById("productslist").value;
		
					
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/semestermodules.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#modulesl').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
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
						
                       $('#modulesl').html(selOpts);
					 
                    }
                });
				
				
				
				
	}
	function getlistofaddoncourses()
	{
		
		
		 var ecodes =document.getElementById("productslist").value;
		// alert(ecodes);
					
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'ims/addcouseslist.php',
                   data:{
                       cat_val : ecodes
                   },
                   dataType: 'json',
				   beforeSend: function() {
    $('#addoncourselis').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
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
						
                       $('#addoncourselis').html(selOpts);
					 
                    }
                });
				
				
				
				
	}
	function createslectseme1(a)
	{
		
		// = document.getElementById("semesterselec").value;
		 var ecodes = (a.value || a.options[a.selectedIndex].value); 
		 if(ecodes == 'General')
		 {
		// document.getElementById("courseduarionhide").style.display = "none";
		//document.getElementById("semestershideoption").style.display = "none";
		//document.getElementById("courseduration1").style.display = "none";
		
		 }
		 else if(ecodes == 'Module wise')
		 {
			 getlistofmodules();
		 }
		 else if(ecodes == 'Add-on Course')
		 {
			  getlistofaddoncourses();
		 }
		 else{
		// document.getElementById("courseduarionhide").style.display = "block";
		//document.getElementById("semestershideoption").style.display = "block";
		 }
		 
		 
		 }
		 
		 function admingroup(){
		 	$("#admingroup").modal({keyboard: false});
		 }
		 
		 function openmodalboxstudents(a,b){
		    if(b =="")
   {
   b = "";
   }
   else {
   b= b;
   }
   
  var getg = document.getElementById("loggesingroupid").value; 
   
   
    

	
	     $('#stdtableadmin').DataTable( {
	  dom: 'lBfrtip',
        buttons: [
           
			 {
                extend: 'csvHtml5',
				title: 'students',
                exportOptions: {
                    columns: [0, 1 ,2,3,4]
                }
            },
			 {
                extend: 'excelHtml5',
				title: 'students',
                exportOptions: {
                 columns: [0, 1 ,2,3,4]
                }
            }
        ],
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/studentslistadmin',
    "type": "POST",
	"data":{
                      cat_val : b, getgroups :  getg
                   },
				   "dataType": "json",
				   "cache": false,
				   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			 // $('#stdtable').html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' />");
           
            }
  },
  
  
  /* initComplete: function () {
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
        },*/
  "columns": [
   { "data": "regnumber" },
        { "data": "fname" },
        { "data": "lname" },
        { "data": "email" },
	/*	{ "data": "username" },
			{ "data": "gender" },*/
			{ "data": "groupid" },
			/*{ "data": "created" },*/
			{ "data": "assignments" },
			 { "data": "markscard" },
			 { "data": "attendance" },
			{ "data": "activitylog" },
			/*{ "data": "averagescore" },*/
			{ "data": "reportview" },
			//{ "data": "editlink" },
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9]}
  ],
   
} );
	
	$("#studentsmodaladmin").modal({keyboard: false});
		 }
		 
		 
		 function editausergroupadmin(a)
	{
	$("#edituserfrom").modal({keyboard: false});
	document.getElementById("useridforrow").value = a;
	
	profileviewforstudent(a);
	
	

	
	
				
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
 
//string = element.programenrolled;
//alert(element.collegeregnumber);

  document.getElementById("collegeregnumber1").value =  element.collegeregnumber;
             document.getElementById("datepicker1").value =    element.dateofbirth;
 
           document.getElementById("studentregnumber").value =  element.regnumber;
             document.getElementById("inscoursename1").value =    element.inscoursename;
               document.getElementById("category1").value =  element.category;
               document.getElementById("datepicker").value =  element.admissiondate;
              document.getElementById("scheduleoption1").value =   element.scheduleoption;
             document.getElementById("courseduration1").value =    element.courseduration;
			/* var array = string.split(',');
			//document.getElementById("programenrolled1").value = 	array;
			console.log(array);*/
			
			
			getcoursename(element.courseduration,a);
			
			var values= element.programenrolled;
			console.log(values);
$.each(values.split(","), function(i,e){
    $("#programenrolled1 option[value='" + e + "']").prop("selected", true);
});

//getallenrolledcourses(values,a);

if(element.scheduleoption == 'General')
		 {
		 document.getElementById("courseduarionhide").style.display = "none";
		document.getElementById("semestershideoption").style.display = "none";
		 }
		 else{
		 document.getElementById("courseduarionhide").style.display = "block";
		document.getElementById("semestershideoption").style.display = "block";
		 }
			
			
			
			 document.getElementById("studentregnumber").disabled =  true;
             document.getElementById("inscoursename1").disabled =    true;
               document.getElementById("category1").disabled = true;
               document.getElementById("datepicker").disabled =  true;
			   document.getElementById("collegeregnumber1").disabled =  true;
				 document.getElementById("datepicker1").disabled =  true;
			   
			   
			 
		document.getElementById("stdinfosave").style.display = "none";
		  document.getElementById("semesterselec").disabled =    true;
		  
		  
              document.getElementById("scheduleoption1").disabled =   true;
             document.getElementById("courseduration1").disabled =    true;
			 
			 document.getElementById("programenrolled-icc").disabled =    true;
			 document.getElementById("programenrolled-dep").disabled =    true;
			 document.getElementById("programenrolled-eep").disabled =    true;
			
			
			
			 
			    document.getElementById("programenrolled1").disabled =    true; 
			    
			    
						
                     }); 
					
                    }
                });
				
				
			

				
	
	
	
	}
	
	function openmodalboxcreateticket(){
	
	
		$("#createticketsmodal").modal({keyboard: false});
	}
	
	
	
	
		 
		 function profileviewforstudent(a)
		 {
		// var a = document.getElementById("useridforrow").value;
		 
		
	
	
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:targeturl+'users/getstudentdetsilsprofile/',
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
 
//alert(document.getElementById("roleid").value);

if(document.getElementById("roleid").value == '4')
{
//alert("ima in");
  document.getElementById("fnameprofile").disabled = true; 
             document.getElementById("lnameprofile").disabled = true; 
               document.getElementById("emailprofile").disabled = true; 
               document.getElementById("usernameprofile").disabled = true; 
              document.getElementById("passwordprofile").disabled = true; 
             document.getElementById("genderprofile").disabled = true; 
			   document.getElementById("addressprofile").disabled = true; 
			    document.getElementById("addressprofile1").disabled = true; 
				 document.getElementById("addressprofile2").disabled = true; 
				  document.getElementById("addressprofile3").disabled = true; 
				   document.getElementById("addressprofile4").disabled = true; 
             document.getElementById("phonenumberprofile").disabled = true; 
			 document.getElementById("fnameprofile").value =  element.fname;
             document.getElementById("lnameprofile").value =    element.lname;
               document.getElementById("emailprofile").value =  element.email;
               document.getElementById("usernameprofile").value =  element.username;
              document.getElementById("passwordprofile").value =   element.password;
             document.getElementById("genderprofile").value =    element.gender;
			   document.getElementById("addressprofile").value =   element.address;
			    document.getElementById("addressprofile1").value =   element.address2;
				 document.getElementById("addressprofile2").value =   element.city;
				  document.getElementById("addressprofile3").value =   element.pincode;
				   document.getElementById("addressprofile4").value =   element.state;
             document.getElementById("phonenumberprofile").value =    element.phonenumber;

}
else {
 
           document.getElementById("fnameprofile").value =  element.fname;
             document.getElementById("lnameprofile").value =    element.lname;
               document.getElementById("emailprofile").value =  element.email;
               document.getElementById("usernameprofile").value =  element.username;
              document.getElementById("passwordprofile").value =   element.password;
             document.getElementById("genderprofile").value =    element.gender;
			   document.getElementById("addressprofile").value =   element.address;
			    document.getElementById("addressprofile1").value =   element.address2;
				 document.getElementById("addressprofile2").value =   element.city;
				  document.getElementById("addressprofile3").value =   element.pincode;
				   document.getElementById("addressprofile4").value =   element.state;
             document.getElementById("phonenumberprofile").value =    element.phonenumber;
	

}
			
			
						
                     }); 
					
                    }
                });
		 
		 }
    
    function showallasignemntsforst(a)
    {
        


    $('#displayssih').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getallassignments.php",
    "type": "POST",
	"data":{
                       userid : a ,  fcomps : '<?php echo $this->request->getSession()->read('fcomps'); ?>'
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

		   		   { "data": "view" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	$("#displayassignments").modal({keyboard: false});
    }
    
    function viewtaecherscomments1()
        {
           $("#studentlistcommengts").html("");
            $("#studentlistcommengtsteachers").html("");
            
                   var userid  = document.getElementById("assignmenturlstuuid").value;

        
         var groupidforstudent  = document.getElementById("assignmenturlstuuidgroupid").value;

        
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
                       
                       $("#studentlistcommengts1").html('<button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>');
  },
                   success:function(data)
                    {
					
					//alert(data);
                       $("#studentlistcommengts1").html(data);
					
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
                       
                       $("#studentlistcommengtsteachers1").html('<button class="btn btn-primary" type="button" disabled><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...</button>');
  },
                   success:function(data)
                    {
                       $("#studentlistcommengtsteachers1").html(data);
					
                    }
                });
        }
    
     $(document).ready(function(){

    $("#but_upload1").click(function(){
        var fd = new FormData();
      
       var userid  = document.getElementById("assignmenturlstuuid").value;
fd.append('userid',userid);
        var studentcomment  = document.getElementById("exampleFormControlTextarea61").value;
fd.append('studentcomment',studentcomment);

         var codeforassignment  = document.getElementById("codeforassignment").value;
fd.append('codeforassignment',codeforassignment);
         var scoreforstudents  = document.getElementById("scoreforstudents").value;
fd.append('scoreforstudents',scoreforstudents);
         var assignmentnamestu  = document.getElementById("assignmentnamestu").value;
fd.append('assignmentnamestu',assignmentnamestu);
        
        
// alert(scoreforstudents);
        

        $.ajax({
            url: urlmainsite+'sms/addtreacherecom.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
              beforeSend: function() {
   
                  $("#showloadingaiisgn").show();
                   $("#but_upload").hide();
                  
  },
            success: function(response){
                $("#showloadingaiisgn").hide();
                 $("#but_upload").show();
                if(response == 'Submitted successfully.')
                    {
                        
                        toastr.success(response);
                    }
                else
                    {
                          toastr.error(response);
                        
                    }
              
            },
        });
    });
});

function assignmarkesforstude(uid)
{
$("#useridforrownewd").val(uid);

/* $('#loadtargetsforstudentssacadmin').DataTable( {
	  
	
	   "oSearch": {"sSearch": " "},
		
	 destroy : true,
	
	 "ajax": {
    "url": targeturl+'target/getacademictargetsadmn',
    "type": "POST",
	"data":{
                     userid : uid
                   },
				   "dataType": "json",
				   "cache": false,
				   	   beforeSend: function(xhr) 
            {
			  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
			
            }
  },
   initComplete: function () {
    $(this.api().table().container()).find('input[type="search"]').parent().wrap('<form>').parent().attr('autocomplete','off').css('overflow','hidden').css('margin','auto');
   $('.table select').remove();
            this.api().columns().every( function () {
                var column = this;
				
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
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
{ "data": "comparea_id" },
{ "data": "name" },

{ "data": "action" }
	 
		
        
    ],
		 "columnDefs": [
		
    { "orderable": false, "targets": [0,1,2]}
	]
   
} );*/


 $('#loadtargetsforstudentssacadmin').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/markscard.php",
    "type": "POST",
	"data":{
                       userid : uid  ,loguserid : '<?php echo $this->request->getSession()->read('sessionname'); ?>'
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
        { "data": "type" },
		 { "data": "comparea" },
		  { "data": "topic" },
        { "data": "score" },
        { "data": "passingscore" },
		   { "data": "maxscore" },
		    { "data": "status" },
			 { "data": "remove" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7]}
  ],
   
} );

$("#listallgroupsandcomscomsacadmin").modal({keyboard: false});
}
	
function addmarkscard()
{
loadscorwcardtabcomps();
$("#inscalendartabneaevehjhjjads").modal({keyboard: false});
}	
function addmarkscardnew()
{

$("#loadvedieoaddgva").modal({keyboard: false});
}
function addmarkscardnewresouces()
{

$("#loadvedieoaddgvaresor").modal({keyboard: false});
}	

function attandacestuiwise(uid)
{

$("#useridforrownewd").val(uid);
$('#listofaatnedac').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/attendace.php",
    "type": "POST",
	"data":{
                       userid : uid  
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
        { "data": "type" },
		 { "data": "comparea" },
		  { "data": "topic" },
        { "data": "starttime" },
        { "data": "endtime" },
		 { "data": "remove" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5]}
  ],
   
} );

$("#attandacemnodalffor").modal({keyboard: false});
}

function savevideogalleery()
{



                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/savevideogaller.php',
                    data: {
                       videotittle: $("#videotittle").val(), 
                        videocategpy: $("#videocategpy").val(), 
						
						videodepartment: $("#videodepartment").val(),
						videourl: $("#videourl").val(),
                   videovisson: $("#videovisson").val(),
				   videoorder: $("#videoorder").val()

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#loadvedieoaddgva").modal('hide');
displayvideogalleey();

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;

}
function savevideogalleeryress()
{



                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/saveresources.php',
                    data: {
                       videotittle: $("#videotittler").val(), 
                        videocategpy: $("#videocategpyr").val(), 
						
						videodepartment: $("#videodepartmentr").val(),
						videourl: $("#videourlr").val(),
                   videovisson: $("#videovissonr").val(),
				   videoorder: $("#videoorderr").val(),
				     filepreview_image: $("#videourlrr").val()

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#loadvedieoaddgvaresor").modal('hide');
dispalyresouvcesgallerty();

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;

}
</script>