<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Deps Controller
 *
 * @property \App\Model\Table\DepsTable $Deps
 *
 * @method \App\Model\Entity\Dep[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepsController extends AppController
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
        $deps = $this->paginate($this->Deps);

        $this->set(compact('deps'));
    }

    /**
     * View method
     *
     * @param string|null $id Dep id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dep = $this->Deps->get($id, [
            'contain' => ['Industry', 'Depcomps']
        ]);

        $this->set('dep', $dep);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dep = $this->Deps->newEntity();
        if ($this->request->is('post')) {
            $dep = $this->Deps->patchEntity($dep, $this->request->getData());
            if ($this->Deps->save($dep)) {
                $this->Flash->success(__('The dep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dep could not be saved. Please, try again.'));
        }
        $industries = $this->Deps->Industry->find('list', ['limit' => 200]);
        $this->set(compact('dep', 'industries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dep id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dep = $this->Deps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dep = $this->Deps->patchEntity($dep, $this->request->getData());
            if ($this->Deps->save($dep)) {
                $this->Flash->success(__('The dep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dep could not be saved. Please, try again.'));
        }
        $industries = $this->Deps->Industry->find('list', ['limit' => 200]);
        $this->set(compact('dep', 'industries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dep id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dep = $this->Deps->get($id);
        if ($this->Deps->delete($dep)) {
            $this->Flash->success(__('The dep has been deleted.'));
        } else {
            $this->Flash->error(__('The dep could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
