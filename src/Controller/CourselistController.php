<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courselist Controller
 *
 * @property \App\Model\Table\CourselistTable $Courselist
 *
 * @method \App\Model\Entity\Courselist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CourselistController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $courselist = $this->paginate($this->Courselist);

        $this->set(compact('courselist'));
    }

    /**
     * View method
     *
     * @param string|null $id Courselist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courselist = $this->Courselist->get($id, [
            'contain' => []
        ]);

        $this->set('courselist', $courselist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courselist = $this->Courselist->newEntity();
        if ($this->request->is('post')) {
            $courselist = $this->Courselist->patchEntity($courselist, $this->request->getData());
            if ($this->Courselist->save($courselist)) {
                $this->Flash->success(__('The courselist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courselist could not be saved. Please, try again.'));
        }
        $this->set(compact('courselist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Courselist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courselist = $this->Courselist->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courselist = $this->Courselist->patchEntity($courselist, $this->request->getData());
            if ($this->Courselist->save($courselist)) {
                $this->Flash->success(__('The courselist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courselist could not be saved. Please, try again.'));
        }
        $this->set(compact('courselist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Courselist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courselist = $this->Courselist->get($id);
        if ($this->Courselist->delete($courselist)) {
            $this->Flash->success(__('The courselist has been deleted.'));
        } else {
            $this->Flash->error(__('The courselist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
