<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cohortes Controller
 *
 * @property \App\Model\Table\CohortesTable $Cohortes
 */
class CohortesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Instituciones']
        ];
        $cohortes = $this->paginate($this->Cohortes);

        $this->set(compact('cohortes'));
        $this->set('_serialize', ['cohortes']);
    }

    /**
     * View method
     *
     * @param string|null $id Cohorte id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cohorte = $this->Cohortes->get($id, [
            'contain' => ['Instituciones']
        ]);

        $this->set('cohorte', $cohorte);
        $this->set('_serialize', ['cohorte']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cohorte = $this->Cohortes->newEntity();
        if ($this->request->is('post')) {
            $cohorte = $this->Cohortes->patchEntity($cohorte, $this->request->data);
            if ($this->Cohortes->save($cohorte)) {
                $this->Flash->success(__('The cohorte has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cohorte could not be saved. Please, try again.'));
            }
        }
        $instituciones = $this->Cohortes->Instituciones->find('list', ['limit' => 200]);
        $this->set(compact('cohorte', 'instituciones'));
        $this->set('_serialize', ['cohorte']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cohorte id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cohorte = $this->Cohortes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cohorte = $this->Cohortes->patchEntity($cohorte, $this->request->data);
            if ($this->Cohortes->save($cohorte)) {
                $this->Flash->success(__('The cohorte has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cohorte could not be saved. Please, try again.'));
            }
        }
        $cohorte->fecha_inicio = $cohorte->fecha_inicio->i18nFormat('YYY-MM-dd');
        $instituciones = $this->Cohortes->Instituciones->find('list', ['limit' => 200]);
        $this->set(compact('cohorte', 'instituciones'));
        $this->set('_serialize', ['cohorte']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cohorte id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cohorte = $this->Cohortes->get($id);
        if ($this->Cohortes->delete($cohorte)) {
            $this->Flash->success(__('The cohorte has been deleted.'));
        } else {
            $this->Flash->error(__('The cohorte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
