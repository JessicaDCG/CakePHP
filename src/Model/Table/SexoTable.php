<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sexo Model
 *
 * @method \App\Model\Entity\Sexo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sexo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sexo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sexo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sexo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sexo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sexo findOrCreate($search, callable $callback = null, $options = [])
 */
class SexoTable extends Table
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

        $this->setTable('sexo');
        $this->setDisplayField('idSexo');
        $this->setPrimaryKey('idSexo');
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
            ->integer('idSexo')
            ->allowEmpty('idSexo', 'create');

        $validator
            ->scalar('sexo')
            ->maxLength('sexo', 45)
            ->allowEmpty('sexo');

        return $validator;
    }
}
