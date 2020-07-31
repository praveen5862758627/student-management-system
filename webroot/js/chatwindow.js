var me = {};
me.avatar = "/chatwindow/me.png";

var you = {};
you.avatar = "/chatwindow/you.png";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
       /* control = '<li style="width:100%">' +
                        '<div class="msj macro">'  +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';  */


 control ='<li class="right clearfix">'+
                                                '<span class="chat-img pull-right">' +
                                                    '<img src="https://placehold.it/50/FA6F57/fff" alt="User Avatar"  class="img-circle"/>'+
                                                '</span>'+

                                            '<div class="chat-body clearfix">'+
                                               ' <div class="header">'+
                                                    '<small class=" text-muted">'+
                                                        '<i class="fa fa-clock-o fa-fw"></i> '+date+
                                                   ' </small>'+
                                                   
                                               ' </div>'+
                                               ' <p>'+ text +'</p>'+
                                           ' </div>'+
                                        '</li>';
					
    }else{
       /* control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>'  +                                
                  '</li>';*/
				  
				  
				control =   '<li class="left clearfix">'+
                                                '<span class="chat-img pull-left">'+
                                                    '<img src="https://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle"/>'+
                                                '</span>'+

                                           ' <div class="chat-body clearfix">'+
                                                '<div class="header">'+
                                                   
                                                    '<small class="pull-right text-muted">'+
                                                        '<i class="fa fa-clock-o fa-fw"></i>' +date+' </small>'+
                                                '</div>'+
                                                '<p>'+ text +'  </p>'+
                                            '</div>'+
                                        '</li>';
				  
    }
    setTimeout(
        function(){                        
            $("ul.chat").append(control).scrollTop($("ul").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $("ul").empty();
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
        if (text !== ""){
            insertChat("me", text);              
            $(this).val('');
        }
    }
});

$('body > div > div > div:nth-child(2) > span').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})

function getIntro()
   {
   send2dialogflow('Who are you?');    
   }
   
function submitMessage(text)
   {
	console.log("got text: " + text)   ;
    insertChat("me", text);
    //sendMessage(text);
    send2dialogflow(text);
    $('#mytext').val('');
   }


function send2dialogflow(text) {
	
	
		$.ajax({
  type: "POST",
  //dataType: "json",
  data: {datasent : text },
  url: 'https://odinlearning.in/API/Dialogflow/chat.php',
  success: function(data) {
	  
	  alert(data);
 // $("#usertext").text(document.getElementById("btn-input").value);
  insertChat("you", data); 
		return;
   // alert(data);
  }
});
	
	//alert(text);
	//var text = $("#input").val();
	/*var accessToken = "b7f447d1aca14df8bff5ceb8a996b737";
	var baseUrl = "https://api.dialogflow.com/v1/";	
	
	$.ajax({
		type: "POST",
		url: baseUrl + "query?v=20150910",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		headers: {
			"Authorization": "Bearer " + accessToken
		},
		data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
		success: function(data) {
			setResponse(JSON.stringify(data, undefined, 2));
		},
		error: function() {
			setResponse("Internal Server Error");
		}
	});*/
	//setWaitResponse("Loading...");
}
function setResponse(resp) {
	//$("#response").text(val);
	val = JSON.parse(resp);
	//insertChat("you", val);	
	//insertChat("you", val['result']['fulfillment']['messages'][0]['speech']);	
	
	if(val['result']['fulfillment']['messages'][0]['speech'])
		{
		insertChat("you", val['result']['fulfillment']['messages'][0]['speech']); 	
		return;
		}
	if(val['result']['fulfillment']['speech'])
		{
		insertChat("you", val.result.fulfillment.speech); 
		return;
		}
		
	//insertChat("you", val);	
	
}
		  
//-- Clear Chat
//resetChat();

//-- Print Messages
//insertChat("me", "Hello Tom...", 0);  


$(document).ready(function() 
   {
   //intro
   //getIntro();
   
   $("#mytext").on("keyup", function(e)
      {
      if ((e.keyCode || e.which) == 13)
         {
         var text = $(this).val();
         if (text !== "")
            {
            submitMessage(text);   
            $(this).val('');
            }
         }
      });

   $("#sendchat").on("click", function(e)
      {
      var text = $('#mytext').val();
      if (text !== "")
         {
         submitMessage(text); 
         $(this).val('');
         }
      });
   
   

        
      
   });


//-- NOTE: No use time on insertChat.
