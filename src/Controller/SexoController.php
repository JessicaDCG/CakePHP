<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Sexo Controller
 *
 * @property \App\Model\Table\SexoTable $Sexo
 *
 * @method \App\Model\Entity\Sexo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SexoController extends AppController
{
    public function buscarSexo($idSexo){
        
        $sexos = TableRegistry::get('Sexo');
        $obj = $sexos->find()
                ->where(['idSexo' => $idSexo])
                ->first();                   
        return $obj['sexo'];          
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sexo = $this->paginate($this->Sexo);

        $this->set(compact('sexo'));
    }

    /**
     * View method
     *
     * @param string|null $id Sexo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sexo = $this->Sexo->get($id, [
            'contain' => []
        ]);

        $this->set('sexo', $sexo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sexo = $this->Sexo->newEntity();
        if ($this->request->is('post')) {
            $sexo = $this->Sexo->patchEntity($sexo, $this->request->getData());
            if ($this->Sexo->save($sexo)) {
                $this->Flash->success(__('The sexo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sexo could not be saved. Please, try again.'));
        }
        $this->set(compact('sexo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sexo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sexo = $this->Sexo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sexo = $this->Sexo->patchEntity($sexo, $this->request->getData());
            if ($this->Sexo->save($sexo)) {
                $this->Flash->success(__('The sexo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sexo could not be saved. Please, try again.'));
        }
        $this->set(compact('sexo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sexo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sexo = $this->Sexo->get($id);
        if ($this->Sexo->delete($sexo)) {
            $this->Flash->success(__('The sexo has been deleted.'));
        } else {
            $this->Flash->error(__('The sexo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
