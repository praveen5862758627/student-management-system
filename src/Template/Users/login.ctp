
<?php 
use Cake\Core\Configure;
Configure::load('myconfig');


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo Configure::read('MyConf.weburlmainsite');?>ocweb/ocassets/ocstyle.css">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <title>Login - Odin Connect</title>
  </head>
  <body>
  	<style type="text/css">
	


		/*
			In order to see how the BROWSER ZOOM affects the screen width, we're going to
			change the background color / text color as the screen width changes.
		*/
		/*body {
			background-color: #000000 ;
			color: #ffffff ;
		}*/
		/*
			As the screen dimensions get larger, the background of the screen will get
			lighter. Then, as we ZOOM IN, and the dimensions get smaller, the background
			of the screen should get darker.
		*/
		@media screen and ( min-width: 200px ) {
			/*body {
				background-color: #111111 ;
			}*/
		}
		@media screen and ( min-width: 300px ) {
			/*body {
				background-color: #222222 ;
			}*/
		}
		@media screen and ( min-width: 400px ) {
			/*body {
				background-color: #444444 ;
			}*/
		}
		@media screen and ( min-width: 500px ) {
			/*body {
				background-color: #666666 ;
			}*/
		}
		@media screen and ( min-width: 600px ) {
			/*body {
				background-color: #888888 ;
			}*/
		}
		@media screen and ( min-width: 700px ) {
			/*body {
				background-color: #aaaaaa ;
				color: #000000 ;
			}*/
		}
		@media screen and ( min-width: 800px ) {
			/*body {
				background-color: #cccccc ;
			}*/
		}
		@media screen and ( min-width: 900px ) {
			/*body {
				background-color: #dddddd ;
			}*/
		}
		@media screen and ( min-width: 1000px ) {


		}

	</style>
   <style>
   
 

@media screen and (min-width:993px) and (max-width:1560px) {


}
 
 @media screen and (min-width:768px) and (max-width:992px) {


	
}
@media screen and (min-width:320px) and (max-width:500px) {

#getsatretd
{
margin-top: -110px;
}
}
  
@media screen and (min-width:500px) and (max-width:767px) {
#getsatretd
{
margin-top: -110px;
}

}

/************************************************/

</style>

    <nav class="navbar  navbar-expand-md ">
      <a class="navbar-brand" href="/"><img src="<?php echo Configure::read('MyConf.weburlmainsite');?>ocweb/ocassets/odin-logo-1.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNaVJbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNaVJbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Odin Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/" role="button">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/users/Register" role="button">sign-up</a>
          </li>    
        </ul>
      </div>  
    </nav>

    <div class="container-fluid" id="oclogin">
        <div class="row" id="oclogVrow">
            <div class="col-md-3" id="oclogcol01">
                <p>ITS TIME TO</p>
                <h2>LOGIN<br>NOW!</h2>
                <p><i>"A journey of a thousand miles<br>
                    begins with a single step"</i>,<br>
                    log in to put that  next <br>
                    step forward.</p>
            </div>

            <div class="col-md-5" id="oclogcol02"></div>

            <div class="col-md-4" id="oclogcol03">

                <!--<form class="px-4 py-3">-->
				<?= $this->Form->create($login,['class'=>"px-4 py-3"]); ?>

                    <div class="form-group">
                      
                      <input type="text" class="form-control" id="OCLoginVN" name="email" placeholder="Email">

                    </div>

                    <div class="form-group">
                      
                      <input type="password" class="form-control" id="OCLoginPwd" name="password" placeholder="Password">
					  <span toggle="#mypassowrdprofile2" class="fa fa-fw fa-eye field-icon toggle-password" style="float: right;margin-top: -27px;"></span>
                    </div>
                    <div class="row">

                        <div class="col-md-6 text-left">
                            <p><a href="/users/password">Forgot Password?</a><br>
                                <a href="/users/Register">New User Register Here!</a></p>
                        </div>

                        <div class="col-md-6 text-right">
                            <button type="submit" id="getsatretd" class="btn">GET STARTED</button>
                        </div>
<script>



$(".toggle-password").click(function() {

//alert("click");

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  //alert(input.attr("type"));
  
  
   var x = document.getElementById("OCLoginPwd");

  
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
  
 
});

</script>
                    </div>
                    

                  <?= $this->Form->end(); ?>

            </div>
        </div>
    </div>

    <div class="container-fluid" id="ocfootlogin">
      <div class="row" id="ocfootrow">

        <div class="col-md-12" id="ocfootcolV4">
         <!-- <p class="text-left"> Copyright 2020 Odin Learning </p>-->
		  
		   <p class="text-left" >© 2020 Copyright:
          <a style="color:lightgray" href="https://odinlearning.com/" target="_blank">
            <strong> odinlearning.com</strong>
          </a> | 
          <a style="color:lightgray" href="/users/Privacy" target="_blank" style="text-decoration:underline">
           <strong>Privacy Policy</strong>
          </a>
        </p> 

        </div>

        

      </div>
    </div>

  
  </body>
</html>