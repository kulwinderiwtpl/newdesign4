<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RsvpSettings Controller
 *
 * @property \App\Model\Table\RsvpSettingsTable $RsvpSettings
 */
class RsvpSettingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    // public function index()
    // {
    //     $rsvpSettings = $this->paginate($this->RsvpSettings);

    //     $this->set(compact('rsvpSettings'));
    //     $this->set('_serialize', ['rsvpSettings']);
    // }

    /**
     * View method
     *
     * @param string|null $id Rsvp Setting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $rsvpSetting = $this->RsvpSettings->get($id, [
    //         'contain' => []
    //     ]);

    //     $this->set('rsvpSetting', $rsvpSetting);
    //     $this->set('_serialize', ['rsvpSetting']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $rsvpSetting = $this->RsvpSettings->newEntity();
    //     if ($this->request->is('post')) {
    //         $rsvpSetting = $this->RsvpSettings->patchEntity($rsvpSetting, $this->request->data);
    //         if ($this->RsvpSettings->save($rsvpSetting)) {
    //             $this->Flash->success(__('The rsvp setting has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The rsvp setting could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('rsvpSetting'));
    //     $this->set('_serialize', ['rsvpSetting']);
    // }

    /**
     * Edit method
     *
     * @param string|null $id Rsvp Setting id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function index()
    {
        // $rsvpSetting = $this->RsvpSettings->get($id, [
        //     'contain' => []
        // ]);
        $this->set('title', 'RSVP');
        $rsvpSetting = $this->RsvpSettings->find()->first(); 
        if ($this->request->is(['patch', 'post', 'put'])) {
            //convert back to HTML
            // $this->request->data['cheque_text'] = nl2br($this->request->data['cheque_text']);
            // $this->request->data['bacs_text'] = nl2br($this->request->data['bacs_text']);
            // $this->request->data['return_text'] = nl2br($this->request->data['return_text']);

            $rsvpSetting = $this->RsvpSettings->patchEntity($rsvpSetting, $this->request->data);
            if ($this->RsvpSettings->save($rsvpSetting)) {
                $this->Flash->success(__('The rsvp setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rsvp setting could not be saved. Please, try again.'));
        }
        $this->set(compact('rsvpSetting'));
        $this->set('_serialize', ['rsvpSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rsvp Setting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $rsvpSetting = $this->RsvpSettings->get($id);
    //     if ($this->RsvpSettings->delete($rsvpSetting)) {
    //         $this->Flash->success(__('The rsvp setting has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The rsvp setting could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
