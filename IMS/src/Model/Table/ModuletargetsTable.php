<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Moduletargets Model
 *
 * @method \App\Model\Entity\Moduletarget get($primaryKey, $options = [])
 * @method \App\Model\Entity\Moduletarget newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Moduletarget[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Moduletarget|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Moduletarget|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Moduletarget patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Moduletarget[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Moduletarget findOrCreate($search, callable $callback = null, $options = [])
 */
class ModuletargetsTable extends Table
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

        $this->setTable('moduletargets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('modulecode')
            ->maxLength('modulecode', 250)
            ->requirePresence('modulecode', 'create')
            ->allowEmptyString('modulecode', false);

        $validator
            ->scalar('targetcode')
            ->maxLength('targetcode', 250)
            ->requirePresence('targetcode', 'create')
            ->allowEmptyString('targetcode', false);

        $validator
            ->scalar('targetname')
            ->maxLength('targetname', 400)
            ->requirePresence('targetname', 'create')
            ->allowEmptyString('targetname', false);

        return $validator;
    }
}
