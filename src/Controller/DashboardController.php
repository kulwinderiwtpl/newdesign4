<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class DashboardController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Dashboard');
        $this->loadModel('Bulletins');
        
        $bulletin = $this->Bulletins->find('all', array('order' => ['created' => 'desc']))->first();
//        $this->paginate = [
//            'contain' => ['Companies']
//        ];
//        $users = $this->paginate($this->Users);
//
       $this->set(compact('bulletin'));
       $this->set('_serialize', ['bulletin']);
    }
    
    public function admin()
    {
        $this->loadModel('Users');
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//        $user = $this->Users->get($id, [
//            'contain' => ['Companies']
//        ]);
//
//        $this->set('user', $user);
//        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Users->Companies->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user && $user['status'] == 1){
                $this->Auth->setUser($user);
                return $this->redirect(['controller'=>'users']);
            }
            $this->Flash->error('Invalid Login');
        }
    }
    
    public function logout(){
        $this->Flash->success('You are logged Out');
        return $this->redirect($this->Auth->logout());
    }
    
    public function register(){
        $user = $this->Users->newEntity();
        if($this->request->is('post')){
            //pr($this->request->data);
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "secret=6LcDIxYUAAAAAOWLg3nXC1CTUS64v5IIIfiy2fpi&response=".$this->request->data['g-recaptcha-response']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            // in real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS, 
            //          http_build_query(array('postvar1' => 'value1')));

            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = curl_exec ($ch);
            if(curl_error($ch))
            {
                echo 'CURL error:' . curl_error($ch);
            }
            curl_close ($ch);
            $server_output = json_decode($server_output);
            //print_r($server_output);
            if(!$server_output->success){
                $this->Flash->error('The Captcha Verification code could not be Verified. Please try again.');
//                $this->set(compact('user'));
//                $this->set('_serialize',['user']);
//                $companies = $this->Users->Companies->find('list', ['limit' => 200]);
//                $this->set(compact('user', 'companies'));
//                return $this->redirect(['action'=>'register']);
//                die;
            } else{
                $user = $this->Users->patchEntity($user, $this->request->data);
                $user['status'] = 0;
                $user['password'] = rand(100000000, 999999999);
                if($this->Users->save($user)){
                    $this->Flash->success('You are successfully Registered. You can login once your Account is approved by our Admins.');
                    return $this->redirect(['action'=>'login']);
                }
                else{
                    $this->Flash->error('You are not registered');
                }
            }
            
            
            // further processing ....
            //if ($server_output == "OK") { ... } else { ... }
        }
//        $this->set(compact('user'));
        $this->set('_serialize',['user']);
        $companies = $this->Users->Companies->find('list', ['limit' => 200,'order'=>['name'=>'asc']]);
        //array_unshift($companies, '');
        //print_r($companies);//['Leaf']['tree_id'] = $id;
        $this->set(compact('user', 'companies'));
    }
    
    public function beforeFilter(\Cake\Event\EventInterface $event) {
//        parent::beforeFilter($event);
//        $this->Auth->allow('register');
    }
}
