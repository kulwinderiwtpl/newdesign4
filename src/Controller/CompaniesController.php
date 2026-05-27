<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    private function filterList($conditions){
        // $this->autoRender = false;

        if(!empty($this->request->query('search'))){
            $q = $this->request->query('search');
            $conditions = array_merge($conditions, [
                'OR'=>[
            'name LIKE' => $q.'%',
            // 'mem_type LIKE' => $q.'%'
            ]]);
        }

        // $users = $this->Users->find('all',[
        // 'contain' => ['Companies'],
        // 'conditions' =>$conditions,
        // // 'limit' => $this->queryPage
        // ]);
        
        $this->paginate = [
            'conditions' =>$conditions,
            'limit' => $this->queryPage,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $companies = $this->paginate($this->Companies);
        return $companies;
    }
    public function index()
    {
        $this->set('title', 'Members');
        $companies = $this->paginate($this->Companies,[
            'conditions' =>[
                'status'=>'A'
            ],
            'order' => [
                'name' => 'asc'
            ]
        ]);

        $this->set(compact('companies'));
        $this->set('_serialize', ['companies']);
    }

    /**
     * Admin method
     *
     * @return \Cake\Network\Response|null
     */
    public function admin()
    {
        // $this->custom_js = false;
        $this->set('title', 'View/Manage Companies');
        $conditions = [
            'status <>' =>'D'
        ];
        $companies = $this->filterList($conditions);
        $total_count = $this->Companies->find('all', array('conditions'=>[]))->count();
        $associate_count = $this->Companies->find('all', array('conditions'=>['mem_type'=>'Associated']))->count();
        $full_count = $this->Companies->find('all', array('conditions'=>['mem_type'=>'Full']))->count();
        $e_member_count = $this->Companies->find('all', array('conditions'=>['mem_type'=>'e-Member']))->count();
        
        $this->set(compact('companies','total_count','associate_count','full_count','e_member_count'));
        $this->set('_serialize', ['companies']);
        // $this->set('custom_js', $this->custom_js);
    }

    /**
     * Member Panel Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function memberIndex()
    {
        $this->set('title', 'Members');
        $companies = $this->paginate($this->Companies,[
            'conditions' =>[
                'status'=>'A'
            ],
            'order' => [
                'name' => 'asc'
            ]
        ]);

        $this->set(compact('companies'));
        $this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $company = $this->Companies->newEntity();
    //     if ($this->request->is('post')) {
    //         $company = $this->Companies->patchEntity($company, $this->request->data);
    //         if ($this->Companies->save($company)) {
    //             $this->Flash->success(__('The company has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The company could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('company'));
    //     $this->set('_serialize', ['company']);
    // }

    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is(['post','put'])) {
            $this->request->data['date'] = date('Y-m-d');
            $company = $this->Companies->patchEntity($company, $this->request->data);
            if ($row = $this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'add']);
            } else {
                $this->displayValidationErrors($company);
            }
            // pr($company);die;
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('company'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $company = $this->Companies->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $company = $this->Companies->patchEntity($company, $this->request->data);
    //         if ($this->Companies->save($company)) {
    //             $this->Flash->success(__('The company has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The company could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('company'));
    //     $this->set('_serialize', ['company']);
    // }

    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Users'=>function (\Cake\ORM\Query $query) {
                    return $query->where(['Users.status <>' => 'D']);
                }
            ],
        ]);
        // pr($company);
        // $company_users = $this->Users->
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $company = $this->Companies->patchEntity($company, $this->request->data);

            
            
            if ($this->Companies->save($company)) {
                //Set repmembers
                $query = $this->Users->query();
                if(isset($this->request->data['rep_members']) && !empty($this->request->data['rep_members'])){
                    $rep_members = $this->request->data['rep_members'];
                    
                    $query->update()
                        ->set(['rep_member' => 'y'])
                        ->where(['id IN' => $rep_members])
                        ->execute();
                } else{
                    $query->update()
                        ->set(['rep_member' => ''])
                        ->where(['company_id' => $id])
                        ->execute();
                }
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'edit/'.$id]);
            } else {
                $this->displayValidationErrors($company);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->set(compact('company'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $company = $this->Companies->get($id);
    //     if ($this->Companies->delete($company)) {
    //         $this->Flash->success(__('The company has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The company could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Companies->get($id);
        
        if ($this->Companies->delete($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
           // pr("here");die;
              return $this->redirect(['action' => 'admin']);
            echo json_encode(['status'=>true,'message'=>'The Company has been deleted.']);
           
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
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
            $query = $this->Companies->query();
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

    public function exportCompanies( $type='excel'){
        $this->autoRender = false;
        $companies = $this->Companies->find('all',[
            // 'contain' => ['Meetings'],
            'conditions' =>[
                // 'Attendees.status' =>'A',
                'Companies.status <>'=>'D'
            ],
            'join' => [
                    'alias' => 'Users',
                    'table' => 'users',
                    'type' => 'LEFT',
                    'conditions' => 'Companies.id = Users.company_id AND Users.rep_member="y"'
                
            ],
            'order' => [
                'Companies.name' => 'asc',
            ]
        ])->select(['Companies.id','Companies.name','Users.name','Companies.address','Companies.contactno','Companies.status','Companies.mem_type','Companies.fax','Companies.email']);
        // $attendees_first = $attendees->first();
        $companies = $companies->all();
        // pr($ companies);die;
        // echo $attendees_first->meeting->title; die;
        $filename='Companies-'.date('Y-m-d-H-i-s').'.xls';
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

        if (count($companies) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        
        // pr($users);
        // fputcsv($df, array('name','first_name','last_name','email','tel','address','company','job_title','billing_entity','created','fax'));
        fputcsv($df, array(''));
        fputcsv($df, array('List of Companies -',date('d-m-Y')), "\t");
        fputcsv($df, array(''), "\t");
        fputcsv($df, array('Company Name','Rep Members','Address','Status','Member Type','Fax','Email'), "\t");
        foreach ($companies as $row) {
            // pr($row);die;
            fputcsv($df, 
                array(
                    $row->name,
                    $row->Users['name'],
                    $row->address,
                    ($row->status=='A')?'Active':'Inactive',
                    $row->mem_type,
                    $row->fax,
                    $row->email,
                ),"\t");
        }
        fclose($df);
        die();
    }

    public function status($id = 0, $status = '')
    {
        $this->autoRender = false;
        $this->request->allowMethod(['get']);
        if($id<=0 || ($status!='A' && $status!='I')) {
            echo json_encode(['status'=>false,'message'=>'Invalid Options sent']);
            exit(0);
        }
        $item = $this->Companies->get($id);
        $item = $this->Companies->patchEntity($item,['status'=>$status]);
        if ($this->Companies->save($item)) {
            // $this->Flash->success(__('The ad has been deleted.'));
            echo json_encode(['status'=>true,'message'=>'The Company Status has been updated.']);
        } else { 
            // $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
            echo json_encode(['status'=>false,'message'=>'An error Occured. Try again latter!']);
        }

        // return $this->redirect(['action' => 'index']);
    }
}
