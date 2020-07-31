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

    <link rel="stylesheet" href="https://nsms.odinlearning.in/ocweb/ocassets/ocstyle.css">

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <title>Reset Password - Odin Connect</title>
	<style>
	#ocforgotpass
	{
	padding-bottom:391px;
	}
	</style>
  </head>
  <body>

    <nav class="navbar  navbar-expand-md ">
      <a class="navbar-brand" href="/"><img src="https://nsms.odinlearning.in/ocweb/ocassets/odin-logo-1.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNaVJbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNaVJbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Odin Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/users/login" role="button">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="/users/Register" role="button">sign-up</a>
          </li>    
        </ul>
      </div>  
    </nav>

    <div class="container-fluid" id="ocforgotpass">
      <div class="row" id="oclogVrow">
          <div class="col-md-4" id="oclogcol01">
              <!--<p>LOOKS LIKE YOU</p>-->
              <h2>RESET<br>PASSWORD</h2>
              
          </div>

          <div class="col-md-7 text-left" id="ocforgocol031">

              <p>
                  Reset your password.

              </p>


              
              <div class="form-group" id="oclogcol03">
			  <?php $this->assign('title', 'Reset Password'); ?>
	
	
	
	  <?php echo $this->Form->create($user) ?>
   
   
   
    <?php
        echo $this->Form->input('password', ['class'=>"form-control",'placeholder'=>"Password", 'label' => false,'required' => true, 'autofocus' => true]); ?>
<br />
    <?php 
        echo $this->Form->input('confirm_password', ['class'=>"form-control",'placeholder'=>"Confirm Password", 'label' => false,'type' => 'password', 'required' => true]);
    ?>
    </br />
 	<?php echo $this->Form->button('Submit',['class'=>"btn"]); ?>
    <?php echo $this->Form->end(); ?>
                       
                <!--<input type="email" class="form-control" id="OCLoginevmail" placeholder="E-Mail">-->
              </div>

          <!--    <button type="button" class="btn">Submit</button>-->

              
             
          </div>

          <div class="col-md-1">
            
            
          </div>
      </div>
  </div>

    <div class="container-fluid" id="ocfootlogin">
      <div class="row" id="ocfootrow">

        <div class="col-md-12" id="ocfootcolV4">
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