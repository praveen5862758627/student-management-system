 <table class="table table-striped table-bordered table-hover" id="examcompsnormal"  data-order="[]"  >
                                            <thead>
                                                <tr>
                                                    <th>Exam</th>
													
													   <th>Lesson</th>
													 	 <th id="levelv">Level</th>
														
														 
														   <?php if($getcatn == 'Semester wise' ) { ?>
														   <th id="scorev" >Action</th>
														   <?php } ?>
														 
														  

													 
														
                                                    
                                                </tr>
                                            </thead>
                                            <tbody >
											
											
											
												<?php foreach ($topiccodes as $target): ?>
											<tr class="odd gradeX">
											
											<td><?= h($target['tname']) ?></td>
										
													<td><?= h($this->Custom->getlesson($target['lcode'])) ?></td>
														<td><?= h($this->Custom->getlevel($target['lecode'])) ?></td>
													
													
													
													
													 <?php if($getcatn == 'Semester wise' ) { ?>
														 <td><a href="#" style='cursor:pointer;' onclick="openmodalboxforlearning(<?php echo $target['tcode']; ?>,<?php echo $target['lecode'] ?>);return false;">Learning Modules</a></td>
														 <?php } ?>
                                                    
                                                </tr>
												 <?php endforeach; ?>
												
												   </tbody>
												   
												    
                                        </table>
										
										
										
										
										<script>
										
								
										
										$(document).ready(function() {
											
						 
											
     $('#examcompsnormal').DataTable( {
		 
	
		
		 "columnDefs": [
    { "orderable": false, "targets": [0,1,2]}
  ],
  
  
		
		 
    destroy : true,
		  responsive: true,
		
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
				
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
					
					
 
                column.data().unique().sort().each( function ( d, j ) {
					

                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
									

        </script>