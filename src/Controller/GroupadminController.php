<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groupadmin Controller
 *
 * @property \App\Model\Table\GroupadminTable $Groupadmin
 *
 * @method \App\Model\Entity\Groupadmin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupadminController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groupadmin = $this->paginate($this->Groupadmin);

        $this->set(compact('groupadmin'));
    }

    /**
     * View method
     *
     * @param string|null $id Groupadmin id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupadmin = $this->Groupadmin->get($id, [
            'contain' => []
        ]);

        $this->set('groupadmin', $groupadmin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupadmin = $this->Groupadmin->newEntity();
        if ($this->request->is('post')) {
            $groupadmin = $this->Groupadmin->patchEntity($groupadmin, $this->request->getData());
            if ($this->Groupadmin->save($groupadmin)) {
                $this->Flash->success(__('The groupadmin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The groupadmin could not be saved. Please, try again.'));
        }
        $this->set(compact('groupadmin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Groupadmin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupadmin = $this->Groupadmin->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupadmin = $this->Groupadmin->patchEntity($groupadmin, $this->request->getData());
            if ($this->Groupadmin->save($groupadmin)) {
                $this->Flash->success(__('The groupadmin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The groupadmin could not be saved. Please, try again.'));
        }
        $this->set(compact('groupadmin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Groupadmin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupadmin = $this->Groupadmin->get($id);
        if ($this->Groupadmin->delete($groupadmin)) {
            $this->Flash->success(__('The groupadmin has been deleted.'));
        } else {
            $this->Flash->error(__('The groupadmin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
