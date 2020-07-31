<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Example Controller
 *
 * @property \App\Model\Table\ExampleTable $Example
 *
 * @method \App\Model\Entity\Example[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExampleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lesson', 'Level', 'Targettype']
        ];
		
			if ($this->request->is('post')) {
    $pes = '%'.$this->request->data('Search').'%';
	
   


//$example = $this->Example->find('all')->where(['OR' => ['Example.name LIKE' => $pes, 'Example.code LIKE' => $pes]]);


 $example = $this->paginate($this->Example->find('all' ,['Example.lesson_id' =>'Lesson.id','Example.level_id' =>'Level.id','Example.targettype_id' =>'Targettype.id'])->where(['OR' => ['Example.name LIKE' => $pes, 'Example.code LIKE' => $pes]]));
	
	
}
else{
		
        $example = $this->paginate($this->Example);
}

        $this->set(compact('example'));
    }

    /**
     * View method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $example = $this->Example->get($id, [
            'contain' => ['Lesson', 'Level', 'Targettype']
        ]);

        $this->set('example', $example);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		
		if($id != null){
		
		 $lesson = $this->Example->Lesson->find('list',array(
    'conditions'=>array('Lesson.id' => $id)));
		
		}
		else {
			 $lesson = $this->Example->Lesson->find('list', ['limit' => 200]);
		}
		
        $example = $this->Example->newEntity();
        if ($this->request->is('post')) {
            $example = $this->Example->patchEntity($example, $this->request->getData());
            if ($this->Example->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
       
		
	//	var_dump($lesson);
        $level = $this->Example->Level->find('list', ['limit' => 200]);
        $targettype = $this->Example->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('example', 'lesson', 'level', 'targettype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $example = $this->Example->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $example = $this->Example->patchEntity($example, $this->request->getData());
            if ($this->Example->save($example)) {
                $this->Flash->success(__('The example has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The example could not be saved. Please, try again.'));
        }
        $lesson = $this->Example->Lesson->find('list', ['limit' => 200]);
        $level = $this->Example->Level->find('list', ['limit' => 200]);
        $targettype = $this->Example->Targettype->find('list', ['limit' => 200]);
        $this->set(compact('example', 'lesson', 'level', 'targettype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Example id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $example = $this->Example->get($id);
        if ($this->Example->delete($example)) {
            $this->Flash->success(__('The example has been deleted.'));
        } else {
            $this->Flash->error(__('The example could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}