<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PresentationFiles Controller
 *
 * @property \App\Model\Table\PresentationFilesTable $PresentationFiles
 */
class PresentationFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Meetings']
        ];
        $presentationFiles = $this->paginate($this->PresentationFiles);

        $this->set(compact('presentationFiles'));
        $this->set('_serialize', ['presentationFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Presentation File id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $presentationFile = $this->PresentationFiles->get($id, [
            'contain' => ['Meetings']
        ]);

        $this->set('presentationFile', $presentationFile);
        $this->set('_serialize', ['presentationFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $presentationFile = $this->PresentationFiles->newEntity();
        if ($this->request->is('post')) {
            $presentationFile = $this->PresentationFiles->patchEntity($presentationFile, $this->request->data);
            if ($this->PresentationFiles->save($presentationFile)) {
                $this->Flash->success(__('The presentation file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The presentation file could not be saved. Please, try again.'));
        }
        $meetings = $this->PresentationFiles->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('presentationFile', 'meetings'));
        $this->set('_serialize', ['presentationFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Presentation File id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $presentationFile = $this->PresentationFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $presentationFile = $this->PresentationFiles->patchEntity($presentationFile, $this->request->data);
            if ($this->PresentationFiles->save($presentationFile)) {
                $this->Flash->success(__('The presentation file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The presentation file could not be saved. Please, try again.'));
        }
        $meetings = $this->PresentationFiles->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('presentationFile', 'meetings'));
        $this->set('_serialize', ['presentationFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Presentation File id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $presentationFile = $this->PresentationFiles->get($id);
        if ($this->PresentationFiles->delete($presentationFile)) {
            $this->Flash->success(__('The presentation file has been deleted.'));
        } else {
            $this->Flash->error(__('The presentation file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
