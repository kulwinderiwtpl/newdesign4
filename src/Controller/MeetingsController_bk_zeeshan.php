<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use App\Mailer\MyMailer;

/**
 * Meetings Controller
 *
 * @property \App\Model\Table\MeetingsTable $Meetings
 */
class MeetingsController extends AppController
{
    use MailerAwareTrait;

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'conditions' => [
    //             'status <>' => 'D'
    //         ]
    //     ];
    //     $meetings = $this->paginate($this->Meetings);

    //     $this->set(compact('meetings'));
    //     $this->set('_serialize', ['meetings']);
    // }

    public function index()
    {
        $this->set('title', 'View/Manage Meetings');
        $meeting = $this->Meetings->newEntity();
        $this->paginate = [
            'conditions' => [
                'status <>' => 'D'
            ],
            'order' => [
                'date'=>'DESC'
            ]
        ];
        $meetings = $this->paginate($this->Meetings);

        $this->set(compact('meetings','meeting'));
        $this->set('_serialize', ['meetings','meeting']);
    }

    /**
     * View method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => ['Attendees', 'InvoiceDetails', 'PresentationFiles']
        ]);

        $this->set('meeting', $meeting);
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meeting = $this->Meetings->newEntity();
        if ($this->request->is('post')) {
            if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'nextmeetings'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                }
                move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                $this->request->data['file'] = $filename;
            }
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The meeting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else{
                $this->displayValidationErrors($meeting);
            }
            $this->Flash->error(__('The meeting could not be saved. Please, try again.'));
        }
        $this->set(compact('meeting'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'nextmeetings'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                }
                move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                $this->request->data['file'] = $filename;
            } else {
                unset($this->request->data['file']);
            }
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success(__('The meeting has been saved.'));

                return $this->redirect(['action' => 'edit/'.$id]);
            }
            $this->Flash->error(__('The meeting could not be saved. Please, try again.'));
        }
        $this->set(compact('meeting'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Meetings->get($id);
        $item = $this->Meetings->patchEntity($item,['status'=>'D']);
        if ($this->Meetings->save($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Meeting has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }
    
    public function pastMeetings(){
        
        $this->set('title', 'Past Meetings');
        $this->paginate = [
            'contain' => ['PresentationFiles'],
            'order' => [
                'Meetings.date' => 'desc'
            ]
        ];
        $meetings = $this->paginate($this->Meetings);

        $this->set('meetings', $meetings);
        $this->set('_serialize', ['meetings']);
    }

    public function meetingsHistory(){

        $this->set('title', 'Your Meeting History');
        
        // $meetings = $this->Meetings->find()
        // // ->where(['Orders.invoice_no' => $trackingId])
        // ->contain(['Attendees' => function ($q) {
        // return $q->where(['Attendees.user_id' => $this->request->session()->read('Auth.User.id')]);
        // }
        // ]);
        $this->loadModel('Attendees');
        $meetings_history = $this->Attendees->find()
            ->contain(['Meetings'])
            ->where([
                'user_id' => $this->request->session()->read('Auth.User.id'),
                'Meetings.date <' => date('Y-m-d'),
            ])
            ->order(['Meetings.date' => 'DESC'])
            ->all();
        // echo $this->request->session()->read('Auth.User.id');
        $this->loadModel('InvoiceDetails');
        $invoices = $this->paginate($this->InvoiceDetails->find(),
            [
                // 'contain' => ['Users'],
                'conditions' => [
                    'OR' => [
                        'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
                        'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
                    ]
                ],
                'maxLimit' => 10,
            ]
        );
        // echo $this->request->session()->read('Auth.User.id');
        // debug($invoices);
        // pr($invoices);die;
        
            // ->contain(['Users'])
            // ->where([
            //      'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id') //1258
            // ])
            // ->orWhere([
            //         'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
            // ])
            // ->order(['InvoiceDetails.date' => 'DESC'])
            // ->all()


        //  pr($meetings); die;
        //         $this->paginate = [
        //             // 'contain' => ['Attendees', 'InvoiceDetails', 'PresentationFiles']
        //             'contain' => [
        //                     'Attendees' => function (\Cake\ORM\Query $query) {
        //                             return $query->select(['Attendees.contactno', 'Attendees.user_id','Attendees.meeting_id'])
        //                             ->where(['Attendees.user_id' => $this->request->session()->read('Auth.User.id')]);
        //                         }
        //                 ],
        //             // 'contain' => [
        //             //     'Attendees' => [
        //             //         // 'fields' => ['Attendees.id', 'Attendees.user_id', 'Attendees.user_name', 'Attendees.attended','Attendees.meeting_id']],
        //             //         // 'contain' => array(
        //             //         //     'Contact'=>array("conditions"=>array("is_primary"=>1)),
        //             //         //     'Address'=>array("conditions"=>array("is_primary"=>"yes"))
        //             //         // ),
        //             //         'conditions' => [
        //             //             'Attendees.user_id' => $this->request->session()->read('Auth.User.id')
        //             //         ]
        //             //     ]
        //             // ],
        //             // 'joins' => [
        //             //     //[
        //             //         'alias' => 'Attendees',
        //             //         'table' => 'attendees',
        //             //         'type' => 'INNER',
        //             //         'conditions' => 'Attendees.meeting_id = Meetings.id'
        //             //         // 'conditions' => [
        //             //         //     'Attendees.meeting_id' => 'Meetings.id'
        //             //         // ]
        //             //     //]
        //             // ],
        //         //     'conditions' => [
        //         //        'Attendees.user_id' => $this->request->session()->read('Auth.User.id')
        //         //    ],
        //             'order' => [
        //                 'Meetings.date' => 'desc'
        //             ]
        //         ];
        //         $meetings = $this->paginate($this->Meetings);
        //        pr($meetings); die;
        // //        $this->Meetings->get($id, [
        // //            'contain' => ['Attendees', 'InvoiceDetails', 'PresentationFiles']
        // //        ]);

        $this->set('meetings_history', $meetings_history);
        $this->set('_serialize', ['meetings_history']);

        $this->set('invoices', $invoices);
        $this->set('_serialize', ['invoices']);
        

    }

    public function nextMeeting(){
        $this->set('title', 'Next Meeting');

        $this->loadModel('Users');
        $user = $this->Users->find()
            ->contain(['Companies'])
            ->where([
                'Users.id' => $this->request->session()->read('Auth.User.id')
            ])
            ->first(); 

        $this->loadModel('RsvpSettings');
        $rsvp_settings = $this->RsvpSettings->find()->first();

        $this->loadModel('Attendees');
        $attendee = $this->Attendees->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            //load the meeting
            $meeting = $this->Meetings->find('all',[
                'conditions' => [
                    'Meetings.id >=' =>$data['meeting_id']
                ]
            ])->first();

            $this->loadModel('Companies');
            $company = $this->Companies->find('all',[
                'conditions' => [
                    'Companies.id >=' =>$user->company_id
                ]
            ])->first();
            
            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['company_id'] = $user->company_id;
            $data['fee'] = $rsvp_settings->fee;
            
            $attendee = $this->Attendees->patchEntity($attendee, $data);
            // pr($data);
            $row = $this->Attendees->save($attendee);
            // pr($attendee);die;
            if ($row) {
                // die('attendee added');
                //attedee added send the Email
                $mail_data = array_merge($data,['meeting_location'=>$meeting->location]);
                //  if($_SERVER['HTTP_HOST']!='localhost'){
                    // $this->getMailer('My')->send('rsvp_submitted', [$mail_data]);
                    $myMailer = (new MyMailer())->rsvp_submitted($mail_data);
                //  }

                // echo pr($row->id);
                // $mail_data = array_merge($data,$invoice_data);
                
              $this->loadModel('InvoiceDetails');
              $invoice = $this->InvoiceDetails->newEntity();
            //   $data = $this->request->data;
              $invoice_data = [
                'date'=> date('Y-m-d'),
                'meeting_id' => $data['meeting_id'],
                'meeting_title' => $data['meeting_title'],
                'meeting_date' => $data['meeting_date'],
                'attendees_name' => $data['user_name'],
                'company_name' => $data['company_name'],
                'fee' => $data['fee'],
                'purchase_order' => $data['purchase_order'],
                'billing_entity' => $company->billing_entity,
                'invoice_number' => '000',
                'payment_method' => $data['pay_method'],
                'attendee_id' => $row->id,
                'user_id' => $data['user_id'],
                'added_by' => $data['user_id'],
              ];
            //   pr($invoice_data);
            //   $data['user_id'] = $this->request->session()->read('Auth.User.id');
            //   $data['company_id'] = $user->company_id;
            //   $data['fee'] = $rsvp_settings->fee;
              $invoice = $this->InvoiceDetails->patchEntity($invoice, $invoice_data);
            //   pr($invoice);
            //   pr($this->InvoiceDetails->save($invoice));
            //   $dbo = $this->getDatasource();
            //   $logs = $dbo->getLog();
            //   pr($logs);
            //   debug($this->Model->getDataSource()->getLog(false, false)); 
              if ($inv_row = $this->InvoiceDetails->save($invoice)) {
                  //$inv_row = $this->InvoiceDetails->save($invoice)
                //   pr($in/v_row);
                  $inv_row->invoice_number = (!empty($company->prefix)?$company->prefix.'_':'').'000'.$inv_row->id;
                  $this->InvoiceDetails->save($inv_row);
                  
                $this->Flash->success('<p>Thank you for submitting your RSVP for the next meeting. We have sent you a confirmation email for this booking. Please check your mailbox and make sure you have received our email.</p>
              <p> If you\'d like to RSVP for a colleague, please use the button above &quot;Book a colleague as an attendee&quot;. </p>');
              }
                return $this->redirect(['action' => 'nextMeeting?tab=replyslip']);
            }
            $this->Flash->success(__('Details of the next meeting will be sent to you via email and posted on the website in due course.'));
            // debug($this->Model->validationErrors);
        }
        
        //         if ($this->request->is(['patch', 'post', 'put'])) {
        //                print_r($this->request->data);
        //         if (empty($this->request->data['User']['password']))
        //             $this->Users->validator()->remove('password');
        //         $user = $this->Users->patchEntity($user, $this->request->data);
        //         if ($this->Users->save($user)) {
        // //                    if($this->request->is('Ajax')){
        // //                        echo json_encode(['success'=>true]);
        // //                        exit(0);
        // //                    } else {
        //             $this->Flash->success(__('The user has been updated.'));
        //             $this->getMailer('My')->send('welcome', [$user]);
        //             return $this->redirect(['action' => 'edit/' . $user->id]);
        // //                    }
        //         }
        //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
        //     }
        $latest = $this->Meetings->find('all',[
            'contain' => ['PresentationFiles'],
            'conditions' => [
               'Meetings.date >=' => date('Y-m-d'),
               'Meetings.status <>' => 'D'
           ],
            'order' => [
                'Meetings.date' => 'desc'
            ]
        ])->first();
        $attendees = $additionals = $invoices = [];
        if($latest){
        $this->loadModel('Attendees');
        $attendees = $this->Attendees->find()
            ->contain(['Meetings'])
            ->where([
                'user_id' => $this->request->session()->read('Auth.User.id'),
                'meeting_id' => $latest->id
            ])
            ->order(['Meetings.date' => 'DESC'])
            ->first();
        $additionals = $this->Attendees->find('all',[
            'conditions' =>[
                'user_id' => 0,
                'meeting_id' => $latest->id,
                'additionals' => $this->request->session()->read('Auth.User.id')
            ],
            'order' =>['Attendees.date' => 'ASC']
        ]);
        // pr($additionals);
        if(!empty($attendees)){
            $this->set('rsvp_submitted', true);
            // $this->Flash->success('You have already submitted an RSVP for yourself . If you\'d like to RSVP for a colleague, please use the button above "Book a colleague as an attendee".');
        } else {
            $this->set('rsvp_submitted', false);
        }

        $this->loadModel('InvoiceDetails');
        $invoices = $this->paginate($this->InvoiceDetails->find(),
            [
                // 'contain' => ['Users'],
                'conditions' => [
                    'OR' => [
                        'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
                        'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
                    ],
                    'meeting_id' => $latest->id,
                    'status' => 'A'
                ],
                'maxLimit' => 10,
            ]
        );
        }
        $total_fees = 0;
        $additional_count = 0;
        foreach($additionals as $additional){
            // pr($additional);
            $total_fees+=$additional->fee;
            $additional_count++;
        }
        if(isset($attendees->fee))
            $total_fees+=$attendees->fee;
        
        $this->set('latest', $latest);
        $this->set('user',$user);
        $this->set('rsvp_settings',$rsvp_settings);
        $this->set('attendees',$attendees);
        $this->set('total_fees',$total_fees);
        $this->set('invoices',$invoices);
        $this->set('additional_count',$additional_count);
        $this->set('_serialize', ['latest','user','rsvp_settings','attendees','total_fees','invoices','additional_count']);
        // pr($invoices);

    }

    public function bookColleague(){
        $this->loadModel('Users');
        $user = $this->Users->find()
            ->contain(['Companies'])
            ->where([
                'Users.id' => $this->request->session()->read('Auth.User.id')
            ])
            ->first(); 
        $latest = $this->Meetings->find('all',[
            'contain' => ['PresentationFiles'],
            'conditions' => [
               'Meetings.date >=' => date('Y-m-d')
           ],
            'order' => [
                'Meetings.date' => 'desc'
            ]
        ])->first();

        $this->loadModel('RsvpSettings');
        $rsvp_settings = $this->RsvpSettings->find()->first();

        $this->set('latest', $latest);
        $this->set('rsvp_settings', $rsvp_settings);
        $this->set('_serialize', ['latest','rsvp_settings']);

        $this->loadModel('Attendees');
        $attendee = $this->Attendees->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $meeting = $this->Meetings->find('all',[
                'conditions' => [
                    'Meetings.id >=' =>$data['meeting_id']
                ]
            ])->first();

            $this->loadModel('Companies');
            $company = $this->Companies->find('all',[
                'conditions' => [
                    'Companies.id >=' =>$user->company_id
                ]
            ])->first();

            $data['user_id'] = 0;
            $data['company_id'] = $user->company_id;
            $data['fee'] = $rsvp_settings->fee;
            $data['pay_method'] = $data['c_pay_method'];
            $data['additionals'] = $this->request->session()->read('Auth.User.id');

            $attendee = $this->Attendees->patchEntity($attendee, $data);
            // pr($data);
            // pr($this->Attendees->save($attendee));
            // pr($attendee);
            $row = $this->Attendees->save($attendee);
            // pr($attendee);die;
            if ($row) {
              //   pr($row);
              $mail_data = array_merge($data,['meeting_location'=>$meeting->location]);
               if($_SERVER['HTTP_HOST']!='localhost'){
                // $this->getMailer('My')->send('rsvp_colleague', [$mail_data]);
                $myMailer = (new MyMailer())->rsvp_colleague($mail_data);
               }
              
              $this->loadModel('InvoiceDetails');
              $invoice = $this->InvoiceDetails->newEntity();
            //   $data = $this->request->data;
              $invoice_data = [
                'date'=> date('Y-m-d'),
                'meeting_id' => $data['meeting_id'],
                'meeting_title' => $data['meeting_title'],
                'meeting_date' => $data['meeting_date'],
                'attendees_name' => $data['user_name'],
                'company_name' => $data['company_name'],
                'fee' => $data['fee'],
                'purchase_order' => $data['purchase_order'],
                'billing_entity' => $company->billing_entity,
                'invoice_number' => '000',
                'payment_method' => $data['c_pay_method'],
                'attendee_id' => $row->id,
                'user_id' => 0,
                'added_by' => $this->request->session()->read('Auth.User.id'),
              ];
            //   pr($invoice_data);
            //   $data['user_id'] = $this->request->session()->read('Auth.User.id');
            //   $data['company_id'] = $user->company_id;
            //   $data['fee'] = $rsvp_settings->fee;
              $invoice = $this->InvoiceDetails->patchEntity($invoice, $invoice_data);
              
            //   pr($this->InvoiceDetails->save($invoice));
            //   pr($invoice);
            //   $dbo = $this->getDatasource();
            //   $logs = $dbo->getLog();
            //   pr($logs);
            //   debug($this->Model->getDataSource()->getLog(false, false)); 
            $inv_row = $this->InvoiceDetails->save($invoice);
            // pr($invoice);die;
              if ($inv_row) {
                  //$inv_row = $this->InvoiceDetails->save($invoice)
                //   pr($in/v_row);
                  $inv_row->invoice_number = (!empty($company->prefix)?$company->prefix.'_':'').'000'.$inv_row->id;
                  $this->InvoiceDetails->save($inv_row);
                $this->Flash->success('<p>Thank you for submitting an RSVP on behalf of your colleague for the next meeting. We have sent  a confirmation email to your colleague for this booking. Please check with your colleague to   make sure they have received our email.</p>
              <p>If you\'d like to add another colleague please use the form below.</p>');
              return $this->redirect(['action' => 'bookColleague']);
              }
                return $this->redirect(['action' => 'bookColleague']);
            }
            // $this->Flash->success(__('Details of the next meeting will be sent to you via email and posted on the website in due course.'));
            // debug($this->Model->validationErrors);
            // die;
        }
    }

    public function mergeInvoices(){
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pr($data['merge_invoices']);
            $this->loadModel('InvoiceDetails');
            $referer = $this->referer('/', true);
            $conditions = [
                'id IN' => $data['merge_invoices']
            ];
            if($this->loggedUser['type']!='admin' && $this->loggedUser['type']!='superadmin'){
                $conditions['OR'] = [
                    'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
                    'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
                ];
            }
            $invoices = $this->paginate($this->InvoiceDetails->find(),
                [
                    // 'contain' => ['Users'],
                    'conditions' => $conditions,
                ]
            );
            // pr($invoices);die;
            // if($invoices->count() != $data['merge_invoices']){
            //     // pr($invoices);echo $invoices->count();die;
            //     $this->Flash->error('<p>Sorry! You cannot merge Invoices of Different Companies!</p>');
            //     $this->redirect($referer);
            // }
            // pr($invoices);
            //   pr($invoice_data);
              $invoice_data = [];
              $attendees_name = $attendee_id = [];
              $fee = 0;
              $payment_method = '';
            foreach($invoices as $key => $invoice){
                if($key==0){
                    $payment_method = $invoice->payment_method;
                    $user_id = $invoice->user_id;
                    $invoice_data = [
                        'date'=> date('Y-m-d'),
                        'meeting_id' => $invoice->meeting_id,
                        'meeting_title' => $invoice->meeting_title,
                        'meeting_date' => $invoice->meeting_date,
                        'attendees_name' => $invoice->attendees_name,
                        'company_name' => $invoice->company_name,
                        'fee' => $invoice->fee,
                        'purchase_order' => $invoice->purchase_order,
                        'invoice_number' => '000',
                        'payment_method' => $invoice->payment_method,
                        'billing_entity' => $invoice->billing_entity,
                        'attendee_id' => $invoice->attendee_id,
                        'user_id' => $invoice->user_id,
                        'added_by' => $invoice->added_by,
                        'is_merged' => 'y'
                    ];
                }
                if($payment_method != $invoice->payment_method){
                    $this->Flash->error('<p>Sorry! You cannot merge Invoices of Different Payment Methods!</p>');
                    return $this->redirect($referer);
                    // return $this->redirect(['action' => 'nextMeeting?tab=invoices']);
                }
                if($user_id!=$invoice->user_id && $user_id!=$invoice->added_by){
                    $this->Flash->error('<p>Sorry! You cannot merge Invoices of Different companies!</p>');
                    return $this->redirect($referer);
                }
                $fee += $invoice->fee;
                $attendees_name[] = $invoice->attendees_name;
                $attendee_id[] = $invoice->attendee_id;
            }
            $invoice_data['fee'] = $fee;
            $invoice_data['attendees_name'] = implode(', ',$attendees_name);
            $invoice_data['attendee_id'] = implode(', ',$attendee_id);
            // pr($invoice_data);die;
            $invoice = $this->InvoiceDetails->newEntity();
            $invoice = $this->InvoiceDetails->patchEntity($invoice, $invoice_data);
            // pr($this->InvoiceDetails->save($invoice));
            // pr($invoice);
            if ($inv_row = $this->InvoiceDetails->save($invoice)) {
                // echo 'done';
                  //$inv_row = $this->InvoiceDetails->save($invoice)
                //   pr($in/v_row);
                  $inv_row->invoice_number = '000'.$inv_row->id;
                  $this->InvoiceDetails->save($inv_row);
                  $query = $this->InvoiceDetails->query();
                  $query->update()
                    ->set(['status' => 'D'])
                    ->where(['id IN' => $data['merge_invoices']])
                    ->execute();
                $this->Flash->success('<p>Invoices merged Successfully!');
                // die($this->referer('/', true));
                return $this->redirect($referer);
                // return $this->redirect(['action' => 'nextMeeting?tab=invoices']);
            } else {

            }
        }
        
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
            $query = $this->Meetings->query();
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
            return $this->redirect(['action'=>'index',"#" => "portlet_tab1"]);
        }
    }

    public function deleteFile($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Meetings->get($id);
        $file = $item->file;
        $item = $this->Meetings->patchEntity($item,['file'=>'']);
        if ($this->Meetings->save($item)) {
            unlink(WWW_ROOT.'uploads/nextmeetings/'.$file);
            $this->Flash->success(__('The meeting file has been deleted.'));
            //echo json_encode(['status'=>true,'message'=>'The ad file has been deleted.','replace-content'=>true]);
        } else { 
            $this->Flash->error(__('The meeting file could not be deleted. Please, try again.'));
            pr($item);
            //echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        return $this->redirect(['action' => 'edit/'.$id]);
    }

    function downloadAgenda($id){
        // error_reporting(0);
        // $this->autoRender = false;
        // $this->request->allowMethod('GET');
        $item = $this->Meetings->get($id);
        if(!empty($item)){

        }
        
        //$df = fopen("php://output", 'w');
        //$content = "Test Content";
        // pr($users);
        // fputcsv($df, array('name','first_name','last_name','email','tel','address','company','job_title','billing_entity','created','fax'));
        // fputs($df,$content,strlen($content));
        // fputcsv($df, array(''));
        // fputcsv($df, array('List of Members -',date('d-m-Y')), "\t");
        // fputcsv($df, array(''), "\t");
        // fputcsv($df, array('First Name','Last Name','Job Title','Company','Address','Contact No','FAX','Email','User Name','Billing Entity','Status'), "\t");
        // foreach ($users as $row) {
        //     // pr($row);die;
        //     fputcsv($df, 
        //         array(
        //             $row->first_name,
        //             $row->last_name,
        //             $row->job_title,
        //             $row->company->name,
        //             $row->address,
        //             $row->tel,
        //             $row->fax,
        //             $row->email,
        //             $row->name,
        //             $row->company->billing_entity,
        //             ($row->status=='A')?'Active':$row->status,
        //         ),"\t");
        // }
        // fclose($df);
        $this->set('meeting', $item);
        // die();
    }
    // public function downloadAgenda($id = null)
    // {
    //     $this->autoRender = false;
    //     $this->request->allowMethod('GET');
    //     $item = $this->Meetings->get($id);
    //     // $file = $item->file;
    //     // $item = $this->Meetings->patchEntity($item,['file'=>'']);
    //     // if ($this->Meetings->save($item)) {
    //     //     unlink(WWW_ROOT.'uploads/nextmeetings/'.$file);
    //     //     $this->Flash->success(__('The meeting file has been deleted.'));
    //     //     //echo json_encode(['status'=>true,'message'=>'The ad file has been deleted.','replace-content'=>true]);
    //     // } else { 
    //     //     $this->Flash->error(__('The meeting file could not be deleted. Please, try again.'));
    //     //     pr($item);
    //     //     //echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
    //     // }

    //     // return $this->redirect(['action' => 'edit/'.$id]);
    // }
}
