<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Personaldetails Controller
 *
 * @property \App\Model\Table\PersonaldetailsTable $Personaldetails
 *
 * @method \App\Model\Entity\Personaldetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaldetailsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $personaldetails = $this->paginate($this->Personaldetails);

        $this->set(compact('personaldetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Personaldetail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $personaldetail = $this->Personaldetails->get($id, [
            'contain' => []
        ]);

        $this->set('personaldetail', $personaldetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->is(array('ajax'))) {
            $areaofinterest = $this->Personaldetails->newEntity();

            $areaofinterest->userid = $this->request->data['userid'];
            $areaofinterest->name = $this->request->data['name'];
            $areaofinterest->description = $this->request->data['description'];

            $areaofinterest = $this->Personaldetails->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Personaldetails->save($areaofinterest)) {

                echo 'Changes has been saved';
            } else {

                echo "Error saving the data.";
            }
        }
        EXIT;
    }

    /**
     * Edit method
     *
     * @param string|null $id Personaldetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $personaldetail = $this->Personaldetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personaldetail = $this->Personaldetails->patchEntity($personaldetail, $this->request->getData());
            if ($this->Personaldetails->save($personaldetail)) {
                $this->Flash->success(__('The PERSONAL DETAILS has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The PERSONAL DETAILS could not be saved. Please, try again.'));
        }
        $this->set(compact('personaldetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Personaldetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $personaldetail = $this->Personaldetails->get($id);
        if ($this->Personaldetails->delete($personaldetail)) {
            $this->Flash->success(__('The personaldetail has been deleted.'));
        } else {
            $this->Flash->error(__('The PERSONAL DETAILS could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users',
                    'action' => 'index']);
    }

    public function deleterow() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {
            $blockid = $_POST['cat_val'];




            $optionalblockTable = TableRegistry::get('personaldetails');
            $query = $optionalblockTable->query();
            $query->delete()
                    //  ->set(['deletedblock' => 1])
                    ->where(['id' => $blockid])
                    ->execute();
            echo "Deleted Successfully";
            exit;
        }
    }

}
