<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blocks Model
 *
 * @method \App\Model\Entity\Block get($primaryKey, $options = [])
 * @method \App\Model\Entity\Block newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Block[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Block|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Block|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Block patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Block[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Block findOrCreate($search, callable $callback = null, $options = [])
 */
class BlocksTable extends Table
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

        $this->setTable('blocks');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->integer('optional_mandatory_flag')
            ->requirePresence('optional_mandatory_flag', 'create')
            ->allowEmptyString('optional_mandatory_flag', false);

        $validator
            ->integer('drag_position')
            ->requirePresence('drag_position', 'create')
            ->allowEmptyString('drag_position', false);

        return $validator;
    }
}
