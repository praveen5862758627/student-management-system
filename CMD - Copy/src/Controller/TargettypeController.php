<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Targettype Controller
 *
 * @property \App\Model\Table\TargettypeTable $Targettype
 *
 * @method \App\Model\Entity\Targettype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargettypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $targettype = $this->paginate($this->Targettype);

        $this->set(compact('targettype'));
    }

    /**
     * View method
     *
     * @param string|null $id Targettype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $targettype = $this->Targettype->get($id, [
            'contain' => ['Example', 'Lesson', 'Questionbank', 'Quiz']
        ]);

        $this->set('targettype', $targettype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $targettype = $this->Targettype->newEntity();
        if ($this->request->is('post')) {
            $targettype = $this->Targettype->patchEntity($targettype, $this->request->getData());
            if ($this->Targettype->save($targettype)) {
                $this->Flash->success(__('The targettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targettype could not be saved. Please, try again.'));
        }
        $this->set(compact('targettype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Targettype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $targettype = $this->Targettype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $targettype = $this->Targettype->patchEntity($targettype, $this->request->getData());
            if ($this->Targettype->save($targettype)) {
                $this->Flash->success(__('The targettype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The targettype could not be saved. Please, try again.'));
        }
        $this->set(compact('targettype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Targettype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $targettype = $this->Targettype->get($id);
        if ($this->Targettype->delete($targettype)) {
            $this->Flash->success(__('The targettype has been deleted.'));
        } else {
            $this->Flash->error(__('The targettype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
