<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Apprentice Controller
 *
 * @property \App\Model\Table\ApprenticeTable $Apprentice
 *
 * @method \App\Model\Entity\Apprentice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApprenticeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $apprentice = $this->paginate($this->Apprentice);

        $this->set(compact('apprentice'));
    }

    /**
     * View method
     *
     * @param string|null $id Apprentice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apprentice = $this->Apprentice->get($id, [
            'contain' => []
        ]);

        $this->set('apprentice', $apprentice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apprentice = $this->Apprentice->newEntity();
        if ($this->request->is('post')) {
            $apprentice = $this->Apprentice->patchEntity($apprentice, $this->request->getData());
            if ($this->Apprentice->save($apprentice)) {
                $this->Flash->success(__('The apprentice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apprentice could not be saved. Please, try again.'));
        }
        $this->set(compact('apprentice'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apprentice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apprentice = $this->Apprentice->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apprentice = $this->Apprentice->patchEntity($apprentice, $this->request->getData());
            if ($this->Apprentice->save($apprentice)) {
                $this->Flash->success(__('The apprentice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apprentice could not be saved. Please, try again.'));
        }
        $this->set(compact('apprentice'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apprentice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apprentice = $this->Apprentice->get($id);
        if ($this->Apprentice->delete($apprentice)) {
            $this->Flash->success(__('The apprentice has been deleted.'));
        } else {
            $this->Flash->error(__('The apprentice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
