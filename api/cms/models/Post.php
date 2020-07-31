<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'topic';
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
    public function read() {
      // Create query
      $query = 'SELECT id,code,name FROM ' . $this->table . '   ORDER BY name asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	 public function getlessonscompletionstatus($courseid,$csrftokn){
		 
		 
		  $row = array('id' => $courseid);
$data = json_encode($row);
 $options1 = array(
        'http' => array(
        'header' => "Authorization:Bearer ". $csrftokn."=\r\n".
		
            "Content-Type: application/json\r\n",
        'method'  => 'POST',
		  'content' => $data,
        ));
		
		
		 $context1  = stream_context_create($options1);
        $result1 = file_get_contents('https://testsms.odinlearning.in/scorecard/getmoodlecomplestatus', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0];
		//var_dump( $topiccodes);
		//exit;
		}
		 
	
		   // Get Posts
    public function getcomprealistforst($prod_cat) {
      // Create query
      $query = 'SELECT studyduration,courseid,name FROM baseline  where comparea_id = '.$prod_cat.'  ORDER BY comparea_id asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
		   // Get Posts
    public function getlessons($prod_cat) {
      // Create query
      $query = 'SELECT studyduration,courseid,name FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY topic_id asc';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	  public function examcomps($prod_cat) {
      // Create query
      $query = 'SELECT * FROM topic  where comparea_id = '.$prod_cat.'  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	  public function compereanameidleesson($prod_cat) {
      // Create query
      $query = 'SELECT id FROM lesson  where topic_id = '.$prod_cat.'  ';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	   // Get Posts
    public function lesson($prod_cat) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
     public function lessonscore($prod_cat) {
       
//echo $prod_cat;
//$result = "'" . implode ( "', '", $prod_cat ) . "'";

$result_string = "'" . str_replace(",", "','", $prod_cat) . "'";

//echo "Output String: ".$result_string;
	     

    
      $query = 'SELECT studyduration,id,courseid,topic_id from lesson WHERE topic_id IN ('.$result_string.')';
    //  echo $query;
   //   exit;
      
   
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;
     }
     
     
     
      public function lesson100($prod_cat) {
          
          $result_string = "'" . str_replace(",", "','", $prod_cat) . "'";
          
             $query = 'SELECT studyduration,courseid,name FROM example  where lesson_id IN ('.$result_string.')';
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
      }
    
    
    
    	   // Get Posts
    public function lesson1($prod_cat) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
      
      
         $query = 'SELECT studyduration,courseid,name FROM example  where lesson_id = '.$lessionid.'  ORDER BY id DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
	
	
	
	    public function lesson23($lecode,$lcode) {
    
      
      
         $query = 'SELECT studyduration,courseid,name,mcode FROM quiz  where lesson_id = '.$lcode.'  ORDER BY level_id asc limit '.$lecode;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
     	   // Get Posts
    public function lesson2($prod_cat,$limitre) {
      // Create query
      $query = 'SELECT id,code FROM lesson  where topic_id = '.$prod_cat.'  ORDER BY code DESC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
      $lessionid =  $row['id'];
      
      
         $query = 'SELECT studyduration,courseid,name,mcode FROM quiz  where lesson_id = '.$lessionid.'  ORDER BY level_id asc limit '.$limitre;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
          
    }
    
     
	
	public function alltopic(){
	
	 // Create query
      $query = 'SELECT * FROM topic';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
	
		public function alltopiccount(){
	
	 // Create query
      $query = 'SELECT id FROM topic';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
	
	}
	
	   // Get Posts
    public function topicname($prod_cat) {
      // Create query
      $query = 'SELECT code FROM topic  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	   // Get Posts
    public function topicname1($prod_cat) {
      // Create query
      $query = 'SELECT name FROM topic  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function getcourseids($prod_cat) {
      // Create query
      $query = 'SELECT courseid FROM lesson  where topic_id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    
	   // Get Posts
    public function getropicidforstudent($prod_cat) {
      // Create query
      $query = 'SELECT id FROM topic  where comparea_id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	  public function getlesson($id)
		{
			
			//echo $id;
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
        $result1 = file_get_contents('https://testapi.odinlearning.in/cmd/quizname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
	return $topiccodes[0]['level_id'];
		/*var_dump( $topiccodes);
		exit;*/
		}
	
    	   // Get Posts
    public function compereaname($prod_cat, $useridmoodle, $courseid) {
      // Create query
      $query = "SELECT  ROUND(gg.finalgrade,2) AS Grade FROM mdl_course AS c JOIN mdl_context AS ctx ON c.id = ctx.instanceid JOIN mdl_role_assignments AS ra ON ra.contextid = ctx.id JOIN mdl_user AS u ON u.id = ra.userid JOIN mdl_grade_grades AS gg ON gg.userid = u.id JOIN mdl_grade_items AS gi ON gi.id = gg.itemid JOIN mdl_course_categories AS cc ON cc.id = c.category JOIN mdl_course_categories AS dd ON cc.parent = dd.id WHERE gi.courseid = c.id AND gi.itemtype = 'course' AND u.id=".$useridmoodle." AND dd.description='".$prod_cat."' and c.id='".$courseid."' ORDER BY lastname,category";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	 	   // Get Posts
    public function compereanamefinal($useridmoodle) {
      // Create query
      $query = "SELECT count(*) as total , sum( ROUND(gg.finalgrade,2))/count(*) as sumf FROM mdl_course AS c JOIN mdl_context AS ctx ON c.id = ctx.instanceid JOIN mdl_role_assignments AS ra ON ra.contextid = ctx.id JOIN mdl_user AS u ON u.id = ra.userid JOIN mdl_grade_grades AS gg ON gg.userid = u.id JOIN mdl_grade_items AS gi ON gi.id = gg.itemid JOIN mdl_course_categories AS cc ON cc.id = c.category JOIN mdl_course_categories AS dd ON cc.parent = dd.id WHERE gi.courseid = c.id AND gi.itemtype = 'course' AND u.id=".$useridmoodle." ORDER BY lastname,category";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	 	   // Get Posts
    public function getfinalgrade($useridmoodle) {
      // Create query
    
	  
	$query = "SELECT c.fullname AS 'Course', dd.name AS 'Competency',cc.name AS 'Category',c.id as courseid,dd.description as 'Compid' , CASE WHEN gi.itemtype = 'course' THEN CONCAT(c.fullname, ' - Total') ELSE gi.itemname END AS 'Item Name', ROUND(gg.finalgrade,2) AS Grade, ADDTIME(FROM_UNIXTIME(gg.timemodified),'5:30') AS TIME FROM mdl_course AS c JOIN mdl_context AS ctx ON c.id = ctx.instanceid JOIN mdl_role_assignments AS ra ON ra.contextid = ctx.id JOIN mdl_user AS u ON u.id = ra.userid JOIN mdl_grade_grades AS gg ON gg.userid = u.id JOIN mdl_grade_items AS gi ON gi.id = gg.itemid JOIN mdl_course_categories AS cc ON cc.id = c.category JOIN mdl_course_categories AS dd ON cc.parent = dd.id WHERE gi.courseid = c.id AND gi.itemtype = 'course' AND u.id=".$useridmoodle." ORDER BY lastname,category";

      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	   	   // Get Posts
    public function compereanamelist($prod_cat) {
		
		
		
		 $query = 'SELECT comparea_id FROM topic  where id IN (' . $prod_cat . ')';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
     // $row = $stmt->fetch(PDO::FETCH_ASSOC);
	  
	   $examcode = "";
	  while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            extract($row);
			
			$examcode .= $comparea_id . ',';
			
	  }
	  
	 

          // Set properties
      $lessionid =   rtrim($examcode, ',');
      
      
    
		
		
      // Create query
      $query = 'SELECT * FROM comparea WHERE id IN (' . $lessionid . ')';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	   public function compereanameid($prod_cat) {
      // Create query
      $query = 'SELECT id FROM comparea  where code = "'.$prod_cat.'"';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
    
    	   // Get Posts
    public function compereanamereturn($prod_cat) {
      // Create query
      $query = 'SELECT name FROM comparea  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      //return $stmt;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          return $row['name'];
    }
    
    
    
      	   // Get Posts
    public function quizid($prod_cat) {
      // Create query
     $query = 'SELECT mcode FROM quiz  where courseid = '.$prod_cat.'';
      
      /*  $query = 'SELECT mcode
    FROM quiz q
INNER JOIN example e
    on q.lesson_id = e.lesson_id WHERE where (q.courseid = '.$prod_cat.' or e.courseid = '.$prod_cat.')';*/
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
       	   // Get Posts
    public function quizidexampale($prod_cat) {
      // Create query
     $query = 'SELECT mcode FROM example  where courseid = '.$prod_cat.'';
      
      /*  $query = 'SELECT mcode
    FROM quiz q
INNER JOIN example e
    on q.lesson_id = e.lesson_id WHERE where (q.courseid = '.$prod_cat.' or e.courseid = '.$prod_cat.')';*/
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
        	   // Get Posts
    public function getcoursenamestudyhours($prod_cat ,$table) {
    
      
      
            $query = 'SELECT studyduration FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
	
	    	   // Get Posts
    public function getcoursenameforlesson($prod_cat ,$table) {
    
      
      
            $query = 'SELECT id as lid FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
       	   // Get Posts
    public function getcoursename($prod_cat ,$table) {
    
      
      
            $query = 'SELECT name FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	public function getcoursenameq($prod_cat ,$table) {
    
      
      
            $query = 'SELECT lesson_id as lid FROM '.$table.'  WHERE courseid = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
    
    
          	   // Get Posts
    public function getmatchid($prod_cat ,$table ,$field) {
    
      
      
           $query = 'SELECT '.$field.'
FROM '.$table.'  WHERE courseid = '.$prod_cat.'';


      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
    
    
    
	
		   // Get Posts
    public function lessonname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM lesson  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	 public function levelname($prod_cat) {
      // Create query
      $query = 'SELECT name FROM level  where id = '.$prod_cat.'';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
	
	
	
	   // Get Posts
    public function level($prod_cat) {
      // Create query
      $query = 'SELECT level_id FROM quiz where lesson_id = '.$prod_cat.'  ORDER BY id DESC';
      
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