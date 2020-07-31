<script>
function moreventscreationfun()
{




                $.ajax({
                    type: "POST",
                    url: urlmainsite+'sms/savemoreclassdetails.php',
                    data: {
                       
                        topiccode: $("#lisdifftopivs").val(), topicname: $('#lisdifftopivs option:selected').text(),dow: "",groupid: $("#lisufofddifgrous").val(),starttime: $("#dateandtimefordiffebets").val(),
                   endtime: $("#dateandtimefordiffebets").val(),startdattime11: "",enddattime11: "",
				   desc: $("#difftypedies").val(),color: $("#colorfordiffebets").val(),title: $("#tilefordiffevents").val(),type: $("#diffeebetstype").val()

				  },
                    dataType: 'json',
                    beforeSend: function () {
                        // $('#overalltagetsection').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
                    },
                    success: function (response)
                    {
                       
                    toastr.success(response);
$("#inscalendartabneaeve").modal('hide');
$('#calendarinst').fullCalendar( 'refetchEvents' );

                    },
            error: function(xhr, status, error) 
            {
			
			
				
				 console.log(xhr.responseText);
                
            }
                });
return false;
}
       function rsetpasswordfromadmin(a)
    {
        
         $("#useridforrownewd").val(a);
        $("#resetpasfromadminnmod").modal({keyboard: false});
    }
function filterlogsbydate(a){

var data = $("#eventlogsuser").val();
var dateval = $("#date-picker-examplenew").val();

if($("#date-picker-examplenew").val() =="" )
{
 toastr.error('Please select the date.');
 return false;
}


if(a==1)
{
url = urlmainsite+"sms/getstudentlogsnew.php";
$("#clearfilterforevents").show();
}
if(a==2)
{
url = urlmainsite+"sms/getstudentlogs.php";
$("#clearfilterforevents").hide();
 $("#date-picker-examplenew").val("");
}

    $('#listofstudentsevents').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": url,
    "type": "POST",
	"data":{
                      userid : data, dateval : dateval
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
         { "data": "type" },
		 { "data": "val1" },
		  { "data": "val2" },
        { "data": "time" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": []}
  ],
   
} );

}

function displayactivitylog(data)
{



$("#eventlogsuser").val(data);
    $('#listofstudentsevents').DataTable( {
	
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"sms/getstudentlogs.php",
    "type": "POST",
	"data":{
                      userid : data
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
         { "data": "type" },
		 { "data": "val1" },
		  { "data": "val2" },
        { "data": "time" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3]}
  ],
   
} );
$("#studentsevents").modal({keyboard: false});
}
    function openmodalboxcreateticket(){
		$("#createticketsmodal").modal({keyboard: false});
	}

	function openmodalboxforticket(userRole){
	        $('#ticketBook').DataTable( {

            	 destroy : true,
            	  responsive: true,
            	 "ajax": {
                "url": targeturl+"/ticket/view",
                "type": "POST",
            	"data":{
                          user_role : userRole
                       },
               "dataType": "json",
               "cache": false,
               beforeSend: function(xhr)
                {
                  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());

                }
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
                    {
                        "data": "ticket_no",
                        render: function(data, type, full, meta){
                            return '<span id="userId" style="display:none;">'+full.user_id+'</span><span id="titleVal" style="display:none;">'+full.title+'</span><span id="userRole" style="display:none;">'+userRole+'</span><a href="#" onclick="openmodalboxfortickettrails('+data+')">'+data+'</a>';
                        }
                    },
                    { "data": "date" },
                    { "data": "title" },
                   { "data": "slidenumber" },
                   { "data": "lessonname" },
                   { "data": "lessonid" },
                    { "data": "content" },
					{ "data": "department" },
                    { "data": "priority" },
                    { "data": "status" }
                ],
            	"columnDefs": [
                { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9]}
              ],

            } );

    	    $("#viewticketsmodal").modal({keyboard: false});
    	}

    	function openmodalboxfortickettrails(ticketNo)
    	{
    	    $("#previousComments").html("");
    	    var userRole = $("#userRole").html();
    	    var userId = $("#userId").html();
    	    $.ajax({
                type: "POST",
                url: targeturl+"/ticketUser/view",
                "dataType": "json",
                beforeSend: function(xhr){xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());},
                cache: "false",
                data: {
                    ticket_number: ticketNo,
                    user_role: userRole,
                },
                success: function(response){
                    jQuery.each(response.data, function(index, value){
                            var imagePath = targeturl+'uploads/'+value.file;
                             var imageLink = (value.file) ? '<a href="'+imagePath+'" download>Download the Attachment</a>' : '';

                        

                             if(userId == value.user_id) {
                                $("#previousComments").append("<div style='border: 2px solid #dedede;background-color: #f1f1f1;border-radius: 5px;padding: 10px;margin: 10px 0;'><span style='float:left;width:50px;height:50px;border-radius:25px;font-size:15px;color:#fff;line-height:50px;text-align:center;background:#bbb'>"+value.respective_person+"</span><p style='margin-left:8%;'><b># "+value.sub_ticket_number+"</b><br>"+value.content+"</p><span class='time-right' style='margin-left:8%;'>"+imageLink+"</span></div>");
                                $("#previousComments").append("</div>");
                             } else {
                                $("#previousComments").append("<div style='border: 2px solid #dedede;background-color: #f1f1f1;border-radius: 5px;padding: 10px;margin: 10px 0;border-color: #ccc;background-color: #ddd;'><span style='float:right;width:50px;height:50px;border-radius:25px;font-size:15px;color:#fff;line-height:50px;text-align:center;background:#bbb'>"+value.respective_person+"</span><p ><b># "+value.sub_ticket_number+"</b><br>"+value.content+"</p><span>"+imageLink+"</span></div>");
                                $("#previousComments").append("</div>");
                             }
                    });
                },error: function(xhr, textStatus, error){
                  console.log('error',error);
                  }
            });
            if(userRole == 6) {
                $("#closeButton").show();
            } else {
                $("#closeButton").hide();
            }
    	    $("#viewtrailticketsmodal").modal({keyboard: false});
    	    $("#ticketNo").val(ticketNo);
    	    $("#ticketNumber").html(ticketNo);
    	    var title = $("#titleVal").html();
    	    $("#ticketTitle").html(title);
    	}

        function closeTicket()
        	{
        	    $.ajax({
                        type: "POST",
                        url: targeturl+"/ticketUser/updateTicket",
                        data: {ticket_number:$('#ticketNo').val()},
                        dataType: "json",
                        beforeSend: function(xhr){xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());},
                        success: function(response) {
                        console.log('success',response);
                            $('#createSuccessTrail').show();
                            $('#errorTrail').hide();
                            $('#createSuccessTrail').html(response.data);
                            setTimeout(function(){
                              location.reload();
                            }, 2000);
                        },error: function(xhr, textStatus, error){
                        console.log('error',error);
                            $('#createSuccessTrail').hide();
                            $('#errorTrail').show();
                            $('#errorTrail').html(error.data);
                        }
                    });
        	}
        	
        function openModalForGettingStarted()
        	{
        		$("#gettingStartedmodal").modal({keyboard: false});
        	}
			
		function openmodalboxImportFile(){
			$("#importStudentsBook").hide();
			$("#importStudentsButton").hide();
			$("#errorblock").hide();
			$("#importCsvmodal").modal({keyboard: false});
		}

		function validateImportFile() {
				if(document.getElementById("avatar").files.length == 0)
				{
					$("#errorblock").show();
					$("#errorblock").html("Please Choose the file to import");
				} else {
					  var file_data = $("#avatar").prop("files")[0]; // Getting the properties of file from file field
					  var form_data = new FormData(); // Creating object of FormData class
					  form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data
					  $.ajax({
						url: targeturl+"users/registerByImporting", // Upload Script
						dataType: 'script',
						cache: false,
						beforeSend: function(xhr)
						{
						  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());

						},
						contentType: false,
						processData: false,
						data: form_data, // Setting the data attribute of ajax with file_data
						type: 'post',
						success: function(data) {
						  validateImportFileTable();
						}
					  });
				}
		}
		
		function validateImportFileTable()
		{
			$('#importStudentsBook').DataTable( {

            	 destroy : true,
            	  responsive: true,
            	 "ajax": {
				 "url": targeturl+"users/registerByImportingTable",
                "type": "POST",
            	"data":{step:'one'},
               "dataType": "json",
               "cache": false,
               beforeSend: function(xhr)
                {
                  xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());

                }
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
                    { "data": "sl_no" },
                    { "data": "fname" },
                    { "data": "lname" },
					{
                        "data": "email",
                        render: function(data, type, full, meta){
						var dataContent;
							if(full.duplicateEmail === 'true') {
								dataContent = '<span style="color:red;">'+data+'</span>';
							} else {
								dataContent = data;
							}
							if(full.duplicateEmailFlag.includes("true")){
								$("#errorblock").show();
								$("#errorblock").html("The CSV file contains the Email Id which is Repeated..!! Please correct it and upload again.");
								$("#importStudentsButton").hide();
							} else {
								$("#importStudentsButton").show();
							}
							return dataContent;
                        }
                    },
					{ "data": "username" },
					{ "data": "gender" },
					{ "data": "address" },
					{ "data": "address2" },
					{ "data": "city" },
					{ "data": "pincode" },
					{ "data": "state" },
					{ "data": "category" },
					{ "data": "dateofbirth" },
					{ "data": "admissiondate" },
					{ "data": "phonenumber" },
					{ "data": "collegeregnumber" },
					{ "data": "regnumber" }
                ],
            	"columnDefs": [
                { 
					"orderable": false, 
					"targets": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16],
				}
              ],

            } );
			$("#importStudentsBook").show();
		}
		
		function registerByImportCsv()
		{
			$.ajax({
					type: "POST",
					url: targeturl+"users/registerByImportingTable",
					data: {step:'second'},
					dataType: "json",
					beforeSend: function(xhr){xhr.setRequestHeader("X-CSRF-Token", $('[name="_csrfToken"]').val());},
					success: function(response) {
						$("#messageBlock").show();
						$("#messageBlock").html(response.data);
						console.log('success response ',response);
					},error: function(xhr, textStatus, error){
						$("#messageBlock").hide();
						$("#messageBlock").hide();
						console.log('error',error);
					}
				});
		}


</script>