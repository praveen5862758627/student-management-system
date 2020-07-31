<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Projectexecuted Controller
 *
 * @property \App\Model\Table\ProjectexecutedTable $Projectexecuted
 *
 * @method \App\Model\Entity\Projectexecuted[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectexecutedController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $projectexecuted = $this->paginate($this->Projectexecuted);

        $this->set(compact('projectexecuted'));
    }

    /**
     * View method
     *
     * @param string|null $id Projectexecuted id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $projectexecuted = $this->Projectexecuted->get($id, [
            'contain' => []
        ]);

        $this->set('projectexecuted', $projectexecuted);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        if ($this->request->is(array('ajax'))) {
            $areaofinterest = $this->Projectexecuted->newEntity();

            $areaofinterest->userid = $this->request->data['userid'];
            $areaofinterest->name = $this->request->data['name'];
            $areaofinterest->description = $this->request->data['description'];

            $areaofinterest = $this->Projectexecuted->patchEntity($areaofinterest, $this->request->getData());
            if ($this->Projectexecuted->save($areaofinterest)) {

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
     * @param string|null $id Projectexecuted id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $projectexecuted = $this->Projectexecuted->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectexecuted = $this->Projectexecuted->patchEntity($projectexecuted, $this->request->getData());
            if ($this->Projectexecuted->save($projectexecuted)) {
                $this->Flash->success(__('The PROJECTS EXECUTED has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The PROJECTS EXECUTED could not be saved. Please, try again.'));
        }
        $this->set(compact('projectexecuted'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projectexecuted id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $projectexecuted = $this->Projectexecuted->get($id);
        if ($this->Projectexecuted->delete($projectexecuted)) {
            $this->Flash->success(__('The PROJECTS EXECUTED has been deleted.'));
        } else {
            $this->Flash->error(__('The PROJECTS EXECUTED could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'users',
                    'action' => 'index']);
    }

    public function deleterow() {

        $this->autoRender = false;

        //$this->log('You are here', 'debug');
        if ($this->request->is(array('ajax'))) {
            $blockid = $_POST['cat_val'];




            $optionalblockTable = TableRegistry::get('projectexecuted');
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
