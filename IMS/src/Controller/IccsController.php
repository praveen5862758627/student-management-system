<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Iccs Controller
 *
 * @property \App\Model\Table\IccsTable $Iccs
 *
 * @method \App\Model\Entity\Icc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IccsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Industry']
        ];
        $iccs = $this->paginate($this->Iccs);

        $this->set(compact('iccs'));
    }

    /**
     * View method
     *
     * @param string|null $id Icc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $icc = $this->Iccs->get($id, [
            'contain' => ['Industry', 'Icccomps']
        ]);

        $this->set('icc', $icc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $icc = $this->Iccs->newEntity();
        if ($this->request->is('post')) {
            $icc = $this->Iccs->patchEntity($icc, $this->request->getData());
            if ($this->Iccs->save($icc)) {
                $this->Flash->success(__('The icc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The icc could not be saved. Please, try again.'));
        }
        $industries = $this->Iccs->Industry->find('list', ['limit' => 200]);
        $this->set(compact('icc', 'industries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Icc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $icc = $this->Iccs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $icc = $this->Iccs->patchEntity($icc, $this->request->getData());
            if ($this->Iccs->save($icc)) {
                $this->Flash->success(__('The icc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The icc could not be saved. Please, try again.'));
        }
        $industries = $this->Iccs->Industry->find('list', ['limit' => 200]);
        $this->set(compact('icc', 'industries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Icc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $icc = $this->Iccs->get($id);
        if ($this->Iccs->delete($icc)) {
            $this->Flash->success(__('The icc has been deleted.'));
        } else {
            $this->Flash->error(__('The icc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
