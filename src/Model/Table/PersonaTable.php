<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Persona Model
 *
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, callable $callback = null, $options = [])
 */
class PersonaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        
        parent::initialize($config);

        $this->setTable('persona');
        $this->setDisplayField('idPersona');
        $this->setPrimaryKey('idPersona');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('idPersona')
            ->notEmpty('idPersona', 'create');

        $validator
            ->scalar('Nombre')
            ->maxLength('Nombre', 50)                                   
            ->notEmpty('Nombre');

        $validator
            ->scalar('Apellido_Paterno')
            ->maxLength('Apellido_Paterno', 50)
            ->notEmpty('Apellido_Paterno');

        $validator
            ->scalar('Apellido_Materno')
            ->maxLength('Apellido_Materno', 50)
            ->notEmpty('Apellido_Materno');

        $validator
            ->date('FechaNacimiento')
            ->notEmpty('FechaNacimiento');            

        $validator
            ->integer('sexo')
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->scalar('Correo')
            ->maxLength('Correo', 50)            
            ->notEmpty('Correo');

        return $validator;
    }
}
