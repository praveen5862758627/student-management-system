<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'exam';
	private $AUTH_USER = 'praveen';
	private $AUTH_PASS = '123456';
	private $has_supplied_credentials;

    // Post Properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }
	
	         		 	   // Get Posts
    public function lisallgroupssms($result) {
      // Create query
        
      /* $arraa =  explode(',', $fcomps);
      

$result = "'" . implode ( "','", $arraa ) . "'";*/

    
	  
	$query = "SELECT  * from  targetcomps where targetcode in (".$result.") ORDER BY id";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT code FROM ' . $this->table . '   ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    public function	examcompsexamname($temp) {
        
         $query = 'SELECT e.code as ecode
    FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id WHERE es.id = '.$temp;
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
    
        public function	loadcompstarget($temp) {
        
         $query = "SELECT * from targetcomps WHERE competency_code = '".$temp."'";
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
        
    }
    
    	 public function depcomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.dep_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
FROM deps s
INNER JOIN depcomps sc
    on s.id = sc.dep_id
 WHERE s.code IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	public function encrypt($sData){
$id=(double)$sData*543544.456;
return base64_encode($id);
//return $id;
}
	
	 public function getsudentcluster($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
	 $thePostIdArray = explode(',', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";
 
  $query = 'SELECT * from clusters WHERE code IN ('.$result.')';

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
    
	
	 public function getsudentclustertarget($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
		
		
		
		
		 $a ="";
	   
	   $string = preg_replace('/\.$/', '', $temp); //Remove dot at end if exists
$array = explode(',', $string); //split string into array seperated by ', '
foreach($array as $value) //loop over values
{
   // echo $value . PHP_EOL; //print value
	
	$a.=$value.'|';
	
}
		
	$fdata = rtrim($a,'|');
	
		
	
  
  
  $query = 'SELECT  t.month_approximate as month_approximate, t.year as year ,t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where CONCAT(",", t.clustercode, ",") REGEXP ",('.$fdata.')"';
   

  
 
  
 


 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
	
			 public function  gettargetstatusbycond($userid)
		 {
			 include "../config/myconfig.php";
			  $row = array('uid' => $userid);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/gettargetscoresnew.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes;
		 }
	
	
	
		 public function getsudentclustertargetdate($fromdate,$todate ,$temp) {
	
    /*
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    
      $stmt = $this->conn->prepare($query);

      
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          
        $temp = $row['clustercode'];
		
		
		
		
		 $a ="";
	   
	   $string = preg_replace('/\.$/', '', $temp); 
$array = explode(',', $string);
foreach($array as $value) 
{
  
	
	$a.=$value.'|';
	
}
		
	$fdata = rtrim($a,'|');
	
		
	
  
  
  $query = 'SELECT  t.month_approximate as month_approximate, t.year as year ,t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where CONCAT(",", t.clustercode, ",") REGEXP ",('.$fdata.')" and (t.year >= '.$fromdate.' and  t.year <= '.$todate.' ) order by t.year asc';
   
*/
  
 
    $query = 'SELECT  t.month_approximate as month_approximate, t.year as year ,t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where  (t.year >= '.$fromdate.' and  t.year <= '.$todate.' ) order by t.year asc';
  
 


 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
	
	
	public function getsudentclusterstudentindustires($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
         $temp = $row['clustercode'];
		 
		 $a ="";
	   
	   $string = preg_replace('/\.$/', '', $temp); //Remove dot at end if exists
$array = explode(',', $string); //split string into array seperated by ', '
foreach($array as $value) //loop over values
{
   // echo $value . PHP_EOL; //print value
	
	$a.=$value.'|';
	
}
		
	$fdata = rtrim($a,'|');

  
  
   $query = 'SELECT * FROM industry WHERE CONCAT(",", clustercode, ",") REGEXP ",('.$fdata.')"';
   
   
 
   
  

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
	
	
	 public function getsudentclusterstudentcomapnies($temp) {
	
    
      $query = 'SELECT clustercode from graduation WHERE graduationcode IN ("'.$temp.'")';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
        $temp = $row['clustercode'];
	/* $thePostIdArray = explode(',', $temp);
	 
 $result = "'" . implode ( "', '", $thePostIdArray ) . "'";
 

  
  
   $query = 'SELECT * from company where clustercode IN ('.$result.')';*/
   
   
    $a ="";
	   
	   $string = preg_replace('/\.$/', '', $temp); //Remove dot at end if exists
$array = explode(',', $string); //split string into array seperated by ', '
foreach($array as $value) //loop over values
{
   // echo $value . PHP_EOL; //print value
	
	$a.=$value.'|';
	
}
		
	$fdata = rtrim($a,'|');
	
	 $query = 'SELECT * from company where  CONCAT(",", clustercode, ",") REGEXP ",('.$fdata.')"';
	
	
	

 
 
  $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	  

   //   return $stmt;
    }
    
    	 public function icccomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.icc_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
FROM iccs s
INNER JOIN icccomps sc
    on s.id = sc.icc_id
 WHERE s.code IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    public function getlesson($id)
		{
			include "../config/myconfig.php";
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		
		    public function getproductflag($uid,$code)
		{
			
			include "../config/myconfig.php";
			 $row = array('uid' => $uid,'code' => $code);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/getmodulestatus.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes;
		//var_dump( $topiccodes);
		//exit;
		}
		
		
		 public function gettargetstatus($tcode,$userid,$tminage,$tmaxage,$year)
		{
			include "../config/myconfig.php";
			 $row = array('uid' => $userid,'code' => $tcode,'tminage' => $tminage,'tmaxage' => $tmaxage,'year' => $year);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/gettargetscores.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes;
		//var_dump( $topiccodes);
		//exit;
		}
		
			 public function getrank($tcode,$userid)
		{
			
			include "../config/myconfig.php";
			
			 $row = array('uid' => $userid,'code' => $tcode);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/gettargetrank.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes;
		//var_dump( $topiccodes);
		//exit;
		}
		
		
		
	
	 public function semestercompsstudentnolimi($prod_cat) {
		 
	 $query = "SELECT * FROM semestercomps where semester_id ='".$prod_cat."' order by cast(orderlesson as unsigned) asc";
	 
	 
		  
		 //    $query = 'SELECT  FROM semestercomps sc LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
		 
	 }
	
	 public function semestercompsstudent($prod_cat) {
		 
		  $query = "SELECT * FROM semestercomps where semester_id ='".$prod_cat."' limit 4 ";
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
		 
	 }
	
	
	  public function compereanameidleesson1($prod_cat ,$competency_code) {
      // Create query
      $query = 'SELECT level FROM targetcomps  where targetcode = "'.$prod_cat.'" and competency_code = "'.$competency_code.'" ';
    
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    	 public function semestercomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
   /*   $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
    
      $query = 'SELECT sc.semester_id as esid, s.name as ename,s.code as ecode
    , sc.topic_code as tcode
    , sc.lesson_code as lcode
    , sc.level_code as lecode
	, sc.score as escore
	, sc.type as sctype
FROM semesters s
INNER JOIN semestercomps sc
    on s.id = sc.semester_id
 WHERE s.code IN ('.$result.') order by cast(sc.orderlesson as unsigned) asc';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
	
	 public function examcomps($temp) {
	     
	//     $myArray = ',E0006,E0005';
	     
	    // $temp = array("E0007","E0006");

$result = "'" . implode ( "', '", $temp ) . "'";
	     
//	 $ids = join("','",$myArray);  
	     
      // Create query
     /* $query = 'SELECT ec.examschedule_id as esid, e.name as ename,e.code as ecode
    , ec.topic_code as tcode
    , ec.lesson_code as lcode
    , ec.level_code as lecode
	, ec.score as escore
FROM exam e
INNER JOIN examschedule es
    on e.id = es.exam_id
INNER JOIN examcomps ec
    on es.id = ec.examschedule_id WHERE e.code IN ('.$result.')';*/
	
	
	$query = 'SELECT * FROM targetcomps  WHERE targetcode IN ('.$result.')';
      
    //  echo $query;
     // exit;
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function getquizesforgetdeatils($lecode,$lcode)
		{
			include "../config/myconfig.php";
			 $row = array('lecode' => $lecode, 'lcode' => $lcode);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/getquizesnewlimit.php', false, $context1);
        return $topiccodes = json_decode($result1, true);
		// return $topiccodes[0]['courseid'];
		
		}
		
		
		public function getstudydurationforeach($id)
		{
			include "../config/myconfig.php";
			
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/getcourseduration.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['studyduration'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		
		public function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return $this->lz($hours).":".$this->lz($minutes);
}

// lz = leading zero
public function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}
		
		
	 public function gettyhegrade($comcode,$useridmoodle,$prod_cat,$tclevel){
		 
		 include "../config/myconfig.php";
		   $row = array('id' => $comcode , 'useridmoodle' =>$useridmoodle );
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/quiznamenew.php', false, $context1);
      
	    $topiccodes = json_decode($result1, true);
	   
	  
		 
		 
      
	  
	  $complted =0; $pending = 0;
	  foreach($topiccodes as $tcode) {
		  
		  
		 // echo $tcode['id'];
			
			 $finaldatalist = $this->getquizesforgetdeatils($tclevel,$tcode['id']); //level and lessoncode
			
			//echo $tcode['id']; 
			
			  $t=$this->getstudydurationforeach($tcode['id'])/60;
			
			
	//	var_dump($finaldatalist);
			
	   foreach($finaldatalist as $topiccodes1)
	   {
		  
		   
		  $gradeff = $this->getscoreforbaselinegetscore($comcode,$useridmoodle,$topiccodes1['code']);
		  
		  
		 
		   
		    if($gradeff == 'Pass')
			 {
				 $complted+= $t*$topiccodes1['level_id'];
			 }
			 else{
				 
				 $pending+= $t*$topiccodes1['level_id'];
			 }
		
		 
	   }
			
			
		}
		
		
		
		if(($complted / ($complted+$pending)) * 100 == 'NAN')
		return array('0.00%',$pending , ($complted+$pending)) ;


	else
	   return array(number_format(($complted / ($complted+$pending)) * 100 ,2).'%',$pending , ($complted+$pending)) ;
	


	}
	
	   public function getscoreforbaselinegetscore($id,$useridmoodle,$courseid)
  {
	  
	  
	  
	  
	 /* echo 'swaedrfcsewdf'.$gettopicids;
	  exit;*/
	  
	//  SELECT * FROM `targetcomps` WHERE `target_id`=2540 and `topiccode` in(14,15,61,62,63,64,65,66,67,68,69,70,71,72,73,146,147,148)
include "../config/myconfig.php";
	  
	   $row = array('id' => $id , 'useridmoodle' =>$useridmoodle ,'courseid' =>$courseid );
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'sms/couserquizes.php', false, $context1);
      
	    $topiccodes = json_decode($result1, true);
		
		return $topiccodes[0]['Grade'];
		
  }
	
		 public function examsresultcomps($prod_cat) {
    
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	   $query = 'SELECT tc.competency_code as comcode,cm.name as cmname , tc.level as tclevel FROM targetcomps tc LEFT JOIN competencymasters cm ON trim(tc.competency_code) = trim(cm.code) where tc.target_id ='.$prod_cat.' ';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
		 public function addoncousess($setext) {
    
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	 //  $query = 'SELECT * from iccs ';
	   
	   	$query = 'SELECT * from iccs  where (name LIKE "%'.$setext.'%" or description LIKE "%'.$setext.'%" or  position LIKE "%'.$setext.'%")';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		 public function moduleslist() {
    
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
   $query = 'SELECT * from semesters where module = 1 and enable = 1 and mtype="EEP" order by position asc ';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function moduleslistdescr($a) {
    
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	   $query = 'SELECT * from semesters where module = 1  and id="'.$a.'" order by id asc ';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	 public function examsresultins($prod_cat) {
      // Create query
      
       /*$myArray = explode(',', $prod_cat);


$result = "'" . implode ( "', '", $myArray ) . "'";
    
       $query = 'SELECT code,name FROM exam where code not in ('.$result.')';*/
       
       //echo $query;
       //exit;
      
	  
	 // $query = 'SELECT code,name FROM target';
	  
	  
	  
	   $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
       
	  
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
	 public function examsresult($prod_cat,$ttype) {
      // Create query
	  
	 // if($prod_cat == NULL || $prod_cat == "") {
      
       $myArray = explode(',', $prod_cat);


	  $result = "'" . implode ( "', '", $myArray ) . "'";
	  
	/*  } else {
		  $result = '0';
	  }*/
	  
    
       //$query = 'SELECT code,name FROM exam where code not in ('.$result.')';
	   
	  //  $query = 'SELECT id,code,name,cutoff,minage,maxage,companycode FROM target';
	  
	  
	   $query = 'SELECT t.month_approximate as month_approximate, t.year as year , t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where ttype="'.$ttype.'"';
                                   
	  
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
     public function depresults($prod_cat) {
      // Create query
      
   /*    $myArray = explode(',', $prod_cat);


$result = "'" . implode ( "', '", $myArray ) . "'";*/
    
       $query = 'SELECT code,name FROM deps';
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
     public function iccresults($prod_cat) {
      // Create query
      
      /* $myArray = explode(',', $prod_cat);


$result = "'" . implode ( "', '", $myArray ) . "'";*/
    
       $query = 'SELECT code,name FROM iccs';
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
	 public function getsmesterids($prod_cat) {
    
    
       $query = 'SELECT id FROM semesters where name LIKE "%'.$prod_cat.'%"';
       
    
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    
     public function semesterresult($prod_cat) {
      // Create query
      if($prod_cat == '4 Sem') {
      	
$result = '3';

	
$result1 = '6';
}

 else if($prod_cat == '2 Sem') {
      	
$result = '1';

	
$result1 = '2';
}
 else if($prod_cat == '6 Sem') {
      	
$result = '7';

	
$result1 = '12';
}
 else if($prod_cat == '8 Sem') {
      	
$result = '13';

	
$result1 = '20';
}
 else if($prod_cat == '12 Mod') {
      	
$result = '23';

	
$result1 = '34';
}

 
    
       $query = 'SELECT code,name FROM semesters where id BETWEEN "'.$result.'" AND "'.$result1.'"';
       
     // echo $query;
      // exit;
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	public function semesterresultlist($prod_cat) {
   
      	
$result = '23';

	
$result1 = '34';

$myArray = explode(',', $prod_cat);


$result = "'" . implode ( "','", $myArray ) . "'";
 
    
       $query = 'SELECT code,name FROM semesters where  code not in ('.$result.') and module=1 ';
       
     // echo $query;
      // exit;
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	public function semesterresultlistaddon($prod_cat) {
   
      	

$myArray = explode(',', $prod_cat);


 $result = "'" . implode ( "','", $myArray ) . "'";


 
    
       $query = 'SELECT code,name FROM iccs where code not in ('.$result.')';
	 // $query = 'SELECT code,name FROM iccs';
	  
       
     // echo $query;
      // exit;
       
       //echo $query;
       //exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	 public function exam() {
      // Create query
      //$query = 'SELECT code,name FROM exam';
	   $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
     public function companycount() {
      // Create query
      $query = 'SELECT id,code,name,description FROM company ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
      public function industrycount() {
      // Create query
      $query = 'SELECT id FROM industry';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    	   // Get Posts
    public function examname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM target  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	    	   // Get Posts
    public function getratgetmodules($prod_cat) {
      // Create query
      $query = 'SELECT * FROM moduletargets  where modulecode = "'.$prod_cat.'"  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function compereanameidname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM company  where code = "'.$prod_cat.'"  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
		   // Get Posts
    public function getmodiledec($prod_cat) {
      // Create query
     // $query = 'SELECT companycode FROM target  where code = "'.$prod_cat.'"  ';
	  
	  
	
	   
	      $query = 'SELECT description from semesters where code ="'.$prod_cat.'"';
		
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
		   // Get Posts
    public function getmodiledeccript($prod_cat) {
      // Create query
     // $query = 'SELECT companycode FROM target  where code = "'.$prod_cat.'"  ';
	  
	  
	
	   
	      $query = 'SELECT name,description from iccs where id ="'.$prod_cat.'"';
		
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	    public function getmodiledeccriptnew($prod_cat) {
      // Create query
     // $query = 'SELECT companycode FROM target  where code = "'.$prod_cat.'"  ';
	  
	  
	
	   
	      $query = 'SELECT name,description from semesters where id ="'.$prod_cat.'"';
		
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function compereanameid($prod_cat) {
      // Create query
     // $query = 'SELECT companycode FROM target  where code = "'.$prod_cat.'"  ';
	  
	  
	
	   
	      $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code) where t.code ="'.$prod_cat.'"';
		
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function semnamename($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM semesters  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
			   // Get Posts
    public function getproducation($prod_cat) {
      // Create query
      $query = 'SELECT duration FROM semesters  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    
			   // Get Posts
    public function iccnamedes($prod_cat) {
      // Create query
      $query = 'SELECT description FROM iccs  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    		   // Get Posts
    public function iccname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM iccs  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
	
	  		   // Get Posts
    public function getgarduatio() {
      // Create query
     // $query = 'SELECT id,name,graduationcode FROM graduation  where graduationcode = "'.$prod_cat.'"  ORDER BY graduationcode DESC';
	  
	  $query = 'SELECT id,name,graduationcode FROM graduation  ORDER BY graduationcode ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
		  		   // Get Posts
    public function getgarduationnew($prod_cat) {
      // Create query
      $query = 'SELECT id,name,graduationcode FROM graduation  where graduationcode = "'.$prod_cat.'"  ORDER BY graduationcode DESC';
	  
	  //$query = 'SELECT id,name,graduationcode FROM graduation  ORDER BY graduationcode ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    		   // Get Posts
    public function depname($prod_cat) {
      // Create query
      $query = 'SELECT id,name FROM deps  where code = "'.$prod_cat.'"  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	 public function comapnysearch($prod_cat){
      // Create query
      $query = 'SELECT id,code,name,description FROM company ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    public function examsearchrelated($prod_cat){
      // Create query
     // $query = 'SELECT code,name,description FROM company where industry_id ="'.$prod_cat.'" ORDER BY id DESC';
      $query = 'SELECT position,code,name,description FROM exam where company_id ="'.$prod_cat.'" ORDER BY id DESC';
      
      
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    	 public function comapnysearchrelated($prod_cat){
      // Create query
      $query = 'SELECT code,name,description FROM company where industry_id ="'.$prod_cat.'" ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    
    	 public function examsearchrelatedschdules($prod_cat){
      // Create query
      $query = 'SELECT id,date,location,eligibility,Selectionstages  FROM examschedule where exam_id ="'.$prod_cat.'" ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
     public function examsearchrelatedschdulescomps($prod_cat){
      // Create query
      $query = 'SELECT id,topic_code,lesson_code,level_code,score  FROM examcomps where examschedule_id ="'.$prod_cat.'" ORDER BY id DESC';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
	
		public function getcourseid($id)
		{
			include "../config/myconfig.php";
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/getcourseid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['courseid'];
		//var_dump( $topiccodes);
		//exit;
		}
	
	
    
	
	public function gettopicname($id)
		{
			include "../config/myconfig.php";
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/topicname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
    	public function gettopic($id)
		{
			include "../config/myconfig.php";
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/topic.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['code'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 
 public function getlevel($id)
		{
			include "../config/myconfig.php";
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents($config['MyConf']['mainurl'].'cmd/levelname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
	//	var_dump( $topiccodes);
	//exit;
		}
		
	/*	public function getlesson($id)
		{
			 $row = array('id' => $id);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n".
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://napi.odinlearning.in/cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		
		}*/
    
    
	 public function industrysearch($prod_cat){
      // Create query
      $query = 'SELECT id,code,name,description FROM industry  ORDER BY id DESC';
    //  echo  $query;
     // exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	public function examsearch($prod_cat){
      // Create query
     // $query = 'SELECT * FROM target where (name LIKE "%'.$prod_cat.'%" or code LIKE "%'.$prod_cat.'%") ORDER BY id DESC';
     // echo  $query;
    //  exit;
	
	 $query = 'SELECT t.id as tid,t.code as tcode ,t.name as tname,t.cutoff as tcutoff,t.minage  as tminage,t.maxage as tmaxage,trim(t.companycode) as tcompanycode, trim(c.name) as compname, c.code as ccode FROM target t LEFT JOIN company c ON trim(t.companycode) = trim(c.code)';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                                    FROM ' . $this->table . ' p
                                    LEFT JOIN
                                      categories c ON p.category_id = c.id
                                    WHERE
                                      p.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->title = $row['title'];
          $this->body = $row['body'];
          $this->author = $row['author'];
          $this->category_id = $row['category_id'];
          $this->category_name = $row['category_name'];
    }
	
	
	public function getcompanyname($companycode) {
	
	  // Create query
      $query = 'SELECT name from company where code ="'.trim($companycode).'"';
     // echo  $query;
    //  exit;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();
	  
	  
	  

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  //  extract($row);

         
         return $row['name'];
		  // return $stmt;
	}

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET title = :title, body = :body, author = :author, category_id = :category_id
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->title = htmlspecialchars(strip_tags($this->title));
          $this->body = htmlspecialchars(strip_tags($this->body));
          $this->author = htmlspecialchars(strip_tags($this->author));
          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':title', $this->title);
          $stmt->bindParam(':body', $this->body);
          $stmt->bindParam(':author', $this->author);
          $stmt->bindParam(':category_id', $this->category_id);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
	
	public  function require_auth() {

	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	$this->has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
	$this->is_not_authenticated = (
		!$this->has_supplied_credentials ||
		$_SERVER['PHP_AUTH_USER'] != $this->AUTH_USER ||
		$_SERVER['PHP_AUTH_PW']   != $this->AUTH_PASS
	);
	if ($this->is_not_authenticated) {
		header('WWW-Authenticate: Basic realm="Access denied"');
		header('HTTP/1.1 401 Authorization Required');
		
		  return false;
	}
	
    return true;

		
}
    
  }