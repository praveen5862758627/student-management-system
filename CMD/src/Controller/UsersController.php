<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {


     $conn = ConnectionManager::get('default');


            

            $querytcompsnotifications = "SELECT * FROM users where id='". $this->request->getSession()->read('userid')."'";



            /*************************************************/


           // $querytcompsnotifications = 'SELECT * from notications order by id desc';
            $stmt1noticat = $conn->execute($querytcompsnotifications);


            $notications = $stmt1noticat->fetchAll(\PDO::FETCH_ASSOC);

        $this->set(compact('notications'));
    }

    public function displayrole($id = null) {
        if ($this->request->session()->read('sessionname') == '1') {
            $options = $this->Users->find('all'); //or whatever conditions you want
            $this->set(compact('options'));

            $articlesTable = TableRegistry::get('userroles');
            $optionsro = $articlesTable->find();
            $this->set(compact('optionsro'));




            if ($this->request->is(['patch', 'post', 'put'])) {
                $getdata = $this->request->getData();

                $user = $this->Users->get($getdata['usersname'], [
                    'contain' => []
                ]);

                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user role has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user role could not be saved. Please, try again.'));
            }
        } else {
            die("Access denied");
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {



            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {

        if ($this->Auth->user()) {

            return $this->redirect(['controller' => 'users']);
        }


        if ($this->request->is('post')) {



            //echo $token = $this->request->getParam('_csrfToken');;
            //exit;
            $user = $this->Auth->identify();
            if ($user) {

                //echo $token = $this->request->getParam('_csrfToken');;
                //exit;
                $this->set('userrole', $user['userrole']);

                //session->write('sessionname',  $user['name']); 


                /* $articlesTable = TableRegistry::get('php_sessions');
                  $article = $articlesTable->newEntity();

                  $session = session_id();

                  $article->svalue = $session;


                  echo $user
                  $session = $this->request->session();
                  $session->write('Config.session', $session);

                  if ($articlesTable->save($article)) {
                  // The $article entity contains the id now
                  echo $id = $article->id;
                  } */

                $this->Auth->setUser($user);


                $this->request->session()->write('sessionname', $user['userrole']);
                $this->request->session()->write('sessionname1', $user['name']);
				 $this->request->session()->write('userid', $user['id']);
				



                return $this->redirect(['controller' => 'users']);
            }
            // Bad Login
            $this->Flash->error('Incorrect Login');
        }
    }

    public function students() {
        
    }

    public function guest() {
        
    }

    public function manager() {
        
    }

    public function inscoordinator() {
        
    }

    // Logout
    public function logout() {
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function register() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //Start - Controller Code to handle file uploading
            //Check if image has been uploaded
            if (!empty($this->request->data['upload']['name'])) {
                $file = $this->request->data['upload'];

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($ext, $arr_ext)) {
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'uploads/photos/' . $file['name']);
                    //prepare the filename for database entry
                    $this->request->data['Category']['image'] = $file['name'];
                } else {
                    $this->Flash->error('Uploaded file not supported');
                }
            }




            //End 
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                /* $articlesTable = TableRegistry::get('users');
                  $article = $articlesTable->newEntity();
                  $article->userrole = '1';
                  if ($articlesTable->save($article)) {
                  $id = $article->id;
                  } */

                $this->Flash->success('You are registered and can login');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('You are not registered');
            }
        }
        $this->set(compact('user'));
        // $this->set('_serialzie', ['user']);
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['register', 'login']);
    }

}
