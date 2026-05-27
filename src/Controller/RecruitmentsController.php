<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recruitments Controller
 *
 * @property \App\Model\Table\RecruitmentsTable $Recruitments
 */
class RecruitmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Recruitment');
        $this->paginate = [
            //'contain' => ['Companies'],
            // 'contain' => ['Companies'=>function (\Cake\ORM\Query $query) {
            //         return $query->orWhere(['Recruitments.company_id' => NULL]);
            //     }
            // ],
            'conditions' => [
                'Recruitments.status <>'=>'D',
                'OR' => [
                    'closeDate' => '0000-00-00',
                    'closeDate >=' => date('Y-m-d')
                ]
            ],
            'join' => [
                    'alias' => 'Companies',
                    'table' => 'companies',
                    'type' => 'LEFT',
                    'conditions' => '`Companies`.`id` = `Recruitments`.`company_id`'
                
            ],
            'fields' => [
                'Recruitments.id', 'Recruitments.pdf', 'Recruitments.closeDate','Recruitments.status','Recruitments.othercompany', 
                'Companies.id', 'Companies.name',
            ],
            'order' => [
                'Recruitments.closeDate' => 'desc'
            ]
        ];
//         $this->paginate = [
// //            'sortWhitelist' => [
// //                'Banners.name', 'Banners.is_active', 'Banners.modified'
// //            ],
//             'contain' => ['Companies'],
//             'conditions' => [
//                 'OR' => [
//                     'closeDate' => '0000-00-00',
//                     'closeDate >=' => date('Y-m-d')
//                 ]
//             ],
//             'limit' => 10,
//             'order' => [
//                 'Recruitments.closeDate' => 'desc'
//             ]
//         ];
        $recruitments = $this->paginate($this->Recruitments);

        $this->set(compact('recruitments'));
        $this->set('_serialize', ['recruitments']);
    }

    public function admin()
    {
        $this->set('title', 'Recruitment');
        $recruitment = $this->Recruitments->newEntity();
        $this->paginate = [
            //'contain' => ['Companies'],
            // 'contain' => ['Companies'=>function (\Cake\ORM\Query $query) {
            //         return $query->orWhere(['Recruitments.company_id' => NULL]);
            //     }
            // ],
            'conditions'=>[
                'Recruitments.status <>'=>'D'
            ],
            'join' => [
                    'alias' => 'Companies',
                    'table' => 'companies',
                    'type' => 'LEFT',
                    'conditions' => '`Companies`.`id` = `Recruitments`.`company_id`'
                
            ],
            'fields' => [
                'Recruitments.id', 'Recruitments.pdf', 'Recruitments.closeDate','Recruitments.status','Recruitments.othercompany', 
                'Companies.id', 'Companies.name',
            ],
            'order' => [
                'Recruitments.closeDate' => 'desc'
            ]
        ];
        $recruitments = $this->paginate($this->Recruitments);
        $this->loadModel('Companies');
        $companies = $this->Companies->find('list',['order' => ['name' => 'ASC']])->toArray();
        
        $companies = [''=>'Please select Company']+$companies;
        //pr($companies);
        //  pr($recruitments);
        
        $this->set(compact('recruitments','recruitment','companies'));
        $this->set('_serialize', ['recruitments','recruitment','companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Recruitment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $recruitment = $this->Recruitments->get($id, [
    //         'contain' => ['Companies']
    //     ]);

    //     $this->set('recruitment', $recruitment);
    //     $this->set('_serialize', ['recruitment']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recruitment = $this->Recruitments->newEntity();
        if ($this->request->is('post')) {
            if($this->request->data['company_id']==''){
                $this->request->data['company_id'] = 0;
            }
            
            if($this->request->data['pdf']['error']==0 && !empty($this->request->data['pdf']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = date('d-m-Y').'_'.$this->request->data['pdf']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'recruitmentfile'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['pdf']['name'];
                }
                move_uploaded_file($this->request->data['pdf']['tmp_name'], $file_path.$filename);
                $this->request->data['pdf'] = $filename;
            }
            // pr($this->request->data);die;
            $recruitment = $this->Recruitments->patchEntity($recruitment, $this->request->data);
            if ($row = $this->Recruitments->save($recruitment)) {
                //pr($row);die;
                $this->Flash->success(__('The recruitment has been saved.'));

                return $this->redirect(['action' => 'admin']);
            }else {
                $this->displayValidationErrors($recruitment);
            }
            $this->Flash->error(__('The recruitment could not be saved. Please, try again.'));
        }
        $companies = $this->Recruitments->Companies->find('list', ['order' => ['name' => 'ASC']]);
        $this->set(compact('recruitment', 'companies'));
        $this->set('_serialize', ['recruitment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recruitment id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recruitment = $this->Recruitments->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($this->request->data['pdf']['error']==0 && !empty($this->request->data['pdf']['tmp_name'])){
                //pr($this->request->data['avatar']);die;
                $filename = date('d-m-Y').'_'.$this->request->data['pdf']['name'];
                $file_path = WWW_ROOT.'uploads'.DS.'recruitmentfile'.DS;
                if(file_exists($file_path.$filename)){
                    $filename = date('d-m-Y').time().'_'.$this->request->data['pdf']['name'];
                }
                move_uploaded_file($this->request->data['pdf']['tmp_name'], $file_path.$filename);
                $this->request->data['pdf'] = $filename;
            } else {
                unset($this->request->data['pdf']);
            }
            $recruitment = $this->Recruitments->patchEntity($recruitment, $this->request->data);
            if ($this->Recruitments->save($recruitment)) {
                $this->Flash->success(__('The recruitment has been saved.'));

                return $this->redirect(['action' => 'edit/'.$id]);
            }
            pr($recruitment);die;
            $this->Flash->error(__('The recruitment could not be saved. Please, try again.'));
        }
        $this->loadModel('Companies');
        $companies = $this->Companies->find('list',['order' => ['name' => 'ASC']])->toArray();
        
        $companies = [''=>'Please select Company']+$companies;
        // $companies = $this->Recruitments->Companies->find('list', ['limit' => 200]);
        $this->set(compact('recruitment', 'companies'));
        $this->set('_serialize', ['recruitment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recruitment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Recruitments->get($id);
      
        if ($this->Recruitments->delete($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Recruitment has been deleted.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
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
            // $users = TableRegistry::get('Users');
            $query = $this->Recruitments->query();
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
