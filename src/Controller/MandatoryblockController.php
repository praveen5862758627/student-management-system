<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mandatoryblock Controller
 *
 * @property \App\Model\Table\MandatoryblockTable $Mandatoryblock
 *
 * @method \App\Model\Entity\Mandatoryblock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MandatoryblockController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Blocks']
        ];
        $mandatoryblock = $this->paginate($this->Mandatoryblock);

        $this->set(compact('mandatoryblock'));
    }

    /**
     * View method
     *
     * @param string|null $id Mandatoryblock id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mandatoryblock = $this->Mandatoryblock->get($id, [
            'contain' => ['Blocks']
        ]);

        $this->set('mandatoryblock', $mandatoryblock);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mandatoryblock = $this->Mandatoryblock->newEntity();
        if ($this->request->is('post')) {
            $mandatoryblock = $this->Mandatoryblock->patchEntity($mandatoryblock, $this->request->getData());
            if ($this->Mandatoryblock->save($mandatoryblock)) {
                $this->Flash->success(__('The mandatoryblock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mandatoryblock could not be saved. Please, try again.'));
        }
        $blocks = $this->Mandatoryblock->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('mandatoryblock', 'blocks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mandatoryblock id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mandatoryblock = $this->Mandatoryblock->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mandatoryblock = $this->Mandatoryblock->patchEntity($mandatoryblock, $this->request->getData());
            if ($this->Mandatoryblock->save($mandatoryblock)) {
                $this->Flash->success(__('The mandatoryblock has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mandatoryblock could not be saved. Please, try again.'));
        }
        $blocks = $this->Mandatoryblock->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('mandatoryblock', 'blocks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mandatoryblock id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mandatoryblock = $this->Mandatoryblock->get($id);
        if ($this->Mandatoryblock->delete($mandatoryblock)) {
            $this->Flash->success(__('The mandatoryblock has been deleted.'));
        } else {
            $this->Flash->error(__('The mandatoryblock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
