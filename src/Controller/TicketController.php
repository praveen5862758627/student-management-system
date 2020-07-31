<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Symfony\Component\VarDumper\Cloner\Data;
use Cake\I18n\Time;

/**
 * Ticket Controller
 *
 * @property \App\Model\Table\TicketTable $Ticket
 *
 * @method \App\Model\Entity\Ticket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $ticket = $this->paginate($this->Ticket);

        $this->set(compact('ticket'));
    }

    public function getStatusText($status) {
        if ($status == 0) {
            $statusText = 'Pending';
        } else {
            $statusText = 'Closed';
        }
        return $statusText;
    }

    public function getPriority($priority) {
        if ($priority == 0) {
            $priorityText = 'Low';
        } else if ($priority == 1) {
            $priorityText = 'Medium';
        } else {
            $priorityText = 'Critical';
        }
        return $priorityText;
    }

    public function getDepartmentName($dptNo) {
        $this->loadModel('TicketDepartments');
        $ticketDepts = $this->TicketDepartments->find('all', ['conditions' => ['status' => 1, 'id' => $dptNo]])->first();
        $departmentText = $ticketDepts->name;
        return $departmentText;
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view() {
        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {
            $userRole = $this->request->data['user_role'];
            $userid = $this->request->getSession()->read('sessionname');
            $condition = ($userRole == 6) ? '' : ['user_id' => $userid];
            // $ticketDetails = $this->Ticket->find('all', [ 'conditions' => $condition,'order' => 'Ticket.id asc']))->all();

            if ($userRole == 6)
                $ticketDetails = $this->Ticket->find('all', array('order' => 'Ticket.id desc'));
            else
                $ticketDetails = $this->Ticket->find('all', array('order' => 'Ticket.id desc'))->where(['Ticket.user_id' => $userid]);

            $posts_arr2 = array();
            foreach ($ticketDetails as $ticketDetail) {
                $status = $this->getStatusText($ticketDetail['status']);
                $department = $this->getDepartmentName($ticketDetail['ticket_department_number']);
                $post_item1 = array(
                    'ticket_no' => html_entity_decode($ticketDetail['ticket_number']),
                    'date' => html_entity_decode($ticketDetail['date']),
                    'title' => html_entity_decode($ticketDetail['title']),
                     'slidenumber' => html_entity_decode($ticketDetail['slidenumber']),
                    'lessonname' => html_entity_decode($ticketDetail['lessonname']),
                    'lessonid' => html_entity_decode($ticketDetail['lessonid']),
                    'content' => html_entity_decode($ticketDetail['content']),
                    'priority' => html_entity_decode($ticketDetail['priority']),
                    'status' => html_entity_decode($status),
                    'user_id' => html_entity_decode($userid),
                    'department' => html_entity_decode($department)
                );

                array_push($posts_arr2, $post_item1);
            }

            $json_data = array("data" => $posts_arr2);
            echo json_encode($json_data);
            exit;
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {


        $this->autoRender = false;
        $userid = $this->request->getSession()->read('sessionname');
        $this->loadModel('Users');
        $this->loadModel('TicketUser');
        $userDetails = $this->Users->find('all', ['conditions' => ['Users.id' => $userid]])->first();
        $ticket = $this->Ticket->newEntity();
        if ($this->request->is('post')) {


            if (empty($_POST['title']) || ctype_space($_POST['title'])) {


                $this->Flash->error(__('Missing/Invalid Title.'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            } else if (empty($_POST['content']) || ctype_space($_POST['content'])) {

                $this->Flash->error(__('Missing/Invalid content.'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            } else {


                $imageName = $userid . 'img' . time() . $this->request->data['fileToUpload']['name'];
                $priority = $this->getPriority($this->request->data['priority']);
                $ticketNumber = $userid . rand(1, 1000);
                $ticket->ticket_number = $ticketNumber;
                $ticket->priority = $priority;
                $ticket->title = $this->request->data['title'];
                  $ticket->slidenumber = $this->request->data['slidenumber'];
                  $ticket->lessonname = $this->request->data['lessonname'];
                  $ticket->lessonid = $this->request->data['lessonid'];
                $ticket->content = $this->request->data['content'];
                $ticket->ticket_department_number = $this->request->data['department'];
                $ticket->file = ($this->request->data['fileToUpload']['name']) ? $imageName : '';

                date_default_timezone_set('Asia/Kolkata');
                $timcompsas = date("d-m-Y h:i:s a");
                $ticket->date = $timcompsas;

                //$ticket->date = Time::now();
                $ticket->user_email = $userDetails->email;
                $ticket->user_name = $userDetails->fname;
                $ticket->user_id = $userid;

                $target_path = "uploads/";
                $target_path = $target_path . basename($imageName);
                move_uploaded_file($this->request->data['fileToUpload']['tmp_name'], $target_path);
                if ($this->Ticket->save($ticket)) {
                    $trailTicket = $this->Ticket->newEntity();
                    $trailTicket->ticket_number = $ticketNumber;
                    $trailTicket->user_id = $userid;
                    $trailTicket->sub_ticket_number = 1;
                    $trailTicket->content = $this->request->data['content'];
                    $trailTicket->file = ($this->request->data['fileToUpload']['name']) ? $imageName : '';
                    $this->TicketUser->save($trailTicket);

                    $this->Flash->success(__('The Ticket has been saved.'));

                    if (isset($this->request->data['url'])) {
                        $this->redirect($this->request->data['url']);
                    } else {
                        return $this->redirect(array(
                                    'controller' => 'users',
                                    'action' => 'index'
                        ));
                    }
                } else {
                    $this->Flash->error(__('The Ticket could not be saved. Please, try again.'));
                }
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $ticket = $this->Ticket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Ticket->patchEntity($ticket, $this->request->getData());
            if ($this->Ticket->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $users = $this->Ticket->Users->find('list', ['limit' => 200]);
        $this->set(compact('ticket', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Ticket->get($id);
        if ($this->Ticket->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
