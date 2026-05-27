<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* InvoiceDetails Controller
*
* @property \App\Model\Table\InvoiceDetailsTable $InvoiceDetails
*/
class InvoiceDetailsController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Network\Response|null
    */
    public function index($id=null)
    {
        $this->set('title', 'Meetings Invoices');
        $this->loadModel('Meetings');
        $latest_invoices = $history_meeting = [];
        $latest_meeting = $this->Meetings->find('all',
        [
        // 'contain' => ['PresentationFiles'],
        'conditions' => [
        'Meetings.date >=' => date('Y-m-d'),
        'Meetings.status <>' => 'D'
        ],
        'order' => [
        'Meetings.date' => 'desc'
        ]
        ])->first();
        if($latest_meeting){
            $latest_invoices = $this->InvoiceDetails->find('all',
            [
            // 'contain' => ['Users'],
            'conditions' => [
            // 'OR' => [
            //     'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
            //     'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
            // ],
            'meeting_id' => $latest_meeting->id,
            'status' => 'A'
            ],
            'maxLimit' => 10,
            ]
            );
        }
        $history_meetings = $this->Meetings->find('all',[
        'conditions' => [
        'Meetings.date <' => date('Y-m-d'),
        'Meetings.status <>' => 'D'
        ],
        'order' => [
        'Meetings.date' => 'desc'
        ]
        ])->all();
        // pr($history_meetings);die;
        if($id){
            $history_meeting = $this->Meetings->find('all',[
            'conditions' => [
            'Meetings.date <' => date('Y-m-d'),
            'Meetings.status <>' => 'D',
            'Meetings.id' => $id
            ],
            'order' => [
            'Meetings.date' => 'desc'
            ]
            ])->first();
        } 
        if(!$history_meeting){
            $history_meeting = $history_meetings->first();
        }
        // pr($history_meeting);die;
        // $history_meetings = $history_meetings->all();
        // pr($history_meetings);die;
        $history_meeting_invoices = $this->InvoiceDetails->find('all',[
        'contain' => ['Meetings'],
        'conditions' => [
        'InvoiceDetails.status <>' =>'D',
        'Meetings.id' => $history_meeting->id
        ]
        ]);
        //$invoices = $this->paginate($this->InvoiceDetails);
        // pr($history_meetings);die;
        $this->set(compact('invoices','latest_meeting','latest_invoices','history_meetings','history_meeting','history_meeting_invoices'));
        $this->set('_serialize', ['invoices','latest_meeting','latest_invoices','history_meetings','history_meeting','history_meeting_invoices']);
    }
    
    /**
    * View method
    *
    * @param string|null $id Invoice Detail id.
    * @return \Cake\Network\Response|null
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $invoiceDetail = $this->InvoiceDetails->get($id, [
        'contain' => ['Meetings', 'Attendees', 'Users']
        ]);
        
        $this->set('invoiceDetail', $invoiceDetail);
        $this->set('_serialize', ['invoiceDetail']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $invoiceDetail = $this->InvoiceDetails->newEntity();
        if ($this->request->is('post')) {
            $invoiceDetail = $this->InvoiceDetails->patchEntity($invoiceDetail, $this->request->data);
            if ($this->InvoiceDetails->save($invoiceDetail)) {
                $this->Flash->success(__('The invoice detail has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice detail could not be saved. Please, try again.'));
        }
        $meetings = $this->InvoiceDetails->Meetings->find('list', ['limit' => 200]);
        $attendees = $this->InvoiceDetails->Attendees->find('list', ['limit' => 200]);
        $users = $this->InvoiceDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoiceDetail', 'meetings', 'attendees', 'users'));
        $this->set('_serialize', ['invoiceDetail']);
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Invoice Detail id.
    * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $invoiceDetail = $this->InvoiceDetails->get($id, [
        'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceDetail = $this->InvoiceDetails->patchEntity($invoiceDetail, $this->request->data);
            if ($this->InvoiceDetails->save($invoiceDetail)) {
                $this->Flash->success(__('The invoice detail has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice detail could not be saved. Please, try again.'));
        }
        $meetings = $this->InvoiceDetails->Meetings->find('list', ['limit' => 200]);
        $attendees = $this->InvoiceDetails->Attendees->find('list', ['limit' => 200]);
        $users = $this->InvoiceDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('invoiceDetail', 'meetings', 'attendees', 'users'));
        $this->set('_serialize', ['invoiceDetail']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Invoice Detail id.
    * @return \Cake\Network\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['delete']);
        $item = $this->InvoiceDetails->get($id);
        
        if ($this->InvoiceDetails->delete($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Recruitment has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }
        exit(0);
        // return $this->redirect(['action' => 'index']);
    }

    public function paymentStatus($id = 0, $status = '')
    {
        $this->autoRender = false;
        $this->request->allowMethod(['get']);
        if($id<=0 || ($status!='paid' && $status!='unpaid')) {
            echo json_encode(['status'=>false,'message'=>'Invalid Options sent']);
            exit(0);
        }
        $item = $this->InvoiceDetails->get($id);
        $item = $this->InvoiceDetails->patchEntity($item,['payment_status'=>$status]);
        if ($this->InvoiceDetails->save($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Payment Status has been updated.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }
        exit(0);
        // return $this->redirect(['action' => 'index']);
    }

    public function paymentMethod($id = 0, $method = '')
    {
        $this->autoRender = false;
        $this->request->allowMethod(['get']);
        if($id<=0 || ($method!='bacs' && $method!='cheque')) {
            echo json_encode(['status'=>false,'message'=>'Invalid Options sent']);
            exit(0);
        }
        $item = $this->InvoiceDetails->get($id);
        $item = $this->InvoiceDetails->patchEntity($item,['payment_method'=>$method]);
        if ($this->InvoiceDetails->save($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Payment Method has been updated.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }
        exit(0);
        // return $this->redirect(['action' => 'index']);
    }
    
    public function printable($id=null,$type='html') {
        $condition = [
        'id' => $id
        ];
        if($this->loggedUser['type']!='admin' && $this->loggedUser['type']!='superadmin'){
            $condition['OR'] = [
            'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
            'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
            ];
        }
        $invoiceDetail = $this->InvoiceDetails->get($id, [
        'conditions' => $condition
        ]);
        
        $this->loadModel('RsvpSettings');
        $rsvp_settings = $this->RsvpSettings->find()->first();
        
        $this->set(compact('invoiceDetail', 'rsvp_settings','type'));
        $this->set('_serialize', ['invoiceDetail','rsvp_settings','type']);
    }
}