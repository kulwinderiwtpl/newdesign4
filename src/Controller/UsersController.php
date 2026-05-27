<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use App\Mailer\MyMailer;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController {
    
    use MailerAwareTrait;
    
    public function beforeFilter(\Cake\Event\EventInterface $event): void
    {
        parent::beforeFilter($event);

        // Auth component is removed in CakePHP 5
        // Public actions are now handled in AppController::isAuthorized()
        // No changes needed here - isAuthorized() already allows these actions:
        // - register
        // - forgotPassword  
        // - resetPassword
    }
    
    /**
    * Index method
    *
    * @return \Cake\Network\Response|null
    */

    private function filterUser($conditions){
        // $this->autoRender = false;

        if(!empty($this->request->query('search'))){
            $q = $this->request->query('search');
            $conditions = array_merge($conditions, [
                'OR'=>[
            'Users.first_name LIKE' => $q.'%',
            'Users.last_name LIKE' => $q.'%',
            'Users.email LIKE' => $q.'%',
            'CONCAT(first_name," ",last_name) LIKE' => $q.'%',
            'Companies.name LIKE' => $q.'%'
            ]]);
        }
        
        $this->paginate = [
            'contain' => ['Companies'],
            'conditions' =>$conditions,
            'limit' => $this->queryPage
        ];
        $users = $this->paginate($this->Users);
        return $users;
    }

    public function index() {
        $this->set('title', 'View/Manage Members');
        // echo $this->queryPage;
        
        $conditions = [
            'Users.status IN' => ['I','A','P'],
           // 'Users.rep_member <>'=>'y',
            'Users.type'=>'member'
        ];
        $users = $this->filterUser($conditions);
        // $count = $users->count();
        $rowcount = $this->Users->find('all', array('contain' => ['Companies'],'conditions'=>$conditions));
        // echo $rowcount;
        $active_member_count = $rowcount->count();
        $page = 'index';
        $this->set(compact('users','page','active_member_count'));
        $this->set('_serialize', ['users','page','active_member_count']);
        $this -> render('recent');
    }
    
    
    public function recent() {
        $this->set('title', 'Recently Registered Users');
        $conditions = [
            'Users.status' =>'P',
            'Users.type'=>'member',
        ];
        $users = $this->filterUser($conditions);
        // pr($users);
        $page = 'recent';
        $this->set(compact('users','page'));
        $this->set('_serialize', ['users','page']);
        // $this -> render('recent');
        // echo 'kkkk';
    }

    public function rep() {
        $this->set('title', 'Rep Members');

        $conditions = [
            'Users.status IN' => ['I','A','P'],
            'Users.rep_member'=>'y',
        ];
        $users = $this->filterUser($conditions);
       // pr($users);die;
        $page = 'rep';
        $this->set(compact('users','page'));
        $this->set('_serialize', ['users','page']);
        $this -> render('recent');
    }

    public function admin() {
        $this->set('title', 'View/Manage Admins');

        $conditions = [
            'Users.type IN'=>['admin','superadmin'],
            'Users.status <>'=>'D',
        ];
        $users = $this->filterUser($conditions);
        
        $page = 'admin';
        $this->set(compact('users','page'));
        $this->set('_serialize', ['users','page']);
        $this -> render('recent');
    }
    
    
    /**
    * View method
    *
    * @param string|null $id User id.
    * @return \Cake\Network\Response|null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null) {
        $user = $this->Users->get($id, [
        'contain' => ['Companies']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        //        if($this->request->is('Ajax')) //Ajax Detection
        //        {
        //            echo json_encode($user);
        //            die;
        //        }
    }
    
    /**
    * Add method
    *
    * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add() 
    { 
	    $user = $this->Users->newEntity();

	    $type = $this->request->query('type')
	        ? $this->request->query('type')
	        : 'member';

	    if ($type == 'admin' && $this->loggedUser->type != 'superadmin') {
	        $type = 'member';
	    }


        if ($this->request->is('post')) {
            
            

            // Check existing email
            $userdata = $this->Users->findByEmail($this->request->data['email'])->first();

            if(empty($userdata)){

                //auto activate if the user is admin/supeadmin
                if (!empty($this->request->data['rep_member'])) {

                    $this->request->data['rep_member']='y';
                    $this->request->data['type']='';

                } elseif(empty($this->request->data['type'])){

                	$this->request->data['type']='member';

                }

                if (!empty($this->request->data['type']) && ($this->request->data['type']=='admin' || $this->request->data['type']=='superadmin')) {

                    $this->request->data['status']='A';

                } else {

                    $this->request->data['status']='P';
                }
                                      
                $company = null;

				if (!empty($this->request->data['company_id'])) {

				    $company = $this->Users->Companies->find()
				        ->where([
				            'id' => $this->request->data['company_id']
				        ])
				        ->first();
				}

                // pr($this->request->data);die;
                $user = $this->Users->patchEntity($user, $this->request->data);
                
                if ($row = $this->Users->save($user)) {

                    //$row->name = $row->first_name.$row->last_name.$row->id;
                    //$row->company_name = $company->name ?? null;

                    // $this->Users->save($row);
                    
					$this->Users->updateAll(
					    [
					        'name' => $row->first_name.$row->last_name.$row->id,
					        'company_name' => $company->name ?? null
					    ],
					    [
					        'id' => $row->id
					    ]
					);                      

                    $this->Flash->success(
                    	__('The user has been saved. Add another one using the form below.')
                    );

                    return $this->redirect(['action' => 'add']);
                }

                $this->Flash->error(
                	__('The user could not be saved. Please, try again.')
                );

            } else {

                $this->Flash->error(
                	__('An account exists with the Email Address: '.$this->request->data['email'])
                );

            }
            
        }

	    $companies = $this->Users->Companies->find(
	        'list',
	        [
	            'order' => ['name' => 'ASC']
	        ]
	    );

	    $this->set(compact('user', 'companies', 'type'));

	    $this->set('_serialize', ['user', 'type']);

    }
    
    /**
    * Edit method
    *
    * @param string|null $id User id.
    * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null) {



        $user = $this->Users->get($id, [
        'contain' => []
        ]);

        $type = $this->request->query('type')?$this->request->query('type'):'member';

        if($type=='admin' && $this->loggedUser->type!='superadmin'){
            $type = 'member';
        }

        if ($this->request->is(['patch', 'post', 'put'])) {


            if (empty($this->request->data['User']['password']))

                $this->Users->validator()->remove('password');
            
            $user = $this->Users->patchEntity($user, $this->request->data);

            $row = $this->Users->save($user);

            if ($row) {

                $company = null;

				if (!empty($this->request->data['company_id'])) {

				    $company = $this->Users->Companies->find()
				        ->where([
				            'id' => $this->request->data['company_id']
				        ])
				        ->first();
				}

				$this->Users->updateAll(
				    [
				        'company_name' => $company->name ?? null
				    ],
				    [
				        'id' => $row->id
				    ]
				); 				            	

                $this->Flash->success(__('The user has been updated.'));

                return $this->redirect(['action' => 'edit/' . $user->id]);

            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $companies = $this->Users->Companies->find('list', [
            'order' => [
                'Companies.name' => 'asc'
            ]
        ]);

        $this->set(compact('user', 'companies','type'));
        $this->set('_serialize', ['user','type']);

    }
    
    /**
    * Delete method
    *
    * @param string|null $id User id.
    * @return \Cake\Network\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null) {
        
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        
        if ($this->Users->delete($user)) {
            $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> User has been <b>DELETED</b>');
            echo json_encode(['status'=>true,'message'=>'The user has been deleted.']);
        } else {
            echo json_encode(['status'=>true,'message'=>'An error Occured. Try again latter!']);
        }
        // if ($this->Users->delete($user)) {
        //     $this->Flash->success(__('The user has been deleted.'));
        //     echo json_encode(['status'=>true,'message'=>'The user deleted Successfully.']);
        // } else {
        //     $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        //     echo json_encode(['status'=>true,'message'=>'The user could not be deleted. Please, try again.']);
        // }
        // echo '1';
        // return $this->redirect(['action' => 'index']);
    }
    
public function login(): void
{
    $this->set('title', 'Login');

    // If already logged in, redirect
    $userId = $this->request->getSession()->read('Auth.User.id');
    if ($userId) {
        $user = $this->fetchTable('Users')->get($userId);
        if (in_array($user->type, ['admin', 'superadmin'])) {
            $this->redirect(['controller' => 'Users', 'action' => 'recent']);
            return;
        } else {
            $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
            return;
        }
    }

    // Handle form submission
    if ($this->request->is('post')) {
        $email    = $this->request->getData('email');
        $password = $this->request->getData('password');

        $usersTable = $this->fetchTable('Users');

        // Find user by email
        $user = $usersTable->find()
            ->where(['Users.email' => $email])
            ->first();

        if (!$user) {
            $this->Flash->error('Invalid email or password.');
            return;
        }

        // Check password
        if (!(new \Cake\Auth\DefaultPasswordHasher())->check($password, $user->password)) {
            $this->Flash->error('Invalid email or password.');
            return;
        }

        // Check if account is active
        if ($user->status !== 'A') {
            $this->Flash->error('Your account is not active. Please contact admin.');
            return;
        }

        // Update last login
        $user->last_login = new \DateTime();
        $usersTable->save($user);

        // Write session
        $this->request->getSession()->write('Auth.User', [
            'id'    => $user->id,
            'email' => $user->email,
            'type'  => $user->type,
        ]);

        // Redirect based on user type
        if (in_array($user->type, ['admin', 'superadmin'])) {
            $this->redirect(['controller' => 'Users', 'action' => 'recent']);
        } else {
            $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
    }
}
    
    public function logout() {
        $this->Flash->success('You are logged Out');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
    
    public function register() {

        $this->set('title', 'Register');

        if ($this->loggedUser['type'] == 'admin' || $this->loggedUser['type'] == 'superadmin') {

            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }

            return $this->redirect(['controller' => 'users', 'action' => 'recent']);

        } 
        else if($this->loggedUser['type'] == 'member') {


            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->redirect(['controller' => 'dashboard']);
        }


        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=6LcDIxYUAAAAAOWLg3nXC1CTUS64v5IIIfiy2fpi&response=" . $this->request->data['g-recaptcha-response']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

            // in real life you should use something like:
            // curl_setopt($ch, CURLOPT_POSTFIELDS,
            //          http_build_query(array('postvar1' => 'value1')));
            // receive server response ...

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);

            if (curl_error($ch)) {
                echo 'CURL error:' . curl_error($ch);
            }

            curl_close($ch);
            $server_output = json_decode($server_output);

            if (!$server_output->success) {
                $this->Flash->error('The Captcha Verification code could not be Verified. Please try again.');
            } 
            else {

                $user = $this->Users->patchEntity($user, $this->request->data);
                $user['status'] = 'P';
                
                $user['password'] = rand(100000000, 999999999);
                $user['pwd'] = $user['password'];
                $user['type']="member";

                if ($row = $this->Users->save($user)) {

	                $company = null;

					if (!empty($this->request->data['company_id'])) {

					    $company = $this->Users->Companies->find()
					        ->where([
					            'id' => $this->request->data['company_id']
					        ])
					        ->first();
					}

					$this->Users->updateAll(
					    [
					        'name' => $row->first_name.$row->last_name.$row->id,
					        'company_name' => $company->name ?? null
					    ],
					    [
					        'id' => $row->id
					    ]
					);                   	
                    
                    $myMailer = (new MyMailer())->welcome($user);
                    
                    $row->name = $row->first_name.$row->last_name.$row->id;
                    
                    $this->Users->save($row);
                    $this->Flash->success('You are successfully Registered. You can login once your Account is approved by our Admins.');
                    return $this->redirect(['action' => 'login']);
                } 
                else {
                    $this->Flash->error('You are not registered');
                }
            }
            
           
        }

        $this->set('_serialize', ['user']);
        $companies = $this->Users->Companies->find('list', ['order' => ['name' => 'asc']]);
        $this->set(compact('user', 'companies'));
    }
    
    public function forgotPassword() {
        if ($this->loggedUser['type'] == 'admin' || $this->loggedUser['type'] == 'superadmin') {
            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->redirect(['controller' => 'users', 'action' => 'recent']);
        } else if($this->loggedUser['type'] == 'member') {
            // pr($this->Auth->redirectUrl());die;
            // pr($this->request->query['redirect']);
            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->redirect(['controller' => 'dashboard']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(empty($this->request->data['forgot_email'])){
                $this->Flash->error('Your account is not found in our system. Please check to make sure your email is correct. If you have any concerns, please <a href="/hide/newdesign4/contact-us">Contact Us</a>.');
                return $this->redirect(['action' => 'forgotPassword']);
            }
            $email = $this->request->data['forgot_email'];
            
            $user = $this->Users->findByEmail($email)->first();
            //pr($user);
            if (!empty($user)) {
                if($user->status!='A'){
                    $this->Flash->error('Your account is in the system. However, it is currently INACTIVE. If you have any concerns, please <a href="/hide/newdesign4/contact-us">Contact Us</a>.');
                    return $this->redirect(['action' => 'forgotPassword']);
                }
                $confirmation_code = ['confirmation_code' => md5(time() . rand(100000, 999999))];
                $link = Router::url(["controller" => "Users", "action" => "resetPassword/" . $confirmation_code['confirmation_code']], true);
                $user = $this->Users->patchEntity($user, $confirmation_code);
                
               // pr($link);
                if ($this->Users->save($user)) {
                    $user->link = $link;
                    // $this->getMailer('My')->send('resetPassword', [$user]);
                    $myMailer = (new MyMailer())->resetPassword($user);
                    $this->Flash->success(__('The details of your account have been sent to your email.'));
                    return $this->redirect(['action' => 'forgotPassword']);
                }
            } else {
                $this->Flash->error('Your account is not found in our system. Please check to make sure your email is correct. If you have any concerns, please <a href="/hide/newdesign4/contact-us">Contact Us</a>.');
                return $this->redirect(['action' => 'forgotPassword']);
            }
        }
    }
    
    function resetPassword($confirmationCode) {
        $this->set('title', 'Reset Password');
        if ($this->loggedUser['type'] == 'admin' || $this->loggedUser['type'] == 'superadmin') {
            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->redirect(['controller' => 'users', 'action' => 'recent']);
        } else if($this->loggedUser['type'] == 'member') {
            // pr($this->Auth->redirectUrl());die;
            // pr($this->request->query['redirect']);
            if(!empty($this->Auth->redirectUrl()) && $this->Auth->redirectUrl()!='/'){
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->redirect(['controller' => 'dashboard']);
        }
        $user = $this->Users->findByConfirmationCode($confirmationCode)->first();
        if ($user) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $password = $this->request->data['password'];
                $user = $this->Users->patchEntity($user, ['password' => $password, 'confirmation_code' => '']);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password is Successfully Reset. You can login Now!'));
                    return $this->redirect(['action' => 'login']);
                }
            }
        } else {
            $this->Flash->error(__('Page you tried to Visit could not be Found!'));
            return $this->redirect(['action' => 'login']);
        }
    }
    
    /**
    * Edit method
    *
    * @param string|null $id User id.
    * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function profile($id = null) {
        $this->set('title', 'My Account');
        //        if($this->request->is('Ajax')) //Ajax Detection
        //        {
        //            $this->autoRender = false; // Set Render False
        if(!$id){
            $id = $this->request->session()->read('Auth.User.id');
        }
        $user = $this->Users->get($id, [
        'contain' => []
        ]);
        //
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if (empty($this->request->data['password'])){
                $this->Users->validator()->remove('password');
                unset($this->request->data['password']);
            } else if($this->request->data['password']!=$this->request->data['rpassword']){
                $this->Flash->error(__('New Passwords don\'t match'));
                return $this->redirect(['action' => 'profile']);
            }
            if($this->request->data['avatar']['error']==0 && !empty($this->request->data['avatar']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = time().rand().'.jpg';
                move_uploaded_file($this->request->data['avatar']['tmp_name'], WWW_ROOT.'uploads'.DS.'profile-img'.DS.$filename);
                $this->request->data['avatar'] = $filename;
            } else {
                unset($this->request->data['avatar']);
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                //      if($this->request->is('Ajax')){
                //          echo json_encode(['success'=>true]);
                //          exit(0);
                //      } else {
                $this->Flash->success(__('The Profile has been updated.'));
                //      $this->getMailer('My')->send('welcome', [$user]);
                return $this->redirect(['action' => 'profile']);
                //      }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        $this->paginate = [
        // 'contain' => ['Companies'],
        'conditions' => [
        'Users.company_id' => $this->request->session()->read('Auth.User.company_id'),
        'Users.id <>' => $this->request->session()->read('Auth.User.id'),
        'Users.status' => 'A'
        ]
        ];
        $colleagues = $this->paginate($this->Users);
        
        //pr($colleagues);
        
        
        
        
        $companies = $this->Users->Companies->find('list', ['order' => ['name' => 'ASC']]);
        $this->set(compact('user', 'companies','colleagues'));
        $this->set('_serialize', ['user','colleagues']);
        //        }
    }
    
    public function status($uid=0,$status=null){
        // die('lll');
        $this->autoRender = false;
        // $this->viewBuilder()->setLayout(false);
        if(!is_numeric($uid) || $uid <=0 || empty($status)){
            echo json_encode(['status'=>false,'message'=>'An Error Occured']);
        } else {
            $user = $this->Users->get($uid);
            $user = $this->Users->patchEntity($user, ['status'=>$status]);
            if ($this->Users->save($user)) {
                if($status=='A')
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Member has been <b>ACTIVATED</b> and moved to the Members table.');
                else
                    $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Member has been <b>DEACTIVATED</b>');
                
                echo json_encode(['status'=>true,'message'=>'The user status has been updated.']);
            } else {
                echo json_encode(['status'=>true,'message'=>'An error Occured. Try again latter!']);
            }
            
            
        }
        die;
    }
    
    public function message($id = null) {
        // $this->request->allowMethod(['post']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($id);
            // pr($user);die;
            if ($user->email) {
                $user->message = $this->request->data['message'];
                $user->subject = $this->request->data['subject'];
                if($_SERVER['HTTP_HOST']!='localhost'){
                    // $this->getMailer('My')->send('blank', [$user]);
                    $myMailer = (new MyMailer())->blank($user);
                }
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Message sent to the user!');
                return $this->redirect(['action' => 'message/'.$id]);
            } else {
                $this->Flash->error(['status'=>true,'message'=>'An error Occured. Try again latter!']);
            }
        }
    }

    public function sendInfo($id = null){
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            $user = $this->Users->get($id);
            
            if ($user->email) {
                $password = rand(100000000, 999999999);
                $user->password = $password;
                $user->pwd = $password;
                $user->status = 'A';
                if ($row = $this->Users->save($user)) {
                    // pr($user);die;
                    if($_SERVER['HTTP_HOST']!='localhost'){
                        // $this->getMailer('My')->send('sendInfo', [$user]);
                        $myMailer = (new MyMailer())->sendInfo($user);
                    }
                    $this->Flash->success('Account Activated and New password Generated and Emailed to the User.');
                    return $this->redirect(['action' => 'edit/'.$id]);
                } else {
                    $this->Flash->error('You are not registered');
                }
                //$user->password = $password;
                
                // $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> A New password was generated and sent to the user!');
                // return $this->redirect(['action' => 'edit/'.$id]);
            } else {
                $this->Flash->error(['status'=>true,'message'=>'An error Occured. Try again latter!']);
            }
        }
    }

    public function bulkAction(){
        if ($this->request->is(['post'])) {
            // pr($this->request);die;
            $refer_url = $this->referer('/', true);
            // die;
            $action = $this->request->data['group_action'];
            $uids = $this->request->data['uids'];
            // $users = TableRegistry::get('Users');
            $query = $this->Users->query();
            // $query = $users->query();
            if($action=='D' || $action=='A' || $action=='I'){
                $query->update()
                ->set(['status' => $action])
                ->where(['id IN' => $uids])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            } else {
                $this->Flash->error('<i class="fa fa-thumbs-o-down"></i> An error Occured. Try again Later!');
            }
            return $this->redirect($refer_url);
        }
    }

    public function exportCsv($type)
    {
        if ($type == 'index') {
            $users = $this->Users->find('all', [
                'conditions' => [
                    'Users.status' => 'A',
                    'Users.rep_member <>' => 'y',
                    'Users.type' => 'member'
                ],
                'order' => [
                    'Users.first_name' => 'ASC',
                    'Users.last_name' => 'ASC'
                ]
            ]);
        } elseif ($type == 'rep') {
            $users = $this->Users->find('all', [
                'conditions' => [
                    'Users.status' => 'A',
                    'Users.rep_member' => 'y',
                ],
                'order' => [
                    'Users.first_name' => 'ASC',
                    'Users.last_name' => 'ASC'
                ]
            ]);
        }

        $this->autoRender = false;

        // $filename = $type . '-userdata-' . date('Y-m-d-H-i-s') . '.csv';
        $filename = $type.'-userdata-'.date('Y-m-d-H-i-s').'.xls';
        $now = gmdate("D, d M Y H:i:s");

        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename={$filename}");
        header("Content-Transfer-Encoding: binary");

        if ($users->count() == 0) {
            return;
        }

        $df = fopen("php://output", 'w');

        fputcsv($df, ['List of Members -', date('d-m-Y')]);
        fputcsv($df, []);
        fputcsv($df, [
            'First Name',
            'Last Name',
            'Job Title',
            'Address',
            'Contact No',
            'FAX',
            'Email',
            'User Name',
            'Status',
            'Registration Date'
        ]);

        foreach ($users as $row) {
            fputcsv($df, [
                $row->first_name,
                $row->last_name,
                $row->job_title,
                $row->address,
                $row->tel,
                $row->fax,
                $row->email,
                $row->name,
                ($row->status == 'A') ? 'Active' : $row->status,
                date('D d/m/y', strtotime($row->created))
            ]);
        }

        fclose($df);
        exit;
    }
    
    
    /*
        function exportCsv($type){

        if($type=='index'){
            $users = $this->Users->find('all',[
                'contain' => ['Companies'],
                'conditions' =>[
                    'Users.status' =>'A',
                    'Users.rep_member <>'=>'y',
                    'Users.type'=>'member'
                ],
                'order' => [
                    'Users.first_name' => 'asc',
                    'Users.last_name' => 'asc'
                ]
            ]);
        } else if ($type=='rep'){
            $users = $this->Users->find('all',[
                'contain' => ['Companies'],
                
                'conditions' =>[
                    'Users.status' =>'A',
                    'Users.rep_member'=>'y',
                ],
                'order' => [
                    'Users.first_name' => 'asc',
                    'Users.last_name' => 'asc'
                ]
            ]);
        }
        $this->autoRender = false;
        $filename=$type.'-userdata-'.date('Y-m-d-H-i-s').'.xls';
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download  
        header("Content-Type: application/x-msexcel; charset=utf-8");
        // header("Content-Type: application/force-download");
        // header("Content-Type: application/octet-stream");
        // header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Transfer-Encoding: binary");

        if (count($users) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');

        // pr($users);
        // fputcsv($df, array('name','first_name','last_name','email','tel','address','company','job_title','billing_entity','created','fax'));
        fputcsv($df, array(''));
        fputcsv($df, array('List of Members -',date('d-m-Y')), "\t");
        fputcsv($df, array(''), "\t");
        fputcsv($df, array('First Name','Last Name','Job Title','Company','Address','Contact No','FAX','Email','User Name','Billing Entity','Status', 'Registration Date'), "\t");
        foreach ($users as $row) {
            // pr($row);die;
            fputcsv($df, 
                array(
                    $row->first_name,
                    $row->last_name,
                    $row->job_title,
                    $row->company->name,
                    $row->address,
                    $row->tel,
                    $row->fax,
                    $row->email,
                    $row->name,
                    $row->company->billing_entity,
                    ($row->status=='A')?'Active':$row->status,
					date('D d/m/y',strtotime($row->created)),
                ),"\t");
        }
        fclose($df);
        die();
    }    
    */

    function bulkEmail($page){
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            // pr($this->request->data);
            $count = 0;
            // pr($this->request->session()->read('Auth.User.email'));
            // die;
            $data = $this->request->data;
            if($data['recipients']=='members'){
                $conditions = [
                    'Users.status' =>'A',
                    'Users.type'=>'member'
                ];
                if(!empty($data['mem_type']) && $data['mem_type']!='All'){
                    $conditions['Companies.mem_type'] = $data['mem_type'];
                }
                if($page=='rep'){
                    $conditions['Users.rep_member'] ='y';
                } else {
                    $conditions['Users.rep_member <>'] ='y';
                }
                $users = $this->Users->find('all',[
                    'contain' => ['Companies'],
                    'conditions' => $conditions,
                    'order' => [
                        'Users.first_name' => 'asc',
                        'Users.last_name' => 'asc'
                    ]
                ]);

                foreach($users as $row){
                    $count++;
                    // echo $row->email.'<br/>';
                    
                    $row->message = 'Originally will be sent to: '.$row->email.'<this message will be removed when made live><br/><br/>'.$data['message'];
                    $row->subject = $data['subject'];
                    //$row->email = $this->request->session()->read('Auth.User.email');//remove then making live
                     $row->email = 'ineekweb@live.co.uk';
                    if(isset($data['cc_yourself']) && $data['cc_yourself'] == 'yes'){
                        // $row->cc = $this->request->session()->read('Auth.User.email'); //uncomment when making live
                        $row->cc = 'ineekweb@live.co.uk';//remove then making live
                    }
                    $row->from_email = $data['from_email'];

                    if($_SERVER['HTTP_HOST']!='localhost'){
                        // $this->getMailer('My')->send('bulkEmail', [$row]);
                        $myMailer = (new MyMailer())->bulkEmail($row);
                    }
                }
            } else {
                $count = 1;
                $mailData = (object) ['message'=>$data['message'],'subject'=>$data['message']];
                    // $mailData->message = $data['message'];
                    // $mailData->subject = $data['subject'];
                    
                   // $mailData->email = $this->request->session()->read('Auth.User.email');
                     $mailData->email = 'ineekweb@live.co.uk';

                    $mailData->from_email = $data['from_email'];
                    if(isset($data['cc_yourself']) && $data['cc_yourself'] == 'yes'){
                        //$mailData->cc = '';
                         $mailData->cc = $this->request->session()->read('Auth.User.email');
                    }
                if($_SERVER['HTTP_HOST']!='localhost'){
                    // $this->getMailer('My')->send('bulkEmail', [$mailData]);
                    $myMailer = (new MyMailer())->bulkEmail($mailData);
                }
            }
             $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> '.$count.' Messages sent to the users!');
                return $this->redirect(['action' => $page]);
           
            // $user = $this->Users->get($id);
            // // pr($user);die;
            // if ($user->email) {
            //     $user->message = $this->request->data['message'];
            //     $user->subject = $this->request->data['subject'];
            //     if($_SERVER['HTTP_HOST']!='localhost'){
            //         $this->getMailer('My')->send('blank', [$user]);
            //     }
            //     $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Message sent to the user!');
            //     return $this->redirect(['action' => 'message/'.$id]);
            // } else {
            //     $this->Flash->error(['status'=>true,'message'=>'An error Occured. Try again latter!']);
            // }
        }
    }
}