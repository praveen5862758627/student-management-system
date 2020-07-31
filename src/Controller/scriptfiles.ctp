<style>
.modal {
z-index:1000000000 !important;
}

.overlay1
 {
 
 position: absolute;
    top: 65px;
    left: 15px;
    right: 15px;
    bottom: 46px;
    background-color: gray;
    z-index: 9999;
    color: yellow;
     opacity: 0.8;
     display: inline-block;
 }

#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}

.rotatedopacity {
//opacity :0.3;
opacity :1;
}
.rotatedopacity1 {
opacity :1;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>

<div id="overlay" >
  <div id="text"><img src='<?= $this->Url->image("processing-please-wait-gif-6.gif"); ?>' /></div>
</div>

<script>

 

/*$(document).ready(function() {
    setInterval(timestamp, 1000);
});*/

function finishatargetcomps()
{

	     $('#studentcompetencieslist').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/targetlists',
    "type": "POST",
	"data":{
                     // cat_val : b
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        { "data": "name" }
      
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0]}
  ],
   
} );
	
	$("#targetmodalforstudentselected").modal();

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
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="text-align: center;position: fixed;width: 100%;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 10000000;">Synchronization of scorecard is in progress. Please check after few minutes for the updated scorecard.</div>');
			  
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
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="text-align: center;position: fixed;width: 100%;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 1000000000000000000000000000000000000000000000;">'+response+'</div>');
			  
			  document.getElementById("synctoscorecarddisable").disabled = false;
			 
			 
  
  
            },
            error: function(e) 
            {
              //  alert("An error occurred: " + e.responseText.message);
				
				 $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-danger" onclick="hidesuccessmesage()" style="text-align: center;position: fixed;width: 100%;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 10000000000000000000000000000000000000000000000000;"> An error occurred: '+e.responseText.message+'</div>');
			  
			  document.getElementById("synctoscorecarddisable").disabled = false;
				
				document.getElementById("overlay").style.display = "none";
                console.log(e);
            }
        });



}

</script>
<style>


.icon-bar
{
z-index:10 !important;
}
#dataTables-example a{
 color:blue !important;   
}
#examcompsconsolidated a{
 color:blue !important;   
}
#ticketBook a{
 color:blue !important;   
}

table.dataTable thead .sorting_asc:after {
    content: "" !important;
	}
	
label {
   
    cursor: pointer !important;
	   
}

#levelv select{
display: none;
}
#scorev select{
display: none;
}
#tdes select{
display: none;
}

#d1 select{
display: none;
}
#a1 select{
display: none;
}


.popover{
    width:200px;
    height:250px;    
}
.panel-body {
  height: 250px; 
     
}



 #calendar {
   
    margin: 0 auto;
  }
</style>
 <style>
        .panel-resizable {
            resize: both;
          overflow: auto
        }
    </style>
	
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
	
	function calendarviewforadmin(){
	
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
	  height: 420,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	  
	  events: targeturl+'events/getallusereventsforadmin',
	   timezone: 'Asia/Kolkata',
	  
	   eventConstraint: {
            start: currentDate,
             end: '2030-01-01'
          
        },
		
				 eventDrop: function(event, delta) {
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
    //console.log(json);
   }
   });
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
	  
	  eventClick: function(event) {
    if (event.url) {
        //window.open(event.url, "_blank");
		window.open(event.url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1200, HEIGHT=600');
		
        return false;
    }
}

    });
	$("#myModalinstitute").modal();
	}
	
	function saveiccinfo(a,b,code)
	{
	
	$("#titleiccdeptype").val(b);
		$("#titleiccdepcode").val(code);
	$("#titleiccdep").val(a);
	$("#studneticcdep").modal();
	}
	
	function addsemadmin()
	{
	$("#myModalinstitutesemester").modal();
	}
	
	function logouturl()
	{
	 
window.location.href = targeturl+'users/logout';
	}
	
 function calendarfilter(a)
	{
	
	if(a == 'all') {
	
	var urlevent = targeturl+'events/getalluserevents';
	
	}
	else {
	
	var urlevent = targeturl+'events/getallusereventsfilter/'+a;
	}
	
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
	  height: 420,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
     eventLimit: true, // allow "more" link when too many events
	 
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
	
	
	if(event.type == 'EXAM' || event.type == 'SEM' ){
	
	
	
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
   eventResize: function(event) {
   var start = event.start.format();
   var end = event.end.format();
   
 //  console.log(event.start);
//	console.log(event.end);
   //alert(start);
     //alert(end);
	 if(event.type == 'EXAM' || event.type == 'SEM' ){
	
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
     timeFormat: 'H:mm',

    eventClick: function(event) {
    if (event.url) {
        //window.open(event.url, "_blank");
		window.open(event.url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1200, HEIGHT=600');
		
        return false;
    }
    }
      
    });
	$("#myModal1").modal();
	
	}
	
	function gettingstartedpopup()
	{
	$("#gettingStartedmodal").modal();
	}
	
	function viewstudentcalendar(){
	
	
	$("#studentcalendarmodal").modal();

 
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
	  height: 420,
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	  
	  events: targeturl+'events/getalluserevents',
	  
	  timeFormat: 'H(:mm)' ,
	  
	  eventClick: function(event) {
    if (event.url) {
        //window.open(event.url, "_blank");
		window.open(event.url, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1200, HEIGHT=600');
		
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
	$("#myModal1").modal();
	}
	
	
	function studentgroup()
	{
	$("#studentgroup").modal();
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
  //console.log(data);
  
 // alert(data);
						if(c== 2)
                       $('#st11'+id).html(data);
					   else 
					    $('#st1'+id).html(data);
					   //$('#examcompsconsolidated').DataTable().ajax.reload();
					
                    }
                });
	
	}
	
	
	
	
	function deletetargetsforstudent(targteid)
	{
	
	
				
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
					
					  $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="text-align: center;position: fixed;width: 100%;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 1000000000000000000000000000000000000000000000;">'+data+'</div>');

						 // $('#loadtargetsforstudentss').DataTable().ajax.reload();
						    $('#targetreomove'+targteid).hide();
							 $('#targteadd'+targteid).show();
							 $('#namecolor'+targteid).css('color', 'red');
						  
                      
					
                    }
                });
	
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
					
					  $("#displayerrormesageforstudent").show();
			  
			  $('#displayerrormesageforstudent').html('<div class="alert alert-success" onclick="hidesuccessmesage()" style="text-align: center;position: fixed;width: 100%;z-index: 10;opacity: 0.9;    font-size: 17px;font-weight: bold;z-index: 1000000000000000000000000000000000000000000000;">'+data+'</div>');

						    $('#targteadd'+targteid).hide();
							 $('#targetreomove'+targteid).show();
							 $('#namecolor'+targteid).css('color', 'green');
						  
                      
					
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
	
	
	$("#nosqldata").modal();
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
	
	
			$("#quizattempts").modal();	
	
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
	$("#recoapi").modal();*/
	
	
	}
	else {
	window.open('users/openpcconect/', 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	
	
	
	}
	function openmoodlelink(a){
	
	window.open('cms/displayquiz/'+a, 'Pagina', 'STATUS=NO, toolbar=no, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=20, LEFT=20, WIDTH=1200, HEIGHT=600'); 
	}
	
	function openmodalboxfordonut(a,b,c)
	{
	 
	 $("#examnameaccordin").html(c);
	
	
	function openmodalboxfordonut1(a,b,c)
	{
	 
	 $("#examnameaccordin").html(c);
	 
	  $("#learningmodulesfordonut").modal();
	 
	 
	 
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
	
	
	
	 $("#learningmodulesfordonut").modal();
	 
	 
	 
	}
	
	
	
	function openmodalboxforlearning(a,b)
	{
	
	/*alert(a);
	alert(b);*/
	
		
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:urlmainsite+'cmd/getlesson.php',
                   data:{
                      cat_val : a
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
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.studyduration+"</td><td><a style='cursor:pointer;color:blue' onclick='openmoodlelink("+element.courseid+")'>View</a></td></tr>";	 
				
                    });
						
					} else {
						
						 
                       //selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#learningmods').html(selOpts);
					
                    }
                });
				
				
 if(b !=7) {			
			
    // call subcategory ajax here 
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
  var selOpts = "";
  
  	if(data.length > 0){
		

						
						 $.each(data, function(index, element) {
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.studyduration+"</td><td><a style='cursor:pointer' onclick='openmoodlelink("+element.courseid+")'>View</a></td></tr>";	 
				
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
                      cat_val : a , limitre : b
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
							 
							
						selOpts += "<tr class='odd gradeX'><td>"+element.name+"</td><td>"+element.studyduration+"</td><td><a style='cursor:pointer' onclick='openmoodlelink("+element.courseid+")'>View</a></td></tr>";	 
				
                    });
						
					} else {
						
						 
                       //selOpts += "<tr class='odd gradeX'><td>No records found</td></tr>";
					}
						
                       $('#learningmods2').html(selOpts);
					
                    }
                });
	
	}
	
	$("#learningmodules").modal();
	
	
	 
	
	
	}
	
	function openmodalboxprofile(a)
	{
	if(a==1)
	{
	
	 
	// setTimeout(function () {
 document.getElementById("profilepreferencesid").click();
  
//}, 100);
	 
	 
	 
	}
	else {
	
	//setTimeout(function () {
 document.getElementById("profileuserid").click();
  
//}, 100);
	
	
	}
	
	$("#userfprofile").modal();
	}
	
	function redirecturlsstudent(url,a)
	{
	/*var win = window.open(url, '_blank');
  win.focus();*/
  
  
  document.getElementById('iframepreferences').src = url;
  
  $("#titlefiorpreference").html(a);
  
  	$("#diagnostics").modal();
	
	}
	
	function openmodalboxscoredacrd()
	{
	
			
	
	/*
  
	
	     $('#gradebook').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": targeturl+'users/getscorecardlist',
    "type": "POST",
	"data":{
                      cat_val : ""
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        { "data": "coursename" },
        { "data": "score" },
		 { "data": "status" },
		  { "data": "complete_date" },
        { "data": "link" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );*/
	
	//getbarchart();
	$("#scoredcard").modal();
	
	$("#morris-bar-chart").html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' style='margin-top: -215px;margin-left: -215px;' />");
									$("#morris-bar-chart1").html("<img src='<?= $this->Url->image("ajax-loading.gif"); ?>' style='margin-top: -215px;margin-left: -215px;' />");
									
									$("#morris-bar-chart").html("Loading");
									$("#morris-bar-chart1").html("Loading");
									
									
	
	setTimeout(function () {
  document.getElementById('getchartforscore').click();
  
}, 1000);
	
 

getalllttheexams();
//getbarchart();

	
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
        { "data": "comparea_id" },
        { "data": "name" },
        { "data": "description" }
		
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
   
} );
	
	$("#topicsdoaply").modal();
	/******/

	}
	
	
	function openmodalboxtarget(a,b)
	{
	
	 $('#mymodalexamcomps1').css('width', '75%');
	
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
      
	
	$("#mymodalexamcomps").modal();
	
	
	
	}
	
	function openmodalboxtargetfornew(a,b)
	{
	
	  $('#studentcompetencies').DataTable( {
	  
	  //  "order": [[ 3, "desc" ],[ 0, "asc" ]],
		
	 destroy : true,
	  //responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/targetcomps.php",
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
 
  { "data": "name" },
  { "data": "level" }
//  { "data": "hours" }
  
		
        
    ],
		 "columnDefs": [
		// { "width": "70px", "targets": [3] },
    { "orderable": false, "targets": [0,1]}
	],
   
} );
	
	$("#targetmodalforstudent").modal();
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
	
	
	$("#nosqldata1").modal();
	}
	
	function targetrecommender()
	{
	
	$("#targetrecommender").modal();
	}
	
	function openmodalboxtarget1(a,b)
	{
	//$('#examcompsnormal').DataTable().ajax.reload();
	$("#mtitle22").text(b);
	$("#mymodalexamcomps1").modal();
	}
	
	function openmodalboxchar(a)
	{
	if(a== 1)
	$("#myModal1popschat").modal();
	else 
	$("#myModal1popschat2").modal();
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
				$("#examsrelatedschedulescomps").modal();
	
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
				$("#examsrelatedschedules").modal();
	
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
				$("#examsrelated").modal();
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
	
	$("#companyrelated").modal();
	}
	
	function editauser(a)
	{
	$("#edituserfrom").modal();
	document.getElementById("useridforrow").value = a;
	document.getElementById("useridforrowprofile").value = a;
		document.getElementById("useridforrowins").value = a;
	
	
	
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
/*$.each(values.split(","), function(i,e){
    $("#programenrolled1 option[value='" + e + "']").prop("selected", true);
});*/


getallenrolledcourses(values,a);




if(element.scheduleoption == 'General')
		 {
		 document.getElementById("courseduarionhide").style.display = "none";
		document.getElementById("semestershideoption").style.display = "none";
		 }
		 else{
		 document.getElementById("courseduarionhide").style.display = "block";
		document.getElementById("semestershideoption").style.display = "block";
		 }
			
			
						
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
				
				
	
			getslectedvalu(b);	
				
				  
   
	
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        { "data": "fname" },
        { "data": "lname" },
        { "data": "email" },
		{ "data": "username" },
			{ "data": "gender" },
			{ "data": "groupid" },
			{ "data": "created" },
			{ "data": "link" },
			{ "data": "editlink" },
			{ "data": "icc" },
			{ "data": "dep" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5,6,7,8,9,10]}
  ],
   
} );
	
	$("#studentsmodal").modal();
	}
	
	function openmodalbox2(a,b){
	
	
	 if(a == 'View Targets ICC'){
	
			$("#viewtargetforicc").modal();	
	}
	
	else if(a == 'View Targets DEP'){
	
		$("#viewtargetfordep").modal();	
	}
	}
	
	
	function openmodalboxforadmin()
	{
	
	var ecodes = document.getElementById("getexamcodes").value;
	//alert(ecodes);
	
	//alert(a);
	  
    // call subcategory ajax here 
    $.ajax({
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
		
	selOpts += "<option value=''>Select an Exam</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.code+"'>"+element.name+" - ( Code:"+element.code+")</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value=''><td>No records found</td></option>";
					}
						
                       $('#targetsins').html(selOpts);
					   // $('#targets1').html(selOpts);
                    }
                });
				
				$("#inscalendartab").modal();
	
	}
	function openmodalbox(a,b){
	
	$("#mtitle").text(b);
	$("#mbody").text(b);
	//alert(a);
	
	if(a == 'Add Targets'){
	
	var ecodes = document.getElementById("getexamcodes").value;
	//alert(ecodes);
	
	
	
	  $('#loadtargetsforstudentss').DataTable( {
	  
	    "order": [[ 3, "desc" ],[ 0, "asc" ]],
		
	 destroy : true,
	  //responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/exams.php",
    "type": "POST",
	"data":{
                      cat_val : ecodes
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
 
  { "data": "name" },
  { "data": "company" },
   { "data": "cutoff" },
    { "data": "minage" },
	 { "data": "maxage" },
	  { "data": "studentactions" }
		
        
    ],
		 "columnDefs": [
		 { "width": "70px", "targets": [3] },
    { "orderable": false, "targets": [0,1,2,3,4]}
	],
   
} );
	
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
   
   
     $('#loadcomapny').DataTable( {
	 
	 destroy : true,
	  responsive: true,
	 "ajax": {
    "url": urlmainsite+"ims/company.php",
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        { "data": "code" },
        { "data": "name" },
        { "data": "description" },
		{ "data": "link" },
			{ "data": "detailsindustry" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
  ],
   
} );

	
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
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
  "columns": [
        { "data": "code" },
        { "data": "name" },
        { "data": "description" },
		{ "data": "link" },
		{ "data": "detailsindustry" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4]}
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
   
   
   
     $('#loadexam').DataTable( {
	 
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
        { "data": "code" },
        { "data": "name" },
        { "data": "description" },
		{ "data": "position" },
		{ "data": "link" },
		{ "data": "detailsindustry" }
		
        
    ],
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2,3,4,5]}
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
           
        });
	}
	</script>
	<style>
	/*Right*/
	.modal.right.fade .modal-dialog {
		right: -320px;
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
		padding: 15px 15px 80px;
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
		 $(window).load(function(){
		 
		 $("#selectedtarget").text(document.getElementById("gettargetcount").value);
		 
   
   	});
		 </script>
		 
		<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover(); 
});

$('body').on('click', function (e) {
    $('[data-toggle=popover]').each(function () {
        // hide any open popovers when the anywhere else in the body is clicked
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big (Max. 2 MB)");
    return false;
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
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
   $('#uploaded_image').html("<img alt='User Pic' src='"+urlva+"' id='profile_image1' style='height:100px;width:100px' class='img-circle img-responsive'>");
	 
	
    }
   });
  }
 });
});

</script>