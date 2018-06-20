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
 */
class PersonaController extends AppController
{
  
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {     
        try{
        $persona = $this->paginate($this->Persona);     
        $this->set(compact('persona'));
        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }
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
        try {

        $persona = $this->Persona->get($id, [
            'contain' => []
        ]);                  

        $objSexoCtrl = new SexoController();             
                
        $sexo = $objSexoCtrl->buscarSexo($persona['sexo']);          
      
        $this->set('sexo', $sexo);   
        $this->set('persona', $persona);

        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public $helpers = array('Html', 'Form');
    public function add()
    {
       try{
        $sexos = TableRegistry::get('Sexo');
        $ArraySexos = $sexos->find()->toList();            
        $array = array();
        //$array=[0=>"Selecciona"];
        foreach ($ArraySexos as $sexo ) {                                              
            $array[$sexo['idSexo']] = $sexo['sexo'];                              
        }
        $ArraySexos=$array;
        $this->set('ArraySexos', $ArraySexos); 
      

    
        $persona = $this->Persona->newEntity();
        if ($this->request->is('post')) {
            $persona = $this->Persona->patchEntity($persona, $this->request->getData());
            if ($this->Persona->save($persona)) {                
                $this->Flash->success(__('La persona ha sido guardada.'));
                
                return $this->redirect(['action' => 'index']);
            }            
            
            $this->Flash->error(__('Error al guardar. Por favor, intenta nuevamente.'));
        }

        $this->set(compact('persona'));     
        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }
        
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
        try{
        $persona = $this->Persona->get($id, [
            'contain' => []
        ]);

         $sexos = TableRegistry::get('Sexo');
        $ArraySexos = $sexos->find()->toList();            
        $array = array();
        //$array=[0=>"Selecciona"];
        foreach ($ArraySexos as $sexo ) {                                              
            $array[$sexo['idSexo']] = $sexo['sexo'];                              
        }
        $ArraySexos=$array;
        $this->set('ArraySexos', $ArraySexos); 
            

        if ($this->request->is(['patch', 'post', 'put'])) {           

            $persona = $this->Persona->patchEntity($persona, $this->request->getData());

            if ($this->Persona->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona could not be saved. Please, try again.'));
        }
        $this->set(compact('persona'));
        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }
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
        try{
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Persona->get($id);
        if ($this->Persona->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }
    }


    /**
     * PDF method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function pdf2($id = null)
    {
        try{
      
            $persona = $this->Persona->get($id, [
                'contain' => []
            ]);        
            
            $sexos = TableRegistry::get('Sexo');
            $objSexo = $sexos->find()
                    ->where(['idSexo' => $persona['sexo']])
                    ->first();                    
                
            $sexo = $objSexo['sexo']; 
                
            $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => 'Persona_' . $id . '.pdf'
                ]
            ]);
            $this->set('sexo', $sexo);   
            $this->set('persona', $persona);
            
            //$this->layout='ajax';
            $this->response->type('application/pdf');
        } catch (\Exception $e) {
            $mail= new EmailController();
            $err= new ErrorController();

            $mail->correo('Error CAKAPHP',$e->getMessage());
            return $this->redirect(['action' => 'index']);
        }     
    }
}
