<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdFiles Controller
 *
 * @property \App\Model\Table\AdFilesTable $AdFiles
 */
class AdFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ads']
        ];
        $adFiles = $this->paginate($this->AdFiles);

        $this->set(compact('adFiles'));
        $this->set('_serialize', ['adFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adFile = $this->AdFiles->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adFile', $adFile);
        $this->set('_serialize', ['adFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adFile = $this->AdFiles->newEntity();
        if ($this->request->is('post')) {
            $adFile = $this->AdFiles->patchEntity($adFile, $this->request->data);
            if ($this->AdFiles->save($adFile)) {
                $this->Flash->success(__('The ad file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad file could not be saved. Please, try again.'));
        }
        $ads = $this->AdFiles->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adFile', 'ads'));
        $this->set('_serialize', ['adFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adFile = $this->AdFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adFile = $this->AdFiles->patchEntity($adFile, $this->request->data);
            if ($this->AdFiles->save($adFile)) {
                $this->Flash->success(__('The ad file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad file could not be saved. Please, try again.'));
        }
        $ads = $this->AdFiles->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adFile', 'ads'));
        $this->set('_serialize', ['adFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adFile = $this->AdFiles->get($id);
        if ($this->AdFiles->delete($adFile)) {
            $this->Flash->success(__('The ad file has been deleted.'));
        } else {
            $this->Flash->error(__('The ad file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
