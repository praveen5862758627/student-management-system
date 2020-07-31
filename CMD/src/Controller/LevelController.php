<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Level Controller
 *
 * @property \App\Model\Table\LevelTable $Level
 *
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LevelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $level = $this->paginate($this->Level);

        $this->set(compact('level'));
    }

    /**
     * View method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $level = $this->Level->get($id, [
            'contain' => ['Example', 'Lesson', 'Questionbank', 'Quiz']
        ]);

        $this->set('level', $level);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $level = $this->Level->newEntity();
        if ($this->request->is('post')) {
            $level = $this->Level->patchEntity($level, $this->request->getData());
            if ($this->Level->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $this->set(compact('level'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Level->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $level = $this->Level->patchEntity($level, $this->request->getData());
            if ($this->Level->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $this->set(compact('level'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $level = $this->Level->get($id);
        if ($this->Level->delete($level)) {
            $this->Flash->success(__('The level has been deleted.'));
        } else {
            $this->Flash->error(__('The level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
