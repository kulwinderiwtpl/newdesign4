<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SubscriptionInvoice Controller
 *
 * @property \App\Model\Table\SubscriptionInvoiceTable $SubscriptionInvoice
 */
class SubscriptionInvoiceController extends AppController
{

    private function filterResults($conditions){
        // $this->autoRender = false;
        $or_conditions = ['OR'=>[]];
        if(!empty($this->request->query('search'))){
            $q = $this->request->query('search');
            $or_conditions['OR']['SubscriptionInvoice.company_name LIKE'] =  $q.'%';
        }
        $conditions = array_merge($conditions, $or_conditions);
        // pr($conditions);die;
        // $users = $this->Users->find('all',[
        // 'contain' => ['Companies'],
        // 'conditions' =>$conditions,
        // // 'limit' => $this->queryPage
        // ]);
        
        $this->paginate = [
            'contain' => ['Companies'],
            'conditions' =>$conditions,
            'limit' => $this->queryPage,
            'order' => ['Companies.name'=>'asc']
        ];
        $users = $this->paginate($this->SubscriptionInvoice);
        return $users;
    }

    public function index() {
        $this->set('title', 'Subscriptions');
        // echo $this->queryPage;
        
        $filter_year = date('Y');
        if(!empty($this->request->query('year'))){
            $filter_year = $this->request->query('year');
        }
         $conditions = [
            'SubscriptionInvoice.status' =>'A',
            'SubscriptionInvoice.subscription_year' =>  $filter_year
        ];
        $subscriptionInvoice = $this->filterResults($conditions);
        // $count = $users->count();
        $rowcount = $this->SubscriptionInvoice->find('all', array('contain' => ['Companies'],'conditions'=>$conditions));
        // echo $rowcount;
        $active_member_count = $rowcount->count();
        $page = 'index';
        $this->set(compact('subscriptionInvoice','page','active_member_count','filter_year'));
        $this->set('_serialize', ['subscriptionInvoice','page','active_member_count','filter_year']);
        // $this -> render('recent');
    }

    public function pdf($id=null) {
        $condition = [
        'SubscriptionInvoice.id' => $id
        ];
        if($this->loggedUser['type']!='admin' && $this->loggedUser['type']!='superadmin'){
            $condition['OR'] = [
            // 'SubscriptionInvoice.added_by' => $this->request->session()->read('Auth.User.id'), //1258
            // 'SubscriptionInvoice.user_id' => $this->request->session()->read('Auth.User.id') //1258
            ];
        }
        $invoiceDetail = $this->SubscriptionInvoice->get($id, [
            'contain' => ['Companies'],
            'conditions' => $condition
        ]);
        
        $this->loadModel('RsvpSettings');
        $rsvp_settings = $this->RsvpSettings->find()->first();
        $type = 'pdf';
        // pr($invoiceDetail);die;

        $this->set(compact('invoiceDetail', 'rsvp_settings','type'));
        $this->set('_serialize', ['invoiceDetail','rsvp_settings','type']);
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
            $query = $this->SubscriptionInvoice->query();
            // $query = $users->query();
            if($action=='D'){
                $query->update()
                ->set(['status' => $action])
                ->where(['id IN' => $selected_items])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            } else if($action=='paid'){
                $query->update()
                ->set(['payment_status' => $action])
                ->where(['id IN' => $selected_items])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            } else if($action=='unpaid'){
                $query->update()
                ->set(['payment_status' => $action])
                ->where(['id IN' => $selected_items])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            }
            else {
                $this->Flash->error('<i class="fa fa-thumbs-o-down"></i> An error Occured. Try again Later!');
            }
            return $this->redirect(['action'=>'index',"#" => "portlet_tab1"]);
        }
    }

    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->SubscriptionInvoice->get($id);
      
        if ($this->SubscriptionInvoice->delete($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Invoice has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function deleteInvByYear($year = null)
    {
        $this->autoRender = false;
        if(empty($year)){
            $this->Flash->error('Please select a year');
        } else {
            $query = $this->SubscriptionInvoice->query();
            $query->delete()
                ->where(['subscription_year' => $year])
                ->execute();
            $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> All the Subscription Invoices for the year '.$year.' has been deleted!');
        }
        return $this->redirect(['action'=>'index','?'=>['year'=>$year]]);
    }

    public function generateInvoices($year = 0, $amount = 125)
    {
        $this->autoRender = false;
        if(!$year){
            $year = date('Y');
        }
        if ($this->request->is('post')) {
            $year = $this->request->data['year'];
            $amount = $this->request->data['amount'];
            // pr($this->request->data);die;
        }

        if(empty($year) || empty($amount)){
            $this->Flash->error(__('Subscription Year and Amount are required'));
            return $this->redirect(['action' => 'index',"#" => "portlet_tab3"]);
        }

        // $this->request->allowMethod(['post']);
        $this->loadModel('Companies');
        $subscriptionInvoices = $this->Companies->find('all',[
            //'contain'=>['InvoiceDetails'],
            'join' => [
                    'alias' => 'SubscriptionInvoice',
                    'table' => 'subscription_invoice',
                    'type' => 'LEFT',
                    'conditions' => 'Companies.id = SubscriptionInvoice.company_id AND SubscriptionInvoice.subscription_year = '.$year.' AND SubscriptionInvoice.status <> \'D\''
            ],
            'conditions' => [
                // 'Compaines.status' => 'A',
                'SubscriptionInvoice.subscription_year IS' => NULL,
            ],
            'order' => ['Companies.name'=>'asc']
        ])->select(['Companies.name','Companies.address','Companies.mem_type','Companies.id','SubscriptionInvoice.id','SubscriptionInvoice.subscription_year'])->all();
        // pr($subscriptionInvoices);die;
        $insert = [];
        foreach($subscriptionInvoices as $item){
            $insert[] = [
                'date' => date('Y-m-d'),
                'subscription_year' => $year,
                'company_id' => $item->id,
                'company_name' => $item->name,
                'company_address' => $item->address,
                'subscription_type' => $item->mem_type,
                'subscription_amount' => $amount,
                'added_by' => $this->loggedUser['id']
                
            ];
        }
        // pr($insert);
        $subscriptionInvoice = $this->SubscriptionInvoice->newEntities($insert);
        $this->SubscriptionInvoice->saveMany($subscriptionInvoice);
        $this->Flash->success(__(count($insert).'   Subscription Invoices Generated for the year '.$year));
        return $this->redirect(['action' => 'index','?'=>['year'=>$year]]);
        // if ($this->request->is('post')) {
        //     $subscriptionInvoice = $this->SubscriptionInvoice->patchEntity($subscriptionInvoice, $this->request->data);
        //     if ($this->SubscriptionInvoice->save($subscriptionInvoice)) {
        //         $this->Flash->success(__('The subscription invoice has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The subscription invoice could not be saved. Please, try again.'));
        // }
        // pr($subscriptionInvoice);die;
        // $item = $this->SubscriptionInvoice->get($id);
        // $item = $this->SubscriptionInvoice->patchEntity($item,['status'=>'D']);
        // if ($this->SubscriptionInvoice->save($item)) {
        //     // $this->Flash->success(__('The ad has been deleted.'));
        //     echo json_encode(['status'=>true,'message'=>'The Invoice has been deleted.']);
        // } else { 
        //     // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
        //     echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        // }

        // return $this->redirect(['action' => 'index']);
    }



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Companies']
    //     ];
    //     $subscriptionInvoice = $this->paginate($this->SubscriptionInvoice);

    //     $this->set(compact('subscriptionInvoice'));
    //     $this->set('_serialize', ['subscriptionInvoice']);
    // }

    /**
     * View method
     *
     * @param string|null $id Subscription Invoice id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $subscriptionInvoice = $this->SubscriptionInvoice->get($id, [
    //         'contain' => ['Companies']
    //     ]);

    //     $this->set('subscriptionInvoice', $subscriptionInvoice);
    //     $this->set('_serialize', ['subscriptionInvoice']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $subscriptionInvoice = $this->SubscriptionInvoice->newEntity();
    //     if ($this->request->is('post')) {
    //         $subscriptionInvoice = $this->SubscriptionInvoice->patchEntity($subscriptionInvoice, $this->request->data);
    //         if ($this->SubscriptionInvoice->save($subscriptionInvoice)) {
    //             $this->Flash->success(__('The subscription invoice has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The subscription invoice could not be saved. Please, try again.'));
    //     }
    //     $companies = $this->SubscriptionInvoice->Companies->find('list', ['limit' => 200]);
    //     $this->set(compact('subscriptionInvoice', 'companies'));
    //     $this->set('_serialize', ['subscriptionInvoice']);
    // }

    /**
     * Edit method
     *
     * @param string|null $id Subscription Invoice id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $subscriptionInvoice = $this->SubscriptionInvoice->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $subscriptionInvoice = $this->SubscriptionInvoice->patchEntity($subscriptionInvoice, $this->request->data);
    //         if ($this->SubscriptionInvoice->save($subscriptionInvoice)) {
    //             $this->Flash->success(__('The subscription invoice has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The subscription invoice could not be saved. Please, try again.'));
    //     }
    //     $companies = $this->SubscriptionInvoice->Companies->find('list', ['limit' => 200]);
    //     $this->set(compact('subscriptionInvoice', 'companies'));
    //     $this->set('_serialize', ['subscriptionInvoice']);
    // }

    /**
     * Delete method
     *
     * @param string|null $id Subscription Invoice id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $subscriptionInvoice = $this->SubscriptionInvoice->get($id);
    //     if ($this->SubscriptionInvoice->delete($subscriptionInvoice)) {
    //         $this->Flash->success(__('The subscription invoice has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The subscription invoice could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
