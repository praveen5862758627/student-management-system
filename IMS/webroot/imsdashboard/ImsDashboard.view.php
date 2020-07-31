<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="report-content">


    

	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<?php
						BarChart::create(array(
								"dataStore"=>$this->dataStore('careerincluster'),
								"width"=>"100%",
								"height"=>"500px",
								"columns"=>array(
									"name"=>array(
										"label"=>"Cluster Name"
									),
									"id"=>array(
										"type"=>"number",
										"label"=>"Career Count",
										"prefix"=>"",
										"emphasis"=>true
									)
								),
								"options"=>array(
									"title"=>"Career in Cluster",
								)
							));
						?>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="card" style="height: 543px;">
					<div class="card-body" style="overflow-y: auto;">
						<?php
						Table::create(array(
							"dataStore"=>$this->dataStore('careerincluster'),
							"width"=>"100%",
							"height"=>"500px",
							"columns"=>array(
								"name"=>array(
									"label"=>"Type"
								),
								"id"=>array(
									"type"=>"number",
									"label"=>"Count",
									"prefix"=>"",
								)
							),
							"cssClass"=>array(
								"table"=>"table table-bordered table-striped"
							)
						));
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:17px">
			<div class="col">
				<div class="card" >
					<div class="card-body" >
						<?php
						BarChart::create(array(
								"dataStore"=>$this->dataStore('careerpathincluster'),
								"width"=>"100%",
								"height"=>"500px",
								"columns"=>array(
									"name"=>array(
										"label"=>"Cluster Name"
									),
									"id"=>array(
										"type"=>"number",
										"label"=>"Careerpath Count",
										"prefix"=>"",
										"emphasis"=>true
									)
								),
								"options"=>array(
									"title"=>"Careerpath in Cluster",
								)
							));
						?>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="height: 543px;">
					<div class="card-body" style="overflow-y: auto;">
						<?php
						Table::create(array(
							"dataStore"=>$this->dataStore('careerpathincluster'),
							"columns"=>array(
								"name"=>array(
									"label"=>"Type"
								),
								"id"=>array(
									"type"=>"number",
									"label"=>"Count",
									"prefix"=>"",
								)
							),
							"cssClass"=>array(
								"table"=>"table table-bordered table-striped"
							)
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>