<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projectlisting Controller
 *
 * @property \App\Model\Table\ProjectlistingTable $Projectlisting
 *
 * @method \App\Model\Entity\Projectlisting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectlistingController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $projectlisting = $this->paginate($this->Projectlisting);

        $this->set(compact('projectlisting'));
    }

    /**
     * View method
     *
     * @param string|null $id Projectlisting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectlisting = $this->Projectlisting->get($id, [
            'contain' => []
        ]);

        $this->set('projectlisting', $projectlisting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectlisting = $this->Projectlisting->newEntity();
        if ($this->request->is('post')) {
            $projectlisting = $this->Projectlisting->patchEntity($projectlisting, $this->request->getData());
            if ($this->Projectlisting->save($projectlisting)) {
                $this->Flash->success(__('The projectlisting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projectlisting could not be saved. Please, try again.'));
        }
        $this->set(compact('projectlisting'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projectlisting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectlisting = $this->Projectlisting->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectlisting = $this->Projectlisting->patchEntity($projectlisting, $this->request->getData());
            if ($this->Projectlisting->save($projectlisting)) {
                $this->Flash->success(__('The projectlisting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projectlisting could not be saved. Please, try again.'));
        }
        $this->set(compact('projectlisting'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projectlisting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectlisting = $this->Projectlisting->get($id);
        if ($this->Projectlisting->delete($projectlisting)) {
            $this->Flash->success(__('The projectlisting has been deleted.'));
        } else {
            $this->Flash->error(__('The projectlisting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
