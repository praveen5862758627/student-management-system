<?php
namespace App\View\Helper;
 
 
use Cake\View\Helper;
use Cake\ORM\TableRegistry;
 
class CustomHelper extends Helper {
 

  //private $mainurl = 'https://api.loc/';
  private $mainurl = 'https://api.odinlearning.in/';
  
  
  
 
 //h($this->Custom->compereaname($target['comparea_id']))

		
		public function gettopic($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/topic.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['code'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		public function compereaname($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/compreaname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		
		public function getmoodlequizid($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/quizmoodleid.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['mcode'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		public function getcoursename($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/getcoursename.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 
  
 
 
 		
			
		
		public function getexamname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getexamnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
		
		public function getsemname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getsamenames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
      	public function getdepname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/getdepnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
		
			public function geticcname($id)
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
        $result1 = file_get_contents($this -> mainurl.'ims/geticcnames.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
 
 
 public function getlevel($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/levelname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
	//	var_dump( $topiccodes);
	//exit;
		}
		
		public function getlesson($id)
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
        $result1 = file_get_contents($this -> mainurl.'cmd/lessonname.php', false, $context1);
        $topiccodes = json_decode($result1, true);
		return $topiccodes[0]['name'];
		//var_dump( $topiccodes);
		//exit;
		}
     
    public function yourhelperfunction($a)
    {    
    //$mytarget = TableRegistry::get('exam')->find('all')
                //->where(['exam.id' => $a]);
                
				$users = TableRegistry::get('exam');
$name = $users->get($a)->name;
		
		return $name;
    }
	
	public function limit_words ($string, $length) {
       $string = strip_tags($string);
if (strlen($string) > $length) {

    // truncate string
    $stringCut = substr($string, 0, $length);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';
}
return $string;
    }

}
?>