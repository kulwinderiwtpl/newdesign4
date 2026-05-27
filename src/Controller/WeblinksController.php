<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weblinks Controller
 *
 * @property \App\Model\Table\WeblinksTable $Weblinks
 */
class WeblinksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if($this->user_type == 'member') {
            $this->set('title', 'Weblinks');
        }
        else {
            $this->set('title', 'View/Manage Weblinks');
        }
        // echo 'dsadasdas';
        $weblink = $this->Weblinks->newEntity();
        // pr($this->request);die;
        // pr($this->request->data);die;
        if ($this->request->is(['post','put'])) {
            // echo 'sdasddasd'; die;
            $weblink = $this->Weblinks->patchEntity($weblink, $this->request->data);
            if ($this->Weblinks->save($weblink)) {
                $this->Flash->success(__('The weblink has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            
            $this->Flash->error(__('The weblink could not be saved. Please, try again.'));
            pr($weblink);die;
        }
        $this->paginate = [
            //'contain' => ['Meetings', 'Attendees', 'Users']
            'conditions' => [
                // 'OR' => [
                //     'InvoiceDetails.added_by' => $this->request->session()->read('Auth.User.id'), //1258
                //     'InvoiceDetails.user_id' => $this->request->session()->read('Auth.User.id') //1258
                // ],
                'status' => 'A'
            ]
        ];
        $weblinks = $this->paginate($this->Weblinks);
 
        //$weblinks = $this->paginate($this->Weblinks);

        $this->set(compact('weblinks','weblink'));
        $this->set('_serialize', ['weblinks','weblink']);
    }

    /**
     * View method
     *
     * @param string|null $id Weblink id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $weblink = $this->Weblinks->get($id, [
    //         'contain' => []
    //     ]);

    //     $this->set('weblink', $weblink);
    //     $this->set('_serialize', ['weblink']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     die('fdgfdg');
    //     $weblink = $this->Weblinks->newEntity();
    //     if ($this->request->is('post')) {
    //         $weblink = $this->Weblinks->patchEntity($weblink, $this->request->data);
    //         if ($this->Weblinks->save($weblink)) {
    //             $this->Flash->success(__('The weblink has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The weblink could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('weblink'));
    //     $this->set('_serialize', ['weblink']);
    // }

    /**
     * Edit method
     *
     * @param string|null $id Weblink id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weblink = $this->Weblinks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weblink = $this->Weblinks->patchEntity($weblink, $this->request->data);
            if ($this->Weblinks->save($weblink)) {
                $this->Flash->success(__('The weblink has been saved.'));
                return $this->redirect(['action' => 'edit/'.$id]);
            }
            $this->Flash->error(__('The weblink could not be saved. Please, try again.'));
        }
        $this->set(compact('weblink'));
        $this->set('_serialize', ['weblink']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Weblink id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['delete']);
        $weblink = $this->Weblinks->get($id);
      
        if ($this->Weblinks->delete($weblink)) {
            $this->Flash->success(__('The weblink has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The weblink has been deleted.']);
        } else {
            $this->Flash->error(__('The weblink could not be deleted. Please, try again.'));
            echo json_encode(['status'=>true,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function bulkAction(){
        $this->autoRender = false;
        if ($this->request->is('post')) {
            // pr($this->request->data);die;
            $refer_url = $this->referer('/', true);
            // die;
            $action = $this->request->data['group_action'];
            $selected_items = $this->request->data['selected_items'];
            $tab = $this->request->data['tab'];
            // $users = TableRegistry::get('Users');
            $query = $this->Weblinks->query();
            // $query = $users->query();
            if($action=='D'){
                $query->update()
                ->set(['status' => $action])
                ->where(['wId IN' => $selected_items])
                ->execute();
                $this->Flash->success('<i class="fa fa-thumbs-o-up"></i> Bulk Action Executed Successfully!');
            } else {
                $this->Flash->error('<i class="fa fa-thumbs-o-down"></i> An error Occured. Try again Later!');
            }
            return $this->redirect(['action'=>'index',"?" => ["tab" => $tab]]);
        }
    }
}
