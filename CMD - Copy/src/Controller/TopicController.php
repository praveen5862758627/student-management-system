<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Topic Controller
 *
 * @property \App\Model\Table\TopicTable $Topic
 *
 * @method \App\Model\Entity\Topic[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TopicController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Comparea']
        ];
		
				if ($this->request->is('post')) {
    $pes = '%'.$this->request->data('Search').'%';
	
   
	$topic = $this->Topic->find('all')->where(['OR' => ['name LIKE' => $pes, 'code LIKE' => $pes]]);
	
	
}
else{
		
        $topic = $this->paginate($this->Topic);
}

        $this->set(compact('topic'));
    }

    /**
     * View method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topic = $this->Topic->get($id, [
            'contain' => ['Comparea', 'Lesson', 'Questionbank']
        ]);

        $this->set('topic', $topic);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		if($id != null){
		
		 $compareas = $this->Topic->Comparea->find('list',array(
    'conditions'=>array('Comparea.id' => $id)));
		
		}
		else {
			 $compareas = $this->Topic->Comparea->find('list', ['limit' => 200]);
		}
		
		
        $topic = $this->Topic->newEntity();
        if ($this->request->is('post')) {
            $topic = $this->Topic->patchEntity($topic, $this->request->getData());
            if ($this->Topic->save($topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
       
        $this->set(compact('topic', 'compareas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $topic = $this->Topic->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topic = $this->Topic->patchEntity($topic, $this->request->getData());
            if ($this->Topic->save($topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $compareas = $this->Topic->Comparea->find('list', ['limit' => 200]);
        $this->set(compact('topic', 'compareas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topic = $this->Topic->get($id);
        if ($this->Topic->delete($topic)) {
            $this->Flash->success(__('The topic has been deleted.'));
        } else {
            $this->Flash->error(__('The topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
