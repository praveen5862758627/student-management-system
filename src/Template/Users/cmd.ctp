<style>
.panel-body {
  height: 200px; / change according to your requirement/
}
</style>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
               <div class="navbar-header">
                 
					<img src="../uploads/photos/logo.jpg"  width="100px" height="50px">
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                         <ul class="nav" id="side-menu">
                           
                            <li>
                                <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .  "/SMS/Users"; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            
                            
                           
                            <li>
                                <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .  "/SMS/Users/cmd"; ?>"><i class="fa fa-sitemap fa-fw"></i> CMD Blocks</a>
                             
                            </li>
                            <li>
                                <a href="<?php echo "http://" . $_SERVER['SERVER_NAME'] .  "/SMS/Users/ims"; ?>"><i class="fa fa-files-o fa-fw"></i>IMS Blocks</span></a>
                              
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Welcome <?php echo $name; ?></h1>
                        </div>
						
						
						
						 
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
					
					 
					
                    <!-- /.row -->
                    <div class="row">
					<ul id="draggablePanelList" class="list-unstyled">
					<?php if($usersrole == 2) {  ?>
                        <div class="col-lg-4">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                  Topics
								  
                                </div>
                                <div class="panel-body">
                                    <p>Click here to view Topics (AreTopicsawise)</p>
                                </div>
                                <div class="panel-footer">
                                
 <?= $this->Html->link(' View Topic Areas', ['controller' => '', 'action' => '' ],['target' => '_blank']); ?>
                                </div>
                            </div>
                        </div>
						<?php if($searchtopic != 0) { ?> 
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                   Search Topics
									 <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu slidedown">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-refresh fa-fw"></i> Refresh
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-gear fa-fw"></i> Configure Block
                                                </a>
                                            </li>
											 <li>
                                                <a href="#">
                                                    <i class="fa fa-eye fa-fw"></i> Hide Block
                                                </a>
                                            </li>
                                            <li>
                                                <a href="deleteblock/9">
                                                    <i class="fa fa-times fa-fw"></i> Delete
                                                </a>
                                            </li>
                                           
                                            
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>Please enter search string</p>
									 <div class="form-group">
                                                    
                                                    <input class="form-control" placeholder="Enter text">
                                                </div>
                                </div>
                                <div class="panel-footer">
                                 <?= $this->Html->link(' Search Topics', ['controller' => '', 'action' => '' ],['target' => '_blank']); ?> 
								
                                </div>
                            </div>
                        </div>
						<?php } ?>
						<?php if($searchlesson != 0) { ?> 
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                 Search Lesson
								   <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                data-toggle="dropdown">
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <ul class="dropdown-menu slidedown">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-refresh fa-fw"></i> Refresh
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-gear fa-fw"></i> Configure Block
                                                </a>
                                            </li>
											 <li>
                                                <a href="#">
                                                    <i class="fa fa-eye fa-fw"></i> Hide Block
                                                </a>
                                            </li>
                                            <li>
                                                <a href="deleteblock/10">
                                                    <i class="fa fa-times fa-fw"></i> Delete
                                                </a>
                                            </li>
                                           
                                            
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p>Please enter search string</p>
									 <div class="form-group">
                                                    
                                                    <input class="form-control" placeholder="Enter text">
                                                </div>
                                </div>
                                <div class="panel-footer">
                                   <?= $this->Html->link('Search Lesson', ['controller' => 'Targetcomps', 'action' => 'index' ],['target' => '_blank']); ?> 
                                </div>
                            </div>
                        </div>
						<?php } ?>
                        <!-- /.col-lg-4 -->
						<?php } ?>
						</ul>
                    </div>
             
					
			
               
               
      
            
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

      