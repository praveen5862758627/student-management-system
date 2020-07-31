

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ODIN</title>
  <!-- Font Awesome -->
  

  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

      

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
             <a href="#" class="nav-link border border-light rounded waves-effect" >Logged in as <?php echo $name; ?>      </a>
            </li>
           
          </ul>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            
            <li class="nav-item">
              
			  
			  <?php if($loggedIn) : ?>
			  
			  
			  <?= $this->Html->link('Logout', [ 'class'=>"nav-link border border-light rounded waves-effect",'controller' => 'users', 'action' => 'logout']); ?>
                 
              
                <?php endif; ?>
			  
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="https://openodin.odinlearning.in/img/logo_black.png" class="img-fluid" alt="">
      </a>

     
        <div class="list-group list-group-flush">
        <a href="/Users" class="list-group-item  list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>User Profile</a>
        <a href="/semesters" class="list-group-item   list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Semesters/Modules</a>
		  <a href="/Semestercomps" class="list-group-item active list-group-item-action waves-effect">
          <i class="fas fa-table mr-3"></i>Semestercomps</a>
        <a href="/Target" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Target</a>
		   <a href="/Targetcomps" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map mr-3"></i>Targetcomps</a>
		  
		  
        <a href="/Moduletargets" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Module Targets</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
<script>

function leaveChangelevel(a)
{
	//alert(a);
	   var url             =   urlmainsite+'cmd/level.php';
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
	selOpts += "<option value='7'>Basic</option>";
						
						 $.each(data, function(index, element) {
							 
							
							 
						
							
							selOpts += "<option value='"+element.level_id+"'>"+getlevels(element.level_id)+"</option>";
							
							 
				
                    });
						
					} else {
						
						selOpts += "<option value='7'>Basic</option>";
					}
						
                       $('#level_code').html(selOpts);
                    }
                });
}

function leaveChange(a)
{

    var url             =   urlmainsite+'cmd/lesson.php';
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
							 
							
							 
						
							
							selOpts += "<option value='"+element.id+"'>"+element.tcodelesson+"</option>";
							
							 
				
                    });
						
					} else {
						selOpts += "<option value=''>No Records found</option>";
					}
						
                       $('#lesson_code').html(selOpts);
                    }
                });
}

function getlevels(a){
	if(a == 1 )
		name = 'Level 1';
		else if(a == 2 )
			name = 'Level 2';
			else if(a == 3 )
				name = 'Level 3';
				else if(a == 4 )
					name = 'Level 4';
					else if(a == 5 )
						name = 'Level 5';
						else if(a == 7 )
							name = 'Level 0';
						
						return name;
							
	
}

</script>

    <?= $this->Form->create($semestercomp,array('class'=>'border border-light p-5')) ?>
    <fieldset>
        <legend><?= __('Edit Semestercomp/Modulecomp') ?></legend>
        <?php
            echo $this->Form->control('semester_id', ['options' => $semesters,'class'=>"mdb-select form-control mb-4"]);
         //   echo $this->Form->control('topic_code');
           //// echo $this->Form->control('lesson_code');
           // echo $this->Form->control('level_code');
            echo $this->Form->control('score',array('class'=>'form-control mb-4','label'=>'Score:','placeholder'=>"Score"));
        ?>
		
		<label >Topic code :*</label>
			<select name="topic_code" id="topic_code-id" class="mdb-select form-control mb-4" onchange="leaveChange(this.value)">
		<?php
		
		foreach ($topiccodes as $k => $v) { ?>
			
			<option value="<?php  echo $v['id']; ?>" <?php if ($v['id'] == $gettid ) echo 'selected' ; ?>  ><?php  echo $v['name']; ?>  / <?php  echo $v['tcode']; ?></option>
			<?php
 
}
		?>
		</select>
		
		
	<label >Lesson code:*</label>
		
		<select id='lesson_code' name='lesson_code' class="mdb-select form-control mb-4" required onchange="leaveChangelevel(this.value)">
			
		</select>
		
		 <label >Level code:*</label>
		<select name="level_code" id="level_code" class="mdb-select form-control mb-4" required  >
			
		</select>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>


    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

   
    <hr class="my-4">

    <!-- Social icons -->
  
    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="https://odinlearning.com" target="_blank"> odinlearning.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

 
</body>

</html>
