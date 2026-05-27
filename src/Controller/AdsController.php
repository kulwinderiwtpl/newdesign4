<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($row = $this->Ads->save($ad)) {
                if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                    //pr($this->request->data['avatar']);die;
                    $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                    $file_path = WWW_ROOT.'uploads'.DS.'advertisement'.DS;
                    if(file_exists($file_path.$filename)){
                        $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                    }
                    move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                    $this->request->data['file'] = $filename;
                    $this->loadModel('AdFiles');
                    $ad_file = $this->AdFiles->newEntity();
                    $filedata = [
                        'ad_file' => $filename,
                        'ad_id' => $row->id,
                        'status'=>'A'
                    ];
                    $ad = $this->Ads->patchEntity($ad, $filedata);
                    $row = $this->Ads->save($ad);
                    $ad = $this->AdFiles->patchEntity($ad_file, $filedata);
                    if ($row = $this->AdFiles->save($ad)) {
                        $this->Flash->success(__('The ad and file has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
                $this->Flash->success(__('The ad has been saved.'));
                // return $this->redirect(['action' => 'index']);
            }
           // pr($ad);
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        
        $this->set('title', 'View/Manage Ads');

        $this->paginate = [
            'conditions' => [
                'status' => 'A'
            ]
        ];
        $ads = $this->paginate($this->Ads);

        $this->set(compact('ads','ad'));
        $this->set('_serialize', ['ads','ad']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $ad = $this->Ads->get($id, [
    //         'contain' => ['AdFiles']
    //     ]);

    //     $this->set('ad', $ad);
    //     $this->set('_serialize', ['ad']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ad = $this->Ads->newEntity();
        $this->set(compact('ad'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['AdFiles'=>function (\Cake\ORM\Query $query) {
                    return $query->where(['AdFiles.status' => 'A']);
                }
            ],
            
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($row = $this->Ads->save($ad)) {
                if($this->request->data['file']['error']==0 && !empty($this->request->data['file']['tmp_name'])){
                    //pr($this->request->data['avatar']);die;
                    $filename = date('d-m-Y').'_'.$this->request->data['file']['name'];
                    $file_path = WWW_ROOT.'uploads'.DS.'advertisement'.DS;
                    if(file_exists($file_path.$filename)){
                        $filename = date('d-m-Y').time().'_'.$this->request->data['file']['name'];
                    }
                    move_uploaded_file($this->request->data['file']['tmp_name'], $file_path.$filename);
                    $this->request->data['file'] = $filename;
                    $this->loadModel('AdFiles');
                    $ad_file = $this->AdFiles->newEntity();
                    $filedata = [
                        'ad_file' => $filename,
                        'ad_id' => $row->id,
                        'status'=>'A'
                    ];
                    $ad = $this->Ads->patchEntity($ad, $filedata);
                    $row = $this->Ads->save($ad);
                    $ad_file = $this->AdFiles->patchEntity($ad_file, $filedata);
                    if ($row = $this->AdFiles->save($ad_file)) {
                        $this->Flash->success(__('The ad and file has been saved.'));
                        return $this->redirect(['action' => 'edit/'.$id]);
                    }
                    // pr($filedata);
                    // pr($ad_file);die;
                }
                $this->Flash->success(__('The ad has been saved.'));
                return $this->redirect(['action' => 'edit/'.$id]);
            }
            // pr($ad);die;
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        $this->set(compact('ad'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        
        if ($this->Ads->delete($ad)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The ad has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function adfileDelete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('AdFiles');
        $ad = $this->AdFiles->get($id);
        $ad_id = $ad->ad_id;
       
        if ($this->AdFiles->delete($ad_id)) {
            $this->Flash->success(__('The ad file has been deleted.'));
            //echo json_encode(['status'=>true,'message'=>'The ad file has been deleted.','replace-content':true]);
        } else { 
            $this->Flash->error(__('The ad file could not be deleted. Please, try again.'));
            //echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        return $this->redirect(['action' => 'edit/'.$ad_id]);
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
            $query = $this->Ads->query();
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
            return $this->redirect(['action'=>'index',"?" => ["tab" => $tab]]);
        }
    }
}
