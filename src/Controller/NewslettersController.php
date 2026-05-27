<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use App\Mailer\MyMailer;
/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\NewslettersTable $Newsletters
 */
class NewslettersController extends AppController
{

     use MailerAwareTrait;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Newsletters');
        $latest = $this->Newsletters->find('all',[
            'conditions'=>[
                'status <>'=>'D'
            ],
            'order' => [
                'Newsletters.date' => 'desc'
            ]
        ])->first();
        
        $this->paginate = [
            'conditions' => [
                'Newsletters.id <>' => $latest->id
            ],
            'order' => [
                'Newsletters.date' => 'desc'
            ]
        ];
        $newsletters = $this->paginate($this->Newsletters);
        
//        pr($newsletters);
        
        $this->set(compact('newsletters'));
        $this->set(compact('latest'));
        $this->set('_serialize', ['newsletters']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function admin()
    {
        $this->set('title', 'View/Manage Newsletters');
        $newsletter = $this->Newsletters->newEntity();
        $this->paginate = [
            'conditions'=>[
                'status <>'=>'D'
            ],
            'order' => [
                'Newsletters.date' => 'desc'
            ]
        ];
        $newsletters = $this->paginate($this->Newsletters);
        
//        pr($newsletters);
        
        $this->set(compact('newsletters','newsletter'));
        $this->set('_serialize', ['newsletters','newsletter']);
    }

    /**
     * View method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => []
        ]);

        $this->set('newsletter', $newsletter);
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is(['post','put'])) {
            if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'newsletters'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                }
                move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                $this->request->data['file'] = $filename;
            }
            $this->request->data['date'] = date('Y-m-d');
              if(!empty($this->request->data['sendto'])) {
                   if($this->request->data['sendto']=="none"){
                       $companies=array();
                       
                   }
                   if($this->request->data['sendto']=="all member"){
                       $user = $this->Users->find()->order(['id' => 'ASC']);
                       foreach($user as $use){
                    $data=array();
                   $data['email']=$use->email;
                   //$data['email']='salman.tariq63111@gmail.com';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }
                   
                       
                       
                       
                       
                   }elseif($this->request->data['sendto']=="all reps"){
                   $user = $this->Users->find()->where([
                'rep_member' => 'y'
            ])->order(['id' => 'ASC']);
                      foreach($user as $use){
                    $data=array();
                   $data['email']=$use->email;
                   //$data['email']='salman.tariq63111@gmail.com';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }
                
                       
                   }elseif($this->request->data['sendto']=="full member"){
                    $companies=  $this->Companies->find()
                ->where([
                'mem_type' => 'Full'
            ]);
                
                       
                   }elseif($this->request->data['sendto']=="associated member"){
                       $companies=  $this->Companies->find('')
                ->where([
                'mem_type' => 'Associated'
            ]);
                       
                   }elseif($this->request->data['sendto']=="emember"){
                     $companies=  $this->Companies->find('')
                ->where([
                'mem_type' => 'e-Member'
            ]);  
                       
                   }
                   if(!empty($companies)){
                 foreach($companies as $company){ 
                     
                 if(strpos($company->repuser, ',') !== false){
                     $reps=explode(",",$company->repuser);
                     //pr($reps);die;
                     
                        //pr($rep);die; 
                        $user = $this->Users->find()
                ->where([
                'Users.company_id' => $company->id
            ]); 
                        //pr($user);die;
                    if($user->count()){    
                     foreach($user as $use){
                    $data=array();
                  $data['email']=$use->email;
                   //$data['email']='salman.tariq63111@gmail.com';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                  // pr($use);die;
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }   
                    }   
                        
                         
                   
                     
                     
                 }else{
                     
                    $user = $this->Users->find()
                ->where([
                'Users.id' => $company->repuser
            ]);  
                    //pr($user);die;
                    if($user->count()){
                   foreach($user as $use){
                       
                    $data=array();
                  $data['email']=$use->email;
                  // $data['email']='salman.tariq63111@gmail.com';
                   $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['company_id'] = $use->company_id;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   //pr($use);die;
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }   
                    } 
                 }
                 } 
              }
               }
                
               if(!empty($this->request->data['cc_to_yourself'])) {
                   
                    $user = $this->Users->find()
                ->where([
                'Users.id' => $this->request->session()->read('Auth.User.id')
            ])
            ->first();
                     
                  // pr($companies);die; 
                     $data=array();
                     foreach($companies as $company){
                         $data['company_name']=$company->name;
                     }
                  // pr($user);die;   
                   $data=array();
                   $data['email']=$user->email;
                   //$data['email']='salman.tariq63111@gmail.com';
                   $data['first_name'] = $user->first_name;
                   $data['last_name'] = $user->last_name;
                   $data['company_id'] = $user->company_id;
                   $data['user_name'] = $user->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
               }
            
            
            
            
            
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));

                return $this->redirect(['action' => 'admin']);
            }
            //pr($newsletter);die;
            $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Companies');
        $companies=$this->Companies->newEntity();
        $newsletter = $this->Newsletters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'newsletters'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                }
                move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                if(!empty($newsletter->file)){
                    @unlink(WWW_ROOT.'uploads/newsletters/'.$newsletter->file);//delete current file
                }
                $this->request->data['file'] = $filename;
            } else{
                unset($this->request->data['file']);
            }
            
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $user = $this->Users->find()
                ->where([
                'Users.id' => $this->request->session()->read('Auth.User.id')
            ])
            ->first();
                if(!empty($this->request->data['sendto'])) {
                   if($this->request->data['sendto']=="none"){
                       $companies=array();
                       
                   }
                   if($this->request->data['sendto']=="all member"){
                       $user = $this->Users->find()->order(['id' => 'ASC']);
                       foreach($user as $use){
                    $data=array();
                   $data['email']=$use->email;
                   //$data['email']='ineekweb@live.co.uk';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }
                   
                       
                       
                       
                       
                   }elseif($this->request->data['sendto']=="all reps"){
                   $companies=  $this->Companies->find()->order(['id' => 'ASC']);
                
                       
                   }elseif($this->request->data['sendto']=="full member"){
                    $companies=  $this->Companies->find()
                ->where([
                'mem_type' => 'Full'
            ]);
                
                       
                   }elseif($this->request->data['sendto']=="associated member"){
                       $companies=  $this->Companies->find('')
                ->where([
                'mem_type' => 'Associated'
            ]);
                       
                   }elseif($this->request->data['sendto']=="emember"){
                     $companies=  $this->Companies->find('')
                ->where([
                'mem_type' => 'e-Member'
            ]);  
                       
                   }
                   if(!empty($companies)){
                 foreach($companies as $company){ 
                     
                 if(strpos($company->repuser, ',') !== false){
                     $reps=explode(",",$company->repuser);
                     //pr($reps);die;
                     foreach($reps as $rep){
                        //pr($rep);die; 
                        $user = $this->Users->find()
                ->where([
                'Users.id' => $rep
            ]); 
                        //pr($user);die;
                    if($user->count()){    
                     foreach($user as $use){
                    $data=array();
                 $data['email']=$use->email;
                  // $data['email']='ineekweb@live.co.uk';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                  // pr($use);die;
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }   
                    }   
                        
                         
                     }
                     
                     
                 }else{
                     
                    $user = $this->Users->find()
                ->where([
                'Users.id' => $company->repuser
            ]);  
                    //pr($user);die;
                    if($user->count()){
                   foreach($user as $use){
                       
                    $data=array();
                  $data['email']=$use->email;
                   //$data['email']='ineekweb@live.co.uk';
                   $data['company_id'] = $use->company_id;
                    $data['first_name'] = $use->first_name;
                   $data['last_name'] = $use->last_name;
                   $data['user_name'] = $use->name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   //pr($use);die;
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
                   }   
                    } 
                 }
                 }
                   }
               }
                
               if(!empty($this->request->data['cc_to_yourself'])) {
                   
                    $user = $this->Users->find()
                ->where([
                'Users.id' => $this->request->session()->read('Auth.User.id')
            ])
            ->first();
               
                  // pr($companies);die; 
                     $data=array();
                     foreach($companies as $company){
                         $data['company_name']=$company->name;
                     }
                   //pr($user);die;   
                   $data=array();
                   $data['email']=$user->email;
                   //$data['email']='ineekweb@live.co.uk';
                   $data['company_id'] = $user->company_id;
                   $data['first_name'] = $user->first_name;
                   $data['last_name'] = $user->last_name;
                   $data['title'] = $this->request->data['title'];
                   $data['message'] = $this->request->data['text'];
                   
                   
                $myMailer = (new MyMailer())->newsletter_self($data);
               }
                
                $this->Flash->success(__('The newsletter has been saved.'));

                return $this->redirect(['action' => 'edit/'.$id]);
            }
            $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Newsletters->get($id);
       
        if ($this->Newsletters->delete($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Newsletter has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function deleteFile($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Newsletters->get($id);
        $file = $item->file;
        unlink(WWW_ROOT.'uploads/newsletters/'.$file);
        $item = $this->Newsletters->patchEntity($item,['file'=>'']);
        if ($this->Newsletters->save($item)) {
            $this->Flash->success(__('The newsletter file has been deleted.'));
            //echo json_encode(['status'=>true,'message'=>'The ad file has been deleted.','replace-content':true]);
        } else { 
            $this->Flash->error(__('The newsletter file could not be deleted. Please, try again.'));
            //echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        return $this->redirect(['action' => 'edit/'.$id]);
    }

    public function bulkAction(){
        $this->autoRender = false;
        if ($this->request->is('post')) {
            // pr($this->request->data);die;
            $refer_url = $this->referer('/', true);
            // die;
            $action = $this->request->data['group_action'];
            $selected_items = $this->request->data['selected_items'];
            // $users = TableRegistry::get('Users');
            $query = $this->Newsletters->query();
            // $query = $users->query();
            if($action=='D'){
                $query->update()
                ->set(['status' => $action])
                ->where(['id IN' => $selected_items])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            } else {
                $this->Flash->error('<i class="fa fa-thumbs-o-down"></i> An error Occured. Try again Later!');
            }
            return $this->redirect(['action'=>'admin',"#" => "portlet_tab1"]);
        }
    }
}
