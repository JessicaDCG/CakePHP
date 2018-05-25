<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Persona Controller
 *
 * @property \App\Model\Table\PersonaTable $Persona
 * @property \App\Model\Table\SexoTable $Sexo
 *
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @method \App\Model\Entity\Sexo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $persona = $this->paginate($this->Persona);

        $this->set(compact('persona'));
    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $persona = $this->Persona->get($id, [
            'contain' => []
        ]);
        
        
        $sexos = TableRegistry::get('Sexo');
        $objSexo = $sexos->find()
                ->where(['idSexo' => $persona['sexo']])
                ->first();                    
            
        $sexo = $objSexo['sexo'];      
      
        $this->set('sexo', $sexo);   


        $this->set('persona', $persona);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $persona = $this->Persona->newEntity();
        if ($this->request->is('post')) {
            $persona = $this->Persona->patchEntity($persona, $this->request->getData());
            if ($this->Persona->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona could not be saved. Please, try again.'));
        }
        $this->set(compact('persona'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $persona = $this->Persona->get($id, [
            'contain' => []
        ]);

         $sexos = TableRegistry::get('Sexo');
            $sexo=$sexos->find('all');    
          
            

        if ($this->request->is(['patch', 'post', 'put'])) {           

            $persona = $this->Persona->patchEntity($persona, $this->request->getData());
           
           


            if ($this->Persona->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona could not be saved. Please, try again.'));
        }
        $this->set(compact('persona'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Persona->get($id);
        if ($this->Persona->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
