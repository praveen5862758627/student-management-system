<?php
require_once "vendor/koolreport/core/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;


class ImsDashboard extends \koolreport\KoolReport
{
  use \koolreport\amazing\Theme;
  function settings()
  {
    return array(
      "dataSources"=>array(
        "ims"=>array(
			"connectionString"=>"mysql:host=mysql;dbname=ims",
			"username"=>"root",
			"password"=>"Devilbox138@",
			"charset"=>"utf8"
		),		
      )
    );
  }
  
  function setup()
  {
        $this->src('ims')
		->query("SELECT clusters.name name, careers.id id FROM clusters,careers where locate(clusters.code,careers.clustercode) ")
        ->pipe(new Group(array(
            "by"=>"name",
            "count"=>"id"
        )))
        ->pipe(new Sort(array(
            "id"=>"desc"
        )))
        ->pipe(new Limit(array(100)))
        ->pipe($this->dataStore('careerincluster'));

		$this->src('ims')
		->query("SELECT clusters.name name, careerpaths.id id FROM clusters,careerpaths where locate(clusters.code,careerpaths.clustercode) ")
        ->pipe(new Group(array(
            "by"=>"name",
            "count"=>"id"
        )))
        ->pipe(new Sort(array(
            "id"=>"desc"
        )))
        ->pipe(new Limit(array(100)))
        ->pipe($this->dataStore('careerpathincluster'));
  }
}
