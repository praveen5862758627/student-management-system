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
        <?php echo $title; ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  
   <?= $this->Html->css('bootstrap.min.css') ?>
  <!-- master Oding Design Bootstrap -->
 

  
 <? /*  <?= $this->Html->css('login.css') ?> */?>
   
 <link rel="stylesheet" href="../../js/vendor/fullcalendar-3.10.0/fullcalendar.min.css">
 <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  
  <script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
  
   
 
  <?= $this->Html->script('popper.min.js') ?>
   <?= $this->Html->script('bootstrap.js') ?>
    <?= $this->Html->script('mdb.min.js') ?>
 
  
      <?= $this->Html->script('vendor/fullcalendar-3.10.0/lib/moment.min.js') ?>
	 <?= $this->Html->script('vendor/fullcalendar-3.10.0/fullcalendar.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>
  
 
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.4/css/responsive.dataTables.min.css">
  

  
  
  	  
			    <?= $this->Html->script('dataTables.buttons.min.js') ?>
    <?= $this->Html->script('buttons.flash.min.js') ?>
    <?= $this->Html->script('jszip.min.js') ?>
    <?= $this->Html->script('pdfmake.min.js') ?>
    <?= $this->Html->script('vfs_fonts.js') ?>
    <?= $this->Html->script('buttons.html5.min.js') ?>
    <?= $this->Html->script('buttons.print.min.js') ?>

 
 <!-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
			  <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>-->



   
    <script>
	var targeturl = 'https://nsms.odinlearning.in/';
 
 var targeturlforcms = 'https://ncms.odinlearning.in/';


  	var urlmainsite             =   'https://napi.odinlearning.in/';
	
	
		var urlmainsiteaapi             =   'https://api.odinlearning.in/'; //dont change the url
		
		var collgedomainkey = 'none';  //replaceserver domain name
		
		function hideme() {
  var x = document.getElementById("hidemesges");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
         
    </script>

 

</head>
<!--<body>-->


<?= $this->Flash->render() ?>



<?= $this->fetch('content') ?>










 
  <script>
    // SideNav Initialization
    //$(".button-collapse").sideNav();
	$('.button-collapse').sideNav('show');

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    $(function () {
      $('#dark-mode').on('click', function (e) {

        e.preventDefault();
        $('h4, button').not('.check').toggleClass('dark-grey-text text-white');
        $('.list-panel a').toggleClass('dark-grey-text');

        $('footer, .card').toggleClass('dark-card-admin');
        $('body, .navbar').toggleClass('white-skin navy-blue-skin');
        $(this).toggleClass('white text-dark btn-outline-black');
        $('body').toggleClass('dark-bg-admin');
        $('h6, .card, p, td, th, i, li a, h4, input, label').not(
          '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
        $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
        $('.gradient-card-header').toggleClass('white black lighten-4');
        $('.list-panel a').toggleClass('navy-blue-bg-a text-white').toggleClass('list-group-border');

      });
    });
	
	 //minimalist
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });

      $('.min-chart#chart-roi').easyPieChart({
        barColor: "#F44336",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });

      $('.min-chart#chart-conversion').easyPieChart({
        barColor: "#9e9e9e",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });


$(function () {
  $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" })
})

  

/*var table = $('#loadtargetsforstudentss').DataTable();
   
           table.search("hello").draw();*/
  </script>
  <style>
  div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    display: inline-block !important;
}
  </style>

<!--</body>-->
</html>


