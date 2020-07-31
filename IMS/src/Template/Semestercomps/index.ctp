

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
function saveorderfoesemcomps(a){
	
	
	predr = document.getElementById("orderbyid"+a).value;
				
				
				//alert(predr);
				
    // call subcategory ajax here 
    $.ajax({
                   type:"POST",
                   url:'https://nims.odinlearning.in/semestercomps/updateordeforsemcomps',
                   data:{
                      cat_val : a , getoder : predr
                   },
                   dataType: 'text',
				   beforeSend: function(xhr) {
     xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
  },
                   success:function(data)
                    {
 
  
alert(data);
					
					
                    }
                });
}
</script>
   <h3><?= __('Semestercomps') ?><?= $this->Html->link(__('Add '), ['action' => '../semestercomps/add'],['class'=>'btn btn-primary']) ?></h3>
    
<table id="dtMaterialDesignExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
		
            <tr>
			 <th scope="col">ID</th>
			  
                <th scope="col">Order</th>
                <th scope="col">Module/Semester</th>
              
			   <th scope="col">Lessson</th>
			    <th scope="col">Level</th>
              
              
			   
                <th scope="col" class="actions"><?= __('Actions') ?></th>
				
				
             
            </tr>
        </thead>
        <tbody>
		<?php foreach ($notications as $notication): ?>
            <tr>
			  <?php $idd = $notication['id']; 
			  $orderlesson = $notication['orderlesson']; 
			  
			   $lesson_code = $notication['lesson_code']; 
			    $level_code = $notication['level_code']; 
				 $semester_id = $notication['semester_id']; 
				
			 
			  
			  ?>
			   <td><?php echo $notication['id']; ?></td>
			   
                <td><input type="text" style="width:100px" value="<?php echo $orderlesson; ?>"  id="orderbyid<?php echo $idd; ?>" name="order" placeholder="Order" ><button  onclick="saveorderfoesemcomps(<?php echo $idd; ?>)" class="btn success">Save</button></td>
				 
                <td><?php echo $this->Custom->getsmestename($semester_id); ?></td>
				
				 <td><?php echo $this->Custom->getlesson($lesson_code); ?></td>
				  <td><?php echo $this->Custom->getlevel($level_code); ?></td>
            
                  
		
                <td class="actions">
          
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $idd]) ?> |
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $idd], ['confirm' => __('Are you sure you want to delete # {0}?', $idd)]) ?>
					 
					
                </td>
				
            </tr>
            <?php endforeach; ?>
			
          
        </tbody>
    </table>
	   <script>
// Material Design example
$(document).ready(function () {
  $('#dtMaterialDesignExample').DataTable();
  });
</script>
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

