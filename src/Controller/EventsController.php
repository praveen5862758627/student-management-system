<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Filesystem\Folder;
use Cake\Cache\Cache;
use Cake\Http\Client;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Excelreader\PhpExcelReader;
use Cake\Core\Configure;

Configure::load('myconfig');

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 *
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController {

  /*  private $mainurl = 'https://napi.odinlearning.in/';
    private $weburlmainsite = 'https://nsms.odinlearning.in/';
    public $weburlformoodle = 'https://ncms.odinlearning.in/';*/

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $events = $this->paginate($this->Events->find('all')->where(['Events.userid' => 0]));



        $this->set(compact('events'));
    }

    public function updateevents() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            if ($_POST['start'] == $_POST['end']) {

                $minutes_to_add = $_POST['durationprofile'];

                $end = str_replace('IST', 'T', date("Y-m-dTH:i:s", strtotime("+" . $minutes_to_add . " minutes", strtotime($_POST['end']))));

                $start = $_POST['start'];
            } else {
                $start = $_POST['start'];
                $end = $_POST['end'];
            }



            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => $start, 'end' => str_replace('IST', 'T', $end)])
                    ->where(['id' => $_POST['id']])
                    ->execute();

            if ($query) {
                echo 'Event modified successfully.';
            } else {
                echo 'Could not be modified. Please, try again.';
            }
        }
    }

    public function getallusereventsforadmin() {
        $this->autoRender = false;
        $this->loadModel('Institutecalendar');
		 $this->loadModel('Users');
		 
		 	 $getparam = $this->request->pass[0];
			 $getparamval = $this->request->pass[1];
		
		$compereanameslistprofile = new UsersController();
   
		
		 if ($this->request->getSession()->read('sessionname2') == 3) {
			    $this->loadModel('Users');
		$conn = ConnectionManager::get('default');
			 $getgroup = $this->Users->find('all', ['conditions' => ['Users.id' => $this->request->getSession()->read('sessionname')]])->first();
  $listiofgroups = $getgroup->groupid;
  
  if($getparam == 'all')
  {
	  $querytcomps = 'SELECT * from institutecalendar';
  }
  else if($getparamval == 'group')
  {
	  $querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$getparam.')';
  }
    else if($getparamval == 'topic')
  {
	  $querytcomps = 'SELECT * from institutecalendar where code  = "'.$getparam.'"';
  }
    else if($getparamval == 'types')
  {
	  $querytcomps = 'SELECT * from institutecalendar where ttype  = "'.$getparam.'"';
  }
  
/*  $studentgroups1 = $conn->execute($studentgroupss);
  $Events = $studentgroups1->fetchAll(\PDO::FETCH_ASSOC);*/
  
  
        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
			
			if( $ttype == 'ONLINECLASS' || $ttype == 'EE' || $ttype == 'Seminar' || $ttype == 'Webinar' || $ttype == 'Recordings' || $ttype == 'Assignment' || 
 $ttype == 'Internals' || $ttype == 'MidtermExamination' || $ttype == 'SemesterExamination'
 || $ttype == 'CampusPlacement' || $ttype == 'OffCampusPlacement' || $ttype == 'ProjectDiscussion' ) {
			
			$paymentDate = strtotime(date("Y-m-d H:i:s"));
			$contractDateBegin = strtotime($start);
$contractDateEnd = strtotime($end);

if ($paymentDate < $contractDateEnd ) {
     $colornew = $color;
	   $joinurlnew = $joinurl;
} else {
   $colornew ='#899194';
   $joinurlnew = "#";
}
			}
			else 
			{
				   $colornew = $color;
	   $joinurlnew = $joinurl;
			}
			
			if( $ttype == 'SEM')
			{
			

			
			$post_item1 = array(
                'id' => html_entity_decode($id),
                'title' => html_entity_decode($title),
                'code' => html_entity_decode($code),
                'color' => html_entity_decode($colornew),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
				
                //'endRecur' => html_entity_decode($endRecur),
                'ttype' => html_entity_decode($ttype),
                'gname' => html_entity_decode($compereanameslistprofile->getgroupname($studentgroup_id).''.$compereanameslistprofile->getteachername($studentgroup_id)),
				 'description' => html_entity_decode($description),
                'meetingid' => html_entity_decode($meetingid),
                'joinurl' => html_entity_decode($joinurlnew),
				'dow' => html_entity_decode($dow),
				//'ranges' => html_entity_decode($ranges)
							'ranges' => array(
    0 => array(
        'start' => $startdate,
        'end' => $enddate,
    )
)
            );
			}
			else{
					$post_item1 = array(
                'id' => html_entity_decode($id),
                'title' => html_entity_decode($title),
                'code' => html_entity_decode($code),
                'color' => html_entity_decode($colornew),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
                'ttype' => html_entity_decode($ttype),
                'gname' => html_entity_decode($compereanameslistprofile->getgroupname($studentgroup_id).''.$compereanameslistprofile->getteachername($studentgroup_id)),
				 'description' => html_entity_decode($description),
                'meetingid' => html_entity_decode($meetingid),
                'joinurl' => html_entity_decode($joinurlnew)
				//'dow' => html_entity_decode($dow)
            );
				
			}
            


            array_push($posts_arr1, $post_item1);
        }

        $Events = $posts_arr1;
		 }
		 else  if ($this->request->getSession()->read('sessionname2') == 4) {
			 $this->loadModel('Users');
		$conn = ConnectionManager::get('default');
			 $getgroup = $this->Users->find('all', ['conditions' => ['Users.id' => $this->request->getSession()->read('sessionname')]])->first();
  $listiofgroups = $getgroup->groupid;
  //$querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$listiofgroups.',0)';
/*  $studentgroups1 = $conn->execute($studentgroupss);
  $Events = $studentgroups1->fetchAll(\PDO::FETCH_ASSOC);*/
  
    if($getparam == 'all')
  {
	  $querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$listiofgroups.',0)';
  }
  else if($getparamval == 'group')
  {
	  $querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$listiofgroups.')';
  }
    else if($getparamval == 'topic')
  {
	  $querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$listiofgroups.',0) and code  = "'.$getparam.'"';
  }
    else if($getparamval == 'types')
  {
	  $querytcomps = 'SELECT * from institutecalendar where studentgroup_id in ('.$listiofgroups.',0) and ttype  = "'.$getparam.'"';
  }
  
  
        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

			//if( $ttype == 'ONLINECLASS' || $ttype == 'EE' ) {
				
					if( $ttype == 'ONLINECLASS' || $ttype == 'EE' || $ttype == 'Seminar' || $ttype == 'Webinar' || $ttype == 'Recordings' || $ttype == 'Assignment' || 
 $ttype == 'Internals' || $ttype == 'MidtermExamination' || $ttype == 'SemesterExamination'
 || $ttype == 'CampusPlacement' || $ttype == 'OffCampusPlacement' || $ttype == 'ProjectDiscussion' ) {
			
			$paymentDate = strtotime(date("Y-m-d H:i:s"));
			$contractDateBegin = strtotime($start);
$contractDateEnd = strtotime($end);

if ($paymentDate < $contractDateEnd ) {
     $colornew = $color;
	   $joinurlnew = $joinurl;
} else {
   $colornew ='#899194';
   $joinurlnew = "#";
}
			}
			else 
			{
				   $colornew = $color;
	   $joinurlnew = $joinurl;
			}
			
					if( $ttype == 'SEM')
			{
			

			
			$post_item1 = array(
                'id' => html_entity_decode($id),
                'title' => html_entity_decode($title),
                'code' => html_entity_decode($code),
                'color' => html_entity_decode($colornew),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
				
                //'endRecur' => html_entity_decode($endRecur),
                'ttype' => html_entity_decode($ttype),
                'gname' => html_entity_decode($compereanameslistprofile->getgroupname($studentgroup_id)),
				 'description' => html_entity_decode($description),
                'meetingid' => html_entity_decode($meetingid),
                'joinurl' => html_entity_decode($joinurlnew),
				'dow' => html_entity_decode($dow),
				//'ranges' => html_entity_decode($ranges)
							'ranges' => array(
    0 => array(
        'start' => $startdate,
        'end' => $enddate,
    )
)
            );
			} else {
            $post_item1 = array(
                'id' => html_entity_decode($id),
                'title' => html_entity_decode($title),
                'code' => html_entity_decode($code),
                'color' => html_entity_decode($colornew),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
                'ttype' => html_entity_decode($ttype),
                'gname' => html_entity_decode($compereanameslistprofile->getgroupname($studentgroup_id)),
				 'description' => html_entity_decode($description),
                'meetingid' => html_entity_decode($meetingid),
                'joinurl' => html_entity_decode($joinurlnew)
            );
			}

            array_push($posts_arr1, $post_item1);
        }

        $Events = $posts_arr1;
  
  
  
			 
		 }
		
			  
		
		
     
        echo json_encode($Events);
    }

    public function updateeventsforadmin() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {

            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => $_POST['start'], 'end' => $_POST['end']])
                    ->where(['code' => $_POST['code']])
                    ->execute();


            $this->loadModel('Institutecalendar');
            $optionalblockTable = TableRegistry::get('Institutecalendar');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => $_POST['start'], 'end' => $_POST['end']])
                    ->where(['code' => $_POST['code']])
                    ->execute();

            if ($query) {
                echo 'Event modified successfully.';
            } else {
                echo 'Could not be modified. Please, try again.';
            }
        }
    }

    public function eventsicc() {

        $this->autoRender = false;



        if ($this->request->is('post')) {
            //  $this->loadModel('Events');

            $optionalblockTable = TableRegistry::get('events');

            $blockt = $optionalblockTable->newEntity();

            $targetexams = $_POST['title'];
            $examdatedate = $_POST['start'];




            $blockt->userid = $this->request->getSession()->read('sessionname');
            $blockt->title = $targetexams;
            $blockt->courseid = 0;
            $blockt->start = $examdatedate . 'T09:00:00';
            $blockt->end = $examdatedate . 'T13:00:00';
            $blockt->color = $_POST['color'];
            $blockt->code = $_POST['code'];
            $blockt->type = $_POST['type'];
            $blockt->description = $_POST['description'];


            $conditions = ['code' => $_POST['code'], 'userid' => $this->request->getSession()->read('sessionname')];
            $exists = $optionalblockTable->exists($conditions);

            //->set(['url' => 'cms/displayevents/'.$blockt->id])



            if ($exists) {

                // $this->Users->updateAll(['password' => $fpass], ['id' => $useridrow]);

                $optionalblockTable = TableRegistry::get('events');
                $query = $optionalblockTable->query();
                $query->update()
                        ->set(['title' => $targetexams, 'description' => $_POST['description'], 'start' => $examdatedate . 'T09:00:00', 'end' => $examdatedate . 'T13:00:00', 'color' => $_POST['color']])
                        ->where(['code' => $_POST['code'], 'userid' => $this->request->getSession()->read('sessionname')])
                        ->execute();

                $this->Flash->success(__('Event updated successfully.'));
            } else {

                if ($optionalblockTable->save($blockt)) {

                    $optionalblockTable = TableRegistry::get('events');
                    $query = $optionalblockTable->query();
                    $query->update()
                            ->set(['url' => 'cms/displayevents/' . $blockt->id])
                            ->where(['id' => $blockt->id])
                            ->execute();


                    $this->Flash->success(__('Event added successfully.'));
                } else {
                    $this->Flash->error(__('Could not be executed. Please, try again.'));
                }
            }


            $this->redirect(array(
                'controller' => 'users',
                'action' => 'index'
            ));
        }
    }

    public function getallusereventsfilter() {
        $this->autoRender = false;

        $getparam = $this->request->pass[0];
        //$Events = $this->Events->find('all')->where(['Events.userid' => $this->request->getSession()->read('sessionname')]);
        // $Events = $this->Events->find('all')->where(['Events.userid' => 29]);
        $conn = ConnectionManager::get('default');
		
				 $this->loadModel('Users');
	
			 $getgroup = $this->Users->find('all', ['conditions' => ['Users.id' => $this->request->getSession()->read('sessionname')]])->first();
  $listiofgroups = $getgroup->groupid;

        $querytcomps = 'SELECT * FROM events where   (type = "'.$getparam.'" AND courseid in ('.$listiofgroups.')  )   order by id asc';



        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
			
						if( $type == 'OC' ||  $type == 'EE') {
			
			$paymentDate = strtotime(date("Y-m-d H:i:s"));
			$contractDateBegin = strtotime($start);
$contractDateEnd = strtotime($end);

if ($paymentDate < $contractDateEnd ) {
     $colornew = $color;
	   $joinurlnew = $url;
} else {
   $colornew ='#899194';
   $joinurlnew = "#";
}
			}
			else 
			{
				   $colornew = $color;
	   $joinurlnew = $url;
			}
			
            $post_item1 = array(
                'id' => html_entity_decode($id),
                'userid' => html_entity_decode($userid),
                'color' => html_entity_decode($colornew),
                'title' => html_entity_decode($title),
                'courseid' => html_entity_decode($courseid),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
                'url' => html_entity_decode($joinurlnew),
                'type' => html_entity_decode($type),
                'completionflag' => html_entity_decode($completionflag),
				'description' => html_entity_decode($description)
            );


            array_push($posts_arr1, $post_item1);
        }

        $Events = $posts_arr1;


        echo json_encode($Events);
    }

    public function getalluserevents() {
        $this->autoRender = false;
        //$Events = $this->Events->find('all')->where(['Events.userid' => $this->request->getSession()->read('sessionname')]);
        // $Events = $this->Events->find('all')->where(['Events.userid' => 29]);
        $conn = ConnectionManager::get('default');
		
		          $getparam = $this->request->pass[0];

          $getparamtypes = $this->request->pass[1];

		
			 $this->loadModel('Users');
	
			 $getgroup = $this->Users->find('all', ['conditions' => ['Users.id' => $this->request->getSession()->read('sessionname')]])->first();
  $listiofgroups = $getgroup->groupid;
  
    if($getparam == 'all')
  {
	  $querytcomps = 'SELECT * FROM events where ( userid = ' . $this->request->getSession()->read('sessionname') . ') OR (type = "Seminar" AND courseid in ('.$listiofgroups.')  ) OR (type = "Webinar" AND courseid in ('.$listiofgroups.')  ) OR (type = "Recordings" AND courseid in ('.$listiofgroups.')  )
OR (type = "Assignment" AND courseid in ('.$listiofgroups.')  ) OR (type = "Internals" AND courseid in ('.$listiofgroups.')  ) OR (type = "MidtermExamination" AND courseid in ('.$listiofgroups.')  )
OR (type = "SemesterExamination" AND courseid in ('.$listiofgroups.')  ) OR (type = "CampusPlacement" AND courseid in ('.$listiofgroups.')  ) OR (type = "OffCampusPlacement" AND courseid in ('.$listiofgroups.')  )
OR (type = "ProjectDiscussion" AND courseid in ('.$listiofgroups.')  ) OR (type = "OC" AND courseid in ('.$listiofgroups.')  ) OR (type = "SEM" AND courseid in ('.$listiofgroups.')  )  OR (type ="EE") order by id asc';

  }
  else if($getparamtypes == 'group')
  {
	  	  $querytcomps = 'SELECT * FROM events where ( userid = 0) AND  (courseid in ('.$getparam.')  ) order by id asc';

  }
    else if($getparamtypes == 'topic')
  {
	 $querytcomps = 'SELECT * FROM events where ( userid = 0) AND  (code = "'.$getparam.'"  ) order by id asc';
  }
    else if($getparamtypes == 'types')
  {
	  $querytcomps = 'SELECT * FROM events where ( userid = 0) AND  (type = "'.$getparam.'"  ) order by id asc';
  }
  


       /* $querytcomps = 'SELECT * FROM events where ( userid = ' . $this->request->getSession()->read('sessionname') . ') OR (type = "Seminar" AND courseid in ('.$listiofgroups.')  ) OR (type = "Webinar" AND courseid in ('.$listiofgroups.')  ) OR (type = "Recordings" AND courseid in ('.$listiofgroups.')  )
OR (type = "Assignment" AND courseid in ('.$listiofgroups.')  ) OR (type = "Internals" AND courseid in ('.$listiofgroups.')  ) OR (type = "MidtermExamination" AND courseid in ('.$listiofgroups.')  )
OR (type = "SemesterExamination" AND courseid in ('.$listiofgroups.')  ) OR (type = "CampusPlacement" AND courseid in ('.$listiofgroups.')  ) OR (type = "OffCampusPlacement" AND courseid in ('.$listiofgroups.')  )
OR (type = "ProjectDiscussion" AND courseid in ('.$listiofgroups.')  ) OR (type = "OC" AND courseid in ('.$listiofgroups.')  ) OR (type = "SEM" AND courseid in ('.$listiofgroups.')  )  OR (type ="EE") order by id asc';
*/



        $stmt1 = $conn->execute($querytcomps);
        $posts_arr1 = array();

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);
			
					//	if( $type == 'OC' ||  $type == 'EE') {
							
								if( $type == 'OC' || $type == 'EE' || $type == 'Seminar' || $type == 'Webinar' || $type == 'Recordings' || $type == 'Assignment' || 
 $type == 'Internals' || $type == 'MidtermExamination' || $type == 'SemesterExamination'
 || $type == 'CampusPlacement' || $type == 'OffCampusPlacement' || $type == 'ProjectDiscussion' ) {
			
			$paymentDate = strtotime(date("Y-m-d H:i:s"));
			$contractDateBegin = strtotime($start);
$contractDateEnd = strtotime($end);

if ($paymentDate < $contractDateEnd ) {
     $colornew = $color;
	   $joinurlnew = $url;
} else {
   $colornew ='#899194';
   $joinurlnew = "#";
}
			}
			else 
			{
				   $colornew = $color;
	   $joinurlnew = $url;
			}
			if( $type == 'SEM')
			{
				  $post_item1 = array(
                'id' => html_entity_decode($id),
                'userid' => html_entity_decode($userid),
                'color' => html_entity_decode($colornew),
				'code' => html_entity_decode($code),
                'title' => html_entity_decode($title),
                'courseid' => html_entity_decode($courseid),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
                'url' => html_entity_decode($joinurlnew),
				 'description' => html_entity_decode($description),
                'type' => html_entity_decode($type),
                'durationprofile' => html_entity_decode($durationprofile),
                'completionflag' => html_entity_decode($completionflag),
				'dow' => html_entity_decode($dow),
				//'ranges' => html_entity_decode($ranges)
							'ranges' => array(
    0 => array(
        'start' => $startdate,
        'end' => $enddate,
    )
)
            );
			}
			else{
            $post_item1 = array(
                'id' => html_entity_decode($id),
                'userid' => html_entity_decode($userid),
                'color' => html_entity_decode($colornew),
                'title' => html_entity_decode($title),
                'courseid' => html_entity_decode($courseid),
                'start' => html_entity_decode($start),
                'end' => html_entity_decode($end),
                'url' => html_entity_decode($joinurlnew),
				'code' => html_entity_decode($code),
				 'description' => html_entity_decode($description),
                'type' => html_entity_decode($type),
                'durationprofile' => html_entity_decode($durationprofile),
                'completionflag' => html_entity_decode($completionflag)
            );

			}
            array_push($posts_arr1, $post_item1);
        }

        $Events = $posts_arr1;


        echo json_encode($Events);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);

        $this->set('event', $event);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $this->set(compact('event'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $event = $this->Events->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $this->set(compact('event'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function hoursToMinutes($hours) {
        if (strstr($hours, ':')) {
            # Split hours and minutes.
            $separatedData = split(':', $hours);

            $minutesInHours = $separatedData[0] * 60;
            $minutesInDecimals = $separatedData[1];

            $totalMinutes = $minutesInHours + $minutesInDecimals;
        } else {
            $totalMinutes = $hours * 60;
        }

        return $totalMinutes;
    }

    public function synctocalendar() {
        $this->autoRender = false;
        $id = $this->request->pass[0];

        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $id])
                ->execute();

        $lessyn = $this->syncforlesson($id);

        //$quizsyn = $this->syncforquizforpracticequiz($id);
        //$examplesyn = $this->syncforexample();

        $this->updatedateforcalendar($id);
    }

    public function syncforlesson($id) {

        $getcurrentdate = date('Y-m-d');


        //$getcurrentdate = date( 'Y-m-d', strtotime( $date . ' -0 day' ) );



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets($id);


        $myArray = explode(',', $Targetusers);

        /* $querytcomps = 'SELECT max(tc.level) as lecode,
          tc.topiccode as tcode
          , tc.lesson as lcode

          , tc.score as escore
          FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.id ,tc.level asc'; */

        $querytcomps = 'SELECT tc.level as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.id asc ';


        /* echo $querytcomps;
          exit; */




        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;

        $currentday = strtolower(date('l'));
        /* $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));
          $gettotalminutes = 0;
          $totalstudentmin = 0;
          $i= 1;
          $t= 1; */

        $s = 0;
        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            //$lecode;


            $row = array('topiccode' => $tcode);
            $data = json_encode($row);
            $options1 = array(
                'http' => array(
                    'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                    "Content-Type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
            ));

            /* 	var_dump($options1);
              exit; */
            $context1 = stream_context_create($options1);
            $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getlessoncalendar.php', false, $context1);
            $topiccodes = json_decode($result1, true);

            //$i= $k ;





            foreach ($topiccodes as $calendarva) {
                $courseid = $calendarva['courseid'];
                $coursename = $calendarva['name'];
                $studyduration = $calendarva['studyduration'];
				$code = $calendarva['code'];

                $scorecard = $this->Events->newEntity();

                //$totalstudentmin += $studyduration;


                $scorecard->title = $coursename;
                $scorecard->courseid = $courseid;

                /* $numloop = round($totalhourdaywise / $studyduration) ;

                  if($i <= $numloop ){

                  $finaldate = date('Y-m-d', strtotime($getcurrentdate1 . ' +0 day'));
                  $scorecard->start = $finaldate ;
                  }
                  else {

                  $finaldate = date('Y-m-d', strtotime($getcurrentdate1 . ' +'.$t.' day'));
                  $scorecard->start = $finaldate ;
                  $t++;
                  } */

                $scorecard->type = 'L';
                $scorecard->durationprofile = $studyduration;

                $scorecard->url = 'cms/displayquiz/' . $courseid;


                $scorecard->userid = $id;


                /*                 * ******************************************** */

                $scorecard->color = 'orange';
                $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                //$scorecard->completionflag = $this->getmoodlecomplestatusfinal($courseid);
                //$this->Events->save($scorecard);



                if ($this->getmoodlecomplestatusfinal($code) == 0) {

                    $scorecard->color = 'orange';
                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                    $scorecard->completionflag = '0';

                    if ($this->Events->save($scorecard)) {
                        
                    }
                } else {


                    $scorecard->color = '#899194';
                    $scorecard->completionflag = '1';
                    $scorecard->start = $this->getmoodlecomplestatusfinal1($code);
                    $scorecard->end = $this->getmoodlecomplestatusfinal1($code);


                    if ($this->Events->save($scorecard)) {
                        
                    }
                }
            }




            /*             * ************** code for practice quiz **************************** */

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getpracticequizcalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);






                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
					$code = $calendarva['code'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;




                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'PQ';
                    // $scorecard->start = $this->getdateforrowquiz($studyduration,$totmin,$j,$finaldate,$p,$z);
                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $id;

                    //if ($this->Events->save($scorecard)) {}

                    if ($this->getmoodlecomplestatusfinal($code) == 0) {

                        $scorecard->color = 'orange';
                        $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                        $scorecard->completionflag = '0';

                        if ($this->Events->save($scorecard)) {
                            
                        }
                    } else {


                        $scorecard->color = '#899194';
                        $scorecard->completionflag = '1';
                        $scorecard->start = $this->getmoodlecomplestatusfinal1($code);
                        $scorecard->end = $this->getmoodlecomplestatusfinal1($code);


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    }
                }
            }
            /*             * ********************** end of practice quiz **************************** */


            /*             * **********************code for quizes ************************************ */


            if ($lecode != 7) {

                $row = array('topiccode' => $tcode, 'levelcode' => $lecode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getquizescalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);




                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
					$code = $calendarva['code'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;




                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'Q';

                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $id;

                    if ($this->getmoodlecomplestatusfinal($code) == 0) {

                        $scorecard->color = 'orange';
                        $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                        $scorecard->completionflag = '0';

                        if ($this->Events->save($scorecard)) {
                            
                        }
                    } else {


                        $scorecard->color = '#899194';
                        $scorecard->completionflag = '1';
                        $scorecard->start = $this->getmoodlecomplestatusfinal1($code);
                        $scorecard->end = $this->getmoodlecomplestatusfinal1($code);


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    }
                }
            }


            /*             * *************************** end of quiz *********************************** */



            $s++;
        }
    }

    public function getmoodlecomplestatusfinal($courseid) {

        //$timcomp = str_replace('IST','T',date("Y-m-dTH:i:s",$timecompleted));
			 
			  $conn = ConnectionManager::get('default');
            $querytcomps = 'SELECT score_in_percentage,passingscore_in_percentage	 from studentscore WHERE userid = ' . $this->request->getSession()->read('sessionname') . ' and  code ="'.$courseid.'" order by id desc';
            $stmt1 = $conn->execute($querytcomps);


            $getpaymentdetails = $stmt1->fetchAll(\PDO::FETCH_ASSOC);
			
			if($getpaymentdetails['score_in_percentage'] >= $getpaymentdetails['passingscore_in_percentage'])
				return 1;
			else
				return 0;
    }

    public function getmoodlecomplestatusfinal1($courseid) {

       
    }

    public function getexamcompstargets($id) {
        $this->loadModel('Target');
        /* $Targetusers = $this->Target->find('all', array('fields' => array('examcode')))->where(['Target.users_id' => $this->request->getSession()->read('sessionname')]);

          $examcode ="";
          foreach($Targetusers as $tar)
          {
          $examcode .=  $tar['examcode'].',';
          }

          return rtrim($examcode,','); */



        $Targetusers = $this->Target->find('all', array('fields' => array('id')))->where(['Target.users_id' => $id]);

        if ($Targetusers->count() > 0) {


            $examcode = "";
            foreach ($Targetusers as $tar) {
                $examcode .= $tar['id'] . ',';
            }
        } else {
            $examcode = 0;
        }
        return rtrim($examcode, ',');
    }

    public function syncforquizforpracticequiz($id) {


        $getcurrentdate = date('Y-m-d');

        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets($id);


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT tc.level as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.id asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;
        //$currentday = strtolower(date('l'));
        // $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));
        $s = 0;

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getpracticequizcalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);






                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;




                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'PQ';
                    // $scorecard->start = $this->getdateforrowquiz($studyduration,$totmin,$j,$finaldate,$p,$z);
                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $id;

                    //if ($this->Events->save($scorecard)) {}

                    if ($this->getmoodlecomplestatusfinal($courseid) == 0) {

                        $scorecard->color = 'orange';
                        $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +' . $s . ' day'));
                        $scorecard->completionflag = '0';

                        if ($this->Events->save($scorecard)) {
                            
                        }
                    } else {


                        $scorecard->color = '#899194';
                        $scorecard->completionflag = '1';
                        $scorecard->start = $this->getmoodlecomplestatusfinal1($courseid);
                        $scorecard->end = $this->getmoodlecomplestatusfinal1($courseid);


                        if ($this->Events->save($scorecard)) {
                            
                        }
                    }
                }
            }

            $s++;
        }
    }

    public function syncforexample() {


        /* echo abs($returnmin);
          exit; */




        $getcurrentdate = date('Y-m-d', strtotime($date . ' -0 day'));



        $conn = ConnectionManager::get('default');

        $Targetusers = $this->getexamcompstargets();


        $myArray = explode(',', $Targetusers);

        $querytcomps = 'SELECT max(tc.level) as lecode,
     tc.topiccode as tcode
    , tc.lesson as lcode
  
	, tc.score as escore
FROM  targetcomps tc WHERE tc.target_id IN (' . $Targetusers . ') and tc.skip != 1 GROUP BY tc.topiccode order by tc.level asc';






        $stmt1 = $conn->execute($querytcomps);

        $posts_arr1 = array();
        $this->loadModel('Events');
        //  $k= 1;


        /* $gettotalminutes = 0;

          $timestamp = strtotime($getfdate);

          $day = strtolower(date('l', $timestamp));





          if ($returnmin < 0) {

          $totalhourdaywise3 = $this->hoursToMinutes($this->request->getSession()->read($day));
          $retot = $totalhourdaywise3;
          $dt = 0;

          }
          else {

          $totalhourdaywise3 = $this->hoursToMinutes($this->request->getSession()->read($day));
          $retot = $returnmin +  $totalhourdaywise3 ;
          $dt = 1;

          } */

        /* echo  $retot;
          exit; */

        $k = $getcountofles;

        while ($row1 = $stmt1->fetch(\PDO::FETCH_ASSOC)) {
            extract($row1);

            if ($lecode != 7) {

                $row = array('topiccode' => $tcode, 'levelcode' => $lecode);
                $data = json_encode($row);
                $options1 = array(
                    'http' => array(
                        'header' => "Authorization:Basic cHJhdmVlbjoxMjM0NTY=\r\n" .
                        "Content-Type: application/json\r\n",
                        'method' => 'POST',
                        'content' => $data,
                ));


                $context1 = stream_context_create($options1);
                $result1 = file_get_contents(Configure::read('MyConf.mainurl') . 'cmd/getquizescalendar.php', false, $context1);
                $topiccodes = json_decode($result1, true);




                foreach ($topiccodes as $calendarva) {
                    $courseid = $calendarva['courseid'];
                    $coursename = $calendarva['name'];
                    $studyduration = $calendarva['studyduration'];
                    $scorecard = $this->Events->newEntity();


                    $scorecard->title = $coursename;
                    $scorecard->courseid = $courseid;


                    /* $numloop = round($retot / $studyduration) ;



                      if($k <= $numloop ){


                      $finaldate2 = date('Y-m-d', strtotime($getfdate . ' +0 day'));
                      $scorecard->start = $finaldate2;
                      }
                      else {


                      $finaldate2 = date('Y-m-d', strtotime($getfdate . ' +1 day'));

                      $scorecard->start = $finaldate2;

                      } */


                    $scorecard->start = date('Y-m-d', strtotime($getcurrentdate . ' +0 day'));

                    $scorecard->durationprofile = $studyduration;
                    $scorecard->type = 'Q';

                    $scorecard->url = 'cms/displayquiz/' . $courseid;
                    $scorecard->color = 'orange';
                    $scorecard->userid = $this->request->getSession()->read('sessionname');

                    if ($this->Events->save($scorecard)) {
                        
                    }

                    $k++;
                }
            }
        }
    }

    public function updatedateforcalendar($id) {



        $optionalblockTable = TableRegistry::get('events');
        $query = $optionalblockTable->query();
        $query->delete()
                ->where(['userid' => $id, 'courseid' => 'N'])
                ->execute();


        $users = TableRegistry::get('users')->find('all')
                ->where(['users.id' => $id]);
        foreach ($users as $user) {
            $this->request->getSession()->write('sunday', $user['sunday']);
            $this->request->getSession()->write('monday', $user['monday']);
            $this->request->getSession()->write('tuesday', $user['tuesday']);
            $this->request->getSession()->write('wednesday', $user['wednesday']);
            $this->request->getSession()->write('thursday', $user['thursday']);
            $this->request->getSession()->write('friday', $user['friday']);
            $this->request->getSession()->write('saturday', $user['saturday']);
        }


        $getcurrentdate = date('Y-m-d', strtotime('+0 day'));


        $targetexams = TableRegistry::get('events')->find('all')
                ->where(['events.userid' => $id, 'events.completionflag' => 0]);

        $currentday = strtolower(date('l'));
        $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));

        $i = 0;
        $k = 0;

        $gtedat = $getcurrentdate;

        foreach ($targetexams as $tar) {




            $cdr = $tar['durationprofile'];
            $selectedOption = $tar['id'];


            /*             * ******************************* */
            /* if($this->getmoodlecomplestatusfinal($tar['courseid']) == 0) {

              $scorecardcolor = 'orange';

              $scorecardcompletionflag = '0';
              $courseid = $tar['courseid'];

              $this->Events->updateAll(['color' => $scorecardcolor , 'completionflag' => $scorecardcompletionflag], ['userid' => $id ,'courseid' => $courseid ]);


              }
              else {
              $courseid = $tar['courseid'];

              $scorecardcolor = '#899194';
              $scorecardcompletionflag = '1';
              $scorecardstart = $this->getmoodlecomplestatusfinal1($tar['courseid']);
              $scorecardend = $this->getmoodlecomplestatusfinal1($tar['courseid']);


              $this->Events->updateAll(['color' => $scorecardcolor , 'completionflag' => $scorecardcompletionflag,'start' => $scorecardstart,'end' => $scorecardend], ['userid' => $id ,'courseid' => $courseid ]);





              } */

            /*             * ******************************** */





            if (($totalhourdaywise <= 0 || $totalhourdaywise < $cdr)) {

                // echo $totalhourdaywise .'<=0 ||  '.$totalhourdaywise .'<'. $cdr .' '.$gtedat.'<br />';

                $timestamp = strtotime($gtedat);

                $day = strtolower(date('l', $timestamp));


                $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($day));

                $i++;
            }

            /*  $dayname = strtolower(date('l', strtotime($gtedat)));


              if($this->hoursToMinutes($this->request->getSession()->read($dayname)) == 0 )
              {

              $m =	$i;
              echo $m." ". $gtedat. " " .$dayname. "  comingout<br />";
              }
              else
              {
              $m =	$i;
              } */

            $gtedat = date('Y-m-d', strtotime($getcurrentdate . ' +' . $i . ' day'));
            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => date('Y-m-d', strtotime($gtedat . ' 0 day')), 'end' => date('Y-m-d', strtotime($gtedat . ' 0 day')), 'allDay' => 'true'])
                    ->where(['id' => $selectedOption], ['userid' => $id])
                    ->execute();

            $totalhourdaywise = $totalhourdaywise - $cdr;
        }

        //$this->updatedateforcalendarfinal($i,$gtedat,$id,$totalhourdaywise);


        /* $targetexams1 = TableRegistry::get('events')->find('all')
          ->where(['events.userid' => $id , 'events.completionflag' => 1]);

          foreach($targetexams1 as $tar) {

          $courseid = $tar['courseid'];

          $scorecardcolor = '#899194';
          $scorecardcompletionflag = '1';
          $scorecardstart = $this->getmoodlecomplestatusfinal1($tar['courseid']);
          $scorecardend = $this->getmoodlecomplestatusfinal1($tar['courseid']);


          $this->Events->updateAll(['color' => $scorecardcolor , 'completionflag' => $scorecardcompletionflag,'start' => $scorecardstart,'end' => $scorecardend], ['userid' => $id ,'courseid' => $courseid ]);

          } */



        $fashmtml = '<a style="text-decoration:underline;color:blue" onclick="openmodalboxtarget("Targetcomps" , "Learning Plans-Baseline");return false;">here</a>';

        $this->loadModel('Users');
        // $userid = $this->request->getSession()->read('sessionname');

        /* $useflag = $this->Users->find('all', [ 'conditions' => ['Users.id' => $id]])->first();
          $uflg =  $useflag->calendarflag;




          if($uflg == '1' ) {

          $this->Flash->success(__('Calendar updated.'));
          $this->Users->updateAll(['calendarflag' => 0], ['id' => $id]);
          }
          else {
          $this->Flash->success(__('Changes have been saved.'));
          $this->Users->updateAll(['calendarflag' => 0], ['id' => $id]);
          } */


        return $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'index'
        ));
    }

    public function findDayDiff($date) {
        $param_date = date('d-m-Y', strtotime($date));
        $response = $param_date;
        if ($param_date == date('d-m-Y', strtotime("now"))) {
            $response = 'Today';
        } else if ($param_date == date('d-m-Y', strtotime("-1 days"))) {
            $response = 'Yesterday';
        }
        return $response;
    }

    public function updatedateforcalendarfinal($i, $gtedat, $id, $totalhourdaywise) {

        $targetexams = TableRegistry::get('events')->find('all')
                ->where(['events.userid' => $id]);

        //	$i = $j;




        $j = 0;
        $totalhourdaywise = 0;

        //$gtedat = date('Y-m-d', strtotime($gtedat . ' 0 day')); 

        /* $daynameinnerloop = strtolower(date('l', strtotime($gtedat)));
          $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($daynameinnerloop)); */

        foreach ($targetexams as $tar) {
            $startdate = $tar['start'];
            $selectedOption = $tar['id'];
            $cdr = $tar['durationprofile'];





            $dayname = strtolower(date('l', strtotime($tar['start'])));
            /* echo  $startdate =  $tar['start'] .' 1<br />';
              echo $dayname = strtolower(date('l', strtotime($tar['start']))).' 2<br />';

              echo  $this->hoursToMinutes($this->request->getSession()->read($dayname)).' 3<br />'; */



            //echo $this->hoursToMinutes($this->request->getSession()->read($dayname)).'<br />';

            if ($this->hoursToMinutes($this->request->getSession()->read($dayname)) == 0) {


                if ($totalhourdaywise <= 0 || $totalhourdaywise < $cdr) {

                    $timestamp = strtotime($tar['start']);

                    $day = strtolower(date('l', $timestamp));
                    $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($day));



                    $gtedat = $tar['start'];


                    $j++;
                }




                $optionalblockTable = TableRegistry::get('events');
                $query = $optionalblockTable->query();
                $query->update()
                        ->set(['start' => date('Y-m-d', strtotime($gtedat . ' +' . $j . ' day')), 'end' => date('Y-m-d', strtotime($gtedat . ' +' . $j . ' day')), 'allDay' => 'true', 'loopcode' => 'j' . $j])
                        ->where(['id' => $selectedOption], ['userid' => $id])
                        ->execute();

                $totalhourdaywise = $totalhourdaywise - $cdr;
            }
        }

        // return $j;
    }

    public function updatedateforcalendarff($id, $j, $gtedat) {




        echo $getcurrentdate = $gtedat;




        $targetexams = TableRegistry::get('events')->find('all')
                ->where(['events.userid' => $id, 'events.loopcode in' => '("j0","j1","j2","j3","j4","j5","j6","j7","j8","j9","j10","j12","j13")']);



        $currentday = strtolower(date('l', strtotime($gtedat)));
        $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($currentday));

        $i = 0;
        foreach ($targetexams as $tar) {
            $cdr = $tar['durationprofile'];
            $selectedOption = $tar['id'];

            if ($totalhourdaywise <= 0 || $totalhourdaywise < $cdr) {

                $timestamp = strtotime($gtedat);

                $day = strtolower(date('l', $timestamp));
                $totalhourdaywise = $this->hoursToMinutes($this->request->getSession()->read($day));


                $i++;
            }

            $gtedat = date('Y-m-d', strtotime($getcurrentdate . ' +' . $i . ' day'));


            $optionalblockTable = TableRegistry::get('events');
            $query = $optionalblockTable->query();
            $query->update()
                    ->set(['start' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'end' => date('Y-m-d', strtotime($gtedat . ' -1 day')), 'allDay' => 'true'])
                    ->where(['id' => $selectedOption], ['userid' => $id])
                    ->execute();

            $totalhourdaywise = $totalhourdaywise - $cdr;
        }

        $this->updatedateforcalendarfinal($i, $gtedat, $id);


        //	$fashmtml = '<a style="text-decoration:underline;color:blue" onclick="openmodalboxtarget("Targetcomps" , "Learning Plans-Baseline");return false;">here</a>';

        /* $this->Flash->success(__('Student info has been saved successfully.'));


          return $this->redirect(array(
          'controller' => 'users',
          'action' => 'index'
          )); */
    }

}
