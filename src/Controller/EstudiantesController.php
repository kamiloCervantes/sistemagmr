<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Estudiantes Controller
 *
 * @property \App\Model\Table\EstudiantesTable $Estudiantes
 */
class EstudiantesController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function getcohortesinstitucion(){
        if ($this->request->is('get')) {
            $institucion = $this->request->query('param');
            $cohortes = $this->Estudiantes->Cohortes->find('all', 
                ['limit' => 200,
                 'conditions' => ['Cohortes.Instituciones_id =' => $institucion]  
                    ]);
            $this->set(compact('cohortes'));
        }
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cohortes', 'Personas']
        ];
        $estudiantes = $this->paginate($this->Estudiantes);

        $this->set(compact('estudiantes'));
        $this->set('_serialize', ['estudiantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estudiante = $this->Estudiantes->get($id, [
            'contain' => ['Cohortes', 'Personas', 'TrabajosGrado']
        ]);

        $this->set('estudiante', $estudiante);
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //primero la persona
        //luego el usuario 
        //luego el estudiante
        $conn = ConnectionManager::get('default');
        $estudiante = $this->Estudiantes->newEntity();
        $persona = $this->Estudiantes->Personas->newEntity();
        $usuario = $this->Estudiantes->Personas->Users->newEntity();
        if ($this->request->is('post')) {            
            $estudiante = $this->Estudiantes->patchEntity($estudiante, $this->request->data);
            $persona = $this->Estudiantes->Personas->patchEntity($persona, $this->request->data);
            $usuario = $this->Estudiantes->Personas->Users->patchEntity($usuario, $this->request->data);
            $usuario->set('Roles_id', 2);
            $usuario->dirty('Roles_id', true);
            $conn->begin();
            if ($this->Estudiantes->Personas->Users->save($usuario)) {
               $persona->set('users_id', $usuario->get('id'));
               $persona->dirty('users_id', true);
                if($this->Estudiantes->Personas->save($persona)){
                     $estudiante->set('Personas_id', $persona->get('id'));
                     $estudiante->dirty('Personas_id', true);
                    if($this->Estudiantes->save($estudiante)){
                            $this->Flash->success(__('The estudiante has been saved.'));
                            $conn->commit();
                            return $this->redirect(['action' => 'index']);
                    }
                    else{
                        $conn->rollback();
                        $this->Flash->error(__('The estudiante could not be saved. Please, try again.1'));
                    }
                }
                else{
                    $conn->rollback();
                    $this->Flash->error(__('The estudiante could not be saved. Please, try again.2'));
                }

            } else {
                $conn->rollback();
                $this->Flash->error(__('The estudiante could not be saved. Please, try again.3'));
            }
        }
        $cohortes = $this->Estudiantes->Cohortes->find('list', ['limit' => 200]);
        $personas = $this->Estudiantes->Personas->find('list', ['limit' => 200]);
        $municipios = $this->Estudiantes->Personas->Municipios->find('list', ['limit' => 200]);
        $instituciones = $this->Estudiantes->Cohortes->Instituciones->find('list', ['limit' => 200]);
        $trabajosGrado = $this->Estudiantes->TrabajosGrado->find('list', ['limit' => 200]);
        $this->set(compact('estudiante', 'cohortes', 'personas', 'trabajosGrado', 'instituciones', 'municipios'));
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estudiante = $this->Estudiantes->get($id, [
            'contain' => ['TrabajosGrado']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estudiante = $this->Estudiantes->patchEntity($estudiante, $this->request->data);
            if ($this->Estudiantes->save($estudiante)) {
                $this->Flash->success(__('The estudiante has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The estudiante could not be saved. Please, try again.'));
            }
        }
        $cohortes = $this->Estudiantes->Cohortes->find('list', ['limit' => 200]);
        $personas = $this->Estudiantes->Personas->find('list', ['limit' => 200]);
        $trabajosGrado = $this->Estudiantes->TrabajosGrado->find('list', ['limit' => 200]);
        $this->set(compact('estudiante', 'cohortes', 'personas', 'trabajosGrado'));
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estudiante = $this->Estudiantes->get($id);
        if ($this->Estudiantes->delete($estudiante)) {
            $this->Flash->success(__('The estudiante has been deleted.'));
        } else {
            $this->Flash->error(__('The estudiante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
