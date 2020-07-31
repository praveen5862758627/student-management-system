<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areaofexpertise Model
 *
 * @method \App\Model\Entity\Areaofexpertise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Areaofexpertise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Areaofexpertise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Areaofexpertise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Areaofexpertise|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Areaofexpertise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Areaofexpertise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Areaofexpertise findOrCreate($search, callable $callback = null, $options = [])
 */
class AreaofexpertiseTable extends Table
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

        $this->setTable('areaofexpertise');
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
            ->scalar('industry')
            ->allowEmptyString('industry');

        $validator
            ->scalar('functionalexpertise')
            ->allowEmptyString('functionalexpertise');

        $validator
            ->scalar('liketobe')
            ->allowEmptyString('liketobe');

        $validator
            ->scalar('expertise')
            ->allowEmptyString('expertise');

        $validator
            ->integer('userid')
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        return $validator;
    }
}
