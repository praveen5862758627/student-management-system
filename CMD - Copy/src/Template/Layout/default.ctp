<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
       
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('mdb.css') ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  
   <?= $this->Html->css('bootstrap.min.css') ?>
  <!-- master Oding Design Bootstrap -->
 

  
 <? /*  <?= $this->Html->css('login.css') ?> */?>
   
 <link rel="stylesheet" href="../../js/vendor/fullcalendar-3.10.0/fullcalendar.min.css">
 <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">


   
 <?= $this->Html->script('jquery-3.4.1.min.js') ?>
  <?= $this->Html->script('popper.min.js') ?>
   <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('mdb.min.js') ?>
 
  
      <?= $this->Html->script('vendor/fullcalendar-3.10.0/lib/moment.min.js') ?>
	 <?= $this->Html->script('vendor/fullcalendar-3.10.0/fullcalendar.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>
  
  
  	  
			    <?= $this->Html->script('dataTables.buttons.min.js') ?>
    <?= $this->Html->script('buttons.flash.min.js') ?>
    <?= $this->Html->script('jszip.min.js') ?>
    <?= $this->Html->script('pdfmake.min.js') ?>
    <?= $this->Html->script('vfs_fonts.js') ?>
    <?= $this->Html->script('buttons.html5.min.js') ?>
    <?= $this->Html->script('buttons.print.min.js') ?>
</head>
<body class="fixed-sn white-skin">

<div class="backimage"></div>

    <nav class="top-bar expanded" data-topbar role="navigation">
	<?php if($loggedIn) : ?>
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
              
				
				<h1><a href="<?php echo "https://" . $_SERVER['SERVER_NAME'] .  "/Users"; ?>">Home</a>
				
				</h1>
            </li>
        </ul>
		   <?php endif; ?>
        <div class="top-bar-section">
            <ul class="right">
              <?php if($loggedIn) : ?>
			  
			  <li><a href="#">Logged in as <?php echo $name; ?>         |</a></li>
                    <li> <?= $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout']); ?></li>
					
                <?php else : ?>
                    <!--<li><?= $this->Html->link('Registration', ['controller' => 'users', 'action' => 'register']); ?></li>-->
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
