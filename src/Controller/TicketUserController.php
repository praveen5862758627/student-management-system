<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * TicketUser Controller
 *
 * @property \App\Model\Table\TicketUserTable $TicketUser
 *
 * @method \App\Model\Entity\TicketUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketUserController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users', 'SubTickets']
        ];
        $ticketUser = $this->paginate($this->TicketUser);

        $this->set(compact('ticketUser'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view() {
        $this->autoRender = false;
        if ($this->request->is(array('ajax'))) {
            $userid = $this->request->getSession()->read('sessionname');
            $ticketTrailDetails = $this->TicketUser->find('all', ['conditions' => ['ticket_number' => $this->request->data['ticket_number']]])->all();

            $this->loadModel('Users');
            $posts_arr3 = array();

            foreach ($ticketTrailDetails as $ticketTrailDetail) {
                $userDetails = $this->Users->find('all', ['conditions' => ['Users.id' => $ticketTrailDetail['user_id']]])->first();
                $post_item1 = array(
                    'sub_ticket_number' => html_entity_decode($ticketTrailDetail['sub_ticket_number']),
                    'content' => html_entity_decode($ticketTrailDetail['content']),
                    'file' => html_entity_decode($ticketTrailDetail['file']),
                    'respective_person' => html_entity_decode($userDetails->fname),
                    'user_id' => html_entity_decode($ticketTrailDetail['user_id']),
                );

                array_push($posts_arr3, $post_item1);
            }

            $json_data = array("data" => $posts_arr3);
            echo json_encode($json_data);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->render('/TicketUser/add');
    }

    public function replyTicket() {
        $this->autoRender = false;
        if ($this->request->is('post')) {


            if (empty($_POST['content']) || ctype_space($_POST['content'])) {

                $this->Flash->error(__('Missing/Invalid content.'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            }


            $userid = $this->request->getSession()->read('sessionname');
            $imageName = $userid . 'img' . time() . $this->request->data['fileToUpload']['name'];
            $ticketUser = $this->TicketUser->newEntity();

            $ticketUserDetails = $this->TicketUser->find('all', ['conditions' => ['ticket_number' => $this->request->data['ticket_number']]])->count();

            $ticketUser->ticket_number = $this->request->data['ticket_number'];
            $ticketUser->user_id = $userid;
            $ticketUser->sub_ticket_number = $ticketUserDetails + 1;
            $ticketUser->content = $this->request->data['content'];
            $ticketUser->file = ($this->request->data['fileToUpload']['name']) ? $imageName : '';
            $target_path = "uploads/";
            $target_path = $target_path . basename($imageName);
            move_uploaded_file($this->request->data['fileToUpload']['tmp_name'], $target_path);
            if ($this->TicketUser->save($ticketUser)) {
                $this->loadModel('Ticket');
                $ticket = $this->Ticket->find('all', ['conditions' => ['ticket_number' => $this->request->data['ticket_number']]])->first();
                $ticketTable = TableRegistry::get('Ticket');
                $tickets = $ticketTable->get($ticket->id);
                $tickets->status = 0;
                $ticketTable->save($tickets);
                $this->Flash->success(__('The Ticket has been Commented.'));
                return $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'index'
                ));
            } else {
                $this->Flash->error(__('The Ticket could not be Comment. Please, try again.'));
            }
        }
    }

    public function updateTicket() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $this->loadModel('Ticket');
            $ticket = $this->Ticket->find('all', ['conditions' => ['ticket_number' => $this->request->data['ticket_number']]])->first();
            $ticketTable = TableRegistry::get('Ticket');
            $tickets = $ticketTable->get($ticket->id);
            $tickets->status = 1; // for to close the ticket
            if ($ticketTable->save($tickets)) {
                $json_data = array("data" => 'The ticket has been Closed.');
            } else {
                $json_data = array("data" => 'The ticket could not be Closed. Please, try again.');
            }
            echo json_encode($json_data);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $ticketUser = $this->TicketUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketUser = $this->TicketUser->patchEntity($ticketUser, $this->request->getData());
            if ($this->TicketUser->save($ticketUser)) {
                $this->Flash->success(__('The ticket user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket user could not be saved. Please, try again.'));
        }
        $users = $this->TicketUser->Users->find('list', ['limit' => 200]);
        $subTickets = $this->TicketUser->SubTickets->find('list', ['limit' => 200]);
        $this->set(compact('ticketUser', 'users', 'subTickets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $ticketUser = $this->TicketUser->get($id);
        if ($this->TicketUser->delete($ticketUser)) {
            $this->Flash->success(__('The ticket user has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
