<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ServiceProviders Controller
 *
 * @property \App\Model\Table\ServiceProvidersTable $ServiceProviders
 */
class ServiceProvidersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Ads');
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
                    
                    $ad = $this->AdFiles->patchEntity($ad_file, $filedata);
                    if ($row = $this->AdFiles->save($ad)) {
                        $this->Flash->success(__('The ad and file has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
                $this->Flash->success(__('The ad has been saved.'));
                // return $this->redirect(['action' => 'index']);
            }
            pr($ad);
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
     * @param string|null $id Service Provider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceProvider = $this->ServiceProviders->get($id, [
            'contain' => []
        ]);

        $this->set('serviceProvider', $serviceProvider);
        $this->set('_serialize', ['serviceProvider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceProvider = $this->ServiceProviders->newEntity();
        if ($this->request->is('post')) {
            $serviceProvider = $this->ServiceProviders->patchEntity($serviceProvider, $this->request->data);
            if ($this->ServiceProviders->save($serviceProvider)) {
                $this->Flash->success(__('The service provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service provider could not be saved. Please, try again.'));
        }
        $this->set(compact('serviceProvider'));
        $this->set('_serialize', ['serviceProvider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Provider id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceProvider = $this->ServiceProviders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceProvider = $this->ServiceProviders->patchEntity($serviceProvider, $this->request->data);
            if ($this->ServiceProviders->save($serviceProvider)) {
                $this->Flash->success(__('The service provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service provider could not be saved. Please, try again.'));
        }
        $this->set(compact('serviceProvider'));
        $this->set('_serialize', ['serviceProvider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Provider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceProvider = $this->ServiceProviders->get($id);
        if ($this->ServiceProviders->delete($serviceProvider)) {
            $this->Flash->success(__('The service provider has been deleted.'));
        } else {
            $this->Flash->error(__('The service provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
