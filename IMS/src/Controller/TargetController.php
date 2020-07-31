<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Target Controller
 *
 * @property \App\Model\Table\TargetTable $Target
 *
 * @method \App\Model\Entity\Target[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargetController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM target";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $target = $this->Target->get($id, [
            'contain' => ['Targetcomps', 'Targetcompsopt']
        ]);

        $this->set('target', $target);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $target = $this->Target->newEntity();
        if ($this->request->is('post')) {
            $target = $this->Target->patchEntity($target, $this->request->getData());
            if ($this->Target->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $this->set(compact('target'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $target = $this->Target->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $target = $this->Target->patchEntity($target, $this->request->getData());
            if ($this->Target->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $this->set(compact('target'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $target = $this->Target->get($id);
        if ($this->Target->delete($target)) {
            $this->Flash->success(__('The target has been deleted.'));
        } else {
            $this->Flash->error(__('The target could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
