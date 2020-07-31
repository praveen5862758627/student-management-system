<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Areaofexpertise Controller
 *
 * @property \App\Model\Table\AreaofexpertiseTable $Areaofexpertise
 *
 * @method \App\Model\Entity\Areaofexpertise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AreaofexpertiseController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $areaofexpertise = $this->paginate($this->Areaofexpertise);

        $this->set(compact('areaofexpertise'));
    }

    /**
     * View method
     *
     * @param string|null $id Areaofexpertise id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $areaofexpertise = $this->Areaofexpertise->get($id, [
            'contain' => []
        ]);

        $this->set('areaofexpertise', $areaofexpertise);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $areaofexpertise = $this->Areaofexpertise->newEntity();
        if ($this->request->is('post')) {
            $areaofexpertise = $this->Areaofexpertise->patchEntity($areaofexpertise, $this->request->getData());
            if ($this->Areaofexpertise->save($areaofexpertise)) {
                $this->Flash->success(__('The areaofexpertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The areaofexpertise could not be saved. Please, try again.'));
        }
        $this->set(compact('areaofexpertise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Areaofexpertise id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $areaofexpertise = $this->Areaofexpertise->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $areaofexpertise = $this->Areaofexpertise->patchEntity($areaofexpertise, $this->request->getData());
            if ($this->Areaofexpertise->save($areaofexpertise)) {
                $this->Flash->success(__('The areaofexpertise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The areaofexpertise could not be saved. Please, try again.'));
        }
        $this->set(compact('areaofexpertise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Areaofexpertise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $areaofexpertise = $this->Areaofexpertise->get($id);
        if ($this->Areaofexpertise->delete($areaofexpertise)) {
            $this->Flash->success(__('The areaofexpertise has been deleted.'));
        } else {
            $this->Flash->error(__('The areaofexpertise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
