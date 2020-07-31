<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Moduletargets Controller
 *
 * @property \App\Model\Table\ModuletargetsTable $Moduletargets
 *
 * @method \App\Model\Entity\Moduletarget[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModuletargetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM moduletargets";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    /**
     * View method
     *
     * @param string|null $id Moduletarget id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moduletarget = $this->Moduletargets->get($id, [
            'contain' => []
        ]);

        $this->set('moduletarget', $moduletarget);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moduletarget = $this->Moduletargets->newEntity();
        if ($this->request->is('post')) {
            $moduletarget = $this->Moduletargets->patchEntity($moduletarget, $this->request->getData());
            if ($this->Moduletargets->save($moduletarget)) {
                $this->Flash->success(__('The moduletarget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moduletarget could not be saved. Please, try again.'));
        }
        $this->set(compact('moduletarget'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Moduletarget id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moduletarget = $this->Moduletargets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moduletarget = $this->Moduletargets->patchEntity($moduletarget, $this->request->getData());
            if ($this->Moduletargets->save($moduletarget)) {
                $this->Flash->success(__('The moduletarget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The moduletarget could not be saved. Please, try again.'));
        }
        $this->set(compact('moduletarget'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Moduletarget id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moduletarget = $this->Moduletargets->get($id);
        if ($this->Moduletargets->delete($moduletarget)) {
            $this->Flash->success(__('The moduletarget has been deleted.'));
        } else {
            $this->Flash->error(__('The moduletarget could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
