<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bulletins Controller
 *
 * @property \App\Model\Table\BulletinsTable $Bulletins
 */
class BulletinsController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function update()
    {
        $this->set('title', 'Bulletin');
        $bulletin = $this->Bulletins->find('all', array('order' => ['created' => 'desc']))->first();

        // $bulletin = $this->Bulletins->get($id, [
        //     'contain' => []
        // ]);
        // ->first()
        // pr($this->request);
        // echo "request type is".$this->request->is('post');
        $newbulletin = $this->Bulletins->newEntity();
        if ($this->request->is(['post','put'])) {
            // print "got in post block";
            // pr($this->request);
            $newbulletin = $this->Bulletins->patchEntity($newbulletin, $this->request->data);
            // pr($this->Bulletins->save($newbulletin));
            // pr($newbulletin);die;
            if ($this->Bulletins->save($newbulletin)) {
                $this->Flash->success(__('The bulletin has been updated.'));

                return $this->redirect(['action' => 'update']);
            }
            $this->Flash->error(__('The bulletin could not be saved. Please, try again.'));
        }
        $this->set(compact('bulletin'));
        $this->set('_serialize', ['bulletin']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $bulletins = $this->paginate($this->Bulletins);

        $this->set(compact('bulletins'));
        $this->set('_serialize', ['bulletins']);
    }

    /**
     * View method
     *
     * @param string|null $id Bulletin id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bulletin = $this->Bulletins->get($id, [
            'contain' => []
        ]);

        $this->set('bulletin', $bulletin);
        $this->set('_serialize', ['bulletin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bulletin = $this->Bulletins->newEntity();
        if ($this->request->is('post')) {
            $bulletin = $this->Bulletins->patchEntity($bulletin, $this->request->data);
            if ($this->Bulletins->save($bulletin)) {
                $this->Flash->success(__('The bulletin has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The bulletin could not be saved. Please, try again.'));
        }
        $this->set(compact('bulletin'));
        $this->set('_serialize', ['bulletin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bulletin id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bulletin = $this->Bulletins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bulletin = $this->Bulletins->patchEntity($bulletin, $this->request->data);
            if ($this->Bulletins->save($bulletin)) {
                $this->Flash->success(__('The bulletin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bulletin could not be saved. Please, try again.'));
        }
        $this->set(compact('bulletin'));
        $this->set('_serialize', ['bulletin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bulletin id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bulletin = $this->Bulletins->get($id);
        if ($this->Bulletins->delete($bulletin)) {
            $this->Flash->success(__('The bulletin has been deleted.'));
        } else {
            $this->Flash->error(__('The bulletin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
