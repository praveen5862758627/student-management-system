<script>



$(".toggle-password").click(function() {

//alert("click");

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  //alert(input.attr("type"));
  
  
   var x = document.getElementById("loginpasswor");
 
  
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
  
 
});

</script>