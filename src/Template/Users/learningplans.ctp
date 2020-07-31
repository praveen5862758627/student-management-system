<script>
var targeturl = 'https://sms.odinlearning.in/';
 var targeturlforcms = 'https://cms.odinlearning.in/';
 	var urlmainsite             =   'https://api.odinlearning.in/';
</script> 

 <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->Html->css('metisMenu.min.css') ?>
    <?= $this->Html->css('startmin.css') ?>
    <?= $this->Html->css('fullcalendar.min.css') ?>

    <?= $this->Html->css('morris.css') ?>


    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('moment.min.js') ?>

    <?= $this->Html->script('fullcalendar.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('metisMenu.min.js') ?>
    <?= $this->Html->script('startmin.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('jquery.cookie.js') ?>
    <?= $this->Html->script('arrow34.js') ?>
    <?= $this->Html->script('jquery.dataTables.min.js') ?>
    <?= $this->Html->script('dataTables.bootstrap.min.js') ?>
    <?= $this->Html->css('jquery-ui.css') ?>

    <?= $this->Html->script('js.cookie.js') ?>
    <?= $this->Html->script('dataTables.fixedHeader.min.js') ?>
	    <?= $this->Html->script('moment-timezone-with-data.js') ?>
		
		 <?= $this->Html->script('ckeditor.js') ?>
<?php include('scriptfiles.ctp'); ?>
 <?php include('functionsscript.ctp'); ?> 
 

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

 
 
 <body >
 

<div id="wrapper">

 <!-- /.panel-heading -->
                                <div class="panel-body" style="height:100%">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
									
									<li class="active" style="background-color:white !important;"><a href="#competencyarea" data-toggle="tab">Competency Area</a>
                                        </li>
                                        <li  style="background-color:white !important;"><a href="#home" data-toggle="tab">Exam Competencies</a>
                                        </li>
										
										
										
										<?php if($getcatn == 'General' ) { ?>
											
                                        <li style="background-color:white !important;"><a href="#profile" data-toggle="tab">Consolidated</a>
                                        </li>
                                     <?php  } ?>
									 
									 
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade" style="background-color: var(--main-color) !important;" id="home">
										
										<br />
                                           <table class="table table-striped table-bordered table-hover" id="examcompsnormal"  data-order="[]"  >
                                            <thead>
                                                <tr>
                                                    <th>Exam</th>
													<!-- <th >Exam Code</th>
													  <th>Topic</th>-->
													   <th>Lesson</th>
													 	 <th id="levelv">Level</th>
														<!-- <th id="scorev" >Score</th>-->
														 
														   <?php if($getcatn == 'Semester wise' ) { ?>
														   <th id="scorev" >Action</th>
														   <?php } ?>
														 
														  

													 
														
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
											
											
											
												<?php foreach ($topiccodes as $target): ?>
											<tr class="odd gradeX">
											
											<td><?= h($target['tname']) ?></td>
											  <?php /*if($getcatn == 'General' ) { ?>
                                                    <td><?= h($this->Custom->getexamname($target['ecode'])) ?></td>
													
											  <?php }  else { ?>
											  
											   <td><?= h($this->Custom->getsemname($target['ecode'])) ?></td>
											  
											  <?php } */?>
													
													  <?php /*<td><?= h($target['ecode']) ?></td>
													<td><?= h($this->Custom->gettopic($target['tcode'])) ?></td>*/?>
													<td><?= h($this->Custom->getlesson($target['lcode'])) ?></td>
														<td><?= h($this->Custom->getlevel($target['lecode'])) ?></td>
													<!--<td><?= h($target['escore']) ?></td>-->
													
													
													
													 <?php if($getcatn == 'Semester wise' ) { ?>
														 <td><a href="#" style='cursor:pointer;' onclick="openmodalboxforlearning(<?php echo $target['tcode']; ?>,<?php echo $target['lecode'] ?>);return false;">Learning Modules</a></td>
														 <?php } ?>
                                                    
                                                </tr>
												 <?php endforeach; ?>
												
												   </tbody>
												   
												    
                                        </table>
										
										
										
										
										<script>
										
								
										
										$(document).ready(function() {
											
						 // $('#examcompsnormal').DataTable().ajax.reload();
											
     $('#examcompsnormal').DataTable( {
		 
		 // destroy : true,
		
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
  
  
		
		 
    destroy : true,
		  responsive: true,
		
        initComplete: function () {
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
        }
    } );
} );
									

        </script>
										
										</div>
										
											
										
										
                                        <div class="tab-pane fade" style="background-color: var(--main-color) !important;" id="profile">
										
										<br />
										
										<table class="table table-striped table-bordered table-hover" id="examcompsconsolidated"  data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true" >
                                            <thead>
                                                <tr>
                                                   
													  <!--<th>Topic</th>-->
													   <th>Lesson</th>
													 	 <th>Level</th>
													<!--	 <th>Score</th>-->
														<!--  <th id="scorev" >Status</th>-->
														  
														  <th id="scorev" >Skip</th>
													
														 <th>Action</th>
														 
														  <th></th>
														
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
											
												<?php foreach ($topiccodesconsolidated as $target): ?>
											<tr class="odd gradeX">
											  
                                                 
												<?php /*	<td><?= h($this->Custom->gettopic($target['tcode'])) ?></td> */ ?>
													<td><?= h($this->Custom->getlesson($target['lcode'])) ?></td>
														<td><?= h($this->Custom->getlevel($target['lecode'])) ?></td>
												<!--	<td><?= h($target['escore']) ?></td>-->
													<!--<td><?= h($target['tctstatus']) ?></td>-->
													
													<?php if($target['tcskip']==0){ $stat = "Skip it"; } else { $stat = "Skipped";} ?>
													<td><a id="st1<?= h($target['tcid']) ?>" style='cursor:pointer'  onclick='skipthelesson(<?= h($target['tcid']) ?>,<?= h($target['tcskip']) ?>,1)'><?= h($stat) ?>  </a></td>
													
													<td><a href="#" style='cursor:pointer;' onclick="openmodalboxforlearning(<?php echo $target['tcode']; ?>,<?php echo $target['lecode'] ?>);return false;">Learning Modules</a>

													 </td>
													 
													 <td>  <div class="row show-grid">
													 
													 <?php /*foreach ($this->Custom->getquizesforchart($target['lecode'],$target['lcode'])): */?>
													 
													  
													 
													  <?php /*endforeach;*/ ?>
													 
                                        <div class="col-md-1" style="background-color: #B6D7A8 !important;width: 40px !important;">X</div>
                                        <div class="col-md-1" style="background-color: #FF9900 !important;width: 40px !important;">X</div>
                                        <div class="col-md-1" style="background-color: #A4C2F4 !important;width: 40px !important;">X</div>
                                        <div class="col-md-1" style="background-color: #E6B8AF !important;width: 40px !important;">X</div>
                                        <div class="col-md-1" style="background-color: #FFD966 !important;width: 40px !important;">X</div>
                                       
                                    </div> </td>
                                                    
                                                </tr>
												 <?php endforeach; ?>
												
												   </tbody>
                                        </table>
										<script>
            $(document).ready(function() {
                $('#examcompsconsolidated').DataTable({
                        "ordering": false
                });
            });
        </script>
                                         
                                         </div>
										 
										 
										 
										<!---------------------------------------- comp area *******************---->
										
										<div class="tab-pane fade in active" style="background-color: var(--main-color) !important;" id="competencyarea">
										
										<br />
										
										<table class="table table-striped table-bordered table-hover" id="compreaadata"  data-toggle="table"
			 data-search="true"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-click-to-select="true" >
                                            <thead>
                                                <tr>
                                                   
													
													   <th>Name</th>
													 	 <th>Description</th>
											             <th>Initial Baseline</th>
														 <th>Baseline Grade</th>
														 <th>Current Competency</th>
														
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
											
												<?php foreach ($comlistforstudent as $target): ?>
											<tr class="odd gradeX">
											  
                                                 
												
													<td><?= h($target['name']) ?></td>
														<td><?= h($target['description']) ?></td>
												
													<td><a href="#" style='cursor:pointer;' onclick="openmodalboxforlearningcomprea(<?php echo $target['id'] ?>);return false;">View</a>

													 </td>
													 
													 <td><?= $this->Custom->getscoreforbaseline($target['id'],$useridmoodle); ?></td>
													 <td></td>
                                                    
                                                </tr>
												 <?php endforeach; ?>
												
												   </tbody>
                                        </table>
										<script>
            $(document).ready(function() {
                $('#compreaadata').DataTable({
                        "ordering": false
                });
            });
        </script>
                                         
                                         </div>
										
										<!---------------------------------------- end of comp area *******************---->
										 
											
                                       
                                    </div>
                                </div>
                                <!-- /.panel-body -->
								
								</div>
								
								
								
								<div id="learningmodulescomprea" class="modal fade right" role="dialog">
  <div class="modal-dialog" style="width: 75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Baseline</h4>
      </div>
      <div class="modal-body">
        <!--<p>Some text in the modal.</p>-->
		
		 <table class="table table-striped table-bordered table-hover" >
                                            <thead>
                                                <tr>
                                                    <th>Modules</th>
													 <th>Minutes</th>
													  <th>Completion Status</th>
														 <th>Action</th>
                                                          <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody id="learningmodscomprea">
											
											
												
												   </tbody>
												  
                                        </table>
		 
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-default-another" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
								
								</body>