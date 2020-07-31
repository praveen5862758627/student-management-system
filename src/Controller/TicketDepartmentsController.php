<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TicketDepartments Controller
 *
 * @property \App\Model\Table\TicketDepartmentsTable $TicketDepartments
 *
 * @method \App\Model\Entity\TicketDepartment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TicketDepartmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $ticketDepartments = $this->paginate($this->TicketDepartments);

        $this->set(compact('ticketDepartments'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Department id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketDepartment = $this->TicketDepartments->get($id, [
            'contain' => []
        ]);

        $this->set('ticketDepartment', $ticketDepartment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketDepartment = $this->TicketDepartments->newEntity();
        if ($this->request->is('post')) {
            $ticketDepartment = $this->TicketDepartments->patchEntity($ticketDepartment, $this->request->getData());
            if ($this->TicketDepartments->save($ticketDepartment)) {
                $this->Flash->success(__('The ticket department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket department could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketDepartment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Department id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketDepartment = $this->TicketDepartments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketDepartment = $this->TicketDepartments->patchEntity($ticketDepartment, $this->request->getData());
            if ($this->TicketDepartments->save($ticketDepartment)) {
                $this->Flash->success(__('The ticket department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket department could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketDepartment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Department id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketDepartment = $this->TicketDepartments->get($id);
        if ($this->TicketDepartments->delete($ticketDepartment)) {
            $this->Flash->success(__('The ticket department has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
