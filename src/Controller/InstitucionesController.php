<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Instituciones Controller
 *
 * @property \App\Model\Table\InstitucionesTable $Instituciones
 */
class InstitucionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Municipios']
        ];
        $instituciones = $this->paginate($this->Instituciones);

        $this->set(compact('instituciones'));
        $this->set('_serialize', ['instituciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Institucione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $institucione = $this->Instituciones->get($id, [
            'contain' => ['Municipios']
        ]);

        $this->set('institucione', $institucione);
        $this->set('_serialize', ['institucione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $institucione = $this->Instituciones->newEntity();
        if ($this->request->is('post')) {
            $institucione = $this->Instituciones->patchEntity($institucione, $this->request->data);
            if ($this->Instituciones->save($institucione)) {
                $this->Flash->success(__('The institucione has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institucione could not be saved. Please, try again.'));
            }
        }
        $municipios = $this->Instituciones->Municipios->find('list', ['limit' => 200]);        
        $this->set(compact('institucione', 'municipios'));
        $this->set('_serialize', ['institucione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Institucione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $institucione = $this->Instituciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $institucione = $this->Instituciones->patchEntity($institucione, $this->request->data);
            if ($this->Instituciones->save($institucione)) {
                $this->Flash->success(__('The institucione has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The institucione could not be saved. Please, try again.'));
            }
        }
        $municipios = $this->Instituciones->Municipios->find('list', ['limit' => 200]);
        $this->set(compact('institucione', 'municipios'));
        $this->set('_serialize', ['institucione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Institucione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $institucione = $this->Instituciones->get($id);
        if ($this->Instituciones->delete($institucione)) {
            $this->Flash->success(__('The institucione has been deleted.'));
        } else {
            $this->Flash->error(__('The institucione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
